<?php $__env->startSection('content'); ?>

<div class="row">
    <!-- Small table -->
    <div class="col-md-12 my-4">
        <div class="mb-4">
            <h2 class="h4">إضافة|تعديل نتيجة طالب </h2>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>إسم الطالب</label>
                        <input type="text" class="form-control" value="<?php echo e($student->name); ?>" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>الرقم الجامعي</label>
                        <input type="text" class="form-control" value="<?php echo e($student->university_number); ?>" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>القسم</label>
                        <input type="text" class="form-control" value="<?php echo e($section->name); ?>" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>الصف</label>
                        <input type="text" class="form-control" value="<?php echo e($classroom->name); ?>" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>الفصل</label>
                        <input type="text" class="form-control" value="<?php echo e($semester->name); ?>" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>السنة الدراسية</label>
                        <input type="text" class="form-control" value="<?php echo e($year->year); ?>" disabled>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-11 mb-3">
                        <label for="subject">إختار المادة</label>
                        <select name="subject" class="form-control subject" id="subject">
                            <option value=""></option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->subject->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-1 mb-3 pt-1">
                        <button type="submit" id="btnAddSubject" class="btn btn-primary mt-4">إدخال</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('student-grades.store')); ?>" method="POST" id="grades">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>

                    <input type="hidden" name="student_id" value="<?php echo e($student->id); ?>">
                    <input type="hidden" name="university_number" value="<?php echo e($student->university_number); ?>">
                    <input type="hidden" name="section_id" value="<?php echo e($section->id); ?>">
                    <input type="hidden" name="classroom_id" value="<?php echo e($classroom->id); ?>">
                    <input type="hidden" name="semester_id" value="<?php echo e($semester->id); ?>">
                    <input type="hidden" name="year_id" value="<?php echo e($year->id); ?>">

                    <div class="form-row">
    .                  <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th>إسم المادة</th>
                                    <th>الدرجة</th>
                                    <th>العلامة</th>
                                    <th>ملحق</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody id="dataEntry">
                                <?php $__currentLoopData = $subjectsTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjectTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <input type="text"
                                                value="<?php echo e($subjectTeacher->subject->name); ?>"
                                                name="grades[<?php echo e($loop->index); ?>][name]"
                                                class="form-control subject-name" disabled>
                                                <input type="hidden" value="<?php echo e($subjectTeacher->id); ?>" name="grades[<?php echo e($loop->index); ?>][subject_teacher_id]">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number"
                                                    value="<?php echo e(isset($subjectTeacher->grades->first()->grade) ? $subjectTeacher->grades->first()->grade : ''); ?>"
                                                    name="grades[<?php echo e($loop->index); ?>][grade]"
                                                    class="form-control grade"
                                                    data-mark=".mark-<?php echo e($subjectTeacher->id); ?>" >
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text"
                                                value="<?php echo e(isset($subjectTeacher->grades->first()->mark->mark) ? $subjectTeacher->grades->first()->mark->mark : ''); ?>"
                                                name="grades[<?php echo e($loop->index); ?>][mark]"
                                                class="form-control mark-<?php echo e($subjectTeacher->id); ?>" disabled>
                                        </td>
                                        <td>
                                            <input type="checkbox"
                                                value="1"
                                                name="grades[<?php echo e($loop->index); ?>][fail]"
                                                class="form-control" 
                                                <?php echo e(isset($subjectTeacher->grades->first()->fail) && $subjectTeacher->grades->first()->fail == 1 ? 'checked' : ''); ?>>
                                        </td>
                                        <td>
                                            <span class="btn btn-danger remove-subject"><i class="fe fe-trash"></i></span>
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

        $(document).on('keyup', '.grade', function(){

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

        setInterval(() => {
            $('form#grades input').removeClass('is-invalid');
            $('.text-danger').remove();
        }, 20000);

        // remove row
        $(document).on('click', '.remove-subject', function(e){
            e.preventDefault();
            $(this).parent().parent().remove();
        })

        // Send Data with AJAX
        $('#btn-send').click(function (event) {

            $('.loading').css("display", "flex");

            event.preventDefault();

            $('form#grades input').removeClass('is-invalid');
            $('.text-danger').remove();

            $.ajax({
                type: "POST",
                url : "<?php echo e(route('student-grades.store')); ?>",
                data : $('form#grades').serialize(),

                success  : function(data) {
                    if(data) {
                        window.location.assign("<?php echo e(route('student-grades.index')); ?>");
                    }
                },
                error: function(data) {
                    for(const [key, value] of Object.entries(data.responseJSON.errors)) {
                        arr = key.split('.');
                        if(arr.length == 1){
                            $('form#grades select[name="'+key+'"]').addClass('is-invalid').parent().append("<span class='text-danger d-block'>"+value+"</span>");
                        } else {
                            input = `${arr[0]}[${arr[1]}][${arr[2]}]`;
                            $('form#grades input[name="'+ input +'"]').addClass('is-invalid').parent().parent().append("<span class='text-danger d-block'>"+value+"</span>");
                        }
                    }

                    $('.loading').css("display", "none");
                }

            });
        });

        
        let counter = 999;
        $("#btnAddSubject").click((event)=>{
            $(".text-danger").remove();
            if($("#subject").val() != '') {
                var inputs = document.querySelectorAll('.subject-name'),
                    subjectId = $("#subject").val(),
                    subjectValue = $("#subject option:selected").text();
                

                inputs.forEach(element => {
                    if(element.value == subjectValue) {
                        $("#subject").parent().append('<span class="text-danger">هذه المادة موجودة </span>');
                        throw new Error('المادة موجودة من قبل');
                    }
                });

                var appendData = `<tr>
                                        <td>
                                            <input type="text" value="${subjectValue}" name="grades[${counter}][name]" class="form-control subject-name" disabled>
                                                <input type="hidden" value="${subjectId}" name="grades[${counter}][subject_teacher_id]">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" name="grades[${counter}][grade]" class="form-control grade" data-mark=".mark-${counter}" >
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" name="grades[${counter}][mark]" class="form-control mark-${counter}" disabled>
                                        </td>
                                        <td>
                                            <input type="checkbox" value="1" name="grades[${counter}][fail]" class="form-control">
                                        </td>
                                        <td>
                                            <span class="btn btn-danger remove-subject"><i class="fe fe-trash"></i></span>
                                        </td>
                                    </tr>`;


                
                $("#dataEntry").append(appendData);
                counter++;
            }

        })

    });


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/student_grades/create.blade.php ENDPATH**/ ?>