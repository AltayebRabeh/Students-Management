<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة نتيجة </h2>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>القسم</label>
                        <input type="text" class="form-control" value="<?php echo e($section['name']); ?>" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>إسم المادة</label>
                        <input type="text" class="form-control" value="<?php echo e($subject['name']); ?>" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>الصف</label>
                        <input type="text" class="form-control" value="<?php echo e($classroom['name']); ?>" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>الفصل</label>
                        <input type="text" class="form-control" value="<?php echo e($semester['name']); ?>" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>السنة الدراسية</label>
                        <input type="text" class="form-control" value="<?php echo e($year['year']); ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('grades.store')); ?>" method="POST" id="grades">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>

                    <input type="hidden" name="section_id" value="<?php echo e($section['id']); ?>">
                    <input type="hidden" name="classroom_id" value="<?php echo e($classroom['id']); ?>">
                    <input type="hidden" name="semester_id" value="<?php echo e($semester['id']); ?>">
                    <input type="hidden" name="year_id" value="<?php echo e($year['id']); ?>">
                    <input type="hidden" name="subject_teacher_id" value="<?php echo e($subject['id']); ?>">

                    <div class="form-row">
    .                  <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الرقم الجامعي</th>
                                    <th>إسم الطالب</th>
                                    <th>الدرجة</th>
                                    <th>العلامة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td>
                                            <input type="hidden" value="<?php echo e($student->id); ?>" name="grades[<?php echo e($loop->index); ?>][student_id]">
                                            <input type="text"
                                                value="<?php echo e($student->university_number); ?>"
                                                name="grades[<?php echo e($loop->index); ?>][university_number]"
                                                class="form-control" disabled>
                                        </td>
                                        <td>
                                            <input type="text"
                                                value="<?php echo e($student->name); ?>"
                                                name="grades[<?php echo e($loop->index); ?>][name]"
                                                class="form-control" disabled>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number"
                                                    value="<?php echo e(isset($student->grades->first()->grade) ? $student->grades->first()->grade : ''); ?>"
                                                    name="grades[<?php echo e($loop->index); ?>][grade]"
                                                    class="form-control grade"
                                                    data-mark="#mark-<?php echo e($student->id); ?>" >
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text"
                                                value="<?php echo e(isset($student->grades->first()->mark->mark) ? $student->grades->first()->mark->mark : ''); ?>"
                                                name="grades[<?php echo e($loop->index); ?>][mark]"
                                                class="form-control mark" id="mark-<?php echo e($student->id); ?>" disabled>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary btn-lg" id="btn-send" type="submit">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>

    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('keyup', '.grade',function(){

            var value = $(this).val(),
                markInput = $(this).data('mark');
            if(value){

                $.ajax({
                    type: "POST",
                    url : "<?php echo e(route('grades.get-marks-ajax')); ?>",
                    data : {grade: value},

                    success  : function(data) {
                        $(markInput).val(data);
                    },
                    error: function(data) {

                    }

                });
            } else {
                $(markInput).val('');
            }

        });

        // Send Data with AJAX
        $('#btn-send').click(function (event) {

            $(this).css('disabled', 'disabled');

            $('.loading').css("display", "flex");

            event.preventDefault();

            var x = document.querySelectorAll('.mark');

            x.forEach(el => {
                if(el.value == 'إدخال غير صحيح'){
                    $('.loading').css("display", "none");
                    el.classList.add('is-invalid');
                    el.focus();
                    throw new Error('درجة غير صحيحة');
                }
            });

            $('form#grades input').removeClass('is-invalid');
            $('.text-danger').remove();

            $.ajax({
                type: "POST",
                url : "<?php echo e(route('grades.store')); ?>",
                data : $('form#grades').serialize(),

                success  : function(data) {
                    if(data) {
                        window.location.assign("<?php echo e(route('grades.index')); ?>");
                    }
                },
                error: function(data) {
                    for(const [key, value] of Object.entries(data.responseJSON.errors)) {
                        arr = key.split('.');
                        if(arr.length == 1){
                            $('form#grades select[name="'+key+'"]').addClass('is-invalid').parent().append("<span class='text-danger d-block'>"+value+"</span>");
                            $('form#grades select[name="'+key+'"]').focus();
                        } else {
                            input = `${arr[0]}[${arr[1]}][${arr[2]}]`;
                            $('form#grades input[name="'+ input +'"]').addClass('is-invalid').parent().parent().append("<span class='text-danger d-block'>"+value+"</span>");
                            $('form#grades input[name="'+ input +'"]').focus();
                        }
                    }
                    $('.loading').css("display", "none");
                }

            });

        });

    });


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/grades/create.blade.php ENDPATH**/ ?>