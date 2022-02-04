@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="row align-items-center mb-4">
          <div class="col">
            <h2 class="h5 page-title"><small class="text-muted text-uppercase">نتيحة</small><br />الطلاب</h2>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-secondary print-btn" data-landscape="true">Print</button>
          </div>
        </div>
        <div class="card shadow">
          <div class="card-body px-1" id="printDocument">
                <div class="col-12 text-center mb-4">
                  @include('layouts.extends.report-header')
                  <p class="text-muted"><strong>قسم {{ $section }}</strong></p>
                  <p class="text-muted"><strong>الصف</strong> ({{ $classroom }}) <strong>الفصل الدراسي</strong> ({{ $semester }})</p>
                  <p class="text-muted"><strong>تنيجة الملاحق والبدائل للعام الدراسي {{ $year }}</strong></p>
                </div>
                <table style="width:100%;" border="1">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">#</th>
                            <th scope="col" width="14%">إسم الطالب</th>
                            <th scope="col" width="3%">الرقم الجامعي</th>
                            @foreach ($students as $student)
                                @foreach ($student->grades as $grade)
                                    <th width="5%" style="text-align:center;">{{ $grade->subjectTeacher->subject->name }}</th>
                                @endforeach
                                @break
                            @endforeach
                            <th scope="col"  width="7%">المعدل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->university_number }}</td>
                                <?php $hours = [] ?>
                                <?php $total = [] ?>
                                <?php $fails = 0 ?>
                                @foreach ($student->grades as $grade)
                                    <?php $grade->mark->calculation == 1 ? $total[] = ($grade->grade / (100 / $grade->mark->equation->cgp)) * $grade->subjectTeacher->hours : ''; ?>
                                    <?php $grade->mark->calculation == 1 ? $hours[] = $grade->subjectTeacher->hours : ''; ?>
                                    <?php $fails += $grade->mark->fail ?>
                                    <td style="text-align:center;"><sup style="color:red">{{ $grade->fail >= 1 ? '*' : '' }}</sup>{{ $grade->mark->mark }}</td>
                                @endforeach
                                <?php
                                    // eval("\$res= $calc ;");
                                ?>
                                <td>{{ number_format(array_sum($total) != 0 ? array_sum($total) / array_sum($hours) : 00, 2) }} {{ $fails != 0 ? "رسوب ($fails)" : 'نجاح'  }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
@stop
