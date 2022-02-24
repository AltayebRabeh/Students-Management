<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::withTrashed()->orderBy('year', 'DESC')->paginate(PAGINATE_NUMBER);

        return view('years.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('years.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreYearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYearRequest $request)
    {
        if(($request->from >= $request->to) || ($request->to - $request->from) > 1){
            toastr()->error('قيمة الحقل الاول اكبر من او تساوي قيمة الحقل الثاني اوهنالك فارق اكثر من سنة');
            return redirect()->route('years.create');
        }

        $years = $request->from . '-' . $request->to;

        $year = Year::withTrashed()->where('year', '=', $years)->first();

        if($year) {
            toastr()->error('السنة موجودة من قبل');
            return redirect()->route('years.create');
        }

        $year = Year::create([
            'year' => $years,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $year->delete();
        }

        $this->cacheYears();

        toastr()->success('تم إضافة السنة الدراسية بنجاح');
        return redirect()->route('years.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = Year::withTrashed()->findOrFail($id);

        return view('years.edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateYearRequest  $request
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearRequest $request, $id)
    {
        if(($request->from >= $request->to) || ($request->to - $request->from) > 1){
            toastr()->error('قيمة الحقل الاول اكبر من او تساوي قيمة الحقل الثاني اوهنالك فارق اكثر من سنة');
            return redirect()->back();
        }

        $years = $request->from . '-' . $request->to;

        $year = Year::withTrashed()->where('year', '=', $years)->whereNotIn('id', [$id])->first();

        if($year) {
            toastr()->error('السنة موجودة من قبل');
            return redirect()->back();
        }

        $year = Year::withTrashed()->findOrFail($id);

        $year->update([
            'year' => $years,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $year->delete();
        } else {
            $year->restore();
        }

        $this->cacheYears();

        toastr()->success('تم تحديث السنة الدراسية بنجاح');
        return redirect()->route('years.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $year = Year::withTrashed()->doesntHave('students')
                ->doesntHave('students', 'and', function($q){
                    return $q->withTrashed();
                })
                ->doesntHave('subjectsTeachers', 'and', function($q){
                    return $q->withTrashed();
                })
                ->doesntHave('grades')
                ->get();

        if($year->find($id)) {
            Year::withTrashed()->find($id)->forceDelete();
            toastr()->success('تم حذف السنة الدراسية بنجاح');
            $this->cacheYears();
            return redirect()->route('years.index');
        }


        toastr()->error('لايمكن حذف السنة الدراسية هنالك عدة بيانات تعتمد عليها');
        return redirect()->route('years.index');
    }

    protected function cacheYears()
    {
        Cache::forever('years', Year::orderBy('year', 'DESC')->get());
    }
}
