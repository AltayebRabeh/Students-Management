@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة مادة </h2>
        </div>
        <form action="{{ route('subjects.store') }}" id="addSubject" method="post">
            @csrf
            @method('POST')
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="name">إسم المادة</label>
                    <input type="text" name="name" class="form-control" id="name" value="" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description">الوصف</label>
                    <textarea name="description" class="form-control" id="description"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" class="custom-control-input" id="status" checked>
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
