    <div class="table-responsive table-card position-relative order-summary-table">
        <?php  
            
            
            $shippingConfiguration =  json_decode(site_settings('shipping_configuration')); 

            $flatShippingRate      =  @$shippingConfiguration->standard_shipping_fee ?? 0;
            
            $reward_point_system        = site_settings('club_point_system') == App\Enums\StatusEnum::true->status();

            $reward_point_via          = site_settings('reward_point_by',0);

            $rewardPointConfigurations  = !is_array(site_settings('order_amount_based_reward_point',[])) 
                                                            ? json_decode(site_settings('order_amount_based_reward_point',[]),true) 
                                                            : [];
            $productWisePoint  = 0;

         ?>




        <table class="table table-borderless align-middle mb-0 w-100">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="fs-14">
                        <?php echo e(translate('Product')); ?>

                    </th>

                  
                    <th scope="col" class="text-end fs-14 nowrap">
                        <?php echo e(translate("Price")); ?>

                    </th>


                    <?php if(auth()->user()&& 
                       $reward_point_system && 
                       $reward_point_via == App\Enums\StatusEnum::false->status()): ?>
                        <th scope="col" class="text-end fs-14 nowrap">
                            <?php echo e(translate("Point")); ?>

                        </th>
                    <?php endif; ?>

                    <?php if(@$shippingConfiguration->shipping_option == 'PRODUCT_CENTRIC'): ?>
                        <th scope="col" class="text-end fs-14 nowrap">
                            <?php echo e(translate("Shipping")); ?>

                        </th>
                    <?php endif; ?>

                </tr>
            </thead>
            <?php
                $subTotal       =  0;
                $shippingCharge =  (@$shippingConfiguration->shipping_option == 'FLAT') ? $flatShippingRate : 0 ;

                if(@$shippingConfiguration->shipping_option == 'LOCATION_BASED'){
                    $shippingCharge  = @$city->shipping_fee ?? 0;
                }

                if(@$shippingConfiguration->shipping_option == 'CARRIER_SPECIFIC'){
                    $shippingCharge  = @$shippingDeliveryCharge ?? 0;
                }

                $discount       =  0;
                $taxAmount      =  0;
       
            ?>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td class="text-start">
                            <div class="d-flex align-items-start gap-4 nowrap">
                                    <div class="checkout-pro-img m-0 position-relative">
                                        <img class="m-0" src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$data->product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($data->product->name); ?>">

                                        <span data-id="<?php echo e($data->id); ?>" class="remove-product addtocart-remove-btn remove-cart-data"><i class="fa-solid fa-xmark"></i></span>
                                    </div>
                                    <div class="check-item">
                                        <h4 class="product-title pb-1">
                                            <a href="<?php echo e(route('product.details',[$data->product->slug ? $data->product->slug : make_slug($product->name),$data->product->id])); ?>">
                                                <?php echo e(limit_words($data->product->name,2)); ?>

                                            </a>
                                        </h4>
                                        <p class="text-muted fs-12 lh-1"><?php echo e(short_amount($data->price - $data->total_taxes)); ?> x <?php echo e($data->quantity); ?>  (<?php echo e($data->attributes_value); ?>) </p>
                                    </div>
                            </div>
                        </td>

                        <td class="text-end nowrap"><?php echo e(short_amount(($data->price - $data->total_taxes)*$data->quantity)); ?></td>

                        <?php if(auth()->user() && 
                            $reward_point_system && 
                            $reward_point_via == App\Enums\StatusEnum::false->status()): ?>
                              <td class="text-end nowrap"><?php echo e($data->product->point); ?></td>
                        <?php endif; ?>


                        <?php if(@$shippingConfiguration->shipping_option == 'PRODUCT_CENTRIC'): ?>
                            <?php
                                $shippingFees =  $data->product->shipping_fee;
                                if($data->product->shipping_fee_multiply == 1 )$shippingFees *=$data->quantity;
                            ?>
                            <td class="text-end nowrap"><?php echo e(short_amount($shippingFees)); ?></td>

                        <?php endif; ?>


                    </tr>
                    <?php
                       $productWisePoint += @$data->product->point ?? 0;
                       $subTotal  += (($data->original_price-$data->total_taxes )*$data->quantity);
                       $discount  += ($data->discount*$data->quantity);
                       $taxAmount += ($data->total_taxes*$data->quantity);
                       if(@$shippingConfiguration->shipping_option == 'PRODUCT_CENTRIC'){
                           $shippingCharge+=$shippingFees;
                       }
                       
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php
            $subTotal  = short_amount($subTotal,false,false);
            $discount  = short_amount($discount,false,false);
            $taxAmount = short_amount($taxAmount,false,false);
            $shippingCharge = short_amount($shippingCharge,false,false);
        ?>

        <div class="order-summary-loader loader-spinner d-none ">
            <div class="spinner-border" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>

    </div>
<ul>

    <?php if(auth()->user()): ?>
        <li class="py-4 coupon-input">
            <div class="input-group">
                <input name="coupon_code" type="text" class="form-control border-2" placeholder="Enter your Coupon" aria-label="Enter your Coupon">
                <button type="button" class="input-group-text btn-success fs-14 apply-btn " >
                    <?php echo e(translate("Apply")); ?>

                </button>
            </div>
        </li>
    <?php endif; ?>

    <li class="d-flex align-items-center justify-content-between gap-4 subtotal">
        <span class="fw-semibold ps-4 py-4  fs-14 nowrap">
            <?php echo e(translate("Sub Total")); ?>:</span>
        <span class="fw-semibold text-end pe-4 py-3  fs-14 nowrap"  ><?php echo e(show_amount($subTotal)); ?></span>
    </li>  
    
    <li class="d-flex align-items-center justify-content-between gap-4 subtotal">
        <span class="fw-semibold ps-4 py-4  fs-14 nowrap">
            <?php echo e(translate("All Taxes")); ?>:</span>
        <span class="fw-semibold text-end pe-4 py-3  fs-14 nowrap"><?php echo e(show_amount($taxAmount)); ?></span>
    </li>
    
    
    <li class="d-flex align-items-center justify-content-between gap-4 subtotal">
        <span class="fw-semibold ps-4 py-4  fs-14 nowrap">
            <?php echo e(translate("Regular discount")); ?>:</span>
        <span class="fw-semibold text-end pe-4 py-3  fs-14 nowrap"><?php echo e(show_amount($discount)); ?></span>
    </li>  
    

    <li class="d-flex align-items-center justify-content-between gap-4 subtotal">
        <span class="fw-semibold ps-4 py-4  fs-14 nowrap">
            <?php echo e(translate("Shipping fees")); ?>:</span>
        <span class="fw-semibold text-end pe-4 py-3  fs-14 nowrap"><?php echo e(show_amount($shippingCharge)); ?></span>
    </li>  

    <?php 
         $couponAmount = Arr::get(@session()->get('coupon') ?? [],'amount',0);
    ?>

    <li class="order-coupon-item d-flex align-items-center justify-content-between gap-4 <?php if(!session()->has('coupon')): ?> d-none <?php endif; ?>">
        <span  class="ps-4 py-2 nowrap fs-14">
            <?php echo e(translate("Coupon Discount")); ?>

            <span class="text-muted">(<?php echo e(translate("Coupon")); ?>)</span>
            : </span>
        <span class="text-end pe-4 py-2 nowrap fs-14">  <span>- <?php echo e(show_currency()); ?><span
            id="couponamount"><?php echo e($couponAmount); ?></span></span></span>
    </li>

    <li class="order-cost-item order-shipping-cost d-none d-flex align-items-center justify-content-between gap-4">
        <span class="ps-4 py-3 nowrap fs-14"><?php echo e(translate("Shipping Charge")); ?> :</span>
        <span class="text-end pe-4 py-3 nowrap fs-14" >
            <?php echo e(show_currency()); ?><span id="shipping_cost">0</span>
        </span>
    </li>

    <?php
        $total = (($subTotal -  $couponAmount) + $shippingCharge)-$discount + $taxAmount;
    ?>

    <li class="table-active d-flex align-items-center justify-content-between gap-4" data-sub ="<?php echo e($total); ?>" id="subtotalamount">
        <h6 class="ps-4 py-3 nowrap fs-14 fw-bold"><?php echo e(translate("Total")); ?> :</h6>
        <span class="text-end pe-4 py-3 nowrap fs-14">
           <span id="totalamount" class="fw-bold"  >
             
                <?php echo e(show_amount($total )); ?>

            </span>
        </span>
    </li>

    <?php if(auth()->user() && $reward_point_system): ?>
        <li class="table-active d-flex align-items-center justify-content-between gap-4">
            <h6 class="ps-4 py-3 nowrap fs-14 fw-bold"><?php echo e(translate("Total Point Earned")); ?> :</h6>
            <span class="text-end pe-4 py-3 nowrap fs-14">
            <span id="totalamount" class="fw-bold">

                  <?php if($reward_point_via == App\Enums\StatusEnum::false->status()): ?>
                            <?php echo e($productWisePoint); ?>

                  <?php else: ?>
                     <?php

                        $configuration =   collect($rewardPointConfigurations)
                                                ->filter(function ($item) use ($total) : bool {
                                                    $item = (object)($item);
                                                    return $total > $item->min_amount && $total <= $item->less_than_eq;
                                                })->first();

                        $configuration = is_array($configuration)  
                                                ? (object)$configuration
                                                : null ; 

  
                     ?>
                      <?php echo e(@$configuration->point ?? (int) site_settings('default_reward_point',0)); ?>

                  <?php endif; ?>
                </span>
            </span>
        </li>
    <?php endif; ?>

</ul> <?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/order_summary.blade.php ENDPATH**/ ?>