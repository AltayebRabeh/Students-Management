<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;
use Illuminate\Support\Facades\DB;

class GradesStatisticsController extends Controller
{
    public function data(){
        return view('grades_statistics.data');
    }

    public function result(Request $request){

        $SubjectsStatistics = Grade::selectRaw('subject_teacher_id')
                            ->selectRaw('avg(grade) as avg')
                            ->with(['subjectTeacher' => function($q){$q->withTrashed();}])
                            ->with(['subjectTeacher.teacher' => function($q){$q->select('id', 'name')->withTrashed();}])
                            ->with(['subjectTeacher.subject' => function($q){$q->select('id', 'name')->withTrashed();}])
                            ->whereSectionId($request->section_id)
                            ->whereClassroomId($request->classroom_id)
                            ->whereSemesterId($request->semester_id)
                            ->whereYearId($request->year_id)
                            ->groupBy('subject_teacher_id')
                            ->get();

        $SubjectsStatistics->each(function($statistic) use($request){

            $statistic->studentsCount = $statistic
                                ->whereSubjectTeacherId($statistic->subject_teacher_id)
                                ->whereSectionId($request->section_id)
                                ->whereClassroomId($request->classroom_id)
                                ->whereSemesterId($request->semester_id)
                                ->whereYearId($request->year_id)
                                ->count();

            $statistic->success = $statistic
                                ->whereSubjectTeacherId($statistic->subject_teacher_id)
                                ->whereSectionId($request->section_id)
                                ->whereClassroomId($request->classroom_id)
                                ->whereSemesterId($request->semester_id)
                                ->whereYearId($request->year_id)
                                ->whereHas('mark', function($q){$q->withTrashed()->where('fail', '!=', 1);})
                                ->count();

            $statistic->faild = $statistic
                                ->whereSubjectTeacherId($statistic->subject_teacher_id)
                                ->whereSectionId($request->section_id)
                                ->whereClassroomId($request->classroom_id)
                                ->whereSemesterId($request->semester_id)
                                ->whereYearId($request->year_id)
                                ->whereHas('mark', function($q){$q->withTrashed()->where('fail', '=', 1);})
                                ->count();

            $statistic->successRate = number_format(($statistic->success / $statistic->studentsCount) * 100, 2);

            return $statistic;
        });

        $studentFaild = Student::whereHas('grades', function($q) use($request){
            $q->whereSectionId($request->section_id)
            ->whereClassroomId($request->classroom_id)
            ->whereSemesterId($request->semester_id)
            ->whereYearId($request->year_id)
            ->whereHas('mark', function($q){$q->withTrashed()->where('fail', '=', 1);});
        })->count();

        $studentCount = Student::whereHas('grades', function($q) use($request){
            $q->whereSectionId($request->section_id)
            ->whereClassroomId($request->classroom_id)
            ->whereSemesterId($request->semester_id)
            ->whereYearId($request->year_id);
        })->count();

        $studentSuccess = $studentCount - $studentFaild;

        $semesterRate = number_format(($studentSuccess / $studentCount) * 100, 2);

        $param = [
            'studentCount' => $studentCount,
            'studentSuccess' => $studentSuccess,
            'studentFaild' => $studentFaild,
            'semesterRate' => $semesterRate,
            'section' => Section::find($request->section_id)->name,
            'classroom' => Classroom::find($request->classroom_id)->name,
            'semester' => Semester::find($request->semester_id)->name,
            'year' => Year::find($request->year_id)->year,
        ];

        // return  $semesterRate;

        return view('grades_statistics.result', compact('SubjectsStatistics'))->with($param);
    }
}
