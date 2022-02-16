<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\RelayController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EquationController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplementController;
use App\Http\Controllers\StudentGradesController;
use App\Http\Controllers\StudentArchiveController;
use App\Http\Controllers\SubjectTeacherController;
use App\Http\Controllers\GradesStatisticsController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('PAGINATE_NUMBER', 100);



Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/', [DashboardController::class, 'dashboard']);

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::Post('register', [RegisteredUserController::class, 'store'])->name('register');

    Route::resource('sections', SectionController::class);

    Route::resource('classrooms', ClassroomController::class);

    Route::resource('semesters', SemesterController::class);

    Route::resource('years', YearController::class);

    Route::resource('equations', EquationController::class);
    Route::resource('marks', MarkController::class);
    Route::post('get-marks-ajax', [MarkController::class, 'getMarksAjax'])->name('grades.get-marks-ajax');

    Route::get('grades', [GradeController::class, 'index'])->name('grades.index');
    Route::post('grades/create', [GradeController::class, 'create'])->name('grades.create');
    Route::post('grades/store', [GradeController::class, 'store'])->name('grades.store');
    Route::get('grades/delete', [GradeController::class, 'delete'])->name('grades.delete');
    Route::post('grades/destroy', [GradeController::class, 'destroy'])->name('grades.destroy');
    Route::get('grades/semester-data', [GradeController::class, 'semesterData'])->name('grades.semester.data');
    Route::get('grades/semester-result', [GradeController::class, 'semesterResult'])->name('grades.semester.result');
    Route::get('grades/increase-success', [GradeController::class, 'increaseSuccess'])->name('grades.increase.success');
    Route::post('grades/increase-success', [GradeController::class, 'increaseSuccessStore'])->name('grades.increase.success.store');

    Route::get('student-grades', [StudentGradesController::class, 'index'])->name('student-grades.index');
    Route::post('student-grades/create', [StudentGradesController::class, 'create'])->name('student-grades.create');
    Route::post('student-grades/store', [StudentGradesController::class, 'store'])->name('student-grades.store');
    Route::post('student-grades/handle-result', [StudentGradesController::class, 'handleResult'])->name('student-grades.handle-result');
    Route::get('student-grades/{id}', [StudentGradesController::class, 'result'])->name('student-grades.result');

    Route::get('student_grades/semester-data', [StudentGradesController::class, 'semesterData'])->name('student-grades.semester-data');
    Route::get('student_grades/semester-result', [StudentGradesController::class, 'semesterResult'])->name('student-grades.semester-result');

    Route::get('supplements', [SupplementController::class, 'index'])->name('supplements.index');
    Route::post('supplements/create', [SupplementController::class, 'create'])->name('supplements.create');
    Route::post('supplements/store', [SupplementController::class, 'store'])->name('supplements.store');
    Route::get('supplements/data', [SupplementController::class, 'data'])->name('supplements.data');
    Route::get('supplements/result', [SupplementController::class, 'result'])->name('supplements.result');
    Route::get('supplements/list', [SupplementController::class, 'list'])->name('supplements.list');


    Route::resource('teachers', TeacherController::class);

    Route::resource('subjects', SubjectController::class);

    Route::resource('subjects-teachers', SubjectTeacherController::class);
    Route::delete('subjects-teachers/enable-disable/{subject_id}', [SubjectTeacherController::class, 'enableDisable'])->name('subjects-teachers.enable-disable');
    Route::get('get-subject-for-grades-ajax/{section_id}/{classroom_id}/{semester_id}/{year_id}', [SubjectTeacherController::class, 'getSubjectForGradesAjax']);

    Route::resource('students', StudentController::class);
    Route::get('students-classroom/list', [StudentController::class, 'list'])->name('students.list');

    Route::get('archive', [StudentArchiveController::class, 'index'])->name('archive.index');
    Route::delete('archive/{id}', [StudentArchiveController::class, 'destroy'])->name('archive.destroy');
    Route::delete('archive/{id}/un-archive', [StudentArchiveController::class, 'unArchive'])->name('archive.un-archive');
    Route::delete('archive/{id}/archive', [StudentArchiveController::class, 'archive'])->name('archive.archive');

    Route::get('relays', [RelayController::class, 'index'])->name('relays.index');
    Route::get('relays/create', [RelayController::class, 'create'])->name('relays.create');
    Route::post('relays/store', [RelayController::class, 'store'])->name('relays.store');
    Route::get('relays/details/{id}', [RelayController::class, 'details'])->name('relays.details');
    Route::delete('relays/back/{id}', [RelayController::class, 'back'])->name('relays.back');

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/store', [SettingController::class, 'store'])->name('settings.store');

    Route::get('grades-statistics', [GradesStatisticsController::class, 'data'])->name('grades-statistics.data');
    Route::get('grades-statistics/statistics', [GradesStatisticsController::class, 'result'])->name('grades-statistics.result');


    Route::resource('users', UserController::class);

});


