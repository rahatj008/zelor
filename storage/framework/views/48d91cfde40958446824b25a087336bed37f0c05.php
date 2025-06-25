
<!DOCTYPE html>
<html lang="en" data-layout-default="vertical" data-sidebar-size="lg" data-topbar="light" data-sidebar="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title><?php echo e((site_settings('site_name'))); ?> - <?php echo e(translate($title)); ?></title>
    <link rel="shortcut icon" href="<?php echo e(show_image('assets/images/backend/logoIcon/'.site_settings("site_favicon"),file_path()['favicon']['size'])); ?>" type="image/x-icon">
    <link href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/backend/css/root.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/backend/css/style.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/backend/css/custom.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/css/toastr.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/global/css/select2.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/global/css/select2.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/backend/css/flatpickr.min.css')); ?>" rel="stylesheet" type="text/css" />

    <?php echo $__env->yieldPushContent('style-include'); ?>
    <?php echo $__env->yieldPushContent('style-push'); ?>
</head>
<body>

    <div id="layout-container">
        <?php echo $__env->make('seller.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('seller.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-container">
            <?php echo $__env->yieldContent('main_content'); ?>
            <?php if(request()->routeIs('admin.order.print')): ?>
                <?php echo $__env->make('admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <script src="<?php echo e(asset('assets/global/js/jquery.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('assets/global/js/select2.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/pages/plugins/lord-icon-2.1.0.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/toastify-js.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/helper.js')); ?>"></script>
    <script  src="<?php echo e(asset('assets/backend/js/app.js')); ?>"></script>
    <script  src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('script-include'); ?>
    <?php echo $__env->yieldPushContent('script-push'); ?>

    <script>
        'use strict'

        flatpickr("#datePicker", {
            dateFormat: "Y-m-d",
            mode: "range",
        });
        $(".chanage_currency").on("click", function() {
            var currency = $(this).attr('data-value')
            window.location.href = "<?php echo e(route('home')); ?>/currency/change/"+currency;
        });
      
        $(document).on('click', '.note-btn.dropdown-toggle', function (e) {
                    var $clickedDropdown = $(this).next();
            $('.note-dropdown-menu.show').not($clickedDropdown).removeClass('show');
            $clickedDropdown.toggleClass('show');
            e.stopPropagation();
        });

        $(document).on('click', function(e) {

            if (!$(e.target).closest('.note-btn.dropdown-toggle').length) {
                $(".note-dropdown-menu").removeClass("show");
            }
        });
      
      
         
    </script>
</body>
</html>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/seller/layouts/app.blade.php ENDPATH**/ ?>