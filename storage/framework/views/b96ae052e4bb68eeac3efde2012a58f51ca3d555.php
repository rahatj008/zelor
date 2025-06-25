
<?php $__env->startSection('content'); ?>

<section class="payment-success pt-80 pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
               <div class="payment-wrapper">
                    <div class="text-center mb-5">

                        <h3 class="order-title">
                            <?php echo e(translate('Your order has been recived')); ?> 
                        </h3>

                        <div class="icon icon-success">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" /><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>
                        </div>

                        <div class="title">
                            <h4 class="mb-2">
                                <?php echo e(translate('Thanks for your order')); ?>

                            </h4>
                            <p>
                                <?php echo e(translate('Order ID')); ?> : <?php echo e($order->order_id); ?>

                            </p>
                            <small class="mt-2">
                                      <?php echo e(translate(
                                        'An order confirmation email has been sent to your billing address'
                                      )); ?>

                            </small>
                        </div>
                    </div>

                
                    <div class="buttons-group d-flex flex-wrap align-items-center justify-content-center gap-4">
                        <a href="<?php echo e(route('home')); ?>" class="dark--btn"><i class="las la-home me-3"></i>
                            <?php echo e(translate("Back To Home")); ?>

                        </a>

                        <a href="<?php echo e(route('user.track.order',$order->order_id)); ?>" class="dark--btn dark--btn-outline">
                            <i class="las la-map-marker me-3"></i>
                            <?php echo e(translate("Tracking Order")); ?>

                        </a>
                    </div>

               </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/order_success.blade.php ENDPATH**/ ?>