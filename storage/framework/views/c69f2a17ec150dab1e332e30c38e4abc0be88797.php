<?php $__env->startSection('content'); ?>
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
                  <?php echo $__env->make('layouts.extends.report-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <p class="text-muted"><strong>قسم <?php echo e($section); ?></strong></p>
                  <p class="text-muted"><strong>الصف</strong> (<?php echo e($classroom); ?>) <strong>الفصل الدراسي</strong> (<?php echo e($semester); ?>)</p>
                  <p class="text-muted"><strong>تنيجة الملاحق والبدائل للعام الدراسي <?php echo e($year); ?></strong></p>
                </div>
                <table style="width:100%;" border="1">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">#</th>
                            <th scope="col" width="14%">إسم الطالب</th>
                            <th scope="col" width="3%">الرقم الجامعي</th>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $student->grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th width="5%" style="text-align:center;"><?php echo e($grade->subjectTeacher->subject->name); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php break; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th scope="col"  width="7%">المعدل</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($student->name); ?></td>
                                <td><?php echo e($student->university_number); ?></td>
                                <?php $hours = [] ?>
                                <?php $total = [] ?>
                                <?php $fails = 0 ?>
                                <?php $__currentLoopData = $student->grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $grade->mark->calculation == 1 ? $total[] = ($grade->grade / (100 / $grade->mark->equation->cgp)) * $grade->subjectTeacher->hours : ''; ?>
                                    <?php $grade->mark->calculation == 1 ? $hours[] = $grade->subjectTeacher->hours : ''; ?>
                                    <?php $fails += $grade->mark->fail ?>
                                    <td style="text-align:center;"><sup style="color:red"><?php echo e($grade->fail >= 1 ? '*' : ''); ?></sup><?php echo e($grade->mark->mark); ?></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    // eval("\$res= $calc ;");
                                ?>
                                <td><?php echo e(number_format(array_sum($total) != 0 ? array_sum($total) / array_sum($hours) : 00, 2)); ?> <?php echo e($fails != 0 ? "رسوب ($fails)" : 'نجاح'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/supplements/result.blade.php ENDPATH**/ ?>