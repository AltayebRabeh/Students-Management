<?php $attributes = $attributes->exceptProps(['submit']); ?>
<?php foreach (array_filter((['submit']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
    <div <?php echo e($attributes->merge()); ?>>
        <div class="md:mt-0 md:col-span-2">
            <form wire:submit.prevent="<?php echo e($submit); ?>">
                <div class="<?php echo e(isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md'); ?>">
                    <div class="row">
                        <?php echo e($form); ?>

                    </div>
                </div>

                <?php if(isset($actions)): ?>
                        <?php echo e($actions); ?>

                <?php endif; ?>
            </form>
        </div>
    </div>
<?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/vendor/jetstream/components/form-section.blade.php ENDPATH**/ ?>