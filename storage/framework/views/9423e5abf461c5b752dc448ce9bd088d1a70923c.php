

<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة سنة دراسية </h2>
        </div>
        <form action="<?php echo e(route('years.update', $year->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="from">من</label>
                    <input type="number" name="from" class="form-control" id="from" value="<?php echo e(explode('-', $year->year)[0]); ?>" required>
                    <?php $__errorArgs = ['from'];
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
                <div class="col-md-6 mb-3">
                    <label for="to">إلى</label>
                    <input type="number" name="to" class="form-control" id="to" value="<?php echo e(explode('-', $year->year)[1]); ?>" required>
                    <?php $__errorArgs = ['to'];
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
                    <input type="checkbox" name="status" class="custom-control-input" id="status" <?php echo e($year->deleted_at == null ? 'checked' : ''); ?>>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/years/edit.blade.php ENDPATH**/ ?>