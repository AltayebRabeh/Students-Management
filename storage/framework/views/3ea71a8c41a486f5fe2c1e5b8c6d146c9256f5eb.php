<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(cache('settings') != null ? asset('uploads/'.cache('settings')['logo']) : asset('/uploads/settings/logo.png')); ?>">
    <title><?php echo e(cache('settings') != null ? cache('settings')['university_name'] : ''); ?> <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/simplebar.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/feather.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/app-light.css')); ?>" id="lightTheme">
    <link rel="stylesheet" href="<?php echo e(asset('css/app-dark.css')); ?>" id="darkTheme" disabled>
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/select2.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/toastr.min.css')); ?>">

  </head>
  <body class="vertical  light rtl ">
    <div class="wrapper">
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo $__env->make('layouts.modals.students-list-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('layouts.modals.supplements-list-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('layouts.modals.student-result-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div> <!-- .container-fluid -->
            <?php echo $__env->make('layouts.modals.notify-shortcut', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <div class="loading">
        <span></span>
        <p>يرجى الانتظار ...</p>
    </div>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tinycolor-min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.stickOnScroll.js')); ?>"></script>
    <script src="<?php echo e(asset('js/config.js')); ?>"></script>

    <?php echo $__env->make('layouts.extends.ajax-get-classrooms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('js'); ?>

    <script src="<?php echo e(asset('js/apps.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>

    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>

    <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
    <?php echo app('toastr')->render(); ?>
  </body>
</html>
<?php /**PATH /home/altayeb/Desktop/university/resources/views/layouts/main.blade.php ENDPATH**/ ?>