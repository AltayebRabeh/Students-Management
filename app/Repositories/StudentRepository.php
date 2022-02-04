<?php
namespace App\Repositories;

use App\Models\Year;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Str;

class StudentRepository implements StudentRepositoryInterface
{
    public function index($request)
    {
        $students = Student::with([
            'classroom', 
            'section' => function($q){$q->withTrashed();}, 
            'year'=> function($q){$q->withTrashed();}
        ]);

        if(isset($request->section_id)){
            $students = $students->whereSectionId($request->section_id);
        }

        if(isset($request->classroom_id)){
            $students = $students->whereClassroomId($request->classroom_id);
        }

        $students =  $students->where('classroom_id', '!=', 6)->paginate(PAGINATE_NUMBER)->appends($request->except('page'));

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store($request)
    {
        $section = $request->section_id;
        $classroom = $request->classroom_id;
        $year = $request->year_id;

        foreach($request->students as $student){
            Student::create([
                'section_id' => $section,
                'classroom_id' => $classroom,
                'year_id' => $year,
                'name' => $student['name'],
                'university_number' => $student['university_number'],
                'user_id' => auth()->user()->id,
                'uuid' => Str::uuid()
            ]);
        }

        toastr()->success('تم حفظ الطلاب بنجاح');
        return true;
    }

    public function edit($id)
    {
        $student = Student::withTrashed()->whereUuid($id)->with(['section' => function($q){$q->withTrashed();}, 'classroom'])->first();

        if(!$student) {
            abort(404);
        }

        $classrooms = Classroom::where('id', '<=', $student->section->count_of_classroom)->orderBy('id')->select('id', 'name')->get();

        return view('students.edit', compact('student', 'classrooms'));
    }

    public function update($request)
    {
        $student = Student::findOrFail($request->id);

        $section = section::find($request->section_id);
        $classroom = Classroom::find($request->classroom_id);

        if($section->count_of_classroom < $classroom->id)
        {
            abort(404);
        }

        $student->update([
            'name' => $request->name,
            'university_number' => $request->university_number,
            'year_id' => $request->year_id,
            'section_id' => $request->section_id,
            'classroom_id' => $request->classroom_id,
        ]);

        toastr()->success('تم تعديل الطالب بنجاح');
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id)->forceDelete();
        toastr()->success('تم حذف الطالب بنجاح');
        return redirect()->route('students.index');
    }

    public function list($request)
    {
        if(!(isset($request->section_id) && isset($request->classroom_id))) {
            toastr()->warning('الرجاء مل البيانات المطلوبة');
            return redirect()->back();
        }

        $section = Section::find($request->section_id)->name;
        $classroom = Classroom::find($request->classroom_id)->name;

        $students = Student::whereSectionId($request->section_id)->whereClassroomId($request->classroom_id)->get();

        return view('students.list', compact('students'))->with(['classroom' => $classroom, 'section' => $section]);
    }
}
