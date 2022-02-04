@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="row align-items-center mb-4">
          <div class="col">
            <h2 class="h5 page-title"><small class="text-muted text-uppercase">فصل دراسي</small><br />الطلاب</h2>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-secondary print-btn">طباعة</button>
          </div>
        </div>
        <div class="card shadow">
          <div class="card-body p-5" id="printDocument">
            <div class="row mb-5">
                <div class="col-12 text-center mb-2">
                  @include('layouts.extends.report-header')
                  <p class="text-muted"><strong>قسم {{ $student->section->name }}</strong></p>
                  <p class="text-muted"><strong>الصف</strong> ({{ $classroom->name }}) <strong>الفصل الدراسي</strong> ({{ $semester->name }})</p>
                  <p class="text-muted"><strong>العام الدراسي {{ $year->year }}</strong></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-1"><strong>إسم الطالب </strong> {{ $student->name }} </p>
                        <p class="mb-1"><strong>الرقم الجامعي </strong> {{ $student->university_number }} </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php $hours = [] ?>
                    <?php $total = [] ?>
                    <table style="width:60%;margin: 20px auto;" border="1">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>إسم المادة</th>
                                <th width="20%">الدرجة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjectsTeachers as $subjectTeacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subjectTeacher->subject->name }}</td>
                                    <td><sup style="color:red">{{ $subjectTeacher->grades->first()->fail >= 1 ? '*' : '' }}</sup>{{ $subjectTeacher->grades->first()->mark->mark }}</td>
                                </tr>
                                <?php $subjectTeacher->grades->first()->mark->calculation == 1 ? $total[] = ($subjectTeacher->grades->first()->grade / (100 / $subjectTeacher->grades->first()->mark->equation->cgp)) * $subjectTeacher->hours : ''; ?>
                                <?php $subjectTeacher->grades->first()->mark->calculation == 1 ? $hours[] = $subjectTeacher->hours : '' ?>
                            @endforeach
                            <tr>
                                <th colspan="2">المعدل</th>
                                <th>{{ number_format(array_sum($total) != 0 ? array_sum($total) / array_sum($hours) : 00, 2) }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div> <!-- /.row -->
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
@stop
