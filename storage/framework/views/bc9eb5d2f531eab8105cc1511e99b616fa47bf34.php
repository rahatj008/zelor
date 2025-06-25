<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-xl-4 col-lg-4 col-6">
        <div class="product-item">
            <div class="product-img">
                  <div class="todays-deal-cart">
                    <?php
                       $randNum = rand(6666,10000000);
                    ?>
                    <div class="product-action">
                        <a href="javascript:void(0)" data-product_id="<?php echo e($randNum); ?>" class="buy-now wave-btn addtocartbtn">
                            <span class="buy-now-icon icon-white"><svg  version="1.1"  x="0" y="0" viewBox="0 0 511.997 511.997"   xml:space="preserve" ><g><path d="M405.387 362.612c-35.202 0-63.84 28.639-63.84 63.84s28.639 63.84 63.84 63.84 63.84-28.639 63.84-63.84-28.639-63.84-63.84-63.84zm0 89.376c-14.083 0-25.536-11.453-25.536-25.536s11.453-25.536 25.536-25.536c14.083 0 25.536 11.453 25.536 25.536s-11.453 25.536-25.536 25.536zM507.927 115.875a19.128 19.128 0 0 0-15.079-7.348H118.22l-17.237-72.12a19.16 19.16 0 0 0-18.629-14.702H19.152C8.574 21.704 0 30.278 0 40.856s8.574 19.152 19.152 19.152h48.085l62.244 260.443a19.153 19.153 0 0 0 18.629 14.702h298.135c8.804 0 16.477-6.001 18.59-14.543l46.604-188.329a19.185 19.185 0 0 0-3.512-16.406zM431.261 296.85H163.227l-35.853-150.019h341.003L431.261 296.85zM173.646 362.612c-35.202 0-63.84 28.639-63.84 63.84s28.639 63.84 63.84 63.84 63.84-28.639 63.84-63.84-28.639-63.84-63.84-63.84zm0 89.376c-14.083 0-25.536-11.453-25.536-25.536s11.453-25.536 25.536-25.536 25.536 11.453 25.536 25.536-11.453 25.536-25.536 25.536z" opacity="1" data-original="#000000" ></path></g></svg></span>
                            <?php echo e(translate('Add to cart')); ?>

                        </a>
                    </div>
                    <form class="attribute-options-form-<?php echo e($randNum); ?>">
                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    </form>
                </div>
                <a href="<?php echo e(route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])); ?>">
                    <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($product->name); ?>">
                </a>
                <ul class="hover-action">
                    <li><a class="comparelist compare-btn wave-btn" data-product_id="<?php echo e($product->id); ?>" href="javascript:void(0)"><i class="fa-solid fa-code-compare"></i></a></li>
                </ul>
                <div class="quick-view">
                        <button class="quick-view-btn quick--view--product"  data-product_id="<?php echo e($product->id); ?>">
                            <svg  version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 519.644 519.644"   xml:space="preserve" ><g><path d="M259.822 427.776c-97.26 0-190.384-71.556-251.854-145.843-10.623-12.839-10.623-31.476 0-44.314 15.455-18.678 47.843-54.713 91.108-86.206 108.972-79.319 212.309-79.472 321.492 0 50.828 36.997 91.108 85.512 91.108 86.206 10.623 12.838 10.623 31.475 0 44.313-61.461 74.278-154.572 145.844-251.854 145.844zm0-304c-107.744 0-201.142 102.751-227.2 134.243a2.76 2.76 0 0 0 0 3.514c26.059 31.492 119.456 134.243 227.2 134.243s201.142-102.751 227.2-134.243c1.519-1.837-.1-3.514 0-3.514-26.059-31.492-119.456-134.243-227.2-134.243z"  data-original="#000000" ></path><path d="M259.822 371.776c-61.757 0-112-50.243-112-112s50.243-112 112-112 112 50.243 112 112-50.243 112-112 112zm0-192c-44.112 0-80 35.888-80 80s35.888 80 80 80 80-35.888 80-80-35.888-80-80-80z"  data-original="#000000" ></path></g></svg>
                            <?php echo e(translate("Quick View")); ?>

                        </button>
                </div>
                <?php if($product->discount_percentage > 0): ?>
                  <span class="offer-tag"><?php echo e(translate('off')); ?>  <?php echo e(round($product->discount_percentage)); ?> %  
              
                  </span>
                <?php endif; ?>
            </div>

            <div class="product-info todays-deal-product-info">
                <div class="ratting mb-0">
                    <?php echo show_ratings($product->review->avg('rating')) ?>
                </div>

   

                <h4 class="product-title">
                    <a href="<?php echo e(route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])); ?>">
                       <?php echo e($product->name); ?>

                    </a>
               </h4>

                <div class="product-price todays-deal-price">

                    <?php
                        $price      =  (@$product->stock->first()?->price ?? $product->price);
               
                    ?>
      
                    <?php if(($product->discount_percentage) > 0): ?>
                            <?php
                                    $discountPrice         =  cal_discount($product->discount_percentage,$price);

                            ?>
                            <span>
                                <?php echo e(short_amount($discountPrice)); ?>

                            </span>
                        <del>

                            <?php echo e(short_amount($price)); ?></del>
                    <?php else: ?>
                        <span>
                            <?php echo e(short_amount($price)); ?>

                        </span>

                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12">
        <?php echo $__env->make("frontend.partials.empty",['message' => 'No Product Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>


<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/product.blade.php ENDPATH**/ ?>