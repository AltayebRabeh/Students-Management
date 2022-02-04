@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="row align-items-center mb-4">
          <div class="col">
            <h2 class="h5 page-title"><small class="text-muted text-uppercase">إحصائيات</small><br />النتائج</h2>
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
                    <p class="text-muted"><strong>السنة الدراسية</strong> ({{ $year }})</p>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card-body">
                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>                    
                            <div id="chartContainer2" style="height: 300px; width: 100%;"></div>                    
                        </div> <!-- /.card-body -->
                    </div>
                </div>
              </div> <!-- /.row -->
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
@stop

@section('js')

    
<script type="text/javascript" print src="{{ asset('js/canvasjs.min.js') }}"></script>
<script type="text/javascript" print>
    window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {            
      title:{
        text: "Fruits sold in First & Second Quarter"              
      },

      data: [  //array of dataSeries     
      { //dataSeries - first quarter
   /*** Change type "column" to "bar", "area", "line" or "pie"***/        
       type: "column",
       name: "نسبة النجاح",
       dataPoints: [
        @foreach ($SubjectsStatistics as $SubjectStatistics)            
        { label: "{{ $SubjectStatistics->subjectTeacher->subject->name }}", y: {{ $SubjectStatistics->successRate }} },
        @endforeach
       ]
     },
     { //dataSeries - second quarter

      type: "column",
      name: "نسبة الرسوب",                
      dataPoints: [
        @foreach ($SubjectsStatistics as $SubjectStatistics)            
        { label: "{{ $SubjectStatistics->subjectTeacher->subject->name }}", y: {{ 100 - $SubjectStatistics->successRate }} },
        @endforeach
      ]
    }
    ]
  });

    chart.render();

    var chart2 = new CanvasJS.Chart("chartContainer2",
	{
		theme: "light2",
		title:{
			text: "Gaming Consoles Sold in 2012"
		},		
		data: [
		{       
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			yValueFormatString: "#,##0,,.## Million",
			legendText: "{indexLabel}",
			dataPoints: [
				{  y: 4181563, indexLabel: "PlayStation 3" },
				{  y: 2175498, indexLabel: "Wii" },
				{  y: 3125844, indexLabel: "Xbox 360" },
				{  y: 1176121, indexLabel: "Nintendo DS"},
				{  y: 1727161, indexLabel: "PSP" },
				{  y: 4303364, indexLabel: "Nintendo 3DS"},
				{  y: 1717786, indexLabel: "PS Vita"}
			]
		}
		]
	});
	chart2.render();
  }
  </script>


@stop