@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">عرض نتيجة </h2>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('supplements.result') }}" method="GET">

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
                        <div class="col-md-2 mb-3">
                            <label for="classroom_id">إختيار الصف</label>
                            <select name="classroom_id" class="form-control classroom_id" id="classroom_id">
                                <option value=""></option>
                            </select>
                            @error('classroom_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="semester_id">إختيار الفصل</label>
                            <select name="semester_id" class="form-control semester_id" id="semester_id">
                                <option value=""></option>
                            </select>
                            @error('semester_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
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
                        <div class="d-none">
                            <label for="subject_teacher_id">إختيار المادة</label>
                            <select name="subject_teacher_id" class="form-control subject_teacher_id" id="subject_teacher_id">

                            </select>
                            @error('subject_teacher_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-1 mb-3 pt-1">
                            <button type="submit" class="btn btn-primary mt-4">متابعة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

    @include('layouts.extends.ajax-get-semesters')
    @include('layouts.extends.ajax-get-subject-teacher')

@stop
