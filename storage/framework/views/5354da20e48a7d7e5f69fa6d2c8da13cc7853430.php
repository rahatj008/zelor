<section class="pt-80 pb-80" style="background:#404040;">
    <div class="Container">
        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color: white;"><?php echo e(@frontend_section_data($top_category->value,'heading')); ?> </h3>
                    <p style="color: white;"><?php echo e(@frontend_section_data($top_category->value,'sub_heading')); ?></p>
                </div>
            </div>
            <div class="section-title-right d-flex flex-row align-items-center gap-4">
                <a href="<?php echo e(route('top.category')); ?>" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;"><?php echo e(translate("View More")); ?> </a>
            </div>
        </div>

        <div class="position-relative">
            <div class="swiper categorie-items category-slider">
                <div class="swiper-wrapper">
                    <?php $__empty_1 = true; $__currentLoopData = $top_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="swiper-slide">
                            <a href="<?php echo e(route('category.product', [ $category->slug ? $category->slug : make_slug(get_translation($category->name)), $category->id])); ?>" class="categorie-item">
                                <div class="categorie-item-img">
                                    <div class="category-overlay">
                                        <div class="icon">
                                            <svg  version="1.1"  x="0" y="0" viewBox="0 0 493.356 493.356"   xml:space="preserve" ><g><path d="m490.498 239.278-109.632-99.929c-3.046-2.474-6.376-2.95-9.993-1.427-3.613 1.525-5.427 4.283-5.427 8.282v63.954H9.136c-2.666 0-4.856.855-6.567 2.568C.859 214.438 0 216.628 0 219.292v54.816c0 2.663.855 4.853 2.568 6.563 1.715 1.712 3.905 2.567 6.567 2.567h356.313v63.953c0 3.812 1.817 6.57 5.428 8.278 3.62 1.529 6.95.951 9.996-1.708l109.632-101.077c1.903-1.902 2.852-4.182 2.852-6.849 0-2.468-.955-4.654-2.858-6.557z"  opacity="1" data-original="#000000" ></path></g></svg>
                                        </div>
                                    </div>
                                    <img src="<?php echo e(show_image(file_path()['category']['path'].'/'.$category->banner,file_path()['category']['size'])); ?>" alt="<?php echo e($category->banner); ?>">
                                </div>
                                <div class="categorie-item-content">
                                    <h4>
                                        <?php echo e(@limit_words(get_translation($category->name),3)); ?>

                                    </h4>
                                        <?php
                                            $sub_cate_counter = $category->houseSubCateProduct->count();
                                        ?>
                                    <p><?php echo e($category->houseProduct->count() + $sub_cate_counter); ?>

                                        <?php echo e(translate("Items Available")); ?>

                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>
</section>

<?php if( @frontend_section_data($promo_banner->value,'position') == 'top-category'): ?>
  <?php echo $__env->renderWhen($promo_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>

<?php if( @frontend_section_data($promo_second_banner->value,'position') == 'top-category'): ?>
    <?php echo $__env->renderWhen($promo_second_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_second_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>

<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/section/top_category.blade.php ENDPATH**/ ?>