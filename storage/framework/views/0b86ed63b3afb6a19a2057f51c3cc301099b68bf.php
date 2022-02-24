<div class="modal fade" id="studentListModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('students.list')); ?>" id="studentListForm" method="GET">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">عرض قائمة الطلاب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="section">القسم</label>
                            <select name="section_id" id="section" class="form-control">
                                <option></option>
                                <?php if(cache('sections') != null): ?>
                                    <?php $__currentLoopData = cache('sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="classroom">الصف الدراسي</label>
                            <select name="classroom_id" id="classroom" class="form-control">

                            </select>
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
<?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/layouts/modals/students-list-modal.blade.php ENDPATH**/ ?>