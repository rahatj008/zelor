<section class="pt-80 pb-80" style="background:#404040;">
    <div class="Container">
        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color: white;"><?php echo e(@frontend_section_data($top_product_section->value,'heading')); ?> </h3>
                    <p style="color: white;"><?php echo e(@frontend_section_data($top_product_section->value,'sub_heading')); ?></p>
                </div>
            </div>
            <div class="section-title-right">
                <a href="<?php echo e(route('product')); ?>" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;">
                     <?php echo e(translate('View More')); ?>

                </a>
            </div>

        </div>

        <div class="best-selling-items">
            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $top_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="best-selling-item">
                            <div class="product-img">
                                <a href="<?php echo e(route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])); ?>">
                                    <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($product->featured_image); ?>">
                                </a>
                            </div>
                            <div class="product-info w-100">
                                <div class="stock-status">

                                    <div class='<?php echo e(($product->stock->sum("qty")) > 0 ? "instock": "outstock"); ?> mt-0 mb-2'>
                                        <i class='<?php if(($product->stock->sum("qty")) > 0): ?> fa-solid fa-circle-check <?php else: ?> fas fa-times-circle <?php endif; ?>'></i>
                                        <p><?php echo e(($product->stock->sum("qty")) > 0 ? translate('In Stock') :  translate('Stock out')); ?></p>
                                    </div>

                                </div>
                                  <div class="priceAndRatting">
                                        <div class="ratting">
                                            <?php echo show_ratings($product->review->avg('rating')) ?>
                                        </div>


                                            <div class="product-price">

                                                <?php
                                                    $price      =  (@$product->stock->first()?->price ?? $product->price);
                 
                       
                                                ?>

                                                <?php if(($product->discount_percentage) > 0): ?>

                                                    <span>
                                                        <?php echo e(short_amount(cal_discount($product->discount_percentage,$price))); ?>

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
                                    <h4 class="product-title">
                                        <a href="<?php echo e(route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])); ?>">
                                           <?php echo e($product->name); ?>

                                        </a>
                                    </h4>



                                <?php
                                    $randNum = rand(1,10000000);
                                    $randNum  = $randNum."-".$randNum;
                                ?>
                                <form class="attribute-options-form-<?php echo e($randNum); ?>">
                                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                </form>

                                <?php
                                    $authUser       = auth_user('web');
                                    $wishedProducts = $authUser ? $authUser->wishlist->pluck('product_id')->toArray() : [];
                                ?>

                                <div class="product-action">
                                    <a href="javascript:void(0)"  data-product_id = '<?php echo e($randNum); ?>' class="buy-now addtocartbtn">
                                        <span class="buy-now-icon"><svg  version="1.1"  x="0" y="0" viewBox="0 0 511.997 511.997"   xml:space="preserve" ><g><path d="M405.387 362.612c-35.202 0-63.84 28.639-63.84 63.84s28.639 63.84 63.84 63.84 63.84-28.639 63.84-63.84-28.639-63.84-63.84-63.84zm0 89.376c-14.083 0-25.536-11.453-25.536-25.536s11.453-25.536 25.536-25.536c14.083 0 25.536 11.453 25.536 25.536s-11.453 25.536-25.536 25.536zM507.927 115.875a19.128 19.128 0 0 0-15.079-7.348H118.22l-17.237-72.12a19.16 19.16 0 0 0-18.629-14.702H19.152C8.574 21.704 0 30.278 0 40.856s8.574 19.152 19.152 19.152h48.085l62.244 260.443a19.153 19.153 0 0 0 18.629 14.702h298.135c8.804 0 16.477-6.001 18.59-14.543l46.604-188.329a19.185 19.185 0 0 0-3.512-16.406zM431.261 296.85H163.227l-35.853-150.019h341.003L431.261 296.85zM173.646 362.612c-35.202 0-63.84 28.639-63.84 63.84s28.639 63.84 63.84 63.84 63.84-28.639 63.84-63.84-28.639-63.84-63.84-63.84zm0 89.376c-14.083 0-25.536-11.453-25.536-25.536s11.453-25.536 25.536-25.536 25.536 11.453 25.536 25.536-11.453 25.536-25.536 25.536z" opacity="1" data-original="#000000" ></path></g></svg></span>
                                        <?php echo e(translate("Add to cart")); ?>

                                    </a>
                                    <button data-product_id ="<?php echo e($product->id); ?>" class="heart-btn wishlistitem"><i class="<?php if(in_array($product->id,$wishedProducts)): ?>
                                        fa-solid
                                    <?php else: ?>
                                        fa-regular
                                    <?php endif; ?> fa-heart"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <?php echo $__env->make("frontend.partials.empty",['message' => 'No product found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php if( @frontend_section_data($promo_banner->value,'position') == 'top-products'): ?>
  <?php echo $__env->renderWhen($promo_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>

<?php if( @frontend_section_data($promo_second_banner->value,'position') == 'top-products'): ?>
    <?php echo $__env->renderWhen($promo_second_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_second_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/section/top_product.blade.php ENDPATH**/ ?>