<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use Illuminate\Support\Facades\Cache;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::withTrashed()->paginate(PAGINATE_NUMBER);
        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {
        $section = Section::create([
            'name' => $request->name,
            'description' => $request->description,
            'count_of_classroom' => $request->count_of_classroom,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $section->delete();
        }

        $this->cacheSections();
        
        toastr()->success('تم إضافة قسم بنجاح');
        return redirect()->route('sections.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::withTrashed()->findOrFail($id);
        return view('sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionRequest  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectionRequest $request, $id)
    {
        $section = Section::withTrashed()->findOrFail($id);
        
        $section->update([
            'name' => $request->name,
            'description' => $request->description,
            'count_of_classroom' => $request->count_of_classroom,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $section->delete();
        } else {
            $section->restore();
        }

        $this->cacheSections();
        
        toastr()->success('تم تعديل قسم بنجاح');
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::withTrashed()->doesntHave('students')
                ->doesntHave('teachers', 'and', function($q){
                    return $q->withTrashed();
                })
                ->doesntHave('subjectsTeachers', 'and', function($q){
                    return $q->withTrashed();
                })
                ->doesntHave('grades')
                ->get();

        if($section->find($id)) {
            Section::withTrashed()->find($id)->forceDelete();
            toastr()->success('تم حذف قسم بنجاح');
            $this->cacheSections();
            return redirect()->route('sections.index');
        }


        toastr()->error('لايمكن حذف القسم هنالك عدة بيانات تعتمد عليه');
        return redirect()->route('sections.index');
    }

    protected function cacheSections()
    {
        Cache::forever('sections', Section::get());
    }
}
