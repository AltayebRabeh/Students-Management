@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">تعديل الاستاذ {{ $teacher->name }}</h2>
        </div>
        <form action="{{ route('teachers.update', $teacher->id) }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{ $teacher->id }}">
            <div class="form-row">
                <div class="col-md-8 mb-3">
                    <label for="name">إسم الاستاذ</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $teacher->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="section">القسم</label>
                    <select name="section_id" id="section" class="form-control">
                        <option></option>
                        @foreach (cache('sections') as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description">الوصف</label>
                    <textarea name="description" class="form-control" id="description">{{ $teacher->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" class="custom-control-input" id="status" {{ $teacher->deleted_at == null ? 'checked' : '' }}>
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
