
<?php $__env->startSection('content'); ?>


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">تفاصل الترحيل</h2>
                <a href="<?php echo e(route('relays.index')); ?>" class="btn btn-primary ml-auto">رجوع</a>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>الرقم الجامعي</th>
                        <th>إسم الطالب</th>
                        <th>من الفصل</th>
                        <th>إلى الفصل</th>
                        <th>من السنة</th>
                        <th>إلى السنة</th>
                        <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $relayStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relayStudent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($relayStudent->student->university_number); ?></td>
                            <td><?php echo e($relayStudent->student->name); ?></td>
                            <td><?php echo e(App\Models\Classroom::find($relayStudent->from_classroom)->name); ?></td>
                            <td><?php echo e(App\Models\Classroom::find($relayStudent->to_classroom)->name); ?></td>
                            <td><?php echo e(App\Models\Year::find($relayStudent->from_year)->year); ?></td>
                            <td><?php echo e(App\Models\Year::find($relayStudent->to_year)->year); ?></td>
                            <td>
                                <?php if($relayStudent->reject): ?>
                                    <span class="badge badge-danger">إعادة</span>
                                <?php else: ?>
                                    <span class="badge badge-success">نجاح</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        <?php echo e($relayStudents->links()); ?>

                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    <?php echo $__env->make('layouts.modals.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/relays/details.blade.php ENDPATH**/ ?>