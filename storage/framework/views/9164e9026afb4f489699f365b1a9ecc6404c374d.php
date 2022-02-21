<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(cache('settings') != null ? asset('uploads/'.cache('settings')['logo']) : ''); ?>">
    <title><?php echo e(cache('settings') != null ? cache('settings')['university_name'] : ''); ?></title>

    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app-light.css')); ?>" id="lightTheme">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/toastr.min.css')); ?>">  </head>
  <body class="light rtl">
    <div class="wrapper vh-100" style="overflow: hidden">
        <?php echo e($slot); ?>

    </div>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
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

    <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
    <?php echo app('toastr')->render(); ?>
  </body>
</html>
</body>
</html>
<?php /**PATH /home/altayeb/Desktop/university/resources/views/layouts/auth.blade.php ENDPATH**/ ?>