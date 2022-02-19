@extends('layouts.main')
@section('content')


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">المعادلات</h2>
                <a href="{{ route('equations.create') }}" class="btn btn-primary ml-auto">إضافة</a>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>إسم المعادلة</th>
                            <th>المعدل</th>
                            <th>معدل النجاح</th>
                            <th>عدد الرسوب في المواد</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equations as $equation)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $equation->name }}</td>
                        <td>{{ $equation->cgp }}</td>
                        <td>{{ $equation->cgp_success }}</td>
                        <td>{{ $equation->fails }}</td>
                        <td>{!! $equation->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>' !!}</td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-left" href="{{ route('equations.edit', $equation->id) }}">تعديل</a>
                            <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('equations.destroy', $equation->id)}}" data-toggle="modal" data-message="هل انت متاكد من حذف الطريقة الحسابية؟" data-target="#deleteModal">حذف</a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        {{ $equations->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    @include('layouts.modals.delete-modal')

@endsection
