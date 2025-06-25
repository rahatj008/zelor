<section class="promotional-banner pt-80 pb-80" style="background:#404040;">
    <div class="Container">
        <div class="add-banners">
            <div class="add-banner">
                <a href="<?php echo e(@frontend_section_data($promo_banner->value,'image','url')); ?>">
                     <img class="w-100" src="<?php echo e(show_image(file_path()['frontend']['path'].'/'.@frontend_section_data($promo_banner->value,'image'),@frontend_section_data($promo_banner->value,'image','size'))); ?>" alt="promo_banner.jpg" >
                </a>
            </div>

            <div class="add-banner">
                <a href="<?php echo e(@frontend_section_data($promo_banner->value,'image_2','url')); ?>">
                     <img class="w-100" src="<?php echo e(show_image(file_path()['frontend']['path'].'/'.@frontend_section_data($promo_banner->value,'image_2'),@frontend_section_data($promo_banner->value,'image_2','size'))); ?>" alt="promo_banner.jpg">
                </a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/section/promotinal_banner.blade.php ENDPATH**/ ?>