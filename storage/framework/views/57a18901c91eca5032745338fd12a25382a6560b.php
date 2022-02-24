
<div class="modal fade" id="generalListModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="generalModal" action="" method="GET">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="section_id">القسم</label>
                            <select name="section_id" class="form-control">
                                <option disable></option>
                                <?php if(cache('sections') != null): ?>
                                    <?php $__currentLoopData = cache('sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="year_id">السنة</label>
                            <select name="year_id" class="form-control">
                                <option disable></option>
                                <?php if(cache('years') != null): ?>
                                    <?php $__currentLoopData = cache('years'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($year->id); ?>"><?php echo e($year->year); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="classroom_id">الصف الدراسي</label>
                            <select name="classroom_id" class="form-control">

                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="semester_id">الفصل الدراسي</label>
                            <select name="semester_id" class="form-control">

                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="subject_teacher_id">إختيار المادة</label>
                            <select name="subject_teacher_id" class="form-control subject_teacher_id" id="subject_teacher_id">

                            </select>
                            <?php $__errorArgs = ['subject_teacher_id'];
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn mb-2 btn-success">متابعة</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/layouts/modals/general-list-modal.blade.php ENDPATH**/ ?>