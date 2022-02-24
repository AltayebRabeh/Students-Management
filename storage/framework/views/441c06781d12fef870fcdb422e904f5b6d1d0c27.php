
<?php $__env->startSection('content'); ?>


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">الترحيلات</h2>
                <a href="<?php echo e(route('relays.create')); ?>" class="btn btn-primary ml-auto">ترحيل جديد</a>
            </div>
            <p class="text-danger"><strong>ملحوظة </strong> لايمكنك إلغاء الترحيل إذا تم 48 ساعة وسيتم حذفه .</p>
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>نوع الترحيل</th>
                        <th>معدل الترحيل</th>
                        <th>مواد الرسوب</th>
                        <th>عدد المرحلين</th>
                        <th>التاريخ</th>
                        <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $relays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($relay->relay_type); ?></td>
                        <td><?php echo e($relay->cgp); ?></td>
                        <td><?php echo e($relay->fails); ?></td>
                        <td><?php echo e($relay->relay_students_count); ?></td>
                        <td><?php echo e($relay->created_at); ?></td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-left" href="<?php echo e(route('relays.details', $relay->id)); ?>">التفاصيل</a>
                                <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('relays.back', $relay->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من إسترجاع الترحيل؟" data-target="#deleteModal">إسترجاع</a>
                            </div>
                        </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center pt-4">
                        <?php echo e($relays->links()); ?>

                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    <?php echo $__env->make('layouts.modals.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>

    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Send Data with AJAX
        $('form').submit(function (event) {

            $(this).css('disabled', 'disabled');

            $('.loading').css("display", "flex");

            event.preventDefault();

            $.ajax({
                type: "DELETE",
                url : $(this).attr('action'),
                data : $('form').serialize(),

                success  : function(data) {
                    if(data) {
                        window.location.assign("<?php echo e(route('relays.index')); ?>");
                    }
                },
                error: function(data) {
                    $('.loading').css("display", "none");
                }

            });

        });

    });


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/relays/index.blade.php ENDPATH**/ ?>