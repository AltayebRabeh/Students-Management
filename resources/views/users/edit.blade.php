@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة مستخدم</h2>
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $user->id}}">
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="name">الاسم الكامل</label>
                    <input readonly type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="username">إسم المستخدم</label>
                    <input readonly type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" required>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email">البريد الالكتروني</label>
                    <input readonly type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3 d-none">
                    <label for="password">كلمة المرور</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{ $user->password }}" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3 d-none">
                    <label for="password_confirmation">تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ $user->password }}" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <label for="permissions">الصلاحيات</label>
                    <select name="permissions[]" class="form-control permissions" id="permissions" multiple>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}" {{ $user->permissions->find($permission->id) ? 'selected' : '' }}>{{ $permission->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" class="custom-control-input" id="status" {{ $user->deleted_at == null ? 'checked' : '' }}>
                    <label class="custom-control-label" for="status">مفعل</label>
                  </div>
                </div>
                <div class="col-md-6 text-right">
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
              </div>
        </form>
    </div>
</div>

@endsection
