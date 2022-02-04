@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة مادة </h2>
        </div>
        <form action="{{ route('subjects-teachers.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="form-row">
                <div class="col-md-4 mb-3">
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
                <div class="col-md-4 mb-3">
                    <label for="classroom_id">إختيار الصف</label>
                    <select name="classroom_id" class="form-control classroom_id" id="classroom_id">
                        <option value=""></option>
                    </select>
                    @error('classroom_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="semester_id">إختيار الفصل</label>
                    <select name="semester_id" class="form-control semester_id" id="semester_id">
                        <option value=""></option>
                    </select>
                    @error('semester_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="subject_id">إختار المادة</label>
                    <select name="subject_id" class="form-control subject_id" id="subject_id">
                        <option value=""></option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="teacher_id">إختار الاستاذ</label>
                    <select name="teacher_id" class="form-control teacher_id" id="teacher_id">
                        <option value=""></option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2 mb-3">
                    <label for="year_id">إختيار السنة</label>
                    <select name="year_id" class="form-control year_id" id="year_id">
                        <option value=""></option>
                        @foreach (cache('years') as $year)
                            <option value="{{ $year->id }}">{{ $year->year }}</option>
                        @endforeach
                    </select>
                    @error('year_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2 mb-3">
                    <label for="hours">عدد الساعات</label>
                    <input type="number" name="hours" id="hours" class="form-control">
                    @error('hours')
                        <div class="text-danger">{{ $message }}</div>
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

@section('js')

    @include('layouts.extends.ajax-get-semesters')

@stop
