@extends('layouts.main')
@section('content')


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">الاقسام</h2>
                <a href="{{ route('sections.create') }}" class="btn btn-primary ml-auto">إضافة قسم</a>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>إسم القسم</th>
                        <th>الوصف</th>
                        <th>عدد الفصول</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $section->name }}</td>
                        <td>{{ substr($section->description, 0, 30) }} ...</td>
                        <td>{{ $section->count_of_classroom }}</td>
                        <td>{!! $section->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>' !!}</td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-left" href="{{ route('sections.edit', $section->id) }}">تعديل</a>
                            <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('sections.destroy', $section->id)}}" data-toggle="modal" data-message="هل انت متاكد من حذف القسم؟" data-target="#deleteModal">حذف</a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        {{ $sections->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    @include('layouts.modals.delete-modal')

@endsection