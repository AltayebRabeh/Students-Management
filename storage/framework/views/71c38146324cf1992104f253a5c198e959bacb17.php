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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    
<script type="text/javascript" print src="<?php echo e(asset('js/canvasjs.min.js')); ?>"></script>
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
        <?php $__currentLoopData = $SubjectsStatistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubjectStatistics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
        { label: "<?php echo e($SubjectStatistics->subjectTeacher->subject->name); ?>", y: <?php echo e($SubjectStatistics->successRate); ?> },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       ]
     },
     { //dataSeries - second quarter

      type: "column",
      name: "نسبة الرسوب",                
      dataPoints: [
        <?php $__currentLoopData = $SubjectsStatistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubjectStatistics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
        { label: "<?php echo e($SubjectStatistics->subjectTeacher->subject->name); ?>", y: <?php echo e(100 - $SubjectStatistics->successRate); ?> },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/grades_statistics/result.blade.php ENDPATH**/ ?>