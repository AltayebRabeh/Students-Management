@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة نتيجة طالب </h2>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('student-grades.create') }}" id="studentGrades" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="section_id">إختار القسم</label>
                            <select name="section_id" class="form-control section_id" id="section_id">
                                <option value=""></option>
                                @if(cache('sections') != null)
                                    @foreach (cache('sections') as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                @endif
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
                        <div class="col-md-2 mb-3">
                            <label for="year_id">إختيار السنة</label>
                            <select name="year_id" class="form-control year_id" id="year_id">
                                <option value=""></option>
                                @if(cache('years') != null)
                                    @foreach (cache('years') as $year)
                                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('year_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="university_number">الرقم الجامعي</label>
                            <input type="text" name="university_number" class="form-control" id="university_number">
                            @error('university_number')
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

