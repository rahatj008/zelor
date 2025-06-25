<section class="pb-80" style="background:#404040;">
    <div class="Container">
        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color: white;"><?php echo e(@frontend_section_data($trending_sections->value,'heading')); ?> </h3>
                    <p style="color: white;"><?php echo e(@frontend_section_data($trending_sections->value,'sub_heading')); ?></p>
                </div>
            </div>
            <div class="section-title-right">
                <a href="<?php echo e(route('product')); ?>" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;s">
                     <?php echo e(translate('View More')); ?>

                </a>
            </div>
        </div>
        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $bestsellers->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-xl-5 col-md-6">
                    <div class="trende-item">
                        <div class="trende-item-left">
                            <div class="trende-item-logo">
                                <img src="<?php echo e(show_image(file_path()['shop_logo']['path'].'/'.@$seller->sellerShop->shop_logo,file_path()['shop_logo']['size'])); ?>" alt="<?php echo e($seller->sellerShop->shop_logo); ?>">
                            </div>
                            <div class="trende-item-info">
                                <h5 style="color: white;"><?php echo e($seller->sellerShop->name); ?></h5>
                                <div class="d-inline-flex align-items-center justify-content-start ratting mb-0">
                                     <?php echo show_ratings($seller->rating ? $seller->rating :0 )  ?>
                                </div>
                            </div>
                            <div class="shop-btn">
                                <a href="<?php echo e(route('seller.store.visit',[make_slug($seller->sellerShop->name), $seller->id])); ?>" class="wave-btn"><span><i class="fa-sharp fa-solid fa-cart-shopping"></i></span> <?php echo e(translate('View Store')); ?></a>
                            </div>
                        </div>
                         <?php if($seller->product): ?>
                            <div class="trende-item-right">
                                <ul class="trending-product-list">
                                
                         
                                    <?php $__empty_2 = true; $__currentLoopData = $seller->product->filter(function($product){
                                        return $product->product_type == 102 && $product->status == 1 && !$product->deleted_at ;
                                    })->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <li>
                                            <a href="<?php echo e(route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])); ?>">
                                                <div class="trending-product-item">
                                                    <div class="image">
                                                        <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($product->featured_image); ?>">
                                                    </div>
                                                    <div class="content">
                                                        <h6>
                                                              <?php echo e(limit_words($product->name,2)); ?>

                                                        </h6>

                                   

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
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                      <li>
                                          <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                      </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/section/trending_product.blade.php ENDPATH**/ ?>