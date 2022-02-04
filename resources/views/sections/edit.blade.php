@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">تعديل القسم {{ $section->name }}</h2>
        </div>
        <form action="{{ route('sections.update', $section->id) }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{ $section->id }}">
            <div class="form-row">
                <div class="col-md-8 mb-3">
                    <label for="name">إسم القسم</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $section->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="count_of_classroom">عدد الصفوف</label>
                    <input type="number" name="count_of_classroom" class="form-control" id="count_of_classroom" value="{{ $section->count_of_classroom }}" required>
                    @error('count_of_classroom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description">الوصف</label>
                    <textarea name="description" class="form-control" id="description">{{ $section->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" class="custom-control-input" id="status" {{ $section->deleted_at == null ? 'checked' : '' }}>
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
