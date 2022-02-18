@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="d-flex mb-4">
            <h2 class="h4">نتائج البحث</h2>
        </div>
        @if($students->first())
            <div class="table-responsive">
                <!-- table -->
                <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>الرقم الجامعي</th>
                    <th>إسم الطالب</th>
                    <th>القسم</th>
                    <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->university_number }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->section->name }}</td>
                    <td>{{ $student->classroom->name }}</td>
                    <td>{{ $student->year->year }}</td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-left" href="{{ route('students.edit', $student->id) }}">تعديل</a>
                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('students.destroy', $student->id)}}" data-toggle="modal" data-message="هل انت متاكد من حذف الطالب" data-target="#deleteModal">حذف</a>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4">
                    {{ $students->links() }}
                </div>
            </div>
        @endif

        @if($teachers->first())
            <hr>

            <div class="table-responsive">
                <!-- table -->
                <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>إسم الاستاذ</th>
                    <th>الوصف</th>
                    <th>القسم</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ substr($teacher->description, 0, 30) }} ...</td>
                    <td>{{ $teacher->section->name }}</td>
                    <td>{!! $teacher->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>' !!}</td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-left" href="{{ route('teachers.edit', $teacher->id) }}">تعديل</a>
                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('teachers.destroy', $teacher->id)}}" data-toggle="modal" data-message="هل انت متاكد من حذف الاستاذ؟" data-target="#deleteModal">حذف</a>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4">
                    {{ $teachers->links() }}
                </div>
            </div>
        @endif

        @if($subjects->first())
            <hr>
            
            <div class="table-responsive">
                <!-- table -->
                <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>إسم المادة</th>
                    <th>الوصف</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ substr($subject->description, 0, 30) }} ...</td>
                    <td>{!! $subject->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>' !!}</td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-left" href="{{ route('subjects.edit', $subject->id) }}">تعديل</a>
                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('subjects.destroy', $subject->id)}}" data-toggle="modal" data-message="هل انت متاكد من حذف المادة" data-target="#deleteModal">حذف</a>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4">
                    {{ $subjects->links() }}
                </div>
            </div>
        @endif
    </div>
</div>


@endsection