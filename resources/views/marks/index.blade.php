@extends('layouts.main')
@section('content')


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">الرموز</h2>
                <a href="{{ route('marks.create') }}" class="btn btn-primary ml-auto">إضافة رمز</a>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الرمز</th>
                            <th>الطريقة</th>
                            <th>رسوب</th>
                            <th>يتم حسابها</th>
                            <th>من</th>
                            <th>الى</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marks as $mark)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mark->mark }}</td>
                        <td>{{ $mark->equation->name }}</td>
                        <td>{{ $mark->get_fail }}</td>
                        <td>{{ $mark->get_calculation }}</td>
                        <td>{{ $mark->min }}</td>
                        <td>{{ $mark->max }}</td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('marks.destroy', $mark->id)}}" data-toggle="modal" data-message="هل انت متاكد من حذف الرمز؟" data-target="#deleteModal">حذف</a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    @include('layouts.modals.delete-modal')

@endsection