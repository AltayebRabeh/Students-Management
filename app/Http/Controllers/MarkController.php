<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Equation;
use Illuminate\Http\Request;
use App\Http\Requests\MarkRequest;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::with('equation')->whereHas('equation')->paginate(PAGINATE_NUMBER);
        return view('marks.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equation = Equation::first();
        
        if(!$equation) {
            toastr()->warning('لايوجد طريقة حساب');
            return redirect()->route('equations.index');
        }

        return view('marks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
        $equation = Equation::first();
        
        if(!$equation) {
            toastr()->warning('لايوجد طريقة حساب');
            return redirect()->route('equations.index');
        }

        if(($request->min < 100 && $request->max > 100) || ($request->min > 100 && $request->max <= 100)){
            toastr()->error('لا يمكن إدخال رمز اقل من 100 و الاخر اكبر من 100 ');
            return redirect()->back();
        }

        $mark = Mark::whereMark($request->mark)->first();

        if($mark) {
            toastr()->error('الرمز موجود مسبقاً ');
            return redirect()->back();
        }

        if($request->min > 100 && $request->max > 100){
            if($request->min != $request->max){
                toastr()->error('يجب ان يكون الدرجة الصغرى والدرجة الكبرة متشابهان');
                return redirect()->back();
            }

            $mark = Mark::where('min', '==', $request->min)->where('max', '==', $request->max)->first();
        
            if($mark){
                toastr()->error('الدرجات يحملها رمز اخر');
                return redirect()->back();
            }

            Mark::create([
                'mark' => $request->mark,
                'min' => $request->min, 
                'max' => $request->max, 
                'fail' => isset($request->fail) ? true : false,
                'calculation' => isset($request->calculation) ? true : false,
                'equation_id' => $equation->id,
                'user_id' => auth()->user()->id,
            ]);

            toastr()->success('تم حفظ الرمز بنجاح');
            return redirect()->route('marks.index');
        }

        if($request->min <= 100 && $request->max <= 100){
            
            if($request->min == $request->max) {
                toastr()->error('يجب ان لا تتساوى الارقام');
                return redirect()->route('marks.index');
            }

            if($request->min > $request->max) {
                toastr()->error('لا يمكن ان تكون القيمة الصغرى اكبر من القيمة الكبرى');
                return redirect()->route('marks.index');
            }

            $mark = Mark::whereBetween('min', [$request->min, $request->max])->orWhereBetween('max', [$request->min, $request->max])->first();
            
            if($mark) {
                toastr()->error('يوجد تداخل في الدرجات');
                return redirect()->back();
            }

            $fail = isset($request->fail) ? true : false;

            $mark = Mark::whereFail(true)->first();
            
            if($mark && $fail) {
                toastr()->error('لا يمكن إدخال اختيار اكثر من رمز رسوب');
                return redirect()->back();
            }

            Mark::create([
                'mark' => $request->mark, 
                'min' => $request->min, 
                'max' => $request->max, 
                'fail' => $fail,
                'equation_id' => $equation->id,
                'user_id' => auth()->user()->id,
            ]);

        }

        toastr()->success('تم حفظ الرمز بنجاح');
        return redirect()->route('marks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Mark::withTrashed()->doesntHave('grades')->get();
        if($mark->find($id)) {
            Mark::withTrashed()->find($id)->forceDelete();
            toastr()->success('تم حذف الرمز بنجاح');
            return redirect()->route('marks.index');
        }

        toastr()->error('لايمكن حذف الرمز هنالك عدة نتائج تعتمد عليه');
        return redirect()->route('marks.index');
    }

    public function getMarksAjax(Request $request)
    {
        $mark = Mark::where('min', '<=', $request->grade)->where('max', '>=', $request->grade)->first();

        if($mark) {
            return $mark->mark;
        } else {
            return 'إدخال غير صحيح';
        }
    }
}
