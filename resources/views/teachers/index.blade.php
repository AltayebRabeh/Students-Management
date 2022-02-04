@extends('layouts.main')
@section('content')


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">الاساتذة</h2>
                <a href="{{ route('teachers.create') }}" class="btn btn-primary ml-auto">إضافة استاذ</a>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <form action="{{ route('teachers.index') }}" method="get">
                        @method('GET')
                        <div class="form-row">
                            <div class="col-md-11 mb-3">
                                <label for="section_id">إختار القسم</label>
                                <select name="section_id" class="form-control section_id" id="section_id">
                                    <option value=""></option>
                                    @foreach (cache('sections') as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                                @error('section_id')
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
                        <th>إسم الاستاذ</th>
                        <th>القسم</th>
                        <th>الوصف</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->section->name }}</td>
                        <td>{{ substr($teacher->description, 0, 30) }} ...</td>
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
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    @include('layouts.modals.delete-modal')

@endsection