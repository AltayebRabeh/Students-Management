@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">تعديل الطالب {{ $student->name }}</h2>
        </div>
        <form action="{{ route('students.update', $student->id) }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{ $student->id }}">
            <div class="form-row">
                <div class="col-md-8 mb-3">
                    <label for="name">إسم الطالب</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $student->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="university_number">الرقم الجامعي</label>
                    <input type="text" name="university_number" class="form-control" id="university_number" value="{{ $student->university_number }}" required>
                    @error('university_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="section">القسم</label>
                    <select name="section_id" id="section" class="form-control" required>
                        @if(cache('sections') != null)
                            @foreach (cache('sections') as $section)
                                <option value="{{ $section->id }}" {{ $section->id == $student->section_id ? 'selected': ''  }}>{{ $section->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('section_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="classroom">الصف الدراسي</label>
                    <select name="classroom_id" id="classroom" class="form-control" required>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" {{ $classroom->id == $student->classroom->id ? 'selected': '' }}>{{ $classroom->name }}</option>
                        @endforeach
                    </select>
                    @error('classroom_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="year_id">السنة</label>
                    <select name="year_id" id="year_id" class="form-control">
                        <option></option>
                        @if(cache('years') != null)
                            @foreach (cache('years') as $year)
                                <option value="{{ $year->id }}" {{ $year->id == $student->year->id ? 'selected': '' }}>{{ $year->year }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('year_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="my-4">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
</div>

@endsection
