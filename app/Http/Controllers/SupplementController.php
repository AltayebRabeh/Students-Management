<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Mark;
use App\Models\Year;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\SupplementRequest;
use App\Models\Subject;

class SupplementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supplements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreGradeRequest $request)
    {
        $section = Section::select('id', 'name')->whereId($request->section_id)->first();
        $classroom = Classroom::select('id', 'name')->whereId($request->classroom_id)->first();
        $semester = Semester::select('id', 'name')->whereId($request->semester_id)->first();
        $year = Year::select('id', 'year')->whereId($request->year_id)->first();
        $subjectTeacher = SubjectTeacher::with(['subject'])->whereId($request->subject_teacher_id)->first();

        $param = [
            'section' => ['id'=> $section->id, 'name' => $section->name],
            'classroom' => ['id'=> $classroom->id, 'name' => $classroom->name],
            'semester' => ['id'=> $semester->id, 'name' => $semester->name],
            'year' => ['id'=> $year->id, 'year' => $year->year],
            'subject' => ['id'=> $subjectTeacher->id, 'name' => $subjectTeacher->subject->name],
        ];

        $students = Student::select('id', 'university_number', 'name')
                            ->with(['grades' => function($q) use($request, $subjectTeacher){
                                return $q->with(['mark'])
                                        ->whereReExam(1)
                                        ->whereSectionId($request->section_id)
                                        ->whereYearId($request->year_id)
                                        ->whereClassroomId($request->semester_id)
                                        ->whereSemesterId($request->semester_id)
                                        ->whereSubjectTeacherId($subjectTeacher->id);
                            }])
                            ->whereHas('grades', function($q)use($subjectTeacher){
                                $q->whereReExam(1)
                                ->whereSubjectTeacherId($subjectTeacher->id);
                            })
                            ->whereSectionId($request->section_id)
                            ->whereYearId($request->year_id)
                            ->whereClassroomId($request->classroom_id)
                            ->get();

        if(!$students->first()) {
            toastr()->warning('???????????? ?????????? ???? ?????????? ???????? ????????????');
            return redirect()->route('supplements.index');
        }

        return view('supplements.create', compact('students'))->with($param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        foreach($request->grades as $grade)
        {
            $mark = Mark::select('id', 'fail', 'max')->where('min', '<=', $grade['grade'])->where('max', '>=', $grade['grade'])->first();

            $re_exam = $mark->fail == 1 || $mark->max > 100 ? 1 : 0;

            $student_grade = Grade::whereStudentId($grade['student_id'])
                            ->whereSectionId($request->section_id)
                            ->whereClassroomId($request->classroom_id)
                            ->whereSemesterId($request->semester_id)
                            ->whereYearId($request->year_id)
                            ->whereSubjectTeacherId($request->subject_teacher_id)
                            ->first();

            if($student_grade) {

                $student_grade->update([
                    'grade' => $grade['grade'],
                    'mark_id' => $mark->id,
                    'fail' => $student_grade->mark->fail,
                    're_exam' => $re_exam,
                    'user_id' => auth()->user()->id,
                ]);

            }
        }

        toastr()->success('???? ?????????? ???????????? ??????????');

        return true;
    }

    public function data()
    {
        return view('supplements.data');
    }

    public function result(DataRequest $request)
    {
        $students = Student::with(['grades' => function($q) use($request){
                        $q->with([
                            'mark' => function($q){return $q->with(['equation' => function($q){$q->withTrashed();}])->withTrashed();},
                            'subjectTeacher' => function($q){return $q->with(['subject' => function($q){
                                    return $q->withTrashed();
                                }])->withTrashed()->select('id', 'hours', 'subject_id');},
                        ])
                        ->withTrashed()
                        ->whereSectionId($request->section_id)
                        ->whereYearId($request->year_id)
                        ->whereClassroomId($request->classroom_id)
                        ->whereSemesterId($request->semester_id)
                        ->orderBy('subject_teacher_id', 'ASC');
                    }])
                    ->whereHas('grades', function($q) use($request){
                        $q->where('re_exam', 1)
                        ->whereSectionId($request->section_id)
                        ->orderBy('subject_teacher_id', 'ASC');
                    })->get();

        $section = Section::find($request->section_id)->name;
        $classroom = Classroom::find($request->classroom_id)->name;
        $semester = Semester::find($request->semester_id)->name;
        $year = Year::find($request->year_id)->year;

        if(!$students->first()) {
            toastr()->warning('???????????? ?????????? ????????????');
            return redirect()->route('supplements.data');
        }

        return view('supplements.result', compact('students'))
                ->with([
                    'section' => $section,
                    'classroom' => $classroom,
                    'semester' => $semester,
                    'year' => $year,
                ]);
    }

    public function list(Request $request)
    {
        if(!(isset($request->section_id) && isset($request->classroom_id))) {
            toastr()->warning('???????????? ???? ???????????????? ????????????????');
            return redirect()->back();
        }

        $section = Section::find($request->section_id)->name;
        $classroom = Classroom::find($request->classroom_id)->name;

        $semesrer = null;
        if(isset($request->semester_id)) {
            $semesrer = Semester::find($request->semester_id)->name;
        }

        $subject = null;
        if(isset($request->subject_teacher_id)) {
            $subject = Subject::find($request->subject_teacher_id)->name;
        }

        $students = Student::whereHas('grades', function($q) use($request){
            $q->where('re_exam', '!=', 0);
            if(isset($request->subject_teacher_id)) {
                $q = $q->where('subject_teacher_id', $request->subject_teacher_id);
            }
            if(isset($request->semester_id)) {
                $q = $q->whereSemesterId($request->semester_id);
            }
        })
        ->whereSectionId($request->section_id)
        ->whereClassroomId($request->classroom_id)
        ->get();

        return view('supplements.list', compact('students'))->with(['classroom' => $classroom, 'semesrer' => $semesrer, 'section' => $section, 'subject' => $subject]);
    }

    public function checkList(Request $request)
    {
        if(!(isset($request->section_id)
            && isset($request->classroom_id)
            && isset($request->semester_id)
            && isset($request->year_id)
             && isset($request->subject_teacher_id))) {
            toastr()->warning('???????????? ????  ???????????????? ????????????????');
            return redirect()->back();
        }

        $section = Section::find($request->section_id)->name;
        $classroom = Classroom::find($request->classroom_id)->name;
        $semester = Semester::find($request->semester_id)->name;
        $subject = Subject::find(SubjectTeacher::find($request->subject_teacher_id)->subject_id)->name;


        $students = Student::whereHas('grades', function($q) use($request){
                                $q->where('subject_teacher_id', $request->subject_teacher_id);
                                $q = $q->whereYearId($request->year_id);
                            })
                            ->whereSectionId($request->section_id)
                            ->whereClassroomId($request->classroom_id)
                            ->whereYearId($request->year_id)
                            ->count();

        if($students == 0) {
            $students = Student::whereSectionId($request->section_id)
            ->whereClassroomId($request->classroom_id)
            ->whereYearId($request->year_id)
            ->get();
            $rexam = false;

        } else {
            $students = Student::whereHas('grades', function($q) use($request){
                $q->where('re_exam', '!=', 0)
                    ->where('subject_teacher_id', $request->subject_teacher_id);
            })
            ->whereSectionId($request->section_id)
            ->whereClassroomId($request->classroom_id)
            ->whereYearId($request->year_id)
            ->get();
            $rexam = true;
        }


        return view('supplements.check-list', compact('students'))->with(['classroom' => $classroom, 'semester' => $semester, 'section' => $section, 'subject' => $subject, 'rexam' => $rexam]);
    }
}
