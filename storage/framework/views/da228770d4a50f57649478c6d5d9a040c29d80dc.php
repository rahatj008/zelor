<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title><?php echo e($title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo e(show_image('assets/images/backend/logoIcon/'.site_settings("site_favicon"),file_path()['favicon']['size'])); ?>" type="image/x-icon">
    <link href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/global/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/backend/css/root.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/backend/css/auth.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/css/toastr.css')); ?>" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-content auth--bg">
        <?php echo $__env->yieldContent('main_content'); ?>
    </div>
    <script src="<?php echo e(asset('assets/global/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/global/js/toastify-js.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/helper.js')); ?>"></script>
    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('script-push'); ?>
</body>

</html>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/layouts/auth.blade.php ENDPATH**/ ?>