<?php $__env->startSection('content'); ?>


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">الدرجات والرموز</h2>
                <a href="<?php echo e(route('marks.create')); ?>" class="btn btn-primary ml-auto">إضافة</a>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الرمز</th>
                            <th>المعادلة</th>
                            <th>رسوب</th>
                            <th>يتم حسابها</th>
                            <th>من</th>
                            <th>الى</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($mark->mark); ?></td>
                        <td><?php echo e($mark->equation->name); ?></td>
                        <td><?php echo e($mark->get_fail); ?></td>
                        <td><?php echo e($mark->get_calculation); ?></td>
                        <td><?php echo e($mark->min); ?></td>
                        <td><?php echo e($mark->max); ?></td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('marks.destroy', $mark->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من حذف الرمز؟" data-target="#deleteModal">حذف</a>
                            </div>
                        </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    <?php echo $__env->make('layouts.modals.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/marks/index.blade.php ENDPATH**/ ?>