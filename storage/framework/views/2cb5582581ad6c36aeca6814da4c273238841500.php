
<?php $__env->startSection('content'); ?>

<div class="breadcrumb-banner">
    <div class="breadcrumb-banner-img">
        <img src="<?php echo e(show_image(file_path()['frontend']['path'].'/'.@frontend_section_data($breadcrumb->value,'image'),@frontend_section_data($breadcrumb->value,'image','size'))); ?>" alt="breadcrumb.jpg">
    </div> 
    <div class="page-Breadcrumb">
        <div class="Container">
            <div class="breadcrumb-container">
                <h1 class="breadcrumb-title"><?php echo e(($title)); ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">
                            <?php echo e(translate('home')); ?>

                        </a></li>

						<li class="breadcrumb-item active" aria-current="page">
							<?php echo e(translate($title)); ?>

						</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="" style="background:#404040 !important; padding:5rem 0rem !important;">
    <div class="Container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <h4 class="card-title">
                            <?php echo e(translate("Cart product list")); ?>

                        </h4>
                    </div>
                    <?php if(auth_user('web')): ?>

                        <a class="view-more-btn" href="<?php echo e(route('user.dashboard')); ?>">
                            <?php echo e(translate('Dashboard')); ?>

                        </a>

                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body cart-list position-relative">
                  <div class="cart-table">
                       <?php echo $__env->make('frontend.ajax.cart_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>

                 <div class="cart-item-loader loader-spinner d-none ">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/view_cart.blade.php ENDPATH**/ ?>