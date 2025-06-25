
<section class="pb-80" style="background:#404040;">
    <div class="Container">
        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color: white;"><?php echo e(@frontend_section_data($top_brands_sections->value,'heading')); ?> </h3>
                    <p style="color: white;"><?php echo e(@frontend_section_data($top_brands_sections->value,'sub_heading')); ?></p>
                </div>
            </div>
            <div class="section-title-right">
              <a href="<?php echo e(route('top.brand')); ?>" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;">
                   <?php echo e(translate("View More")); ?>

                </a>
            </div>
        </div>

        <div class="row g-2 g-sm-4">
            <?php $__empty_1 = true; $__currentLoopData = $brands->take(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                    <a href="<?php echo e(route('brand.product', [ $brand->slug ? $brand->slug :  make_slug(get_translation($brand->name)), $brand->id])); ?>" class="brand-item">
                        <div class="top-brand-logo">
                                <img src="<?php echo e(show_image(file_path()['brand']['path'].'/'.$brand->logo ,file_path()['brand']['size'])); ?>" alt="<?php echo e($brand->logo); ?>">
                        </div>
                        <div class="top-brand-info">
                            <h5 class="text-break"><?php echo e(@(get_translation($brand->name))); ?></h5>
                                <p class="fs-12">
                                        (<?php echo e(($brand->houseProduct->count())); ?>)
                                    <?php echo e(translate('Products')); ?>

                                </p>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <?php echo $__env->make("frontend.partials.empty",['message' => 'No product found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if( @frontend_section_data($promo_banner->value,'position') == 'top-brands'): ?>
    <?php echo $__env->renderWhen($promo_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>

<?php if( @frontend_section_data($promo_second_banner->value,'position') == 'top-brands'): ?>
    <?php echo $__env->renderWhen($promo_second_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_second_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/section/top_brand.blade.php ENDPATH**/ ?>