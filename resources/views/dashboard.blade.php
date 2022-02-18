@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/apexcharts.css')}}">
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadowy border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary-light">
                        <i class="fe fe-16 fe-users text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col pr-0">
                      <p class="small text-muted mb-0">كل الطلاب</p>
                      <span class="h3 mb-0"> {{ $allStudents }} </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-users text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col pr-0">
                      <p class="small text-muted mb-0">الطلاب الحاليين</p>
                      <span class="h3 mb-0"> {{ $currentStudents }} </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-users text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col">
                      <p class="small text-muted mb-0">الطلاب المتخرجين</p>
                      <div class="row align-items-center no-gutters">
                        <div class="col-auto">
                          <span class="h3 mr-2 mb-0"> {{ $graduateStudents }} </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-3 text-center">
                      <span class="circle circle-sm bg-primary">
                        <i class="fe fe-16 fe-users text-white mb-0"></i>
                      </span>
                    </div>
                    <div class="col">
                      <p class="small text-muted mb-0">الطلاب المؤرشفين</p>
                      <span class="h3 mb-0"> {{ $archiveStudents }} </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- charts-->
          <div class="row my-4">
            <div class="col-md-12">
              <div class="chart-box">
                <div id="lineChart"></div>
              </div>
            </div> <!-- .col -->
          </div> <!-- end section -->
        </div>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@stop

@section('js')
<script src="{{ asset('js/apexcharts.min.js') }}"></script>

<script type="text/javascript">

    // Line Chart
    var lineChart,
    lineChartoptions = {
        series: [
            @foreach ($successRate as $success)
                {

                @foreach ($success as $value)
                    @if($loop->first)
                        name: '{{ $value }}',
                        data: [
                        @continue
                    @endif

                    {{ $value }},

                    @if($loop->last)
                        ]
                    @endif
                @endforeach
                    
                },
                
            @endforeach
            // {
            //     name: "Page views",
            //     data: [31, 28, 30, 51, 42, 109, 100, 31, 40, 28, 31, 58, 30, 51, 42, 109, 100, 116]
            // },
            // {
            //     name: "Visitors",
            //     data: [11, 45, 20, 32, 34, 52, 41, 11, 32, 45, 11, 75, 20, 32, 34, 52, 41, 81]
            // },
            // {
            //     name: "Orders",
            //     data: [5, 25, 9, 14, 14, 32, 21, 5, 12, 25, 5, 55, 9, 14, 14, 32, 21, 65]
            // }
        ],
        chart: {
            height: 350,
            type: "line",
            background: !1,
            zoom: { enabled: !1 },
            toolbar: { show: !1 }
        },
        theme: { mode: colors.chartTheme },
        stroke: {
            show: !0,
            curve: "smooth",
            lineCap: "round",
            colors: chartColors,
            width: [3, 2, 3],
            dashArray: [0, 0, 0]
        },
        dataLabels: { enabled: !1 },
        responsive: [
            {
                breakpoint: 480,
                options: { legend: { position: "bottom", offsetX: -10, offsetY: 0 } }
            }
        ],
        markers: {
            size: 4,
            colors: base.primaryColor,
            strokeColors: colors.borderColor,
            strokeWidth: 2,
            strokeOpacity: .9,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [],
            shape: "circle",
            radius: 2,
            offsetX: 0,
            offsetY: 0,
            onClick: void 0,
            onDblClick: void 0,
            showNullDataPoints: !0,
            hover: { size: void 0, sizeOffset: 3 }
        },
        xaxis: {
            type: "text",
            categories: [
                @foreach ($years as $year)
                    '{{ $year->year }}',
                @endforeach
            ],
            labels: {
                show: !0,
                trim: !1,
                minHeight: void 0,
                maxHeight: 120,
                style: {
                    colors: colors.mutedColor,
                    cssClass: "text-muted",
                    fontFamily: base.defaultFontFamily
                }
            },
            axisBorder: { show: !1 }
        },
        yaxis: {
            labels: {
                show: !0,
                trim: !1,
                offsetX: -10,
                minHeight: void 0,
                maxHeight: 120,
                style: {
                    colors: colors.mutedColor,
                    cssClass: "text-muted",
                    fontFamily: base.defaultFontFamily
                }
            }
        },
        legend: {
            position: "top",
            fontFamily: base.defaultFontFamily,
            fontWeight: 400,
            labels: {
                colors: colors.mutedColor,
                useSeriesColors: !1
            },
            markers: {
                width: 10,
                height: 10,
                strokeWidth: 0,
                strokeColor: colors.borderColor,
                fillColors: chartColors,
                radius: 6,
                customHTML: void 0,
                onClick: void 0,
                offsetX: 0,
                offsetY: 0
            },
            itemMargin: { horizontal: 10, vertical: 0 },
            onItemClick: { toggleDataSeries: !0 },
            onItemHover: { highlightDataSeries: !0 }
        },
        grid: {
            show: !0,
            borderColor: colors.borderColor,
            strokeDashArray: 0,
            position: "back",
            xaxis: { lines: { show: !1 } },
            yaxis: { lines: { show: !0 } },
            row: { colors: void 0, opacity: .5 },
            column: { colors: void 0, opacity: .5 },
            padding: { top: 0, right: 0, bottom: 0, left: 0 }
        }
    },
    lineChartCtn = document.querySelector("#lineChart");
lineChartCtn && (lineChart = new ApexCharts(lineChartCtn, lineChartoptions)).render();

</script>

@endsection


