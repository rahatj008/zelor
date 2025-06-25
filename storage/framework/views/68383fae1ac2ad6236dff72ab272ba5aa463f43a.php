<section class="pb-80" style="background:#404040;">
    <div class="Container">
        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color: white;"><?php echo e(@frontend_section_data($digital_product_section->value,'heading')); ?> </h3>
                    <p style="color: white;"><?php echo e(@frontend_section_data($digital_product_section->value,'sub_heading')); ?></p>
                </div>
            </div>
            <div class="section-title-right">
                <a href="<?php echo e(route('digital.product')); ?>" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;">
                     <?php echo e(translate('View More')); ?>

                </a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="digital-product-banner sticky-side-div">
                    <img class="w-100" src="<?php echo e(show_image(file_path()['frontend']['path'].'/'.@frontend_section_data($digital_product_section->value,'image'),@frontend_section_data($digital_product_section->value,'image','size'))); ?>" alt="digital-product-banner.jpg">
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="row g-2 g-md-4">
                    <?php $__empty_1 = true; $__currentLoopData = $digital_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-xl-3 col-lg-4 col-6">
                            <div class="digital-product">
                                <a href="<?php echo e(route('digital.product.details', [$product->slug ? $product->slug : make_slug($product->name), $product->id])); ?>" class="digital-product-img">
                                    <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image,file_path()['digital_product']['featured']['size'])); ?>" alt="<?php echo e($product->featured_image); ?>">
                                </a>
                                <div class="digital-product-info">
                                    <h4 class="product-title">
                                        <?php echo e($product->name); ?>

                                    </h4>

                                    <div class="d-flex justify-content-between align-items-center my-4">
                                        <div class="product-price">

                                            <?php
                                                $price      =  $product->digitalProductAttribute
                                                                    ?@$product->digitalProductAttribute->where('status','1')->first()->price
                                                                    :0;
                                                $taxes      =  getTaxes(@$product,$price);
                                                $price      =  $price  + $taxes;
                                            ?>

                                            <span>
                                                <?php echo e(short_amount($price)); ?>

                                            </span>
                                        </div>
                                        <div class="ratting">
                                            <?php echo show_ratings($product->review->avg('rating')) ?>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(route('digital.product.details', [$product->slug ? $product->slug : make_slug($product->name), $product->id])); ?>" class="topup-btn ">
                                        <?php echo e(translate("Buy now")); ?>

                                    </a>
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
    </div>
</section>


<?php if( @frontend_section_data($promo_banner->value,'position') == 'digital-products'): ?>
   <?php echo $__env->renderWhen($promo_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>

<?php if( @frontend_section_data($promo_second_banner->value,'position') == 'digital-products'): ?>
    <?php echo $__env->renderWhen($promo_second_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_second_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/section/digital_product.blade.php ENDPATH**/ ?>