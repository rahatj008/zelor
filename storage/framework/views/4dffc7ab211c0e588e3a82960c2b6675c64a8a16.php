

<?php $__env->startPush('stylepush'); ?>
<style>

    .magnify-container {
    position: relative;
    }
    .magnify-container .magnified {
        display: block;
        z-index: 10;
    }
    .magnify-container .magnifier{
        height: 20rem;
        width: 20rem;
        position: absolute;
        z-index: 20;
        border: 0.4rem solid white;
        border-radius: 50%;
        background-size: 400%;
        background-image: url("<?php echo e(show_image(file_path()['product']['gallery']['path'].'/'.$product->gallery->first()->image,file_path()['product']['gallery']['size'])); ?>");
        background-repeat: no-repeat;
        margin-left: -10rem !important;
        margin-top: -10rem !important;
        pointer-events: none;
        display: none;
    }
    @media  only screen and (min-width: 320px){
      .magnify-container .magnifier {
            height: 10rem;
            width: 10rem;
            background-size: 400%;
            margin-left: -5rem !important;
            margin-top: -5rem !important;
        }
    }

    @media  only screen and (min-width: 768px){
      .magnify-container .magnifier {
            height: 20rem;
            width: 20rem;
            background-size: 400%;
            margin-left: -10rem !important;
            margin-top: -10rem !important;
        }
    }

    @media  only screen and (min-width: 992px){
      .magnify-container .magnifier {
            height: 10rem;
            width: 10rem;
            background-size: 400%;
            margin-left: -5rem !important;
            margin-top: -5rem !important;
        }
    }

    @media  only screen and (min-width: 1200px){
      .magnify-container .magnifier {
            height: 20rem;
            width: 20rem;
            background-size: 400%;
            margin-left: -10rem !important;
            margin-top: -10rem !important;
        }
    }
    .magnify-container .magnified img {
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 0.4rem;
    }

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


<section class="product-details pt-80 pb-80">
     <div class="Container">
        <ul class="route">
            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?> /</a></li>

            <li>
                <a href="<?php echo e(route('category.product', [$product->category->slug ? $product->category->slug :  make_slug(get_translation($product->category->name)), $product->category_id])); ?>"><?php echo e(get_translation(($product->category->name))); ?>

                </a>
            </li>
        </ul>

        <?php
             $seller = $product->seller;
             $authUser = auth_user('web');
             $wishedProducts = $authUser ? $authUser->wishlist->pluck('product_id')->toArray() : [];
        ?>

        <div class="product-details-container">
            <div class="product-detail-left">
                <div class="small-img">
                    <div class="small-img-item">
                        <?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="gallery-sm-img product-gallery-small-img">
                                <img src="<?php echo e(show_image(file_path()['product']['gallery']['path'].'/'.$gallery->image,file_path()['product']['gallery']['size'])); ?>" alt="<?php echo e($gallery->image); ?>" >
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="product-thumbnail-slider">
                    <div class="magnify-container">
                        <div class="magnifier">
                        </div>
                        <div class="magnified">
                            <img class="qv-lg-image" src="<?php echo e(show_image(file_path()['product']['gallery']['path'].'/'.$product->gallery->first()->image,file_path()['product']['gallery']['size'])); ?>" alt="<?php echo e(@$product->gallery->first()->image); ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-detail-middle">
                <h3 class="details-product-title">
                    <?php echo e($product->name); ?>

                      <?php if($product->status == '0'): ?>
                        <span class="product_tag">
                             <?php echo e(translate("New Arrival")); ?>

                        </span>
                      <?php endif; ?>
                </h3>

                <div class="product-item-review">
                    <div class="ratting mb-0">
                        <?php echo show_ratings($product->review->avg('rating')) ?>
                        <small class="text-white" >(<?php echo e($product->review->count()); ?> <?php echo e(translate('Review')); ?>)</small>
                    </div>
                    <small style="color: #fff !important"><?php echo e($product->order->count()); ?>

                        <?php echo e(translate('Orders')); ?>

                    </small>
                </div>

                <div class="product-price price-section">

                    <?php
                            $price      =  (@$product->stock->first()?->price ?? $product->price);
                         
                    ?>



                    <?php if(count($product->campaigns) != 0 && $product->campaigns->first()->end_time > Carbon\Carbon::now()->toDateTimeString() &&   $product->campaigns->first()->status == '1'): ?>

                        <?php if(short_amount($product->campaigns->first()->pivot->discount) == 0): ?>

                                <span  class="varient-product-price"><?php echo e((short_amount($price))); ?>

                                </span>

                            <?php else: ?>
                                <span>
                                    <?php echo e((short_amount(discount($price,$product->campaigns->first()->pivot->discount,$product->campaigns->first()->pivot->discount_type)))); ?>

                                </span>
                            <del>
                                <?php echo e((short_amount($price))); ?>

                            </del>
                        <?php endif; ?>

                    <?php else: ?>

                        <?php if(($product->discount_percentage) > 0): ?>

                            <span>
                                <?php echo e(short_amount(cal_discount($product->discount_percentage, $price))); ?>

                            </span>
                            <del> <?php echo e(short_amount($price)); ?></del>

                            <?php else: ?>
                            <span>
                                <?php echo e(short_amount($price)); ?>

                            </span>

                        <?php endif; ?>
                    <?php endif; ?>





                </div>

                <?php if($product->taxes): ?>
                    <div class="pt-3">

                        <button class="badge bg-success mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTax" aria-expanded="false" aria-controls="collapseTax">
                            <?php echo e(translate('View taxes')); ?>

                        </button>
                        <div class="collapse" id="collapseTax">

                                <ul class="list-group list-group-flush">

                                    <?php $__empty_1 = true; $__currentLoopData = $product->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <li class="list-group-item d-flex align-items-center justify-content-between bg-tax-light">

                                        <?php echo e($tax->name); ?>

                                        : <span>

                                            <?php if($tax->pivot->type == 0): ?>
                                            <?php echo e($tax->pivot->amount); ?>%
                                            <?php else: ?>
                                            <?php echo e(short_amount($tax->pivot->amount)); ?>

                                            <?php endif; ?>


                                        </span>
                                    </li>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                 <li>
                                    <?php echo e(translate("Nothing tax configuration added for this product")); ?>

                                 </li>

                                <?php endif; ?>


                                </ul>

                        </div>

                    </div>
                <?php endif; ?>


                <div class="product-item-summery">
                    <?php echo $product->short_description ?>
                </div>

                <?php
                    $randNum = rand(5,99999999);
                    $randNum = $randNum."details".$randNum;
                ?>

                <form class="attribute-options-form-<?php echo e($randNum); ?> quick-view-form">

                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <?php if(count($product->campaigns) != 0 && $product->campaigns->first()->end_time > Carbon\Carbon::now()->toDateTimeString() &&   $product->campaigns->first()->status == '1'): ?>
                       <input type="hidden" name="campaign_id" value="<?php echo e($product->campaigns->first()->id); ?>">
                    <?php endif; ?>

                    <?php
                      $stocks = $product->stock;
                    ?>
                    <?php $__currentLoopData = json_decode($product->attributes_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attr_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $attributeOption =  get_cached_attributes()->find($attr_val->attribute_id);
                            $attributValues  =  @$attributeOption->value;


                        ?>
                        <div class="product-colors">
                            <span> <?php echo e(@$attributeOption->name); ?>:</span>
                            <div class="variant">
                                <?php $__currentLoopData = $attr_val->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php
                                      $displayName =  $value;

                                      if($attributValues){
                                        $attributeValue =  $attributValues->where('name',$value)->first();
                                        if($attributeValue){
                                            $displayName = $attributeValue->display_name 
                                                                ? $attributeValue->display_name 
                                                                : $attributeValue->name;
                                        }

                                      }
                                
                                   ?>
                                    <div class="variant-item">
                                        <input <?php if($key == 0): ?> checked <?php endif; ?> type="radio" class="btn-check attribute-select"   name="attribute_id[<?php echo e($attr_val->attribute_id); ?>]" value="<?php echo e(str_replace(' ', '', $value)); ?>" id="success-outlined-<?php echo e($value); ?>">
                                        <label class="btn-outline-success variant-btn" for="success-outlined-<?php echo e($value); ?>">   <?php echo e($displayName); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                   <div class="weight">
                        <div class="product-colors">
                            <span>
                                <?php echo e(translate('Weight')); ?> : <?php echo e($product->weight); ?> <?php echo e(translate('KG')); ?>

                            </span>
                        </div>
                   </div>

                    <?php if(count($product->campaigns) != 0 && $product->campaigns->first()->end_time > Carbon\Carbon::now()->toDateTimeString()  && $product->campaigns->first()->status == '1'): ?>

                      <input type="hidden" name="campaign_id" value="<?php echo e($product->campaigns->first()->id); ?>">

                    <?php endif; ?>

                    <?php
                       $stockQty = (int) @$product->stock->first()->qty ??  0;
                    ?>

                    <div class="stock-status" id="quick-view-stock">
                        <?php if($stockQty > 0): ?>
                            <div class="instock">
                                <i class="fa-solid fa-circle-check"></i>
                                <p>
                                    <?php echo e(translate("In Stock")); ?>

                                </p>
                            </div>
                        <?php else: ?>
                            <div class="outstock">
                                <i class="fas fa-times-circle"></i>
                                <p>
                                    <?php echo e(translate("Stock out")); ?>

                                </p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="product-actions-type">
                        <div class="input-step">
                            <button type="button" class="update_qty x decrement ">–</button>
                            <input type="number" class="product-quantity"  name="quantity" value="1" id="quantity">
                            <button type="button" class="update_qty y increment ">+</button>
                        </div>

                        <a href="javascript:void(0)"  data-product_id = '<?php echo e($randNum); ?>' class="buy-now addtocartbtn">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <button data-product_id ="<?php echo e($product->id); ?>" class="product-details-love-btn wishlistitem">
                            <i class="<?php if(in_array($product->id,$wishedProducts)): ?>
                                fa-solid
                            <?php else: ?>
                                fa-regular
                            <?php endif; ?> fa-heart"></i>
                        </button>
                        <button class="product-details-love-btn comparelist wave-btn" data-product_id="<?php echo e($product->id); ?>"><i class="fa-solid fa-code-compare"></i></button>
                            <?php if($product->seller_id && @$seller): ?>
                              <a href="<?php echo e(route('user.seller.chat.list' , ['seller_id' => @$product->seller->id , 'product_id' => $product->id])); ?>" class="buy-now"><i class="fa-brands fa-rocketchat"></i>
                            <?php endif; ?>
                        </a>
                    </div>
               </form>

                <div class="product-detail-btn">
                    <a href="javascript:void(0)" data-checkout = "yes" data-product_id = '<?php echo e($randNum); ?>'  class="buy-now-btn quick-buy-btn addtocartbtn">
                        <i class="fa-solid fa-cart-plus fs-2 me-3"></i>  <?php echo e(translate("Buy Now")); ?>

                    </a>

                    <?php if(site_settings('whatsapp_order',App\Enums\StatusEnum::false->status()) == App\Enums\StatusEnum::true->status() ): ?>

                            <?php
                                    $wpMessage  = site_settings('wp_order_message') ;

                                    $message = str_replace(
                                            [
                                                '[product_name]',
                                                '[link]',
                                            ],
                                            [
                                                $product->name,
                                                url()->current()
                                            ],
                                            $wpMessage
                                    );




                            ?>

                            <input type="hidden" class="wp-message" value="<?php echo e($message); ?>">


                        <?php if($seller && optional($seller->sellerShop)->whatsapp_order ==  App\Enums\StatusEnum::true->status()): ?>

                           <input type="hidden" class="wp-number" value="<?php echo e(optional($seller->sellerShop)->whatsapp_number); ?>">
                            <a href="javascript:void(0);"  onclick="social_share()" class="buy-now-btn buy-with-whatsapp">
                                <i class="fa-brands fa-whatsapp fs-2 me-3"></i> <?php echo e(translate("Order Via Whatsapp")); ?>

                            </a>

                        <?php endif; ?>

                        <?php if(!$seller): ?>
                           <input type="hidden" class="wp-number" value="<?php echo e(site_settings('whats_app_number')); ?>">

                            <a href="javascript:void(0);"  onclick="social_share()" class="buy-now-btn buy-with-whatsapp">
                                <i class="fa-brands fa-whatsapp fs-2 me-3"></i> <?php echo e(translate("Order Via Whatsapp")); ?>

                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                <div class="stock-and-social">
                    <div class="product-details-social">
                        <span>
                            <?php echo e(translate("Share")); ?>

                            :</span>
                        <div class="product-details-social-link">
                            <a href="https://www.facebook.com/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"
                                target="__blank"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://twitter.com/share?url=<?php echo e(urlencode(url()->current())); ?>&text=Simple Share Buttons&hashtags=simplesharebuttons"
                                target="__blank"><i class="fa-brands fa-twitter"></i></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode(url()->current())); ?>"
                                target="__blank"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background: #404040 !important;">
    <div class="Container">
        <div class="row g-4">
            <div class="col-xl-3 order-2 order-xl-1">
                <div class="card" style="background: #404040 !important">
                    <div class="card-header" style="background: #671E1F !important;"  >
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4 class="card-title mb-0 text-white"><?php echo e(translate("Related Product")); ?></h4>
                            </div>
                            <div>
                                <a href="<?php echo e(route('category.product', [ $product->category->slug ? $product->category->slug :  make_slug(get_translation($product->category->name)), $product->category->id])); ?>" class="fs-14 view-all-btn"><?php echo e(translate("view all")); ?> <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="related-product">
                            <?php $__empty_1 = true; $__currentLoopData = $products->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rltd_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="product-categories-list">
                                    <div class="product-categories-list-img">
                                        <a href="<?php echo e(route('product.details',[$rltd_product->slug ? $rltd_product->slug : make_slug($rltd_product->name),$rltd_product->id])); ?>">
                                            <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$rltd_product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($rltd_product->name); ?>">
                                        </a>
                                    </div>

                                    <div class="product-info p-0">
                                        <h4 class="product-title sidebar-title"> <a href="<?php echo e(route('product.details',[$rltd_product->slug ? $rltd_product->slug : make_slug($rltd_product->name),$rltd_product->id])); ?>">
                                            <?php echo e($rltd_product->name); ?>

                                            </a>
                                        </h4>

                                        <div class="priceAndRatting">
                                            <div class="product-price">

                                                <?php
                                                    $price      =  (@$rltd_product->stock->first()?->price ?? $rltd_product->price);
                    
                            
                                                ?>

                                                <?php if(($rltd_product->discount_percentage) > 0): ?>

                                                    <span>
                                                        <?php echo e(short_amount(cal_discount($rltd_product->discount_percentage,$price))); ?>

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
                                        <?php
                                            $rand = rand(1,10000000);
                                            $rand  = $rand."_rltd_".$rand;
                                        ?>

                                        <form class="attribute-options-form-<?php echo e($rand); ?>">
                                            <input type="hidden" name="id" value="<?php echo e($rltd_product->id); ?>">
                                        </form>

                                        <div class="product-action">
                                            <a href="javascript:void(0)" data-product_id="<?php echo e($rand); ?>" class="buy-now wave-btn addtocartbtn">
                                                <span class="buy-now-icon"></span>
                                                <?php echo e(translate('Add to cart')); ?>

                                            </a>
                                            <button  data-product_id ="<?php echo e($rltd_product->id); ?>" class="heart-btn wishlistitem"><i class=" <?php if(in_array($rltd_product->id,$wishedProducts)): ?>
                                                fa-solid
                                            <?php else: ?>
                                                fa-regular
                                            <?php endif; ?> fa-heart"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <div class="text-enter fs-12">
                                    <?php echo e(translate('No products avaialable')); ?>

                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 order-1 order-xl-2">
                <div class="card pd-description-tab">
                    <div  class="nav tab" id="nav-tab" role="tablist">
                        <button class="nav-link tablinks active" id="description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">
                            <?php echo e(translate("Description")); ?>

                        </button>
                        <button class="nav-link tablinks " id="reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews" aria-selected="false">
                            <?php echo e(translate("Reviews")); ?>

                        </button>

                        <?php if($product->warranty_policy): ?>
                            <button class="nav-link tablinks " id="warranty-tab" data-bs-toggle="tab" data-bs-target="#nav-warranty" type="button" role="tab" aria-controls="nav-warranty" aria-selected="false">
                                <?php echo e(translate("Warranty Policy")); ?>

                            </button>
                        <?php endif; ?>

                        <button class="nav-link tablinks" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#nav-shipping" type="button" role="tab" aria-controls="nav-shipping" aria-selected="false">

                            <?php echo e(translate("Shipping Information")); ?>

                        </button>
                    </div>



                    <div class="tab-content pd-description" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="description-content fs-14">
                               <?php echo $product->description ?>
                            </div>
                        </div>

                        <div class="tab-pane fade " id="nav-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <h4 class="fs-16">
                                <?php echo e(translate("Ratings & Reviews")); ?>

                            </h4>

                            <div class="review-content">
                                <div class="overall-ratting">
                                    <div class="review-overview sticky-side-div">
                                        <div>
                                            <div class="pb-3">
                                                <div class="bg-light px-4 py-2 rounded-2 mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <div class="ratting mb-0">
                                                                <?php echo show_ratings($product->review->avg('rating')) ?>
                                                            </div>
                                                        </div>

                                                        <div class="flex-shrink-0">
                                                            <p class="mb-0 fs-14">
                                                            <?php echo e(round($product->review->avg('rating'))); ?>  <?php echo e(translate('out of 5')); ?>   </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-center mt-3">
                                                    <div class="text-muted fs-14"><?php echo e(translate("Total")); ?>

                                                        <span class="fw-medium">
                                                        <?php echo e($product->review->count()); ?>

                                                        </span> <?php echo e(translate('Reviews')); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <?php for( $i = 5 ; $i>0 ; $i-- ): ?>
                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 fs-14"><?php echo e($i); ?> <?php echo e(translate('star')); ?></h6>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress progress-sm">
                                                                    <div class="progress-bar ratting-progres-<?php echo e($i); ?>" role="progressbar" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <span class="mb-0 text-muted fs-14">
                                                                    <?php echo e($product->review->where('rating',$i)->count()); ?>

                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endfor; ?>
                                            </div>
                                        </div>

                                        <?php

                                        ?>

                                        <?php if(auth()->user() && product_add_review($product->id, auth()->user()->id) && !in_array( auth()->user()->id ,@$product->review->pluck('user_id')->toArray() ?? [])): ?>

                                            <div class="mt-4  text-center">
                                                <button type="button" class="AddReview-btn" data-bs-toggle="modal" data-bs-target="#addReviewModal">
                                                    <?php echo e(translate("Add Your Review")); ?>

                                                </button>
                                            </div>
                                        <?php endif; ?>


                                    </div>
                                </div>
                                <?php if($product->review->isNotEmpty()): ?>

                                     <div class="position-relative">

                                        <div class="previous-reviews">

                                        </div>

                                        <div class="load-more-loader spinner-loader d-none">
                                            <div class="spinner-border text-dark" role="status">
                                                <span class="visually-hidden"></span>
                                             </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center w-100 mt-5 mb-2 load-more-div d-none">
                                            <button class="view-more-btn justify-content-center load-more-review">
                                            <?php echo e(translate("Load More")); ?>

                                            </button>
                                        </div>


                                     </div>
                                <?php else: ?>
                                    <div class="text-center py-5">
                                        <p><?php echo e($product->review->count()); ?> <?php echo e(translate('Review for')); ?> <?php echo e(($product->name)); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if($product->warranty_policy): ?>
                            <div class="tab-pane fade " id="nav-warranty" role="tabpanel" aria-labelledby="warranty-tab">
                                <div class="description-content">
                                    <?php echo e($product->warranty_policy); ?>

                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="tab-pane fade" id="nav-shipping" role="tabpanel" aria-labelledby="shipping-tab">
                            <div class="shipping-information">

                                <?php if($product->shippingDelivery): ?>


                                    <div class="deliver-location">
                                        <label for="shipping-country" class="shipping-country form-label">
                                            <?php echo e(translate("Shipping Zone")); ?>

                                        </label>

                   

                                        <select class="form-select" id="shipping-country">
                                            <option>
                                                <?php echo e(translate("Select A Zone")); ?>

                                            </option>
                                            <?php $__currentLoopData = $product->shippingDelivery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($country->shippingDelivery): ?>
                                                    <option value="<?php echo e(@$country->shippingDelivery->name); ?>">
                                                        <?php echo e((@$country->shippingDelivery->name)); ?>

                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div id="shipping-information">
                                        <div class="service-standard">

                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php
    $top_product_section = frontend_section('top-products');
?>

<?php echo $__env->renderWhen($top_product_section->status == '1', 'frontend.section.top_product', ['top_product_section' => $top_product_section], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >
                    <?php echo e(translate("Add Review")); ?>

                </h5>
                <button type="button" class="btn btn-light fs-14 modal-closer rounded-circle" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="add-review">
                    <form action="<?php echo e(route('user.product.review')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5">
                            <label for="star5" title="text"></label>
                            <input type="radio" id="star4" name="rate" value="4">
                            <label for="star4" title="text"></label>
                            <input type="radio" id="star3" name="rate" value="3">
                            <label for="star3" title="text"></label>
                            <input type="radio" id="star2" name="rate" value="2">
                            <label for="star2" title="text"></label>
                            <input type="radio" id="star1" name="rate" value="1">
                            <label for="star1" title="text"></label>
                        </div>

                        <textarea rows="5" name="review" placeholder="Your review" class="form-control my-4"></textarea>

                        <button class="add-review-btn">
                            <?php echo e(translate("Submit Review")); ?>

                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scriptpush'); ?>
<script>
"use strict"


$(document).on('change','#shipping-country',function(e){
    e.preventDefault()
    const countryName = $(this).val();
    if(countryName !='Select A Country')
    {
        $.ajax({

            url: "<?php echo e(route('product.shippingMethod')); ?>",
            method: "get",
            data: { searchData:countryName },
            dataType:'json',
            success: function (response) {

                $('.service-standard').html('')
                $('.service-standard').append(`
                    <h4>
                        ${response.shippingMethod.name}

                    </h4>
                    <ul>
                        <li>
                            <small><?php echo e(translate('Standard delivery')); ?></small>
                            <span>${response.shippingMethod.duration} <?php echo e(translate('WORKING DAYS')); ?></span>
                        </li>
                    </ul>
                    ${response.shippingMethod.description}
                `)
            }
        });
    }
    else{
        $('.service-standard').html('')
    }

})


// Image magnifier

 $(".magnified").hover(function(e){

    var imgPosition = $(".magnify-container").position(),
        imgHeight = $(".magnified").height(),
        imgWidth = $(".magnified").width();
      $(".magnifier").css({
    top: 0,
    left: 0
  }).show();

    $(this).mousemove(function(e){
        var posX = e.pageX - imgPosition.left,
            posY = e.pageY - imgPosition.top,
            percX = (posX / imgWidth) * 100,
            percY = (posY / imgHeight) * 100,
            perc = percX + "% " + percY + "%";

        $(".magnifier").css({
        top:posY,
        left:posX,
        backgroundPosition: perc
        });
    });
    }, function(){

    $(".magnifier").hide();
    });

    var page = 1;

    loadReviews(page)


    $(document).on('click','.load-more-review',function(e){
        page++;
        loadReviews(page);
        e.preventDefault()
    })

    function  loadReviews(page){

        $.ajax({
                url: "<?php echo e(route('get.product.review')); ?>",
                type: "get",
                data:{
                    'page' : page,
                    'id'   : '<?php echo e($product->id); ?>',

                },
                dataType:'json',
                beforeSend: function () {
                    $('.load-more-loader').removeClass('d-none');
                },
                success:(function (response) {

                    $('.load-more-loader').addClass('d-none');
                    if(response.status){
                        $('.previous-reviews').append(response.review_html)
                        if(response.next_page){
                            $('.load-more-div').removeClass('d-none')
                        }else{
                            $('.load-more-div').addClass('d-none')
                        }
                    }


                }),

                error:(function (response) {
                    $('.load-more-loader').addClass('d-none');

                    $('.previous-reviews').html(`
                        <div class="text-center text-danger mt-10">
                            <?php echo e(translate('Something went wrong !! Please Try agian')); ?>

                        </div>
                    `)

                })
            })
    }


</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/product_details.blade.php ENDPATH**/ ?>