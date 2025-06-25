<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/line-awesome.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/global.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/global/css/toastr.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo e(show_image('assets/images/backend/logoIcon/'.site_settings("site_favicon"),file_path()['favicon']['size'])); ?>" type="image/x-icon">

    <title>
            <?php echo e(@$title  ?? translate('Not Found')); ?>

    </title>
     <?php echo $__env->yieldPushContent('stylepush'); ?>
  </head>
  <body>

    <?php echo $__env->yieldContent('content'); ?>

    <script src="<?php echo e(asset('assets/global/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/toastify-js.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/helper.js')); ?>"></script>
    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('scriptpush'); ?>
  </body>
</html>

<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/layouts/error.blade.php ENDPATH**/ ?>