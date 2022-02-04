@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة سنة دراسية </h2>
        </div>
        <form action="{{ route('years.update', $year->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="from">من</label>
                    <input type="number" name="from" class="form-control" id="from" value="{{ explode('-', $year->year)[0] }}" required>
                    @error('from')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="to">إلى</label>
                    <input type="number" name="to" class="form-control" id="to" value="{{ explode('-', $year->year)[1] }}" required>
                    @error('to')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" class="custom-control-input" id="status" {{ $year->deleted_at == null ? 'checked' : '' }}>
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
