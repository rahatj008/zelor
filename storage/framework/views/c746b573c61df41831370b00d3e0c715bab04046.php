
<?php if($items->count() != 0): ?>
   <?php
     $subTotal = 0;
   ?>
    <div class="cart-products">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart-product">
                    <div class="cart-product-img">
                        <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$data->product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($data->product->name); ?>">
                    </div>
                <div class="cart-product-info">
                    <h4 class="cart-product-title"><a href="<?php echo e(route('product.details',[$data->product->slug ? $data->product->slug :  make_slug($data->product->name),$data->product->id])); ?>"><?php echo e($data->product->name); ?></a></h4>
                    <span class="cart-product-price">
                    
                        <?php echo e($data->quantity); ?>  X <?php echo e(short_amount($data->price - $data->total_taxes)); ?> </span>
                </div>
                <span data-id="<?php echo e($data->id); ?>" class="remove-product addtocart-remove-btn remove-cart-data"><i class="fa-solid fa-xmark"></i></span>
            </div>
             <?php
                $subTotal+= (($data->price - $data->total_taxes)*$data->quantity);
             ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <div class="cart-product-total-price">
        <span><?php echo e(translate("Total")); ?>: </span>
        <small> <?php echo e(short_amount($subTotal)); ?> </small>
    </div>

    <div class="cart-product-action">
        <a href="<?php echo e(route('cart.view')); ?>" class="btn--fill">
            <?php echo e(translate("View Cart")); ?>

        </a>
        <a href="<?php echo e(route('user.checkout')); ?>">
             <?php echo e(translate("Checkout")); ?>

        </a>
    </div>

    <div class="cart-loader loader-spinner d-none">
        <div class="spinner-border" role="status">
            <span class="visually-hidden"></span>
        </div>
   </div>

 <?php else: ?>

        <div class="empty-cart">
            <p class="fs-14 text-muted "><?php echo e(translate('No product available in your Cart')); ?></p>
        </div>
 <?php endif; ?>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/cart_item.blade.php ENDPATH**/ ?>