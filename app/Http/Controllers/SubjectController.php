<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::withTrashed()->paginate(PAGINATE_NUMBER)->appends($request->except('page'));

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $subject->delete();
        }

        toastr()->success('تم إضافة المادة بنجاح');
        return redirect()->route('subjects.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::withTrashed()->findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, $id)
    {
        $subject = Subject::withTrashed()->findOrFail($id);

        $subject->update([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $subject->delete();
        } else {
            $subject->restore();
        }

        toastr()->success('تم تحديث المادة بنجاح');
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::withTrashed()->doesntHave('subjectTeachers', 'and', function($q){
            return $q->withTrashed();
        })->get();

        if($subject->find($id)) {
            Subject::withTrashed()->find($id)->forceDelete();
            toastr()->success('تم حذف المادة بنجاح');
            return redirect()->route('subjects.index');
        }


        toastr()->error('لايمكن حذف المادة هنالك عدة بيانات تعتمد عليها');
        return redirect()->route('subjects.index');
    }
}
