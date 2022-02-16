@extends('layouts.main')
@section('content')


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">المستخدمين</h2>
                <a href="{{ route('users.create') }}" class="btn btn-primary ml-auto">إضافة مستخدم</a>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <form action="{{ route('users.index') }}" method="get">
                        <div class="form-row">
                            <div class="col-md-11 mb-3">
                                <input type="search" name="search" placeholder="بحث ..." class="form-control">
                            </div>
                            <div class="col-md-1 mb-3">
                                <button type="submit" class="btn btn-primary">بحث</button>
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
                        <th>إسم المستخدم</th>
                        <th>البريد الالكتروني</th>
                        <th>الصلاحيات</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge badge-success">{{ $role->display_name }}</span>
                            @endforeach
                            @foreach ($user->permissions as $permission)
                                <span class="badge badge-warning">{{ $permission->display_name }}</span>
                            @endforeach
                        </td>
                        <td>{!! $user->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>' !!}</td>
                        <td>
                            @if(!$user->hasRole('admin'))
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-left" href="{{ route('users.edit', $user->id) }}">تعديل</a>
                                <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="{{ route('users.destroy', $user->id)}}" data-toggle="modal" data-message="هل انت متاكد من حذف المستخدم" data-target="#deleteModal">حذف</a>
                                </div>
                            @endif
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    @include('layouts.modals.delete-modal')

@endsection
