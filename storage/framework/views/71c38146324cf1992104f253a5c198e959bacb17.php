<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/apexcharts.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                    <?php echo $__env->make('layouts.extends.report-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <p class="text-muted"><strong>قسم <?php echo e($section); ?></strong></p>
                    <p class="text-muted"><strong>الصف</strong> (<?php echo e($classroom); ?>) <strong>الفصل</strong> (<?php echo e($semester); ?>)</p>
                    <p class="text-muted"><strong>السنة الدراسية</strong> (<?php echo e($year); ?>)</p>
                    <p class="text-muted"><strong>إحصاء نسبة النجاح</strong></p>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card-body">
                            <div id="columnChart" style="width:100%"></div>
                            <table width="100%" border="1" style="margin: 0 auto 40px">
                                <tr>
                                    <th>إسم المادة</th>
                                    <th>نسبة النجاح</th>
                                    <th>نسبة الرسوب</th>
                                    <th>متوسط الدرجات</th>
                                    <th>عدد الناجحين</th>
                                    <th>عدد الراسبين</th>
                                    <th>عدد الطلاب</th>
                                </tr>
                                <?php $__currentLoopData = $SubjectsStatistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubjectStatistics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($SubjectStatistics->subjectTeacher->subject->name); ?></td>
                                        <td><?php echo e($SubjectStatistics->successRate); ?>%</td>
                                        <td><?php echo e(100 - $SubjectStatistics->successRate); ?>%</td>
                                        <td><?php echo e(number_format($SubjectStatistics->avg, 2)); ?></td>
                                        <td><?php echo e($SubjectStatistics->success); ?></td>
                                        <td><?php echo e($SubjectStatistics->faild); ?></td>
                                        <td><?php echo e($SubjectStatistics->studentsCount); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <hr>
                            <h6 class="text-center">نسبة نجاح الفصل</h6>
                            <table width="30%" border="1" style="margin: 20px auto">
                                <tr>
                                    <th>عدد الطلاب</th>
                                    <td><?php echo e($studentCount); ?></td>
                                </tr>
                                <tr>
                                    <th>طلاب ليس لديهم رسوب</th>
                                    <td><?php echo e($studentSuccess); ?></td>
                                </tr>
                                <tr>
                                    <th>طلاب لديهم رسوب</th>
                                    <td><?php echo e($studentFaild); ?></td>
                                </tr>
                                <tr>
                                    <th>نسبة النجاح في الفصل</th>
                                    <td><?php echo e($semesterRate); ?>%</td>
                                </tr>
                            </table>
                        </div> <!-- /.card-body -->
                    </div>
                </div>
              </div> <!-- /.row -->
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/apexcharts.min.js')); ?>"></script>
    <script type="text/javascript">

        // Column Chart
        var columnChart,
        columnChartoptions = {
            series: [
                {
                    name: "نجاح",
                    data: [
                        <?php $__currentLoopData = $SubjectsStatistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubjectStatistics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($SubjectStatistics->successRate); ?> ,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ]
                }
            ],
            chart: {
                type: "bar",
                height: 350,
                stacked: !1,
                columnWidth: "70%",
                zoom: { enabled: !0 },
                toolbar: { show: !1 },
                background: "transparent"
            },
            dataLabels: { enabled: !1 },
            theme: { mode: colors.chartTheme },
            responsive: [{
                breakpoint: 480,
                options: { legend: { position: "bottom", offsetX: -10, offsetY: 0 } }
            }],
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "40%",
                    radius: 0,
                    enableShades: !1,
                    endingShape: "rounded"
                }
            },
            xaxis: {
                type: "text",
                categories: [
                    <?php $__currentLoopData = $SubjectsStatistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubjectStatistics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        '<?php echo e($SubjectStatistics->subjectTeacher->subject->name); ?>',
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                labels: {
                    show: !0,
                    trim: !0,
                    minHeight: void 0,
                    maxHeight: 120,
                    style: {
                        colors: '#333',
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
                        colors: '#333',
                        cssClass: "text-muted",
                        fontFamily: base.defaultFontFamily
                    }
                }
            },
            legend: {
                position: "top",
                fontFamily: base.defaultFontFamily,
                fontWeight: 400,
                labels: { colors: colors.mutedColor, useSeriesColors: !1 },
                markers: {
                    width: 10,
                    height: 10,
                    strokeWidth: 0,
                    strokeColor: "#fff",
                    fillColors: ['#1b68ff', '#dc3545'],
                    radius: 30,
                    customHTML: void 0,
                    onClick: void 0,
                    offsetX: 0,
                    offsetY: 0
                },
                itemMargin: { horizontal: 0, vertical: 0 },
                onItemClick: { toggleDataSeries: !0 },
                onItemHover: { highlightDataSeries: !0 } },
                fill: { opacity: 1, colors: ['#1b68ff', '#dc3545'] },
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
        columnChartCtn = document.querySelector("#columnChart");

        columnChartCtn && (columnChart = new ApexCharts(columnChartCtn, columnChartoptions)).render();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/grades_statistics/result.blade.php ENDPATH**/ ?>