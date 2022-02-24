
<?php $__env->startSection('content'); ?>


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">المعادلات</h2>
                <a href="<?php echo e(route('equations.create')); ?>" class="btn btn-primary ml-auto">إضافة</a>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>إسم المعادلة</th>
                            <th>المعدل</th>
                            <th>معدل النجاح</th>
                            <th>عدد الرسوب في المواد</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $equations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($equation->name); ?></td>
                        <td><?php echo e($equation->cgp); ?></td>
                        <td><?php echo e($equation->cgp_success); ?></td>
                        <td><?php echo e($equation->fails); ?></td>
                        <td><?php echo $equation->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>'; ?></td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-left" href="<?php echo e(route('equations.edit', $equation->id)); ?>">تعديل</a>
                            <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('equations.destroy', $equation->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من حذف الطريقة الحسابية؟" data-target="#deleteModal">حذف</a>
                            </div>
                        </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        <?php echo e($equations->links()); ?>

                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    <?php echo $__env->make('layouts.modals.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/equations/index.blade.php ENDPATH**/ ?>