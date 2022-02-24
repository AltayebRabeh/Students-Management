

<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">تعديل القسم <?php echo e($section->name); ?></h2>
        </div>
        <form action="<?php echo e(route('sections.update', $section->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>
            <input type="hidden" name="id" value="<?php echo e($section->id); ?>">
            <div class="form-row">
                <div class="col-md-8 mb-3">
                    <label for="name">إسم القسم</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo e($section->name); ?>" required>
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
                    <label for="count_of_classroom">عدد الصفوف</label>
                    <input type="number" name="count_of_classroom" class="form-control" id="count_of_classroom" value="<?php echo e($section->count_of_classroom); ?>" required>
                    <?php $__errorArgs = ['count_of_classroom'];
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
                <div class="col-md-12 mb-3">
                    <label for="description">الوصف</label>
                    <textarea name="description" class="form-control" id="description"><?php echo e($section->description); ?></textarea>
                    <?php $__errorArgs = ['description'];
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
            <div class="form-row">
                <div class="col-md-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="status" class="custom-control-input" id="status" <?php echo e($section->deleted_at == null ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="status">مفعل</label>
                  </div>
                </div>
                <div class="col-md-6 text-right">
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
              </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/sections/edit.blade.php ENDPATH**/ ?>