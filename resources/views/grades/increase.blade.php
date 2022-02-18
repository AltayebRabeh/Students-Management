@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">زيادة مستوى النجاح</h2>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form id="increase" action="{{ route('grades.increase.success.store') }}" method="POST">
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
                        <div class="col-md-3 mb-3">
                            <label for="subject_teacher_id">إختيار المادة</label>
                            <select name="subject_teacher_id" class="form-control subject_teacher_id" id="subject_teacher_id">

                            </select>
                            @error('subject_teacher_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2 mb-3">
                            <label for="increase_type">نوع الزيادة</label>
                            <select name="increase_type" class="form-control increase_type" id="increase_type">
                                <option value="precentage">نسبة (%)</option>
                                <option value="number">رقم (1,2,3,...)</option>
                            </select>
                            @error('increase_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="increase">قيمة الزيادة</label>
                            <input type="number" name="increase" min="1" max="100" id="increase" class="form-control">
                            @error('increase')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="grades_from">من الدرجة</label>
                            <input type="number" name="grades_from" min="0" max="100" id="grades_from" class="form-control">
                            @error('grades_from')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="grades_to">الى الدرجة</label>
                            <input type="number" name="grades_to" min="0" max="100" id="grades_to" class="form-control">
                            @error('grades_to')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-1 mb-3 pt-1">
                            <button type="submit" class="btn btn-primary mt-4" id="btn-send">متابعة</button>
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

    <script>

        $(document).ready(function() {
    
            // Send Data with AJAX
            $('#btn-send').click(function (event) {
    
                $(this).css('disabled', 'disabled');
                
                $('.loading').css("display", "flex");
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                event.preventDefault();
 
                $('.text-danger').remove();
    
                $.ajax({
                    type: "POST",
                    url : "{{ route('grades.increase.success.store') }}",
                    data : $('form#increase').serialize(),
    
                    success  : function(data) {
                        if(data) {
                            window.location.assign("{{ route('grades.increase.success') }}");
                            $('.loading').css("display", "none");
                        }
                    },
                    error: function(data) {
                        for(const [key, value] of Object.entries(data.responseJSON.errors)) {
                            $('form#increase select[name="'+key+'"]').parent().append("<span class='text-danger d-block'>"+value+"</span>");
                            $('form#increase input[name="'+key+'"]').parent().append("<span class='text-danger d-block'>"+value+"</span>");
                        }
    
                        $('.loading').css("display", "none");
                    }
    
                });
    
            });
    
        });
    
    
    </script>

@stop
