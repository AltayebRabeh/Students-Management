<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Mark;
use App\Models\Year;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\SubjectTeacher;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\StoreIncreaseRequest;
use App\Http\Requests\UpdateGradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grades.index');
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
                                        ->whereSectionId($request->section_id)
                                        ->whereYearId($request->year_id)
                                        ->whereClassroomId($request->classroom_id)
                                        ->whereSemesterId($request->semester_id)
                                        ->whereSubjectTeacherId($subjectTeacher->id)->get();
                            }])
                            ->whereSectionId($request->section_id)
                            ->whereYearId($request->year_id)
                            ->whereClassroomId($request->classroom_id)
                            ->get();

        if(!$students->first()) {
            toastr()->warning('لايوجد طلاب الرجاء مراجعة المدخلات او تم إدخال النتيجة من قبل');
            return redirect()->route('grades.index');
        }

        if($students->first()->grades->first()){
            toastr()->warning('هذه المادة تم إدخالها من قبل');
            return redirect()->route('grades.index');
        }

        return view('grades.create', compact('students'))->with($param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGradeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        foreach($request->grades as $grade)
        {
            $mark = Mark::select('id', 'fail', 'max')->where('min', '<=', $grade['grade'])->where('max', '>=', $grade['grade'])->first();

            $re_exam = $mark->fail == 1 || $mark->max > 100 ? 1 : 0;

            Grade::whereStudentId($grade['student_id'])
                    ->whereSectionId($request->section_id)
                    ->whereClassroomId($request->classroom_id)
                    ->where('year_id', '!=', $request->year_id)
                    ->delete();

            Grade::create([
                'grade' => $grade['grade'],
                'mark_id' => $mark->id,
                're_exam' => $re_exam,
                'student_id' => $grade['student_id'],
                'section_id' => $request->section_id,
                'classroom_id' => $request->classroom_id,
                'semester_id' => $request->semester_id,
                'year_id' => $request->year_id,
                'subject_teacher_id' => $request->subject_teacher_id,
                'user_id' => auth()->user()->id,
            ]);
        }

        toastr()->success('تم إدخال المادة بنجاح');

        return true;
    }

    public function semesterData()
    {
        return view('grades.semester-data');
    }

    public function semesterResult(DataRequest $request)
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
                        $q->withTrashed()
                        ->whereSectionId($request->section_id)
                        ->whereYearId($request->year_id)
                        ->whereClassroomId($request->classroom_id)
                        ->whereSemesterId($request->semester_id)
                        ->orderBy('subject_teacher_id', 'ASC');
                    })->get();

        $section = Section::find($request->section_id)->name;
        $classroom = Classroom::find($request->classroom_id)->name;
        $semester = Semester::find($request->semester_id)->name;
        $year = Year::find($request->year_id)->year;

        if(!$students->first()) {
            toastr()->warning('لايوجد نتيجة لعرضها');
            return redirect()->route('grades.semester.data');
        }

        return view('grades.semester-result', compact('students'))
                ->with([
                    'section' => $section,
                    'classroom' => $classroom,
                    'semester' => $semester,
                    'year' => $year,
                ]);
    }

    public function delete() {
        return view('grades.delete');
    }

    public function destroy(StoreGradeRequest $request) {
        $grades = Grade::whereSectionId($request->section_id)
                ->whereClassroomId($request->classroom_id)
                ->whereSemesterId($request->semester_id)
                ->whereYearId($request->year_id)
                ->whereSubjectTeacherId($request->subject_teacher_id)
                ->get();

        if($grades->first())
        {
            Grade::whereSectionId($request->section_id)
                ->whereClassroomId($request->classroom_id)
                ->whereSemesterId($request->semester_id)
                ->whereYearId($request->year_id)
                ->whereSubjectTeacherId($request->subject_teacher_id)
                ->forceDelete();

            toastr()->success('تم حذف الدرجات لهذه المادة بنجاح');
            return redirect()->back();
        }

        toastr()->warning('لايوجد درجات لهذه المادة او يمكنك مراجعة المدخلات');
        return redirect()->back();
    }

    public function increaseSuccess() {
        return view('grades.increase');
    }

    public function increaseSuccessStore(StoreIncreaseRequest $request) {

        $students = Student::select('id', 'university_number', 'name')
        ->with(['grades' => function($q) use($request){
            return $q->whereSectionId($request->section_id)
                    ->whereYearId($request->year_id)
                    ->whereClassroomId($request->classroom_id)
                    ->whereSemesterId($request->semester_id)
                    ->whereSubjectTeacherId($request->subject_teacher_id);
        }])
        ->whereHas('grades', function($q)use($request){
            $q = $q->whereSubjectTeacherId($request->subject_teacher_id);
            $q = $q->where('grade', '<=', 100);

            if($request->grades_from != null && $request->grades_from >= 0 && $request->grades_from <= 100) {
                $q = $q->where('grade', '>=', $request->grades_from);
            }

            if($request->grades_to != null && $request->grades_to >= 0 && $request->grades_to <= 100) {
                $q = $q->where('grade', '<=', $request->grades_to);
            }
        })
        ->whereSectionId($request->section_id)
        ->whereYearId($request->year_id)
        ->whereClassroomId($request->classroom_id)
        ->get();

        if(!$students) {
            toastr()->warning('لايوجد صفوف تأكد من المدخلات');
            return true;
        }

        if($request->increase_type === 'precentage') {

            foreach($students as $student){

                $student->grades->first()->grade += (int)($request->increase * $student->grades->first()->grade) / 100;
                if($student->grades->first()->grade > 100) {
                    $student->grades->first()->grade = 100;
                }
                $mark = Mark::select('id', 'fail', 'max')->where('min', '<=', $student->grades->first()->grade)->where('max', '>=', $student->grades->first()->grade)->first();
                $re_exam = $mark->fail == 1 || $mark->max > 100 ? 1 : 0;

                $student->grades->first()->mark_id = $mark->id;
                $student->grades->first()->re_exam = $re_exam;
                $student->grades->first()->save();
            }

        } else {

            foreach($students as $student){

                $student->grades->first()->grade += (int) $request->increase;
                if($student->grades->first()->grade > 100) {
                    $student->grades->first()->grade = 100;
                }
                $mark = Mark::select('id', 'fail', 'max')->where('min', '<=', $student->grades->first()->grade)->where('max', '>=', $student->grades->first()->grade)->first();
                $re_exam = $mark->fail == 1 || $mark->max > 100 ? 1 : 0;

                $student->grades->first()->mark_id = $mark->id;
                $student->grades->first()->re_exam = $re_exam;
                $student->grades->first()->save();
            }

        }

        toastr()->success('تمت العملية بنجاح');
        return true;
    }
}
