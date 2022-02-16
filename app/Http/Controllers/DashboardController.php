<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $allStudents = Student::withTrashed()->count();
        $currentStudents = Student::where('classroom_id', '!=', 6)->count();
        $graduateStudents = Student::whereClassroomId(6)->count();
        $archiveStudents = Student::onlyTrashed()->count();

        $years = Year::select('id', 'year')->whereHas('grades')->get();

        $years->each(function($year) {
            $year->sections = Section::with(['grades' => function($q) use($year) {
                $q->where('year_id', $year->id);
            },
            'students' => function($q) use($year) {
                $q->whereHas('grades', function($q) use($year) {
                    $q->whereYearId($year->id);
                })->count();
            }])->whereHas('grades')->whereHas('students')->get();
        });

        return $years;

        $args = [
            'allStudents' => $allStudents,
            'currentStudents' => $currentStudents,
            'graduateStudents' => $graduateStudents,
            'archiveStudents' => $archiveStudents,
            'years' => $years,
        ];

        return view('dashboard')->with($args);
    }
}
