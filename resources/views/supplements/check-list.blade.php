@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="row align-items-center mb-4">
          <div class="col">
            <h2 class="h5 page-title"><small class="text-muted text-uppercase">قوائم</small><br />الطلاب</h2>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-secondary print-btn">طباعة</button>
          </div>
        </div>
        <div class="card shadow">
          <div class="card-body px-1" id="printDocument">
                <div class="col-12 text-center mb-4">
                    @include('layouts.extends.report-header')
                    <p class="text-muted"><strong>قسم {{ $section }}</strong></p>
                    <p class="text-muted"><strong>الصف</strong> ({{ $classroom }}) <strong>الفصل</strong> ({{ $semester }})</p>
                    <p class="text-muted"><strong>المادة</strong> ({{ $subject }})</p>
                    <p class="text-muted">
                        <strong>
                            قائمة الدرجات
                            @if($rexam)
                                للملاحق و البدائل
                            @endif
                        </strong>
                    </p>
                </div>
                    <table style="width:100%; font-size:16px" border="1">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col" width="20%">الرقم الجامعي</th>
                            <th scope="col">إسم الطالب</th>
                            <th scope="col">اعمال السنة</th>
                            <th scope="col">درجة الامتحان</th>
                            <th scope="col">الدرجة النهائية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $student->university_number }}</td>
                                <td>{{ $student->name }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @empty
                            <tr>
                                <td>لايوجد بيانات</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
              </div> <!-- /.row -->
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
@stop
