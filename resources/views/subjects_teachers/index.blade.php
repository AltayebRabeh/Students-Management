@extends('layouts.main')

@section('content')


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">المواد و الاساتذة</h2>
                <a href="{{ route('subjects-teachers.create') }}" id="subjectsTeachers" class="btn btn-primary ml-auto">دمج</a>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <form action="{{ route('subjects-teachers.index') }}" method="get">
                        @method('GET')
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
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
                            <div class="col-md-2 mb-3">
                                <label for="classroom_id">إختيار الصف</label>
                                <select name="classroom_id" class="form-control classroom_id" id="classroom_id">
                                    <option value=""></option>
                                </select>
                                @error('classroom_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="semester_id">إختيار الفصل</label>
                                <select name="semester_id" class="form-control semester_id" id="semester_id">
                                    <option value=""></option>
                                </select>
                                @error('semester_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="year_id">إختيار السنة</label>
                                <select name="year_id" class="form-control year_id" id="year_id">
                                    <option value=""></option>
                                    @if(cache('years') != null)
                                        @foreach (cache('years') as $year)
                                            <option value="{{ $year->id }}">{{ $year->year }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('year_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-1 mb-3 pt-1">
                                <button type="submit" class="btn btn-primary mt-4">بحث</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <!-- table -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>إسم المادة</th>
                                <th>إسم الاساتذ</th>
                                <th>القسم</th>
                                <th>الصف</th>
                                <th>الفصل</th>
                                <th>السنة</th>
                                <th>عدد الساعات</th>
                                <th>الحالة</th>
                                <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjectsTeachers as $subjectTeacher)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subjectTeacher->subject->name }}</td>
                                <td>{{ $subjectTeacher->teacher->name }}</td>
                                <td>{{ $subjectTeacher->section->name }}</td>
                                <td>{{ $subjectTeacher->classroom->name }}</td>
                                <td>{{ $subjectTeacher->semester->name }}</td>
                                <td>{{ $subjectTeacher->year->year }}</td>
                                <td>{{ $subjectTeacher->hours }}</td>
                                <td>{!! $subjectTeacher->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>' !!}</td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('subjects-teachers.destroy', $subjectTeacher->id)}}" data-toggle="modal" data-message="هل انت متاكد من حذف المادة و الاستاذ؟" data-target="#deleteModal">حذف</a>
                                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('subjects-teachers.enable-disable', $subjectTeacher->id)}}" data-toggle="modal" data-message="هل انت متاكد من التفعيل او إلغاء التفعيل؟" data-target="#deleteModal">تفعيل / إلغاء تفعيل</a>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center pt-4">
                        {{ $subjectsTeachers->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    @include('layouts.modals.delete-modal')

@endsection

