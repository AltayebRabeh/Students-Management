<div class="d-flex align-items-center justify-content-around">
    <img src="<?php echo e(cache('settings') != null ? asset('uploads/'.cache('settings')['report_logo']) : asset('uploads/settings/default.png')); ?>" width="80">
    <div><?php echo cache('settings')['report_header']; ?></div>
    <img src="<?php echo e(cache('settings') != null ? asset('uploads/'.cache('settings')['report_logo']) : asset('uploads/settings/default.png')); ?>" width="80">
</div>
<?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/layouts/extends/report-header.blade.php ENDPATH**/ ?>