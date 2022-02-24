
<?php $__env->startSection('content'); ?>


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">الاقسام</h2>
                <a href="<?php echo e(route('sections.create')); ?>" class="btn btn-primary ml-auto">إضافة قسم</a>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>إسم القسم</th>
                        <th>الوصف</th>
                        <th>عدد الفصول</th>
                        <th>الحالة</th>
                        <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($section->name); ?></td>
                        <td><?php echo e(substr($section->description, 0, 30)); ?> ...</td>
                        <td><?php echo e($section->count_of_classroom); ?></td>
                        <td><?php echo $section->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>'; ?></td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-left" href="<?php echo e(route('sections.edit', $section->id)); ?>">تعديل</a>
                            <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('sections.destroy', $section->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من حذف القسم؟" data-target="#deleteModal">حذف</a>
                            </div>
                        </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        <?php echo e($sections->links()); ?>

                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    <?php echo $__env->make('layouts.modals.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/sections/index.blade.php ENDPATH**/ ?>