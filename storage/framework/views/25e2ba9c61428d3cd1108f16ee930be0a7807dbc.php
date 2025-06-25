
<?php $__env->startSection('content'); ?>
    <?php
        $campaign_section = frontend_section('campaign');
        $todays_deal = frontend_section('todays-deals');
        $flash_deal = frontend_section('flash-deals');
        $new_arrival = frontend_section('new-arrivals');
        $digital_product_section = frontend_section('digital-products');
        $product_offer_section = frontend_section('product-offer');
        $best_selling_section = frontend_section('best-selling-products');
        $menu_category_section = frontend_section('menu-category');
        $promo_banner = frontend_section('promotional-offer');
        $promo_second_banner = frontend_section('promotional-offer-2');
        $top_category = frontend_section('top-category');
        $top_product_section = frontend_section('top-products');
        $best_shops_section = frontend_section('best-shops');
        $top_brands_sections = frontend_section('top-brands');
        $trending_sections = frontend_section('trending-products');
        $service_sections = frontend_section('service-section');
        $testimonial = frontend_section('testimonial');
    ?>


  <div class="container-fluid hero body1 ">
            <div class="row">
              <div class="col-sm hero-col-1">
                <h1>Explore Organic <br> Wines!</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia,
                    nunc a condimentum sodales, neque metus vulputate neque, quis sagittis
                    elit libero id urna</p>

                    <div class="shop-container">
                    </div>
              </div>
              <div class="col-sm hero-col-2">
                <img src="<?php echo e(asset('assets/images/Group 62.png')); ?>" alt="">
              </div>
            </div>
          </div>

  


<div class="container-fluid Sec-2 body1">
    <div class="row ">
      <div class="col-sm Sec-2-col-1">
        <h1>Welcome</h1>
        <h2>We feature award-winning, estate-produced wines in a <br>
            family-owned, boutique winery.</h2>
            <img src="<?php echo e(asset('assets/images/Horizontal Divider.png')); ?>" alt="">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia,
            nunc a condimentum sodales, neque metus vulputate neque, quis sagittis
            elit libero id urna. Fusce ultrices tellus arcu, sit amet efficitur urna
            sollicitudin in. Nullam id massa volutpat, tincidunt ipsum at, posuere
            sapien.</p>

            <button class="mt-5"><a href="<?php echo e(route('todays.deal')); ?>?v=<?php echo e(rand()); ?>" style="color:white;">SHOP NOW</a></button>
      </div>
      <div class="col-sm p-0 Sec-2-col-2">
        <img src="<?php echo e(asset('assets/images/couple-working-farm 1.png')); ?>"  alt="">
      </div>
    </div>
  </div>

 
  <?php echo $__env->renderWhen($todays_deal->status == '1', 'frontend.section.today_deals', ['todays_deal' => $todays_deal], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
  <?php echo $__env->renderWhen($top_category->status == '1', 'frontend.section.top_category', ['top_category' => $top_category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($campaign_section->status == '1', 'frontend.section.campaigns', ['campaigns' => $campaigns], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($flash_deal->status == '1', 'frontend.section.flash_deal', ['flash_deal' => $flash_deal], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($new_arrival->status == '1', 'frontend.section.new_product', ['new_arrival' => $new_arrival], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <!--<?php echo $__env->renderWhen($digital_product_section->status == '1', 'frontend.section.digital_product', ['digital_product_section' => $digital_product_section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>-->

  <?php echo $__env->renderWhen($product_offer_section->status == '1', 'frontend.section.product_offer', ['product_offer_section' => $product_offer_section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($best_selling_section->status == '1', 'frontend.section.best_selling_product', ['best_selling_section' => $best_selling_section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($menu_category_section->status == '1', 'frontend.section.menu_category', ['menu_category_section' => $menu_category_section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($top_product_section->status == '1', 'frontend.section.top_product', ['top_product_section' => $top_product_section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($best_shops_section->status == '1', 'frontend.section.best_seller', ['best_shops_section' => $best_shops_section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($top_brands_sections->status == '1', 'frontend.section.top_brand', ['top_brands_sections' => $top_brands_sections], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <?php echo $__env->renderWhen($trending_sections->status == '1', 'frontend.section.trending_product', ['trending_sections' => $trending_sections], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
  <?php echo $__env->renderWhen($testimonial->status == '1', 'frontend.section.testimonial', ['testimonial_section' => $testimonial], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

  <div class="modal fade" id="testimonialModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testimonialModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg--primary border-0 p-25">
                <h1 class="modal-title fs-5" id="testimonialModalLabel">
                    <?php echo e(translate('Write Your Word')); ?>

                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" class="review-form" method="post" action="<?php echo e(route('feedback.store')); ?>">
                   <?php echo csrf_field(); ?>
                    <div class="modal-body p-25">

                            <div class="mb-4">
                                <label for="author" class="fw-semibold fs-13 mb-1">
                                    <?php echo e(translate('Author Name')); ?> <span class="text-danger">*</span>
                                </label>
                                <input required name="author" id="author" type="text" value="<?php echo e(old('author')); ?>" placeholder="<?php echo e(translate('Enter name')); ?>">
                            </div>
                            <div class="mb-4">
                                <label for="image" class="fw-semibold fs-13 mb-1">
                                    <?php echo e(translate('Author Image')); ?> <span class="text-danger">*</span>
                                </label>
                                <input name="image" id="image" required  type="file">
                            </div>
                            <div class="mb-4">
                                <label for="designation" class="fw-semibold fs-13 mb-1">
                                    <?php echo e(translate('Designation')); ?> <span class="text-danger">*</span>
                                </label>
                                <input id="designation" name="designation" value="<?php echo e(old('designation')); ?>" type="text" placeholder='<?php echo e(translate("Enter designation")); ?>'>
                            </div>
                            <div class="mb-4 d-block w-100">
                                <div class="rate">

                                    <?php for($i = 5 ; $i > 0; $i--): ?>
                                        <input type="radio" id="star<?php echo e($i); ?>" name="rating" value="<?php echo e($i); ?>" />
                                        <label for="star<?php echo e($i); ?>" title="text"><?php echo e($i); ?> <?php echo e(translate("stars")); ?></label>
                                    <?php endfor; ?>

                                </div>
                            </div>

                            <div class="mb-4 d-block">
                                <label for="quote" class="fw-semibold fs-13 mb-1">
                                    <?php echo e(translate('Review')); ?> <span class="text-danger">*</span>
                                </label>
                                <textarea required name="quote"  id="quote" cols="30" rows="2" placeholder="<?php echo e(translate('Write Opinion')); ?>"><?php echo e(old('quote')); ?></textarea>
                            </div>

                    </div>
                    <div class="modal-footer bg--primary border-0 gap-3 py-3">
                        <button type="button" class="btn btn--close btn--modal btn-capsule" data-bs-dismiss="modal">
                             <?php echo e(translate('Close')); ?>

                        </button>
                        <button type="submit" class="btn btn-success btn--modal">
                             <?php echo e(translate("Submit")); ?>

                        </button>
                    </div>
            </form>
        </div>
    </div>
 </div>

<?php $__env->stopSection(); ?>






<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/home.blade.php ENDPATH**/ ?>