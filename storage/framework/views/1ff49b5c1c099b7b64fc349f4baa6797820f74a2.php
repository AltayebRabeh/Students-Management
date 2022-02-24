

<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">تعديل الطالب <?php echo e($student->name); ?></h2>
        </div>
        <form action="<?php echo e(route('students.update', $student->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>
            <input type="hidden" name="id" value="<?php echo e($student->id); ?>">
            <div class="form-row">
                <div class="col-md-8 mb-3">
                    <label for="name">إسم الطالب</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo e($student->name); ?>" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="university_number">الرقم الجامعي</label>
                    <input type="text" name="university_number" class="form-control" id="university_number" value="<?php echo e($student->university_number); ?>" required>
                    <?php $__errorArgs = ['university_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="section">القسم</label>
                    <select name="section_id" id="section" class="form-control" required>
                        <?php if(cache('sections') != null): ?>
                            <?php $__currentLoopData = cache('sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($section->id); ?>" <?php echo e($section->id == $student->section_id ? 'selected': ''); ?>><?php echo e($section->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <?php $__errorArgs = ['section_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="classroom">الصف الدراسي</label>
                    <select name="classroom_id" id="classroom" class="form-control" required>
                        <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($classroom->id); ?>" <?php echo e($classroom->id == $student->classroom->id ? 'selected': ''); ?>><?php echo e($classroom->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['classroom_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="year_id">السنة</label>
                    <select name="year_id" id="year_id" class="form-control">
                        <option></option>
                        <?php if(cache('years') != null): ?>
                            <?php $__currentLoopData = cache('years'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($year->id); ?>" <?php echo e($year->id == $student->year->id ? 'selected': ''); ?>><?php echo e($year->year); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <?php $__errorArgs = ['year_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <hr class="my-4">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/students/edit.blade.php ENDPATH**/ ?>