@extends('layouts.main')

@section('content')

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة معادلة </h2>
        </div>
        <form action="{{ route('equations.store') }}" method="post" novalidate>
            @csrf
            @method('POST')
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="name">إسم المعادلة</label>
                    <input type="text" name="name" class="form-control" id="name" value="" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="cgp">المعدل</label>
                    <input type="number" min="0.00" step="0.01"  name="cgp" class="form-control" id="cgp" value="" required>
                    @error('cgp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="cgp_success">معدل النجاح</label>
                    <input type="number" min="0.00" step="0.01"  name="cgp_success" class="form-control" id="cgp_success" value="" required>
                    @error('cgp_success')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="fails">عدد مواد الرسوب</label>
                    <input type="number" min="0" step="1" name="fails" class="form-control" id="fails" value="" required>
                    @error('fails')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <p class="alert alert-info">
                        يقصد <strong>بـعدد مواد الرسوب</strong> عدد المواد التي يرسبها الطالب في الفصل تساويها او اكثر يعتبر الطالب راسباً و عندما يتم الترحيل إذا لم يتم تحديد قيم لن يرحلو الطلاب الذين يعتبرون راسبون
                        <br>
                        ويقصد <strong>بـمعدل النجاح </strong> كالسابق إذا كان معدل الطالب اقل من معدل النجاح
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-6 col-sm-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" value="1" name="status" class="custom-control-input" id="status">
                    <label class="custom-control-label" for="status">مفعل</label>
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
