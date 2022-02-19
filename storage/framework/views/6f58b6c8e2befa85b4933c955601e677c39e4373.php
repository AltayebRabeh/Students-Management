<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/quill.snow.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12 my-4">
            <h2 class="h4">الاعدادات</h2>
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?php echo e(route('settings.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group mb-4">
                                <input type="hidden" name="settings[<?php echo e($loop->iteration); ?>][key]" value="<?php echo e($setting->key); ?>">
                                <input type="hidden" name="settings[<?php echo e($loop->iteration); ?>][type]" value="<?php echo e($setting->type); ?>">
                                <label for="value"><?php echo e($setting->name); ?></label>

                                <?php if($setting->type == 'image'): ?>
                                    <input type="file" name="settings[<?php echo e($loop->iteration); ?>][value]" class="form-control"">
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <br>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    
                                    <?php if($setting->value != ''): ?>
                                        <img height="100" src="<?php echo e(asset('uploads/'.$setting->value)); ?>" alt="<?php echo e($setting->name); ?>" class="avatar-img rounded-circle pt-2">
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if($setting->type == 'text'): ?>
                                    <input type="text" name="settings[<?php echo e($loop->iteration); ?>][value]" class="form-control" value="<?php echo e($setting->value); ?>">
                                <?php endif; ?>

                                <?php if($setting->type == 'long-text'): ?>
                                    <div id="editor" style="min-height:100px;"><?php echo $setting->value; ?></div>
                                    <textarea name="settings[<?php echo e($loop->iteration); ?>][value]" id="editorInput" class="d-none"></textarea>
                                <?php endif; ?>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <input type="submit" value="حفظ" class="btn btn-primary save">
                    </form>
                </div>
            </div>
        </div> 
    </div> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/quill.min.js')); ?>"></script>
    <script>
        var editor = document.getElementById('editor');
        var editorInput = document.getElementById('editorInput');
        var save = document.querySelector('.save');

        save.onclick = (e) => {
            editorInput.innerHTML = editor.firstElementChild.innerHTML;
        }

        if (editor)
        {
            var toolbarOptions = [

                [
                    {
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }
                ],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [
                    {
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [
                    {
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [
                    {
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [
                    {
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [
                    {
                        'direction': 'rtl'
                    }
                ], // text direction
                [
                    {
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [
                    {
                        'align': []
                    }
                ],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor,
            {
                modules:
                {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
      
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/altayeb/Desktop/university/resources/views/settings/index.blade.php ENDPATH**/ ?>