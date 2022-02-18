<?php $__env->startSection('content'); ?>


    <div class="row">
    <!-- Small table -->
        <div class="col-md-12 my-4">
            <div class="d-flex mb-4">
                <h2 class="h4">المواد و الاساتذة</h2>
                <a href="<?php echo e(route('subjects-teachers.create')); ?>" class="btn btn-primary ml-auto">دمج</a>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <form action="<?php echo e(route('subjects-teachers.index')); ?>" method="get">
                        <?php echo method_field('GET'); ?>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <label for="section_id">إختار القسم</label>
                                <select name="section_id" class="form-control section_id" id="section_id">
                                    <option value=""></option>
                                    <?php if(cache('sections') != null): ?>
                                        <?php $__currentLoopData = cache('sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['section_id'];
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
                            <div class="col-md-2 mb-3">
                                <label for="classroom_id">إختيار الصف</label>
                                <select name="classroom_id" class="form-control classroom_id" id="classroom_id">
                                    <option value=""></option>
                                </select>
                                <?php $__errorArgs = ['classroom_id'];
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
                            <div class="col-md-2 mb-3">
                                <label for="semester_id">إختيار الفصل</label>
                                <select name="semester_id" class="form-control semester_id" id="semester_id">
                                    <option value=""></option>
                                </select>
                                <?php $__errorArgs = ['semester_id'];
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
                            <div class="col-md-2 mb-3">
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
                            <div class="col-md-1 mb-3 pt-1">
                                <button type="submit" class="btn btn-primary mt-4">بحث</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <!-- table -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>إسم المادة</th>
                                <th>إسم الاساتذ</th>
                                <th>القسم</th>
                                <th>الصف</th>
                                <th>الفصل</th>
                                <th>السنة</th>
                                <th>عدد الساعات</th>
                                <th>الحالة</th>
                                <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $subjectsTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjectTeacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($subjectTeacher->subject->name); ?></td>
                                <td><?php echo e($subjectTeacher->teacher->name); ?></td>
                                <td><?php echo e($subjectTeacher->section->name); ?></td>
                                <td><?php echo e($subjectTeacher->classroom->name); ?></td>
                                <td><?php echo e($subjectTeacher->semester->name); ?></td>
                                <td><?php echo e($subjectTeacher->year->year); ?></td>
                                <td><?php echo e($subjectTeacher->hours); ?></td>
                                <td><?php echo $subjectTeacher->deleted_at == null ? '<span class="badge badge-success">مفعل</span>' : '<span class="badge badge-danger">غير مفعل</span>'; ?></td>
                                <td>
                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('subjects-teachers.destroy', $subjectTeacher->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من حذف المادة و الاستاذ؟" data-target="#deleteModal">حذف</a>
                                        <a class="dropdown-item text-left delete-with-modal" href="javascript:void()" data-href="<?php echo e(route('subjects-teachers.enable-disable', $subjectTeacher->id)); ?>" data-toggle="modal" data-message="هل انت متاكد من التفعيل او إلغاء التفعيل؟" data-target="#deleteModal">تفعيل / إلغاء تفعيل</a>
                                    </div>
                                </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center pt-4">
                        <?php echo e($subjectsTeachers->links()); ?>

                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->

    <?php echo $__env->make('layouts.modals.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <?php echo $__env->make('layouts.extends.ajax-get-semesters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/subjects_teachers/index.blade.php ENDPATH**/ ?>