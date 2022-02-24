<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\RelayController;
use App\Http\Controllers\SearchController;
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
use App\Http\Controllers\ActivityLogController;
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

    Route::get('/search', [SearchController::class, 'search', 'middleware' => ['ability:admin,search']])->name('search');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::get('sections', [SectionController::class, 'index', 'middleware' => ['ability:admin,show-sections']])->name('sections.index');
    Route::get('sections/create', [SectionController::class, 'create', 'middleware' => ['ability:admin,create-sections']])->name('sections.create');
    Route::post('sections', [SectionController::class, 'store', 'middleware' => ['ability:admin,create-sections']])->name('sections.store');
    Route::get('sections/{section}/edit', [SectionController::class, 'edit', 'middleware' => ['ability:admin,edit-sections']])->name('sections.edit');
    Route::patch('sections/{section}', [SectionController::class, 'update', 'middleware' => ['ability:admin,edit-sections']])->name('sections.update');
    Route::delete('sections/{section}', [SectionController::class, 'destroy', 'middleware' => ['ability:admin,delete-sections']])->name('sections.destroy');

    Route::resource('classrooms', ClassroomController::class);

    Route::resource('semesters', SemesterController::class);

    Route::get('years', [YearController::class, 'index', 'middleware' => ['ability:admin,show-years']])->name('years.index');
    Route::get('years/create', [YearController::class, 'create', 'middleware' => ['ability:admin,create-years']])->name('years.create');
    Route::post('years', [YearController::class, 'store', 'middleware' => ['ability:admin,create-years']])->name('years.store');
    Route::get('years/{year}/edit', [YearController::class, 'edit', 'middleware' => ['ability:admin,edit-years']])->name('years.edit');
    Route::patch('years/{year}', [YearController::class, 'update', 'middleware' => ['ability:admin,edit-years']])->name('years.update');
    Route::delete('years/{year}', [YearController::class, 'destroy', 'middleware' => ['ability:admin,delete-years']])->name('years.destroy');

    Route::get('equations', [EquationController::class, 'index', 'middleware' => ['ability:admin,show-equations']])->name('equations.index');
    Route::get('equations/create', [EquationController::class, 'create', 'middleware' => ['ability:admin,create-equations']])->name('equations.create');
    Route::post('equations', [EquationController::class, 'store', 'middleware' => ['ability:admin,create-equations']])->name('equations.store');
    Route::get('equations/{equation}/edit', [EquationController::class, 'edit', 'middleware' => ['ability:admin,edit-equations']])->name('equations.edit');
    Route::patch('equations/{equation}', [EquationController::class, 'update', 'middleware' => ['ability:admin,edit-equations']])->name('equations.update');
    Route::delete('equations/{equation}', [EquationController::class, 'destroy', 'middleware' => ['ability:admin,delete-equations']])->name('equations.destroy');

    Route::get('marks', [MarkController::class, 'index', 'middleware' => ['ability:admin,show-marks']])->name('marks.index');
    Route::get('marks/create', [MarkController::class, 'create', 'middleware' => ['ability:admin,create-marks']])->name('marks.create');
    Route::post('marks', [MarkController::class, 'store', 'middleware' => ['ability:admin,create-marks']])->name('marks.store');
    Route::delete('marks/{mark}', [MarkController::class, 'destroy', 'middleware' => ['ability:admin,delete-marks']])->name('marks.destroy');
    Route::post('get-marks-ajax', [MarkController::class, 'getMarksAjax',])->name('grades.get-marks-ajax');

    Route::get('grades', [GradeController::class, 'index', 'middleware' => ['ability:admin,create-semester-grades']])->name('grades.index');
    Route::post('grades/create', [GradeController::class, 'create', 'middleware' => ['ability:admin,create-semester-grades']])->name('grades.create');
    Route::post('grades/store', [GradeController::class, 'store', 'middleware' => ['ability:admin,create-semester-grades']])->name('grades.store');
    Route::get('grades/delete', [GradeController::class, 'delete', 'middleware' => ['ability:admin,delete-semester-grades']])->name('grades.delete');
    Route::post('grades/destroy', [GradeController::class, 'destroy', 'middleware' => ['ability:admin,delete-semester-grades']])->name('grades.destroy');
    Route::get('grades/semester-data', [GradeController::class, 'semesterData', 'middleware' => ['ability:admin,print-semester-grades']])->name('grades.semester.data');
    Route::get('grades/semester-result', [GradeController::class, 'semesterResult', 'middleware' => ['ability:admin,print-semester-grades']])->name('grades.semester.result');
    Route::get('grades/increase-success', [GradeController::class, 'increaseSuccess', 'middleware' => ['ability:admin,edit-semester-grades']])->name('grades.increase.success');
    Route::post('grades/increase-success', [GradeController::class, 'increaseSuccessStore', 'middleware' => ['ability:admin,edit-semester-grades']])->name('grades.increase.success.store');

    Route::get('student-grades', [StudentGradesController::class, 'index', 'middleware' => ['ability:admin,create-student-grades']])->name('student-grades.index');
    Route::post('student-grades/create', [StudentGradesController::class, 'create', 'middleware' => ['ability:admin,create-student-grades']])->name('student-grades.create');
    Route::post('student-grades/store', [StudentGradesController::class, 'store', 'middleware' => ['ability:admin,create-student-grades']])->name('student-grades.store');
    Route::post('student-grades/handle-result', [StudentGradesController::class, 'handleResult', 'middleware' => ['ability:admin,print-student-grades']])->name('student-grades.handle-result');
    Route::get('student-grades/{id}', [StudentGradesController::class, 'result', 'middleware' => ['ability:admin,print-student-grades']])->name('student-grades.result');
    Route::get('student_grades/semester-data', [StudentGradesController::class, 'semesterData', 'middleware' => ['ability:admin,print-student-semester-grades']])->name('student-grades.semester-data');
    Route::get('student_grades/semester-result', [StudentGradesController::class, 'semesterResult', 'middleware' => ['ability:admin,print-student-semester-grades']])->name('student-grades.semester-result');

    Route::get('supplements', [SupplementController::class, 'index', 'middleware' => ['ability:admin,create-supplements']])->name('supplements.index');
    Route::post('supplements/create', [SupplementController::class, 'create', 'middleware' => ['ability:admin,create-supplements']])->name('supplements.create');
    Route::post('supplements/store', [SupplementController::class, 'store', 'middleware' => ['ability:admin,create-supplements']])->name('supplements.store');
    Route::get('supplements/data', [SupplementController::class, 'data', 'middleware' => ['ability:admin,print-supplements']])->name('supplements.data');
    Route::get('supplements/result', [SupplementController::class, 'result', 'middleware' => ['ability:admin,print-supplements']])->name('supplements.result');
    Route::get('supplements/list', [SupplementController::class, 'list', 'middleware' => ['ability:admin,print-supplements-list']])->name('supplements.list');
    Route::get('supplements/check-list', [SupplementController::class, 'checkList', 'middleware' => ['ability:admin,print-check-list']])->name('supplements.check.list');


    Route::get('teachers', [TeacherController::class, 'index', 'middleware' => ['ability:admin,show-teachers']])->name('teachers.index');
    Route::get('teachers/create', [TeacherController::class, 'create', 'middleware' => ['ability:admin,create-teachers']])->name('teachers.create');
    Route::post('teachers', [TeacherController::class, 'store', 'middleware' => ['ability:admin,create-teachers']])->name('teachers.store');
    Route::get('teachers/{teacher}/edit', [TeacherController::class, 'edit', 'middleware' => ['ability:admin,edit-teachers']])->name('teachers.edit');
    Route::patch('teachers/{teacher}', [TeacherController::class, 'update', 'middleware' => ['ability:admin,edit-teachers']])->name('teachers.update');
    Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy', 'middleware' => ['ability:admin,delete-teachers']])->name('teachers.destroy');

    Route::get('subjects', [SubjectController::class, 'index', 'middleware' => ['ability:admin,show-subjects']])->name('subjects.index');
    Route::get('subjects/create', [SubjectController::class, 'create', 'middleware' => ['ability:admin,create-subjects']])->name('subjects.create');
    Route::post('subjects', [SubjectController::class, 'store', 'middleware' => ['ability:admin,create-subjects']])->name('subjects.store');
    Route::get('subjects/{subject}/edit', [SubjectController::class, 'edit', 'middleware' => ['ability:admin,edit-subjects']])->name('subjects.edit');
    Route::patch('subjects/{subject}', [SubjectController::class, 'update', 'middleware' => ['ability:admin,edit-subjects']])->name('subjects.update');
    Route::delete('subjects/{subject}', [SubjectController::class, 'destroy', 'middleware' => ['ability:admin,delete-subjects']])->name('subjects.destroy');

    Route::get('subjects-teachers', [SubjectTeacherController::class, 'index', 'middleware' => ['ability:admin,show-subjects-teachers']])->name('subjects-teachers.index');
    Route::get('subjects-teachers/create', [SubjectTeacherController::class, 'create', 'middleware' => ['ability:admin,create-subjects-teachers']])->name('subjects-teachers.create');
    Route::post('subjects-teachers', [SubjectTeacherController::class, 'store', 'middleware' => ['ability:admin,create-subjects-teachers']])->name('subjects-teachers.store');
    Route::delete('subjects-teachers/{subjects_teacher}', [SubjectTeacherController::class, 'destroy', 'middleware' => ['ability:admin,delete-subjects-teachers']])->name('subjects-teachers.destroy');
    Route::delete('subjects-teachers/enable-disable/{subject_id}', [SubjectTeacherController::class, 'enableDisable', 'middleware' => ['ability:admin,edit-subjects-teachers']])->name('subjects-teachers.enable-disable');
    Route::get('get-subject-for-grades-ajax/{section_id}/{classroom_id}/{semester_id}/{year_id}', [SubjectTeacherController::class, 'getSubjectForGradesAjax']);

    Route::get('students', [StudentController::class, 'index', 'middleware' => ['ability:admin,show-students']])->name('students.index');
    Route::get('students/create', [StudentController::class, 'create', 'middleware' => ['ability:admin,create-students']])->name('students.create');
    Route::post('students', [StudentController::class, 'store', 'middleware' => ['ability:admin,create-students']])->name('students.store');
    Route::get('students/{student}', [StudentController::class, 'show', 'middleware' => ['ability:admin,print-student-grades']])->name('students.show');
    Route::get('students/{student}/edit', [StudentController::class, 'edit', 'middleware' => ['ability:admin,edit-students']])->name('students.edit');
    Route::patch('students/{student}', [StudentController::class, 'update', 'middleware' => ['ability:admin,edit-students']])->name('students.update');
    Route::delete('students/{student}', [StudentController::class, 'destroy', 'middleware' => ['ability:admin,delete-students']])->name('students.destroy');
    Route::get('students-classroom/list', [StudentController::class, 'list', 'middleware' => ['ability:admin,print-students-list']])->name('students.list');

    Route::get('archive', [StudentArchiveController::class, 'index', 'middleware' => ['ability:admin,show-archive']])->name('archive.index');
    Route::delete('archive/{id}', [StudentArchiveController::class, 'destroy', 'middleware' => ['ability:admin,delete-archive']])->name('archive.destroy');
    Route::delete('archive/{id}/un-archive', [StudentArchiveController::class, 'unArchive', 'middleware' => ['ability:admin,un-archive']])->name('archive.un-archive');
    Route::delete('archive/{id}/archive', [StudentArchiveController::class, 'archive', 'middleware' => ['ability:admin,create-archive']])->name('archive.archive');

    Route::get('relays', [RelayController::class, 'index', 'middleware' => ['ability:admin,show-relays']])->name('relays.index');
    Route::get('relays/create', [RelayController::class, 'create', 'middleware' => ['ability:admin,create-relays']])->name('relays.create');
    Route::post('relays/store', [RelayController::class, 'store', 'middleware' => ['ability:admin,create-relays']])->name('relays.store');
    Route::get('relays/details/{id}', [RelayController::class, 'details', 'middleware' => ['ability:admin,show-relays']])->name('relays.details');
    Route::delete('relays/back/{id}', [RelayController::class, 'back', 'middleware' => ['ability:admin,back-relays']])->name('relays.back');

    Route::get('settings', [SettingController::class, 'index', 'middleware' => ['ability:admin,settings']])->name('settings.index');
    Route::post('settings/store', [SettingController::class, 'store', 'middleware' => ['ability:admin,settings']])->name('settings.store');

    Route::get('grades-statistics', [GradesStatisticsController::class, 'data', 'middleware' => ['ability:admin,print-grades-statistics']])->name('grades-statistics.data');
    Route::get('grades-statistics/statistics', [GradesStatisticsController::class, 'result', 'middleware' => ['ability:admin,print-grades-statistics']])->name('grades-statistics.result');


    Route::get('users', [UserController::class, 'index', 'middleware' => ['ability:admin,show-users']])->name('users.index');
    Route::get('users/create', [UserController::class, 'create', 'middleware' => ['ability:admin,create-users']])->name('users.create');
    Route::post('users', [UserController::class, 'store', 'middleware' => ['ability:admin,create-users']])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit', 'middleware' => ['ability:admin,edit-users']])->name('users.edit');
    Route::patch('users/{user}', [UserController::class, 'update', 'middleware' => ['ability:admin,edit-users']])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy', 'middleware' => ['ability:admin,delete-users']])->name('users.destroy');

    Route::get('/activity-log', [ActivityLogController::class, 'activityLog', 'middleware' => ['ability:admin,activity-log']])->name('activity.log');

});


