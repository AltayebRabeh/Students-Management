<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $successRate = [];

    public function dashboard() {
        $allStudents = Student::withTrashed()->count();
        $currentStudents = Student::where('classroom_id', '!=', 6)->count();
        $graduateStudents = Student::whereClassroomId(6)->count();
        $archiveStudents = Student::onlyTrashed()->count();

        $years = Year::select('id', 'year')->whereHas('grades')->get();

        $years->each(function($year) {

            $year->sections = Section::whereHas('grades', function($q) use($year){$q->whereYearId($year->id);})->whereHas('students')->get();

            $year->sections->each(function($section) use($year){

                $this->successRate[$section->name]['name'] = $section->name;

                $section->studentsCount = Student::whereHas('grades', function($q) use($year, $section){
                    $q->withTrashed()->whereYearId($year->id)->whereSectionId($section->id);
                })->count();
                
                $section->studentsSuccess = Student::whereHas('grades', function($q) use($year, $section){
                    $q->withTrashed()->whereYearId($year->id)->whereSectionId($section->id);
                })->whereDoesntHave('grades', function($q) use($year){$q->withTrashed()->whereYearId($year->id)->where('re_exam', '!=', 0)->orWhere('fail', '!=', 0);})->count();
                
                $section->successRate = number_format(($section->studentsSuccess / $section->studentsCount) * 100 , 2);
                
                $this->successRate[$section->name][] = $section->successRate;
                
            });

        });

        // return($this->successRate);

        $args = [
            'allStudents' => $allStudents,
            'currentStudents' => $currentStudents,
            'graduateStudents' => $graduateStudents,
            'archiveStudents' => $archiveStudents,
            'years' => $years,
            'successRate' => $this->successRate
        ];

        return view('dashboard')->with($args);
    }
}
