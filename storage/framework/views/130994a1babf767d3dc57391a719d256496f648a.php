<div class="quick-view-container product-details-container">
    <div class="product-detail-left pe-lg-5">
        <div class="product-thumbnail-slider">
                <img class="qv-lg-image" src="<?php echo e(show_image(file_path()['product']['gallery']['path'].'/'.$product->gallery->first()->image,file_path()['product']['gallery']['size'])); ?>" alt="<?php echo e(@$product->gallery->first()->image); ?>">
        </div>

        <?php
           $seller = $product->seller;
        ?>
        <div class="small-img">
            <div class="small-img-item">
                <?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="gallery-sm-img quick-view-img">
                        <img src="<?php echo e(show_image(file_path()['product']['gallery']['path'].'/'.$gallery->image,file_path()['product']['gallery']['size'])); ?>" alt="<?php echo e($gallery->image); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="product-detail-middle">
        <h3 class="details-product-title">
            <?php echo e(($product->name)); ?>

        </h3>
        <div class="product-item-review">
            <div class="ratting mb-0">
               <?php echo show_ratings($product->rating()->avg('rating')) ?> <small class="text-white">(<?php echo e($product->rating()->count()); ?> <?php echo e(translate('Reviews')); ?>)</small>
            </div>
            <small class="text-white"><?php echo e($product->order->count()); ?>

                <?php echo e(translate("Orders")); ?>

            </small>
        </div>
        <div class="product-item-price  price-section">
            <?php
                    $price      =  (@$product->stock->first()?->price ?? $product->price);
                 
          
            ?>
            <?php if(count($product->campaigns) != 0 && $product->campaigns->first()->end_time > Carbon\Carbon::now()->toDateTimeString() &&   $product->campaigns->first()->status == '1'): ?>

                        <?php if(($product->campaigns->first()->pivot->discount) == 0): ?>
                              <span class="text-white"><?php echo e((short_amount($price ))); ?></span>
                        <?php else: ?>
                            <span class="text-white">
                                <?php echo e((short_amount(discount($price,$product->campaigns->first()->pivot->discount,$product->campaigns->first()->pivot->discount_type)))); ?>

                            </span>
                            <del class="text-white">
                                <?php echo e((short_amount($price))); ?>

                            </del>
                        <?php endif; ?>
                    <?php else: ?>

                    <?php if(($product->discount_percentage) > 0): ?>
                 
                        <span class="text-white">
                            <?php echo e(short_amount(cal_discount($product->discount_percentage, $price))); ?>

                        </span>
                        <del class="text-white"> <?php echo e(short_amount($price)); ?></del>

                        <?php else: ?>
                        <span class="text-white">
                            <?php echo e(short_amount($price)); ?>

                        </span>


                    <?php endif; ?>
            <?php endif; ?>
        </div>


        <?php if($product->taxes): ?>
            <div class="pt-3">

                <button style="color: #671E1F !important;" class="badge bg-success mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTax" aria-expanded="false" aria-controls="collapseTax">
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
            <?php $__currentLoopData = json_decode($product->attributes_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attr_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $attributeOption =  get_cached_attributes()->find($attr_val->attribute_id);
                    $attributValues  =  @$attributeOption->value;

                ?>

                <div class="product-colors">
                    <span> <?php echo e($attributeOption->name); ?>:</span>
                    <div class="variant">
                        <?php $__currentLoopData = $attr_val->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                      $displayName =  $value;

                                      if($attributValues){
                                        $attributeValue =  $attributValues->where('name',$value)->first();
                                        if($attributeValue){
                                            $displayName = $attributeValue->display_name 
                                                                ?  $attributeValue->display_name 
                                                                : $attributeValue->name;
                                        }

                                      }
                                
                                   ?>
                            <div class="variant-item">
                                <input <?php if($key == 0): ?> checked <?php endif; ?> type="radio" class="btn-check attribute-select"   name="attribute_id[<?php echo e($attr_val->attribute_id); ?>]" value="<?php echo e(str_replace(' ', '', $value)); ?>" id="success-outlined-<?php echo e($value); ?>" autocomplete="off">
                                <label class="btn-outline-success variant-btn" for="success-outlined-<?php echo e($value); ?>"><?php echo e($displayName); ?></label>
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
                    <input type="number" data-view='quick-view' id="quantity" class="quick-view-quantity product-quantity"  name="quantity" value="1" min='0'>
                    <button type="button" class="update_qty y increment ">+</button>
                </div>
                <?php
                    $authUser = auth_user('web');
                    $wishedProducts = $authUser ? $authUser->wishlist->pluck('product_id')->toArray() : [];
                ?>
                <a href="javascript:void(0)"  data-product_id = '<?php echo e($randNum); ?>' class="buy-now addtocartbtn">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <button data-product_id ="<?php echo e($product->id); ?>"  class="product-details-love-btn wishlistitem" style="background: linear-gradient(to bottom, #CD3C3E, #671E1F) !important;">
                    <i style="color:#fff !important;" class="<?php if(in_array($product->id,$wishedProducts)): ?>
                        fa-solid
                    <?php else: ?>
                        fa-regular
                    <?php endif; ?> fa-heart"></i>
                </button>
                <button class="product-details-love-btn comparelist wave-btn" data-product_id="<?php echo e($product->id); ?>" style="background: linear-gradient(to bottom, #CD3C3E, #671E1F) !important;"><i style="color:#fff !important;" class="fa-solid fa-code-compare"></i></button>
            </div>
        </form>
        <div class="product-detail-btn">
            <a href="javascript:void(0)" style="background: linear-gradient(to bottom, #CD3C3E, #671E1F) !important;" data-checkout = "yes" data-product_id = "<?php echo e($randNum); ?>" class="buy-now-btn quick-buy-btn addtocartbtn">
                <i style="color:#fff !important;" class="fa-solid fa-cart-plus fs-2 me-3"></i><?php echo e(translate("Buy Now")); ?>

            </a>
            <?php if(site_settings('whatsapp_order',App\Enums\StatusEnum::false->status()) == App\Enums\StatusEnum::true->status() ): ?>

                <?php
                            $wpMessage  = site_settings('wp_order_message');
                            $message = str_replace(
                                                    [
                                                        '[product_name]',
                                                        '[link]',
                                                    ],
                                                    [
                                                        $product->name,
                                                        route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])
                                                    ],
                                            $wpMessage);
                            
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
                <span> <?php echo e(translate("Share")); ?>  :</span>
                <div class="product-details-social-link">
                    <a href="https://www.facebook.com/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="__blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://twitter.com/share?url=<?php echo e(urlencode(url()->current())); ?>&text=Simple Share Buttons&hashtags=simplesharebuttons" target="__blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode(url()->current())); ?>" target="__blank"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>












<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/quick_view.blade.php ENDPATH**/ ?>