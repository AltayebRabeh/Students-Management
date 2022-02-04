<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectTeacherRequest;
use App\Models\Year;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;

class SubjectTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjectsTeachers = SubjectTeacher::withTrashed()->with(['classroom', 'semester',
            'section' => function ($q) {
                return $q->withTrashed();
            },
            'subject' => function ($q) {
                return $q->withTrashed();
            },
            'teacher' => function ($q) {
                return $q->withTrashed();
            },
            'year' => function ($q) {
                return $q->withTrashed();
            },
            'user' => function ($q) {
                return $q->withTrashed();
            }
        ]);

        if(isset($request->section_id) && $request->section_id != ''){
            $subjectsTeachers = $subjectsTeachers->whereSectionId($request->section_id);
        }
        if(isset($request->classroom_id) && $request->classroom_id != ''){
            $subjectsTeachers = $subjectsTeachers->whereClassroomId($request->classroom_id);
        }
        if(isset($request->semester_id) && $request->semester_id != ''){
            $subjectsTeachers = $subjectsTeachers->whereSemesterId($request->semester_id);
        }
        if(isset($request->year_id) && $request->year_id != ''){
            $subjectsTeachers = $subjectsTeachers->whereYearId($request->year_id);
        }

        $subjectsTeachers = $subjectsTeachers->orderBy('deleted_at', 'ASC')->paginate(PAGINATE_NUMBER)->appends($request->except('page'));

        return view('subjects_teachers.index', compact('subjectsTeachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::get();
        $teachers = Teacher::get();
        return view('subjects_teachers.create', compact('subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectTeacherRequest $request)
    {
        $subjectTeacher = SubjectTeacher::whereHours($request->hours)
        ->whereSubjectId($request->subject_id)
        ->whereSectionId($request->section_id)
        ->whereClassroom_id($request->classroom_id)
        ->whereYearId($request->year_id)
        ->whereSemesterId($request->semester_id)->first();

        if($subjectTeacher)
        {
            toastr()->warning('هذا السجل موجود مسبقاً');
            return redirect()->route('subjects-teachers.create');
        }

        $subjectTeacher = SubjectTeacher::create([
            'hours' => $request->hours,
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'section_id' => $request->section_id,
            'classroom_id' => $request->classroom_id,
            'year_id' => $request->year_id,
            'semester_id' => $request->semester_id,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $subjectTeacher->delete();
        }

        toastr()->success('تم إضافة المادة والاستاذ بنجاح');
        return redirect()->route('subjects-teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjectTeacher = SubjectTeacher::withTrashed()->doesntHave('grades')->get();

        if($subjectTeacher->find($id)) {
            SubjectTeacher::withTrashed()->find($id)->forceDelete();
            toastr()->success('تم حذف المادة و الاستاذ بنجاح');
            return redirect()->route('subjects-teachers.index');
        }


        toastr()->error('لايمكن حذف المادة و الاستاذ هنالك عدة بيانات تعتمد عليها');
        return redirect()->route('subjects-teachers.index');
    }

    public function enableDisable($id) {
        $subjectTeacher = SubjectTeacher::find($id);
        if($subjectTeacher) {
            $subjectTeacher->delete();
            toastr()->success('تم إلغاء التفعيل بنجاح');
            return redirect()->route('subjects-teachers.index');
        } else {
            SubjectTeacher::withTrashed()->findOrfail($id)->restore();
            toastr()->success('تم التفعيل بنجاح');
            return redirect()->route('subjects-teachers.index');
        }
    }

    public function getSubjectForGradesAjax($section_id, $classroom_id, $semester_id, $year_id)
    {
        $arr = [];
        $subjectsTeacher = SubjectTeacher::with(['subject'])
                ->whereSection_id($section_id)
                ->whereClassroom_id($classroom_id)
                ->whereSemesterId($semester_id)
                ->whereYearId($year_id)->get();
        foreach($subjectsTeacher as $subjectTeacher){
            $arr[$subjectTeacher->id] = $subjectTeacher->subject->name;
        }

        return $arr;
    }
}
