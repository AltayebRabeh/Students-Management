<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Year;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use App\Http\Requests\StudentGradesRequest;
use App\Models\Subject;

class StudentGradesController extends Controller
{
    public function index()
    {
        return view('student_grades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentGradesRequest $request)
    {
        $section = Section::select('id', 'name')->findOrFail($request->section_id);
        $classroom = Classroom::select('id', 'name')->findOrFail($request->classroom_id);
        $semester = Semester::select('id', 'name')->findOrFail($request->semester_id);
        $year = Year::select('id', 'year')->findOrFail($request->year_id);
        $student = Student::whereUniversityNumber($request->university_number)->whereSectionId($request->section_id)->first();

        if(!$student)
        {
            toastr()->error('معلومات الطالب خاطئة');
            return redirect()->back();
        }

        $params = [
            'section' => $section,
            'classroom' => $classroom,
            'semester' => $semester,
            'year' => $year,
            'student' => $student,
        ];

        $subjects = SubjectTeacher::withTrashed()
                    ->with(['subject' => function($q) use($student)
                        {
                            return $q->withTrashed();
                        }
                    ])
                    ->whereSectionId($request->section_id)
                    ->whereYearId($request->year_id)
                    ->whereClassroomId($request->classroom_id)
                    ->whereSemesterId($request->semester_id)
                    ->get();

        $subjectsTeachers = SubjectTeacher::withTrashed()
                ->with([
                    'grades' => function($q) use($student)
                    {
                        return $q->with(['mark'])
                                ->where('student_id', $student->id);
                    },
                    'subject' => function($q)
                    {
                        return $q->withTrashed();
                    }
                ])
                ->whereHas('grades', function($q) use($student) {$q->where('student_id', $student->id);})
                ->whereHas('grades.student')
                ->whereSectionId($request->section_id)
                ->whereYearId($request->year_id)
                ->whereClassroomId($request->classroom_id)
                ->whereSemesterId($request->semester_id)
                ->get();

        if(!$subjectsTeachers)
        {
            toastr()->error('معلومات المواد خاطئة');
            return redirect()->back();
        }

        return view('student_grades.create', compact('subjectsTeachers', 'subjects'))->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGradeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentGradesRequest $request)
    {
        $grades = Grade::whereSectionId($request->section_id)
                                ->whereStudentId($request->student_id)
                                ->whereClassroomId($request->classroom_id)
                                ->whereSemesterId($request->semester_id)
                                ->whereYearId($request->year_id)
                                ->delete();

        foreach($request->grades as $grade)
        {
            $mark = Mark::select('id')->where('min', '<=', $grade['grade'])->where('max', '>=', $grade['grade'])->first();

            $re_exam = $mark->fail == 1 || $mark->max > 100 ? 1 : 0;

            Grade::create([
                'grade' => $grade['grade'],
                'fail' => isset($grade['fail'])? 1 : 0,
                'mark_id' => $mark->id,
                're_exam' => $re_exam,
                'student_id' => $request->student_id,
                'section_id' => $request->section_id,
                'classroom_id' => $request->classroom_id,
                'semester_id' => $request->semester_id,
                'year_id' => $request->year_id,
                'subject_teacher_id' => $grade['subject_teacher_id'],
                'user_id' => auth()->user()->id,
            ]);
        }

        toastr()->success('تم الإدخال  بنجاح');

        return true;
    }

    public function handleResult(Request $request)
    {
        if($request->university_number == null){
            toastr()->warning('الرجاء إدخال الرقم الجامعي');
            return redirect()->back();
        }

        $student = Student::whereUniversityNumber($request->university_number)->first();

        if(!$student) {
            toastr()->warning('الرجاء إدخال رقم جامعي صحيح');
            return redirect()->back();
        }

        return redirect()->route('student-grades.result', $student->uuid);
    }

    public function result($id)
    {
        $student = Student::withTrashed()->where('uuid', $id)->first();

        $classrooms = Classroom::with(['semesters'=> function($q)  use($student){
                                    $q->with(['grades' => function($q) use($student){
                                            $q
                                            ->with(['mark' => function($q){$q->with(['equation' => function($q){$q->withTrashed();}])->withTrashed();}])
                                            ->with(['subjectTeacher' => function($q){
                                                $q->with(['subject' => function($q){
                                                    $q->withTrashed();
                                                }])
                                                ->withTrashed();
                                            }])
                                            ->where('student_id', $student->id);
                                    }])->whereHas('grades', function($q)use($student){$q->where('student_id', $student->id);});
                                }])
                                ->whereHas('semesters.grades', function($q)use($student){$q->where('student_id', $student->id);})->get();

                                // dd($classrooms);
        if(!$classrooms->first())
        {
            toastr()->warning('لايوجد نتيجة للطالب');
            return redirect()->back();
        }

        return view('student_grades.result', compact( 'classrooms', 'student'));
    }

    public function semesterData()
    {
        return view('student_grades.semester-data');
    }

    public function semesterResult(StudentGradesRequest $request)
    {
        $section = Section::select('id', 'name')->findOrFail($request->section_id);
        $classroom = Classroom::select('id', 'name')->findOrFail($request->classroom_id);
        $semester = Semester::select('id', 'name')->findOrFail($request->semester_id);
        $year = Year::select('id', 'year')->findOrFail($request->year_id);
        $student = Student::whereUniversityNumber($request->university_number)->whereSectionId($request->section_id)->first();

        if(!$student)
        {
            toastr()->error('معلومات الطالب خاطئة');
            return redirect()->back();
        }

        $params = [
            'section' => $section,
            'classroom' => $classroom,
            'semester' => $semester,
            'year' => $year,
            'student' => $student,
        ];

        $subjectsTeachers = SubjectTeacher::withTrashed()
                ->with([
                    'grades' => function($q) use($student)
                    {
                        return $q
                                ->with(['mark'])
                                ->where('student_id', $student->id)
                                ->withTrashed();
                    },
                    'subject' => function($q) use($student)
                    {
                        return $q->withTrashed();
                    }
                ])
                ->whereHas('grades', function($q) use($student) {$q->withTrashed()->where('student_id', $student->id);})
                ->whereHas('grades.student')
                ->whereSectionId($request->section_id)
                ->whereYearId($request->year_id)
                ->whereClassroomId($request->classroom_id)
                ->whereSemesterId($request->semester_id)
                ->get();

        if(!$subjectsTeachers)
        {
            toastr()->error('معلومات المواد خاطئة');
            return redirect()->back();
        }

        return view('student_grades.semester-result', compact('subjectsTeachers'))->with($params);
    }
}
