<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة معادلة </h2>
        </div>
        <form action="<?php echo e(route('equations.store')); ?>" method="post" novalidate>
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="name">إسم المعادلة</label>
                    <input type="text" name="name" class="form-control" id="name" value="" required>
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
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="cgp">المعدل</label>
                    <input type="number" min="0.00" step="0.01"  name="cgp" class="form-control" id="cgp" value="" required>
                    <?php $__errorArgs = ['cgp'];
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
                    <label for="cgp_success">معدل النجاح</label>
                    <input type="number" min="0.00" step="0.01"  name="cgp_success" class="form-control" id="cgp_success" value="" required>
                    <?php $__errorArgs = ['cgp_success'];
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
                    <label for="fails">عدد مواد الرسوب</label>
                    <input type="number" min="0" step="1" name="fails" class="form-control" id="fails" value="" required>
                    <?php $__errorArgs = ['fails'];
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
                    <p class="alert alert-info">
                        يقصد <strong>بـعدد مواد الرسوب</strong> عدد المواد التي يرسبها الطالب في الفصل اكثر منها يعتبر الطالب راسباً و عندما يتم الترحيل إذا لم يتم تحديد قيم لن يرحلو الطلاب الذين يعتبرون راسبون
                        <br>
                        ويقصد <strong>بـمعدل النجاح </strong> كالسابق إذا كان معدل الطالب اقل من معدل النجاح
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
                <div class="col-md-6 col-sm-6">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" value="1" name="status" class="custom-control-input" id="status">
                    <label class="custom-control-label" for="status">مفعل</label>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/equations/create.blade.php ENDPATH**/ ?>