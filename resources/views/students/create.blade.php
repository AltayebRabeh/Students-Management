@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="d-flex mb-4">
            <h2 class="h4">إضافة طالب</h2>
        </div>
        <form id="students" action="{{ route('students.store') }}" method="post" class="form">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
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
                    <label for="year_id">السنة</label>
                    <select name="year_id" id="year_id" class="form-control">
                        <option></option>
                        @if(cache('years') != null)
                            @foreach (cache('years') as $year)
                                <option value="{{ $year->id }}">{{ $year->year }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('year_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="repeater">
                <div class="form-row data-repeater-item">
                    <div class="col-md-4">
                        <label>الرقم الجامعي</label>
                        <div class="input-group">
                            <input type="text" name="students[0][university_number]" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label>إسم الطالب</label>
                        <div class="input-group">
                            <input type= "text" name="students[0][name]" class="form-control" value="" required>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-success btn-repeater mt-4"><i class="fe fe-plus fe-16 mt-2"></i></a>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" id="btn-send">حفظ</button>
                </div>
              </div>
        </form>
    </div>
</div>

@endsection

@section('js')

<script>

    $(document).ready(function() {

        // repeat inputs student data
        let length = 1;
        $('.btn-repeater').on('click', function(e) {
            e.preventDefault();
             length = length + 1;
            let item = `
                <div class="form-row data-repeater-item mt-1">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="students[` + length + `][university_number]" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" name="students[` + length + `][name]" class="form-control" value="" required>
                            <a href="#" class="btn btn-danger ml-2 remove-repeater"><i class="fe fe-trash"></i></a>
                        </div>
                    </div>
                </div>`;
            $('.repeater').append(item);
        });

        // Remove student row
        $(document).on('click','.remove-repeater', function(e){
            e.preventDefault();
            $(this).parent().parent().parent().remove();
        });

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

            $('form#students select').removeClass('is-invalid');
            $('form#students input').removeClass('is-invalid');
            $('.text-danger').remove();

            $.ajax({
                type: "POST",
                url : "{{ route('students.store') }}",
                data : $('form#students').serialize(),

                success  : function(data) {
                    if(data) {
                        window.location.assign("{{ route('students.index') }}");
                        $('.loading').css("display", "none");
                    }
                },
                error: function(data) {
                    for(const [key, value] of Object.entries(data.responseJSON.errors)) {
                        arr = key.split('.');
                        if(arr.length == 1){
                            $('form#students select[name="'+key+'"]').addClass('is-invalid').parent().append("<span class='text-danger d-block'>"+value+"</span>");
                            $('form#students select[name="'+key+'"]').foucs();
                        } else {
                            input = `${arr[0]}[${arr[1]}][${arr[2]}]`;
                            $('form#students input[name="'+ input +'"]').addClass('is-invalid').parent().parent().append("<span class='text-danger d-block'>"+value+"</span>");
                            $('form#students input[name="'+ input +'"]').foucs();
                        }
                    }
                }
                $('.loading').css("display", "none");

            });

        });

    });


</script>

@endsection
