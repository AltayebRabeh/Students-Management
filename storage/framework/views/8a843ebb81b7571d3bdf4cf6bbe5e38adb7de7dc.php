<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">ترحيل جديد </h2>
            <p class="text-danger"><strong>ملحوظة </strong> إذا لم تختار شيئاً سيتم ترحيل كل الطلاب .</p>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <form action="<?php echo e(route('relays.store')); ?>" id="relays" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="section_id">إختار القسم</label>
                            <select name="section_id" class="form-control section_id" id="section_id">
                                <option value=""></option>
                                <?php $__currentLoopData = cache('sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="classroom_id">إختيار الصف</label>
                            <select name="classroom_id" class="form-control classroom_id" id="classroom_id">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="year_id">إختيار السنة</label>
                            <select name="year_id" class="form-control year_id" id="year_id">
                                <option value=""></option>
                                <?php if(cache('years') != null): ?>
                                    <?php $__currentLoopData = cache('years'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($year->id); ?>"><?php echo e($year->year); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <?php $__errorArgs = ['year_id'];
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
                        <div class="col-md-4 mb-3">
                            <label for="university_number">الرقم الجامعي</label>
                            <input type="text" name="university_number" class="form-control" id="university_number">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cgp">المعدل</label>
                            <input type="number" min="0" max="4" name="cgp" class="form-control" id="cgp">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="fails">عدد المواد المحمولة</label>
                            <input type="number" min="0" max="20" name="fails" class="form-control" id="fails">
                        </div>

                    </div>
                    <div class="col-md-1 mb-3 pt-1">
                        <button type="submit" id="btn-send" class="btn btn-primary mt-4">ترحيل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>



<script>

    $(document).ready(function() {

        // Send Data with AJAX
        $('#btn-send').click(function (event) {

            $(this).css('disabled', 'disabled');

            $('.loading').css("display", "flex");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            event.preventDefault();

            $('form#students select').removeClass('is-invalid');
            $('form#students input').removeClass('is-invalid');
            $('.text-danger').remove();

            $.ajax({
                type: "POST",
                url : "<?php echo e(route('relays.store')); ?>",
                data : $('form#relays').serialize(),

                success  : function(data) {
                    if(data) {
                        window.location.assign("<?php echo e(route('relays.index')); ?>");
                        $('.loading').css("display", "none");
                    }
                },
                error: function(data) {
                    for(const [key, value] of Object.entries(data.responseJSON.errors)) {
                        $('form#relays select[name="'+key+'"]').addClass('is-invalid').parent().append("<span class='text-danger d-block'>"+value+"</span>");
                        $('form#relays input[name="'+key+'"]').addClass('is-invalid').parent().append("<span class='text-danger d-block'>"+value+"</span>");
                    }

                    $('.loading').css("display", "none");
                }

            });

        });

    });


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/relays/create.blade.php ENDPATH**/ ?>