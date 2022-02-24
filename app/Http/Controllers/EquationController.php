<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquationRequest;
use App\Models\Equation;
use Illuminate\Http\Request;

class EquationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equations = Equation::withTrashed()->paginate(PAGINATE_NUMBER);

        return view('equations.index', compact('equations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquationRequest $request)
    {
        $equation = Equation::create([
            'name' => $request->name,
            'fails' => $request->fails,
            'cgp' => $request->cgp,
            'cgp_success' => $request->cgp_success,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $equation->delete();
        } else {
            $equations = Equation::all();
            foreach($equations as $equation){
                $equation->delete();
            }
            $equation->restore();
        }

        toastr()->success('تم إضافة معادلة بنجاح');
        return redirect()->route('equations.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equation  $equation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equation = Equation::withTrashed()->findOrFail($id);
        return view('equations.edit', compact('equation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equation  $equation
     * @return \Illuminate\Http\Response
     */
    public function update(EquationRequest $request, $id)
    {
        $equation = Equation::with(['marks' => function($q){return $q->withTrashed();}])
                    ->withTrashed()->findOrFail($id);

        $equation->update([
            'name' => $request->name,
            'fails' => $request->fails,
            'cgp' => $request->cgp,
            'cgp_success' => $request->cgp_success,
            'user_id' => auth()->user()->id,
        ]);

        if(!$request->has('status')){
            $equation->delete();
            foreach($equation->marks as $mark){
                $mark->delete();
            }
        } else {
            $equations = Equation::with(['marks' => function($q){return $q->withTrashed();}])->get();
            foreach($equations as $eq){
                foreach($eq->marks as $mark){
                    $mark->delete();
                }
                $eq->delete();
            }

            foreach($equation->marks as $mark){
                $mark->restore();
            }
            $equation->restore();
        }

        toastr()->success('تم تحديث المعادلة بنجاح');
        return redirect()->route('equations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equation  $equation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equation = Equation::withTrashed()
                ->doesntHave('marks', 'and', function($q){
                    return $q->withTrashed();
                })
                ->get();

        if($equation->find($id)) {
            Equation::withTrashed()->find($id)->forceDelete();
            toastr()->success('تم حذف المعادلة بنجاح');
            return redirect()->route('equations.index');
        }


        toastr()->error('لايمكن حذف المعادلة هنالك علامات تعتمد عليها');
        return redirect()->route('equations.index');
    }
}
