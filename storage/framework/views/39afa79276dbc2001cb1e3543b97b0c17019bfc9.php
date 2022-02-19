<?php $__env->startSection('content'); ?>
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
                    <?php echo $__env->make('layouts.extends.report-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <p class="text-muted"><strong>قسم <?php echo e($section); ?></strong></p>
                    <p class="text-muted"><strong>الصف</strong> (<?php echo e($classroom); ?>) <strong>الفصل</strong> (<?php echo e($semester); ?>)</p>
                    <p class="text-muted"><strong>المادة</strong> (<?php echo e($subject); ?>)</p>
                    <p class="text-muted">
                        <strong>
                            قائمة الدرجات
                            <?php if($rexam): ?>
                                للملاحق و البدائل
                            <?php endif; ?>
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
                            <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($student->university_number); ?></td>
                                <td><?php echo e($student->name); ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td>لايوجد بيانات</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
              </div> <!-- /.row -->
          </div> <!-- /.card-body -->
        </div> <!-- /.card -->
      </div> <!-- /.col-12 -->
    </div> <!-- .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/supplements/check-list.blade.php ENDPATH**/ ?>