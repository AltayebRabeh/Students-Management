<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teachers = Teacher::withTrashed()->with(['section' => function($q){
            $q->withTrashed();
        }]);

        if(isset($request->section_id) && $request->section_id != ''){
            $teachers = $teachers->whereSectionId($request->section_id);
        }

        $teachers = $teachers->paginate(PAGINATE_NUMBER);

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = Teacher::create([
            'name' => $request->name,
            'description' => $request->description,
            'section_id' => $request->section_id,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $teacher->delete();
        }
        
        toastr()->success('تم إضافة استاذ بنجاح');
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::withTrashed()->findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, $id)
    {
        $teacher = Teacher::withTrashed()->findOrFail($id);
        
        $teacher->update([
            'name' => $request->name,
            'description' => $request->description,
            'section_id' => $request->section_id,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $teacher->delete();
        } else {
            $teacher->restore();
        }
        
        toastr()->success('تم تحديث استاذ بنجاح');
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::withTrashed()->doesntHave('teacherSubjects', 'and', function($q){
            return $q->withTrashed();
        })->get();

        if($teacher->find($id)) {
            Teacher::withTrashed()->find($id)->forceDelete();
            toastr()->success('تم حذف الاستاذ بنجاح');
            return redirect()->route('teachers.index');
        }


        toastr()->error('لايمكن حذف الاستاذ هنالك عدة بيانات تعتمد عليه');
        return redirect()->route('teachers.index');
    }
}
