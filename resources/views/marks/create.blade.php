@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة رمز </h2>
        </div>
        <form action="{{ route('marks.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="mark">الرمز</label>
                    <input type="text" name="mark" class="form-control" id="mark" value="" required>
                    @error('mark')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="min">من</label>
                    <input type="number" name="min" class="form-control" id="min" value="" required>
                    @error('min')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="max">الى</label>
                    <input type="number" name="max" class="form-control" id="max" value="" required>
                    @error('max')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-2">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="fail" class="custom-control-input" id="fail">
                    <label class="custom-control-label" for="fail">رسوب</label>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" name="calculation" class="custom-control-input" id="calculation" checked>
                      <label class="custom-control-label" for="calculation">تحسب في المعدل</label>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 text-right">
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
              </div>
        </form>
    </div>
</div>

@endsection
