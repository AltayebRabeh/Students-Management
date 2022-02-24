<?php $__env->startSection('content'); ?>
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
                  <?php echo $__env->make('layouts.extends.report-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <p class="text-muted"><strong>قسم <?php echo e($student->section->name); ?></strong></p>
                  <p class="text-muted"><strong>الصف</strong> (<?php echo e($classroom->name); ?>) <strong>الفصل الدراسي</strong> (<?php echo e($semester->name); ?>)</p>
                  <p class="text-muted"><strong>العام الدراسي <?php echo e($year->year); ?></strong></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-1"><strong>إسم الطالب </strong> <?php echo e($student->name); ?> </p>
                        <p class="mb-1"><strong>الرقم الجامعي </strong> <?php echo e($student->university_number); ?> </p>
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
                            <?php $__currentLoopData = $subjectsTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjectTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($subjectTeacher->subject->name); ?></td>
                                    <td><sup style="color:red"><?php echo e($subjectTeacher->grades->first()->fail >= 1 ? '*' : ''); ?></sup><?php echo e($subjectTeacher->grades->first()->mark->mark); ?></td>
                                </tr>
                                <?php $subjectTeacher->grades->first()->mark->calculation == 1 && $subjectTeacher->grades->first()->grade <= 100 ? $total[] = ($subjectTeacher->grades->first()->grade / (100 / $subjectTeacher->grades->first()->mark->equation->cgp)) * $subjectTeacher->hours : 0; ?>
                                <?php $subjectTeacher->grades->first()->mark->calculation == 1 ? $hours[] = $subjectTeacher->hours : '' ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th colspan="2">المعدل</th>
                                <th><?php echo e(number_format(array_sum($total) != 0 ? array_sum($total) / array_sum($hours) : 00, 2)); ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div> <!-- /.row -->
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/student_grades/semester-result.blade.php ENDPATH**/ ?>