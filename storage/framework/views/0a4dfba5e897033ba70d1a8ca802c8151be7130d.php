
<?php $__env->startSection('content'); ?>


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">الطلاب</h2>
                <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary ml-auto">إضافة طلاب</a>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <form action="<?php echo e(route('students.index')); ?>" method="get">
                        <?php echo method_field('GET'); ?>
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="section_id">إختار القسم</label>
                                <select name="section_id" class="form-control section_id" id="section_id">
                                    <option value=""></option>
                                    <?php if(cache('sections') != null): ?>
                                        <?php $__currentLoopData = cache('sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['section_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="classroom_id">إختيار الصف</label>
                                <select name="classroom_id" class="form-control classroom_id" id="classroom_id">
                                    <option value=""></option>
                                </select>
                                <?php $__errorArgs = ['classroom_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-1 mb-3 pt-1">
                                <button type="submit" class="btn btn-primary mt-4">عرض</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>الرقم الجامعي</th>
                        <th>إسم الطالب</th>
                        <th>القسم</th>
                        <th>الصف</th>
                        <th>السنة</th>
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
                            <a class="dropdown-item text-left" href="<?php echo e(route('students.show', $student->uuid)); ?>">عرض</a>
                            <a class="dropdown-item text-left" href="<?php echo e(route('students.edit', $student->uuid)); ?>">تعديل</a>
                            <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('archive.archive', $student->id)); ?>" data-toggle="modal" data-message="هل انت متاكد؟" data-target="#deleteModal">ارشفة</a>
                            <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('students.destroy', $student->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من الحذف سوف تفقد كل بيانات الطالب؟" data-target="#deleteModal">حذف</a>
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
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    <?php echo $__env->make('layouts.modals.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/students/index.blade.php ENDPATH**/ ?>