
<?php $__env->startSection('content'); ?>

<div class="store-banner w-100" >
    <div class="shop-banner-img w-100">
        <img class="w-100" src="<?php echo e(show_image(file_path()['shop_first_image']['path'].'/'.@$seller->sellerShop->shop_first_image,file_path()['shop_first_image']['size'])); ?>" alt="<?php echo e($seller->sellerShop->shop_first_image); ?>">
    </div>
</div>

<div class="store" style="background:#404040;">
    <div class="Container">
        <div class="store-container">
            <div class="store-top">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="store-box">
                            <div class="about-store">
                                <div class="store-info">
                                    <div class="store-logo">
                                        <img src="<?php echo e(show_image(file_path()['shop_logo']['path'].'/'.@$seller->sellerShop->shop_logo,file_path()['shop_logo']['size'])); ?>" alt="<?php echo e($seller->sellerShop->shop_logo); ?>">
                                    </div>
                                    <div class="store-info-content">
                                        <h4>
                                            <?php echo e($seller->sellerShop->name); ?>

                                        </h4>
                                        <span>
                                            <?php echo e(translate("Joined")); ?>

                                            : <?php echo e(diff_for_humans($seller->created_at)); ?></span>
                                        <div class="store-overal-ratting">
                                            <div class="ratting mb-0">
                                                <?php echo show_ratings($seller->rating ?? 0) ?>
                                            </div>
                                            <span class="ms-2"><?php echo e($seller->rating ?? 0); ?>/</span>5
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('user.seller.chat.list' , ['seller_id' => @$seller->id])); ?>" class="chat-btn style-big"><i class="fa-brands fa-rocketchat"></i>
                                </a>
                            </div>
                            <div class="store-description">
                                <p><?php echo e($seller->sellerShop->short_details); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 ps-lg-4">
                        <div class="store-box">
                            <div class="store-summery">
                                <div class="store-summery-item">
                                    <p class="fs-14"><?php echo e(translate("Total Products")); ?></p>
                                    <span><?php echo e($seller->product->where('status', 1)->count()); ?></span>
                                </div>
                                <div class="store-summery-item">
                                    <p class="fs-14">
                                        <?php echo e(translate("Total Followers")); ?>

                                    </p>
                                    <span><?php echo e($seller->follow->count()); ?></span>
                                </div>
                            </div>
                            <div class="store-info-left">
                                <div class="store-info-item me-lg-5 gap-3">
                                    <div class="icon">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                        <h6 class="d-flex align-items-center gap-3 fs-13 fw-semibold">
                                            <?php echo e(translate("Email")); ?>

                                            :</h6>
                                        <a href="mailto:<?php echo e(@$seller?->sellerShop?->email ?? @$seller->email); ?>" class="fs-14">
                                            <?php echo e(@$seller->sellerShop->email ??  @$seller->email); ?>

                                        </a>
                                    </div>
                                </div>
                                <div class="store-info-item">
                                    <div class="icon">
                                        <i class="fa-regular fa-address-book"></i>
                                    </div>
                                    <div class="content">
                                        <h6 class="d-flex align-items-center gap-3 fs-13 fw-semibold">
                                            <?php echo e(translate('Phone')); ?>

                                        </h6>
                                        <a href="tel:<?php echo e(@$seller?->sellerShop?->phone ?? $seller->phone); ?>" class="fs-14"><?php echo e(@$seller?->sellerShop?->phone ?? $seller->phone); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <section class="map-section" style="padding-top:30px;background:#2F3033">
    <div class="">
        <div class="row" style="display: flex;justify-content: center;align-items: center;">
            <!-- Google Map Column -->
            <?php if($seller->sellerShop->latitude && $seller->sellerShop->longitude): ?>
            <div class="col-md-6 mb-4">
                <div  id="map"></div>
            </div>
            <?php endif; ?>
            <!-- Video Column -->
            <?php if($seller->sellerShop->shop_video): ?>
            <div class="col-md-6 mb-4">
                <div class="ratio ratio-16x9">
                    <video controls class="img-thumbnail">
                        <source src="<?php echo e(env('APP_URL') . '/assets/shop_video/' . @$seller->sellerShop->shop_video); ?>"  type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="store-products-container pt-80" style="background:#404040;">
    <div class="Container">
        <div class="title-with-tab section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color:white;">
                        <?php echo e(translate("All Products")); ?>

                    </h3>
                </div>
            </div>
            <div class="section-title-right">
                <div class="section-title-tabs">
                    <ul class="nav section-title-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link title-tab-btn active store-active-title-tab" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="true">
                            <?php echo e(translate("All Products")); ?>

                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link title-tab-btn store-active-title-tab" style="color:white;" id="digital-tab" data-bs-toggle="tab" data-bs-target="#digital" type="button" role="tab" aria-controls="digital" aria-selected="false">
                            <?php echo e(translate('Digital Products')); ?>

                          </button>
                        </li>

                    </ul>

                </div>
            </div>
        </div>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
                <div class="row g-2 g-md-4">
                    <?php echo $__env->make('frontend.partials.product', ['products' => $products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="m-4 d-flex align-items-center justify-content-end">
                        <?php echo e($products->withQueryString()->links()); ?>

                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="digital" role="tabpanel" aria-labelledby="digital-tab">
                <div class="row g-2 g-md-4">
                    <?php $__empty_1 = true; $__currentLoopData = $digital_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="digital-product">
                                <a href="<?php echo e(route('digital.product.details', [$product->slug ? $product->slug : make_slug($product->name), $product->id])); ?>" class="digital-product-img">
                                    <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($product->featured_image); ?>">
                                </a>
                                <div class="digital-product-info">
                                    <h4 class="product-title">
                                        <?php echo e($product->name); ?>

                                    </h4>
                                    <div class="product-price py-3">
                                
                                            <?php
                                                $price      =  $product->digitalProductAttribute 
                                                                    ? @$product->digitalProductAttribute->where('status','1')->first()?->price
                                                                    : 0;

                                                $taxes      =  getTaxes(@$product,$price);
                                                $price      =  $price  + $taxes;
                                            ?>
                                            
                                            <span>
                                                <?php echo e(short_amount($price)); ?>

                                            </span>
                                    </div>

                                    <a href="<?php echo e(route('digital.product.details', [$product->slug ? $product->slug : make_slug($product->name), $product->id])); ?>" class="topup-btn ">
                                        <?php echo e(translate("Top up")); ?>

                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12">
                            <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="m-4 d-flex align-items-center justify-content-end">
                    <?php echo e($digital_products->withQueryString()->links()); ?>

                </div>

            </div>
        </div>
    </div>
</section>
<?php
    $sellerData = $seller->sellerShop;
?>

<section class="pt-80 pb-80" style="background:#404040;">
    <div class="Container">

        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color:white;">
                        <?php echo e(translate("Related Shops")); ?>

                    </h3>

                </div>
            </div>
            <div class="section-title-right">
                <a href="<?php echo e(route('shop')); ?>" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;">
                    <?php echo e(translate('View More')); ?>

                </a>
            </div>
        </div>

        <div class="related-shop-items">
            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="trende-item">
                            <div class="trende-item-left">
                                <div class="trende-item-logo">
                                    <img src="<?php echo e(show_image(file_path()['shop_logo']['path'].'/'.@$seller->sellerShop->shop_logo,file_path()['shop_logo']['size'])); ?>" alt="<?php echo e($seller->sellerShop->shop_logo); ?>">
                                </div>
                                <div class="trende-item-info">
                                    <h5><?php echo e($seller->sellerShop->name); ?></h5>
                                    <div class="d-inline-flex align-items-center justify-content-start ratting">
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
                                                            <h6><a href="<?php echo e(route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])); ?>">
                                                                <?php echo e($product->name); ?>

                                                            </a></h6>

                                                            <div class="product-price">
                                                                    <?php
                                                                        $price      =  (@$product->stock->first()?->price ?? $product->price);
                                                   
                                          
                                                                    ?>

                                                                    <?php if(($product->discount_percentage) > 0): ?>
                                                                        <span>
                                                                            <?php echo e(short_amount(cal_discount($product->discount_percentage,$price) )); ?>

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
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scriptpush'); ?>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    
<script
src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(site_settings('gmap_client_key')); ?>&callback=initMap&v=weekly"
defer
></script>

<script>







let map;

function initMap() {
  const mapOptions = {
    zoom: 8,
    center: { lat: parseFloat("<?php echo e($sellerData->latitude); ?>"), lng:  parseFloat("<?php echo e($sellerData->longitude); ?>") },
  };

  map = new google.maps.Map(document.getElementById("map"), mapOptions);

  const marker = new google.maps.Marker({

    position: { lat: parseFloat("<?php echo e($sellerData->latitude); ?>"), lng:  parseFloat("<?php echo e($sellerData->longitude); ?>") },
    map: map,
  });

//   const infowindow = new google.maps.InfoWindow({
//     content: "<p>Marker Location:" + marker.getPosition() + "</p>",
//   });
  const infowindow = new google.maps.InfoWindow({
  content: `
    <div style="max-width: 250px;">
      <h6 style="margin: 0 0 5px 0;">Shop Detail</h6>
      <strong>Name:</strong> <?php echo e($sellerData->name); ?><br>
      <strong>Email:</strong> <?php echo e($sellerData->email); ?><br>
      <strong>Phone:</strong> <?php echo e($sellerData->phone); ?>

    </div>
  `
});

  google.maps.event.addListener(marker, "click", () => {
    infowindow.open(map, marker);
  });
}

window.initMap = initMap;



</script>




    



<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/seller_store.blade.php ENDPATH**/ ?>