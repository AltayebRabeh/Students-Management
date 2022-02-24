<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة رمز </h2>
        </div>
        <form action="<?php echo e(route('marks.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="mark">الرمز</label>
                    <input type="text" name="mark" class="form-control" id="mark" value="" required>
                    <?php $__errorArgs = ['mark'];
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
                    <label for="min">من</label>
                    <input type="number" name="min" class="form-control" id="min" value="" required>
                    <?php $__errorArgs = ['min'];
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
                    <label for="max">الى</label>
                    <input type="number" name="max" class="form-control" id="max" value="" required>
                    <?php $__errorArgs = ['max'];
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
                <div class="col-md-2 col-sm-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="fail" class="custom-control-input" id="fail">
                    <label class="custom-control-label" for="fail">رسوب</label>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" name="calculation" class="custom-control-input" id="calculation" checked>
                      <label class="custom-control-label" for="calculation">تحسب في المعدل</label>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 text-right">
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
              </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/marks/create.blade.php ENDPATH**/ ?>