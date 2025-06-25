
<section class="shop" style="background:#404040;">
    <div class="Container">
        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color: white;"><?php echo e(@frontend_section_data($best_shops_section->value,'heading')); ?> </h3>
                    <p style="color: white;"><?php echo e(@frontend_section_data($best_shops_section->value,'sub_heading')); ?></p>
                </div>
            </div>
            <div class="section-title-right">
               <a href="<?php echo e(route('shop')); ?>" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;">
                  <?php echo e(translate('View More')); ?>

                </a>
            </div>
        </div>

        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $bestsellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($seller->sellerShop): ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="shop-item">
                            <div class="shop-thumbnail">
                                <a href="<?php echo e(route('seller.store.visit',[make_slug($seller->sellerShop->name), $seller->id])); ?>">
                                    <img src="<?php echo e(show_image(file_path()['shop_first_image']['path'].'/'.@$seller->sellerShop->shop_first_image,file_path()['shop_first_image']['size'])); ?>" alt="<?php echo e(@$seller->sellerShop->shop_first_image); ?> ?v=<?php echo e(rand()); ?>" style="width: 100%; height: 200px; object-fit: cover; display: block;">
                                </a>
                                <div class="shop-logo">
                                    <img src="<?php echo e(show_image(file_path()['shop_logo']['path'].'/'.@$seller->sellerShop->shop_logo,file_path()['shop_logo']['size'])); ?>" alt="<?php echo e(@$seller->sellerShop->shop_logo); ?>">
                                </div>
                              
                            </div>
                            <div class="shop-info">
                                <div class="shop-item-top">
                                    <div class="ratting">
                                        <?php echo show_ratings($seller->rating ? $seller->rating :0 ) ?>
                                    </div>
                                    <a href="<?php echo e(route('user.seller.chat.list' , ['seller_id' => @$seller->id])); ?>" class="chat-btn"><i class="fa-brands fa-rocketchat"></i>
                                    </a>
                                    <div class="shop-content">
                                        <h5><?php echo e($seller->sellerShop->name); ?></h5>
                                        <div class="shop-follower">
                                            <span>
                                            <?php echo e($seller->product->count()); ?>

                                            </span>
                                            <?php echo e(translate('Products')); ?>

                                        </div>

                                    </div>
                                </div>

                                <div class="shop-actions">
                                    <a href="<?php echo e(route('seller.store.visit',[make_slug($seller->sellerShop->name), $seller->id])); ?>" class="shop-action on-active"><i class="fa-solid fa-shop"></i>
                                        <?php echo e(translate('View
                                        Store')); ?>

                                    </a>

                                    <?php if(auth()->check()): ?>
                                        <?php if(in_array(auth()->user()->id,$seller->follow->pluck('follower_id')->toArray())): ?>
                                            <a class="shop-action" href="<?php echo e(route('user.follow', $seller->id)); ?>">
                                                <i class="fa-regular fa-user">
                                                </i> <?php echo e(translate('Following')); ?>

                                            </a>
                                            <?php else: ?>
                                                <a class="shop-action" href="<?php echo e(route('user.follow', $seller->id)); ?>">  <i class="fa-regular fa-user"></i>   <?php echo e(translate('Follow')); ?></a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                        <a  class="shop-action" href="<?php echo e(route('user.follow', $seller->id)); ?>">  <i class="fa-regular fa-user"></i>  <?php echo e(translate('Follow')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <?php echo $__env->make("frontend.partials.empty",['message' => 'No product found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php if( @frontend_section_data($promo_banner->value,'position') == 'best-shops'): ?>
  <?php echo $__env->renderWhen($promo_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>

<?php if( @frontend_section_data($promo_second_banner->value,'position') == 'best-shops'): ?>
    <?php echo $__env->renderWhen($promo_second_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_second_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>



<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/section/best_seller.blade.php ENDPATH**/ ?>