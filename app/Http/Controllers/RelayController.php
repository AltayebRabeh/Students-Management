<?php

namespace App\Http\Controllers;

use App\Http\Requests\RelayRequest;
use Exception;
use App\Models\Year;
use App\Models\Grade;
use App\Models\Relay;
use App\Models\Section;
use App\Models\Student;
use App\Models\Equation;
use App\Models\Classroom;
use App\Models\RelayStudent;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\throwException;

class RelayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relays = Relay::withCount('relayStudents')->get();

        foreach($relays as $relay)
        {
            $hours = $relay->created_at->diffInHours();
            if($hours > 48) {
                $relay->delete();
                $relay->save();
            }
        }

        $relays = Relay::withCount('relayStudents')->paginate(PAGINATE_NUMBER);

        return view('relays.index', compact('relays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRelayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RelayRequest $request)
    {
        $relay_type = null;

        $students = Student::where('classroom_id', '!=', 6);

        if(isset($request->section_id) && $request->section_id != null){
            $students = $students->whereSectionId($request->section_id);
            $relay_type = 'ترحيل طلاب قسم ' . Section::find($request->section_id)->name;
        }

        if(isset($request->classroom_id) && $request->classroom_id != null){
            $students = $students->whereClassroomId($request->classroom_id);
            $relay_type = 'ترحيل طلاب قسم ' . Section::find($request->section_id)->name . ' الصف ' . Classroom::find($request->classroom_id)->name;
        }

        if(isset($request->university_number) && $request->university_number != null){
            $students = $students->whereUniversityNumber($request->university_number);
            $relay_type = 'ترحيل طالب واحد ورقمه الجامعي هو  ' . $request->university_number;
        }

        $students = $students->get();

        if(!$students->first()) {
            toastr()->warning('لايوجد بيانات');
            return redirect()->back();
        }

        try
        {
            DB::beginTransaction();

            $relay = Relay::create([
                'relay_type' => $relay_type??'ترحيل كل الطلاب',
                'cgp' => $request->cgp,
                'fails' => $request->fails,
            ]);

            foreach($students as $student)
            {
                $grades = Grade::with(['mark' => function($q){$q->with(['equation' => function($q){$q->withTrashed();}])->withTrashed();}])
                                ->with(['subjectTeacher' => function($q){$q->withTrashed();}])
                                ->where('student_id', $student->id)
                                ->where('classroom_id', $student->classroom_id)
                                ->get();

                if(!$grades->first()) {
                    continue;
                }

                $hours = [];
                $total = [];
                $fails = 0;
                $gba = 0;

                foreach ($grades as $grade) {
                    $grade->mark->calculation == 1 && $grade->grade <= 100 ? $total[] = ($grade->grade / (100 / $grade->mark->equation->cgp)) * $grade->subjectTeacher->hours : 0;
                    $grade->mark->calculation == 1 ? $hours[] = $grade->subjectTeacher->hours : 0;
                    $fails += $grade->rexam;
                }

                $gba = number_format(array_sum($total) / array_sum($hours), 2);

                if((isset($relay->cgp) && $relay->cgp != null) && $relay->cgp > $gba)
                {
                    $student->update([
                        'year_id' => $request->year_id
                    ]);
                    RelayStudent::insert([
                        'reject' => true,
                        'from_classroom' => $student->classroom_id,
                        'to_classroom' => $student->classroom_id,
                        'from_year' => $student->year_id,
                        'to_year' => $request->year_id,
                        'student_id' => $student->id,
                        'relay_id' => $relay->id
                    ]);
                    continue;
                }
                else if(isset($relay->fails) && $relay->fails != null && $relay->fails < $fails)
                {
                    $student->update([
                        'year_id' => $request->year_id
                    ]);
                    RelayStudent::insert([
                        'reject' => true,
                        'from_classroom' => $student->classroom_id,
                        'to_classroom' => $student->classroom_id,
                        'from_year' => $student->year_id,
                        'to_year' => $request->year_id,
                        'student_id' => $student->id,
                        'relay_id' => $relay->id
                    ]);
                    continue;
                }
                else
                {
                    $equation = Equation::first();
                    if($equation->cgp_success > $gba) {
                        $student->update([
                            'year_id' => $request->year_id
                        ]);
                        RelayStudent::insert([
                            'reject' => true,
                            'from_classroom' => $student->classroom_id,
                            'to_classroom' => $student->classroom_id,
                            'from_year' => $student->year_id,
                            'to_year' => $request->year_id,
                            'student_id' => $student->id,
                            'relay_id' => $relay->id
                        ]);
                        continue;
                    }
                    else if($equation->fails < $fails) {
                        $student->update([
                            'year_id' => $request->year_id
                        ]);
                        RelayStudent::insert([
                            'reject' => true,
                            'from_classroom' => $student->classroom_id,
                            'to_classroom' => $student->classroom_id,
                            'from_year' => $student->year_id,
                            'to_year' => $request->year_id,
                            'student_id' => $student->id,
                            'relay_id' => $relay->id
                        ]);
                        continue;
                    }
                }

                RelayStudent::insert([
                    'from_classroom' => $student->classroom_id,
                    'to_classroom' => $student->classroom_id+1,
                    'from_year' => $student->year_id,
                    'to_year' => $request->year_id,
                    'student_id' => $student->id,
                    'relay_id' => $relay->id
                ]);

                $next_section = $student->section->count_of_classroom > $student->classroom_id ? $student->classroom_id+1 : 6;

                $student->update([
                    'classroom_id' => $next_section,
                    'year_id' => $request->year_id
                ]);
            }

            if($relay->relayStudents->count() == 0)
            {
                $relay->delete();
                toastr()->error("لم يتم ترحيل اي طالب");
            }

            DB::commit();

            toastr()->success("تم ترحيل {$relay->relayStudents->count()} من الطلاب بنجاح");
            return redirect()->route('relays.index');
        }
        catch(Exception $e)
        {
            return $e->getMessage();
            DB::rollBack();
        }
    }

    public function details($id)
    {
        $relayStudents = RelayStudent::with(['student'])->Where('relay_id', $id)->paginate(PAGINATE_NUMBER);

        return view('relays.details', compact('relayStudents'));
    }

    public function back($id)
    {
        $relay = Relay::with('relayStudents')->findOrFail($id);

        foreach ($relay->relayStudents as $relayStudent) {
            $Student = Student::find($relayStudent->student_id);
            $Student->update([
                'year_id' => $relayStudent->from_year,
                'classroom_id' => $relayStudent->from_classroom
            ]);
        }

        $relay->delete();
        toastr()->success("تم إسترجاع الترحيل بنجاح");
        return true;
    }

}
