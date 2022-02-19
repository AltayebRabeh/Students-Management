<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->search == '') {
            toastr()->warning('الرجاء اكتب ما تريد البحث عنه');
            return redirect()->back();
        }

        $students = Student::withTrashed()->with(['year','section','classroom'])->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('university_number', 'LIKE', '%'. $request->search .'%')
                    ->paginate(10, ['*'], 'students_page')->appends($request->except('page'));

        $teachers = Teacher::withTrashed()->with(['section'])->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%'. $request->search .'%')
                    ->paginate(10, ['*'], 'teachers_page')->appends($request->except('page'));

        $subjects = Subject::withTrashed()->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%'. $request->search .'%')
                    ->paginate(10, ['*'], 'subjects_page')->appends($request->except('page'));

        return view('search', compact('students', 'teachers', 'subjects'));
    }
}
