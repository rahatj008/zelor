


<?php $__env->startPush('stylepush'); ?>

<style>
    .page_404 {
        width: 100%;
        height:100vh;
        background: #fff;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .page_404 img {
      width: 100%;
    }

    .four_zero_four_bg {
        background-image: url(<?php echo e(asset('assets/images/error.gif')); ?>);
        height: 400px;
        background-position: center;
    }

    .four_zero_four_bg > h1 {
        font-size: 80px;
    }

    .contant_box_404 > h3 {
        font-size: 6rem;
        margin-bottom: 2rem;
    }
    .link_404 {
        color: var(--text-primary) !important;
        background: var(--primary);
        padding: 1rem 2rem;
        margin: 2rem 0;
        display: inline-block;
        border-radius: var(--radius-8);
    }
    .contant_box_404 {
        margin-top:2rem;
    }
</style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <div class="four_zero_four_bg" >
                            <h1 class="text-center">404</h1>
                        </div>

                        <div class="contant_box_404">
                            <h3>
                                <?php echo e(translate("Look like you're lost")); ?>

                            </h3>

                            <p class="fs-18 text-muted" >
                                <?php echo e(translate("We can't seem to find the page that you're looking for")); ?>

                            .</p>
                            <a href="<?php echo e(route('home')); ?>" class="link_404">
                                <?php echo e(translate("Go to Home")); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/error.blade.php ENDPATH**/ ?>