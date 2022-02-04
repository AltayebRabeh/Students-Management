@extends('layouts.main')
@section('content')


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">الطلاب المؤرشفين</h2>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <form action="{{ route('students.index') }}" method="get">
                        @method('GET')
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="section_id">إختار القسم</label>
                                <select name="section_id" class="form-control section_id" id="section_id">
                                    <option value=""></option>
                                    @if(cache('sections') != null)
                                        @foreach (cache('sections') as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('section_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="classroom_id">إختيار الصف</label>
                                <select name="classroom_id" class="form-control classroom_id" id="classroom_id">
                                    <option value=""></option>
                                </select>
                                @error('classroom_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-1 mb-3 pt-1">
                                <button type="submit" class="btn btn-primary mt-4">عرض</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>الرقم الجامعي</th>
                        <th>إسم الطالب</th>
                        <th>القسم</th>
                        <th>الصف</th>
                        <th>السنة</th>
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
                                <a class="dropdown-item text-left" href="{{ route('students.show', $student->uuid) }}">عرض</a>
                                <a class="dropdown-item text-left" href="{{ route('students.edit', $student->uuid) }}">تعديل</a>
                                <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('archive.un-archive', $student->id)}}" data-toggle="modal" data-message="هل انت متاكد؟" data-target="#deleteModal">إلغاء الارشفة</a>
                                <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('archive.destroy', $student->id)}}" data-toggle="modal" data-message="هل انت متاكد من الحذف سوف تفقد كل بيانات الطالب؟" data-target="#deleteModal">حذف</a>
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
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    @include('layouts.modals.delete-modal')

@endsection
