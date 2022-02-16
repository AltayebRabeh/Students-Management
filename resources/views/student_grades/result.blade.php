@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="row align-items-center mb-4">
          <div class="col">
            <h2 class="h5 page-title"><small class="text-muted text-uppercase">نتيجة</small><br />طالب</h2>
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
                    @foreach ($classrooms as $classroom)
                        <table style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">[الصف {{ $classroom->name }}]</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3"  style="display: grid;grid-template-columns: repeat(2, 1fr);align-items: baseline;gap: 10px;">

                                    <?php $year_hours = [] ?>
                                    <?php $year_total = [] ?>

                                    <?php $year = null?>

                                    <?php $fails = null  ?>

                                    <?php $equations_fails = null  ?>
                                    <?php $cgp_success = null  ?>

                                    @foreach ($classroom->semesters as $semester)
                                        <table  border="1">
                                            <tr>
                                                <th colspan="3" style="text-align:center;">الفصل الدراسي {{ $semester->name }}</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" width="5%" style="text-align:center;">#</th>
                                                <th scope="col">إسم المادة</th>
                                                <th scope="col" width="15%" style="text-align:center;">الدرجة</th>
                                            </tr>
                                            <?php $semester_hours = [] ?>
                                            <?php $semester_total = [] ?>

                                            @foreach ($semester->grades as $grade)
                                                @if($loop->first)
                                                    <?php $year = $grade->year->year ?>
                                                @endif
                                                <tr>
                                                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                                                    <td>{{ $grade->subjectTeacher->subject->name }}</td>
                                                    <td style="text-align:center;"><sup style="color:red">{{ $grade->fail >= 1 ? '*' : '' }}</sup>{{ $grade->mark->mark }}</td>
                                                </tr>
                                                <?php $grade->mark->calculation == 1 ? $semester_total[] = ($grade->grade / (100 / $grade->mark->equation->cgp)) * $grade->subjectTeacher->hours : '' ?>
                                                <?php $grade->mark->calculation == 1 ? $semester_hours[] = $grade->subjectTeacher->hours : '' ?>
                                                <?php $grade->mark->calculation == 1 ? $year_total[] = ($grade->grade / (100 / $grade->mark->equation->cgp)) * $grade->subjectTeacher->hours : '' ?>
                                                <?php $grade->mark->calculation == 1 ? $year_hours[] = $grade->subjectTeacher->hours : '' ?>
                                                <?php $grade->mark->calculation == 1 ? $total[] = ($grade->grade / (100 / $grade->mark->equation->cgp)) * $grade->subjectTeacher->hours : '' ?>
                                                <?php $grade->mark->calculation == 1 ? $hours[] = $grade->subjectTeacher->hours : '' ?>
                                                <?php $grade->mark->fail == 1 ? $fails += $grade->mark->fail : '' ?>
                                                <?php $cgp_success = $grade->mark->equation->cgp_success; ?>
                                                <?php $equations_fails = $grade->mark->equation->fails; ?>
                                                @if($loop->last)
                                                    <tr>
                                                        <th colspan="2">المعدل الفصلي</th>
                                                        <th style="text-align:center;">{{ number_format(array_sum($semester_total) != 0 ? array_sum($semester_total) / array_sum($semester_hours) : 00, 2) }}</th>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                        @if($loop->last)
                                            <tr>
                                                <th class="d-flex justify-content-between"  style="text-align:center;padding-top: 10px;padding-bottom: 20px;border-bottom: 2px solid;">
                                                    <span> المعدل السنوي [{{ number_format(array_sum($year_total) != 0 ? array_sum($year_total) / array_sum($year_hours) : 00, 2) }}]</span>
                                                    @if (number_format(array_sum($year_total) != 0 ? array_sum($year_total) / array_sum($year_hours) : 00, 2) < $cgp_success || ($equations_fails > 0 && $equations_fails <= $fails))
                                                        <span class="text-danger">إعادة</span>
                                                    @else
                                                        <span class="text-success">نجاح</span>
                                                    @endif
                                                    <span>العام الدراسي [{{ $year }}]</span>
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @if($loop->last)
                                <tr>
                                    <th style="text-align:center;">
                                        المعدل التراكمي
                                        [{{ number_format(array_sum($total) != 0 ? array_sum($total) / array_sum($hours) : 00, 2) }}]
                                    </th>
                                </tr>
                            @endif
                          </tbody>
                        </table>
                    @endforeach
                </div>
              </div> <!-- /.row -->
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
@stop
