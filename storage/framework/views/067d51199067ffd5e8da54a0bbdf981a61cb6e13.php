<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="previous-review">
        <div class="previous-review-content">
            <div class="previous-review-user">
                <img src="<?php echo e(show_image(file_path()['profile']['user']['path'].'/'.$product_rating->customer->image,file_path()['profile']['user']['size'])); ?>" alt="<?php echo e(@$product_rating->customer->image); ?>" />
            </div>
            <div class="flex-grow-1">
                <div class="d-flex w-100 align-items-start justify-content-between gap-3">
                    <div class="previous-review-info w-100">
                        <h4><?php echo e($product_rating->customer->name); ?></h4>
                        <small><?php echo e(get_date_time($product_rating->created_at, 'M d, Y')); ?></small>
                    </div>
                    <div class="ratting ">
                        <?php echo show_ratings(($product_rating->rating)) ?>
                    </div>
                </div>
                <p class="comment-text">
                    <?php echo e(($product_rating->review)); ?>

                </p>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/review.blade.php ENDPATH**/ ?>