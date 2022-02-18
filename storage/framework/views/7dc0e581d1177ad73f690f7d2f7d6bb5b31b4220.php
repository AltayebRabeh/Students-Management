<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="d-flex mb-4">
            <h2 class="h4">نتائج البحث</h2>
        </div>
        <?php if($students->first()): ?>
            <div class="table-responsive">
                <!-- table -->
                <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>الرقم الجامعي</th>
                    <th>إسم الطالب</th>
                    <th>القسم</th>
                    <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($student->university_number); ?></td>
                    <td><?php echo e($student->name); ?></td>
                    <td><?php echo e($student->section->name); ?></td>
                    <td><?php echo e($student->classroom->name); ?></td>
                    <td><?php echo e($student->year->year); ?></td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-left" href="<?php echo e(route('students.edit', $student->id)); ?>">تعديل</a>
                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('students.destroy', $student->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من حذف الطالب" data-target="#deleteModal">حذف</a>
                        </div>
                    </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4">
                    <?php echo e($students->links()); ?>

                </div>
            </div>
        <?php endif; ?>

        <?php if($teachers->first()): ?>
            <hr>

            <div class="table-responsive">
                <!-- table -->
                <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>إسم الاستاذ</th>
                    <th>الوصف</th>
                    <th>القسم</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($teacher->name); ?></td>
                    <td><?php echo e(substr($teacher->description, 0, 30)); ?> ...</td>
                    <td><?php echo e($teacher->section->name); ?></td>
                    <td><?php echo $teacher->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>'; ?></td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-left" href="<?php echo e(route('teachers.edit', $teacher->id)); ?>">تعديل</a>
                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('teachers.destroy', $teacher->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من حذف الاستاذ؟" data-target="#deleteModal">حذف</a>
                        </div>
                    </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4">
                    <?php echo e($teachers->links()); ?>

                </div>
            </div>
        <?php endif; ?>

        <?php if($subjects->first()): ?>
            <hr>
            
            <div class="table-responsive">
                <!-- table -->
                <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>إسم المادة</th>
                    <th>الوصف</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($subject->name); ?></td>
                    <td><?php echo e(substr($subject->description, 0, 30)); ?> ...</td>
                    <td><?php echo $subject->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>'; ?></td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-left" href="<?php echo e(route('subjects.edit', $subject->id)); ?>">تعديل</a>
                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('subjects.destroy', $subject->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من حذف المادة" data-target="#deleteModal">حذف</a>
                        </div>
                    </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
                <div class="d-flex justify-content-center pt-4">
                    <?php echo e($subjects->links()); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/search.blade.php ENDPATH**/ ?>