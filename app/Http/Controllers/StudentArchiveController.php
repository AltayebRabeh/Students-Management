<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::with(['classroom', 'section', 'year'])->onlyTrashed();

        if(isset($request->section_id)){
            $students = $students->whereSectionId($request->section_id);
        }

        if(isset($request->classroom_id)){
            $students = $students->whereClassroomId($request->classroom_id);
        }

        $students =  $students->where('classroom_id', '!=', 6)->paginate(PAGINATE_NUMBER)->appends($request->except('page'));

        return view('archives.index', compact('students'));
    }


    public function archive($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        toastr()->success('تم ارشفة الطالب بنجاح');
        return redirect()->route('students.index');
    }

    public function unArchive($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->restore();
        toastr()->success('تم إلغاء الارشفة بنجاح');
        return redirect()->route('archive.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id)->forceDelete();
        toastr()->success('تم حذف الطالب بنجاح');
        return redirect()->route('archive.index');
    }
}
