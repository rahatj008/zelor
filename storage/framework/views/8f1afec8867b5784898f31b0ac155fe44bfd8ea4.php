
<?php $__env->startPush('stylepush'); ?>
    <style>
        .fs-30{
            font-size: 30px;
        }
        .text--primary{
            color: var(--primary)
        }
        .profile-image {
            width: 40px;
            height: 40px;
            overflow: hidden;
            border-radius: 50%;
        }

        .profile-img {
            width: 100%;
            height: auto;
        }

        .title {
            font-weight: bold;
            font-size: 13px
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="" style="background:#404040 !important; padding: 5rem 2rem !important;">
        <div class="Container">
            <div class="tracking-container">
                <p class="fs-5 text-white" style="background:var(--primary) !important;">
                    <?php echo e(translate("To track your order please enter your Order ID in the box below and press the “Track Button”. This was given to you on your receipt and in the confirmation email you should have received")); ?>

                </p>

                <form class="tracking-form">
                    <div class="tracking-id">
                        <label for="trackingId" class="form-label text-white">
                            <?php echo e(translate('TRACKING ID ')); ?>

                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="order_number" id="trackingId" value="<?php echo e($orderNumber ?? null); ?>"
                            placeholder="Enter order ID" class="form-control" />
                    </div>
                    <div class="tracking-id">
                        <label for="email" class="form-label text-white">
                            <?php echo e(translate('BILLING EMAIL')); ?>

                        </label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="<?php echo e(translate('Email you using during checkout')); ?>" />
                    </div>
                    <button class="tracking-submit-btn">
                        <?php echo e(translate('Track Now')); ?>

                    </button>
                </form>

                <?php if($order): ?>
                    <div class="row g-4">
                        <div class="col-xl-9 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <h4 class="card-title">
                                                <?php echo e(translate('Tracking order lists')); ?>

                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="tracking-tabs-content">
                                        <div class="tracking-product">
                                            <div class="order-processing">
                                                <div class="tracking-wrapper">
                                                    <div class="empty-bar"></div>
                                                    <div
                                                        class="color-bar <?php if(@$order->status == 2): ?> order-confirm
                                                <?php elseif(@$order->status == 3): ?>
                                                     courier
                                                <?php elseif(@$order->status == 4): ?>
                                                     way
                                                <?php elseif(@$order->status == 5): ?>
                                                    pickup <?php endif; ?> ">
                                                    </div>
                                                    <ul>
                                                        <li class="order-status">
                                                            <div class="el"><i class="fa-solid fa-circle-check"></i>
                                                            </div>
                                                            <p class="order-status-text">
                                                                <?php echo e(translate('Order Confirm')); ?>

                                                                <span></span>
                                                            </p>
                                                        </li>
                                                        <li class="order-status">
                                                            <div class="el"><i class="fa-solid fa-box"></i></div>
                                                            <p class="order-status-text">
                                                                <?php echo e(translate('Picked by courier')); ?>

                                                                <span></span>
                                                            </p>
                                                        </li>
                                                        <li class="order-status">
                                                            <div class="el"><i class="fa-solid fa-truck-fast"></i></div>
                                                            <p class="order-status-text">
                                                                <?php echo e(translate('On The Way')); ?>

                                                                <span></span>
                                                            </p>
                                                        </li>
                                                        <li class="order-status">
                                                            <div class="el">
                                                                <i class="fa-solid fa-check"></i>
                                                            </div>
                                                            <p class="order-status-text">
                                                                <?php echo e(translate('Delivered')); ?>

                                                                <span></span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tracking-order-info">
                                                <p class="order-id">
                                                    <?php echo e(translate('Order ID')); ?>

                                                    : <span>#<?php echo e(@$order->order_id); ?></span></p>
                                                <div class="tracking-order-status">
                                                    <div class="tracking-order-status-item">
                                                        <p> <?php echo e(translate('Order date')); ?> :</p>
                                                        <span><?php echo e(get_date_time(@$order->created_at, 'd M Y')); ?></span>
                                                    </div>
                                                    <div class="tracking-order-status-item">
                                                        <p><?php echo e(translate('Shipping by')); ?> :</p>
                                                        <span><?php echo e($order->shipping_deliverie_id != null ? $order->shipping?->name : 'N/A'); ?></span>


                                                        <?php if($order->shipping): ?>
                                                            <div>
                                                                <?php echo e(translate('Delivery In')); ?> :
                                                                <?php echo e($order->shipping->duration); ?> <?php echo e(translate('Days')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </div>



                                                    <div class="tracking-order-status-item">
                                                        <p> <?php echo e(translate('Status')); ?> :</p>
                                                        <?php if(@$order->status == 1): ?>
                                                            <span><?php echo e(translate('Order Placed')); ?></span>
                                                        <?php elseif(@$order->status == 2): ?>
                                                            <span><?php echo e(translate('Order Confirm')); ?></span>
                                                        <?php elseif(@$order->status == 3): ?>
                                                            <span><?php echo e(translate('Picked by courier')); ?></span>
                                                        <?php elseif(@$order->status == 4): ?>
                                                            <span><?php echo e(translate('On The Way')); ?></span>
                                                        <?php elseif(@$order->status == 5): ?>
                                                            <span><?php echo e(translate('Delivered')); ?></span>
                                                        <?php elseif($order->status == 6): ?>
                                                            <span><?php echo e(translate('Order Cancel')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <?php
                                                    $subTotal = 0;
                                                    $originalPrice = 0;
                                                    $discount = 0;
                                                    $tax = 0;
                                                    $totalAmount = 0;

                                                ?>

                                                <?php if($order->OrderDetails->isNotEmpty()): ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap align-middle mt-0">
                                                            <thead class="table-light">
                                                                <tr class="text-muted fs-14">
                                                                    <th scope="col">
                                                                        <?php echo e(translate('Product')); ?>

                                                                    </th>

                                                                    <th scope="col" class="text-center">
                                                                        <?php echo e(translate('Original Price')); ?>

                                                                    </th>

                                                                    <th scope="col" class="text-center">
                                                                        <?php echo e(translate('Tax amount')); ?>

                                                                    </th>
                                                                    <th scope="col" class="text-center">
                                                                        <?php echo e(translate('Discount')); ?>

                                                                    </th>

                                                                    <th scope="col" class="text-center">
                                                                        <?php echo e(translate('Total Price')); ?>

                                                                    </th>

                                                                    <th scope="col" class="text-center">
                                                                        <?php echo e(translate('Status')); ?>

                                                                    </th>

                                                                
                                                                    
                                                                    <th scope="col" class="text-end">
                                                                        <?php echo e(translate('Chat')); ?>

                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                                <?php $__currentLoopData = $order->OrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(@$orderDetail->product): ?>
                                                                        <tr class="tr-item fs-14">
                                                                            <td>
                                                                                <div class="order-item">
                                                                                    <div class="order-item-img">
                                                                                        <img src="<?php echo e(show_image(file_path()['product']['featured']['path'] . '/' . @$orderDetail->product->featured_image, file_path()['product']['featured']['size'])); ?>"
                                                                                            alt="<?php echo e(@$orderDetail->product->featured_image); ?>" />
                                                                                    </div>
                                                                                    <div class="order-item-content">
                                                                                        <div class="order-product-details">
                                                                                            <h5>
                                                                                                <a
                                                                                                    href="<?php echo e(route('product.details', [ $orderDetail->product->slug ? $orderDetail->product->slug : make_slug($orderDetail->product->name), $orderDetail->product->id])); ?>">
                                                                                                    <?php echo e($orderDetail->product->name); ?>

                                                                                                </a>

                                                                                            </h5>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                           
                                                                            </td>
                                                                         

                                                                            <td class="text-center">
                                                                                <span><?php echo e(short_amount($orderDetail->original_price)); ?></span>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <span><?php echo e(short_amount($orderDetail->total_taxes)); ?></span>
                                                                            </td>

                                                                            <td class="text-center">
                                                                                <span><?php echo e(short_amount($orderDetail->discount)); ?></span>
                                                                            </td>

                                                                            <td class="text-center">
                                                                                <span><?php echo e(short_amount($orderDetail->total_price)); ?></span>
                                                                            </td>

                                                                            <td class="text-center">
                                                                                <?php echo order_status_badge($orderDetail->status)  ?>
                                                                            </td>

                                                
                                                                            <td class="text-end">
                                                                                <?php
                                                                                   $seller = $orderDetail->product ? $orderDetail->product->seller : null;
                                                                                ?>
                                                                                <?php if($seller): ?>
                                                                                    <a  title="<?php echo e(translate('Chat with seller')); ?>"
                                                                                    data-bs-toggle="tooltip" data-bs-placement="top" href="<?php echo e(route('user.seller.chat.list' , ['seller_id' => @$seller->id])); ?>"
                                                                                         class="chat-btn"><i class="fa-brands fa-rocketchat"></i>
                                                                                    </a>
                                                                                <?php else: ?>
                                                                                 <?php echo e(translate("N/A")); ?>

                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                            $originalPrice +=
                                                                                $orderDetail->original_price;
                                                                            $tax += $orderDetail->total_taxes;
                                                                            $discount += $orderDetail->discount;
                                                                            $totalAmount += $orderDetail->total_price;
                                                                        ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </tbody>
                                                        </table>

                                                        <li
                                                            class="d-flex align-items-center justify-content-between gap-4 subtotal">
                                                            <span class="fw-semibold ps-4 py-4  fs-14 nowrap">
                                                                <?php echo e(translate('Sub Total')); ?>:</span>
                                                            <span class="fw-semibold text-end pe-4 py-3  fs-14 nowrap"
                                                                id="subtotalamount">
                                                                <?php echo e(short_amount($originalPrice)); ?>

                                                            </span>
                                                        </li>

                                                        <li
                                                            class="d-flex align-items-center justify-content-between gap-4 subtotal">
                                                            <span class="fw-semibold ps-4 py-4  fs-14 nowrap">
                                                                <?php echo e(translate('All Taxes')); ?>:</span>
                                                            <span class="fw-semibold text-end pe-4 py-3  fs-14 nowrap">
                                                                <?php echo e(short_amount($tax)); ?></span>
                                                        </li>

                                                        <li
                                                            class="d-flex align-items-center justify-content-between gap-4 subtotal">
                                                            <span class="fw-semibold ps-4 py-4  fs-14 nowrap">
                                                                <?php echo e(translate('Total Discount')); ?>:</span>
                                                            <span class="fw-semibold text-end pe-4 py-3  fs-14 nowrap">
                                                                <?php echo e(short_amount($order->discount)); ?></span>
                                                        </li>

                                                        <li
                                                            class="d-flex align-items-center justify-content-between gap-4 subtotal">
                                                            <span class="fw-semibold ps-4 py-4  fs-14 nowrap">
                                                                <?php echo e(translate('Shpping charge')); ?>:</span>
                                                            <span class="fw-semibold text-end pe-4 py-3  fs-14 nowrap">
                                                                <?php echo e(short_amount($order->shipping_charge)); ?></span>
                                                        </li>

                                                        <li
                                                            class="table-active d-flex align-items-center justify-content-between gap-4">
                                                            <h6 class="ps-4 py-3 nowrap fs-14 fw-bold">
                                                                <?php echo e(translate('Total')); ?> :</h6>
                                                            <span class="text-end pe-4 py-3 nowrap fs-14">
                                                                <span id="totalamount" class="fw-bold">

                                                                    <?php echo e(short_amount($order->amount)); ?>

                                                                </span>
                                                            </span>
                                                        </li>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4">


                            
                 
                            <?php if(site_settings('delivery_man_module') == \App\Enums\StatusEnum::true->status() 
                                 && @$order->deliveryManOrder 
                                 && @$order->deliveryManOrder->deliveryMan): ?>
                               <?php if($order->deliveryManOrder->status != \App\Models\DeliveryManOrder::PENDING): ?>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <h4 class="card-title fs-16">
                                                        <?php echo e(translate('Deliveryman')); ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                             $deliveryMan =  $order->deliveryManOrder->deliveryMan->load(['ratings']);
                                        ?>

                                        <div class="card-body ">
                                            <div class="d-flex align-items-start flex-column gap-4 billing-list">

                                                <div class="d-flex justify-content-between w-100 align-items-center gap-3">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="profile-image">
                                                            <img src="<?php echo e(show_image(file_path()['profile']['delivery_man']['path'] . '/' . $deliveryMan->image, file_path()['profile']['delivery_man']['size'])); ?>"
                                                                alt="profile.jpg">
                                                        </div>
                                                        <div class="title">
                                                            <?php echo e($deliveryMan->first_name . ' ' . $deliveryMan->last_name); ?>

                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <a href="tel:<?php echo e($deliveryMan->phone); ?>"
                                                            class="chat-btn border-0"><i
                                                                class="fa-solid fa-phone"></i>
                                                        </a>

                                                        <?php if(site_settings('chat_with_customer') == \App\Enums\StatusEnum::true->status()): ?>
                                                            <a href="<?php echo e(route('user.deliveryman.chat.list', ['deliveryman_id' => @$deliveryMan->id])); ?>"
                                                                class="chat-btn"><i class="fa-brands fa-rocketchat"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php
                                                
                                                @$deliveryman_rating = $deliveryMan
                                                                            ->ratings
                                                                            ->where('order_id',@$order->id)
                                                                            ->where('user_id',@auth_user('web')->id)
                                                                            ->first();
                            
                                                @$rate = is_null($deliveryman_rating)
                                                        ? translate('Rate this Deliveryman')
                                                        : translate('See your Review');
                                            ?>

                                            <?php if(auth()->user()): ?>
                                                <div class="mt-4  text-center">
                                                    <button type="button" class="AddReview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#addReviewModal">
                                                        <?php echo e(@$rate); ?>

                                                    </button>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                               <?php endif; ?>
                            <?php endif; ?>

                   

                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <h4 class="card-title fs-16">
                                                <?php echo e(translate('Billing Info')); ?>

                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <?php
                                        $user = auth_user('web');
                                    ?>
                                    <div class="d-flex align-items-start flex-column gap-4 billing-list ">

                                        <?php if(@$order->billingAddress): ?>
                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('Address name')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->name); ?></span>
                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('First Name')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->first_name); ?></span>

                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('Last name')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->last_name); ?></span>
                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('Phone')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->phone); ?></span>

                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('Address')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->address->address); ?></span>

                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('Zip')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->zip); ?></span>
                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('Country')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->country->name); ?></span>
                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('State')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->state->name); ?></span>
                                            <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                    class="text-muted fs-14"><?php echo e(translate('City')); ?>:</small>
                                                <?php echo e(@$order->billingAddress->city->name); ?></span>
                                        <?php endif; ?>

                                        <?php if(@$order->billing_information): ?>
                                            <?php $__currentLoopData = @$order->billing_information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                        class="text-muted fs-14"><?php echo e(k2t($key)); ?>:</small>
                                                    <?php echo e($address); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>


                            <?php if($order->custom_information): ?>

                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <h4 class="card-title fs-16">
                                                    <?php echo e(translate('Custom Info')); ?>

                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">

                            
                                        <div class="d-flex align-items-start flex-column gap-4 billing-list ">

                                            <?php if(@$order->custom_information): ?>
                                                <?php $__currentLoopData = @$order->custom_information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                            class="text-muted fs-14"><?php echo e(k2t($key)); ?>:</small>
                                                        <?php echo e($address); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>

                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <h4 class="card-title fs-16">
                                                <?php echo e(translate('Order Info')); ?>

                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body ">
                                    <div class="d-flex align-items-start flex-column gap-4 billing-list">
                                        <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                class="text-muted fs-14">
                                                <?php echo e(translate('Order number')); ?> :</small> <?php echo e(@$order->order_id); ?></span>
                                        <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                class="text-muted fs-14">
                                                <?php echo e(translate('Payment Method')); ?> :</small>

                                            <?php if($order->wallet_payment == App\Models\Order::WALLET_PAYMENT): ?>
                                                
                                                <?php echo e(translate('Payment VIA Wallet')); ?>


                                            <?php else: ?>
                                                <?php if($order->payment_type == '2'): ?>
                                                    <?php echo e(@$order->paymentMethod ? $order->paymentMethod->name : 'N/A'); ?>

                                                <?php else: ?>
                                                    <?php echo e(translate('Cash On Delivary')); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                                
                                        </span>

                                        <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                class="text-muted fs-14">
                                                <?php echo e(translate('Total Amount')); ?> :</small>
                                            <?php echo e(short_amount($order->amount)); ?>

                                        </span>

                                        <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                class="text-muted fs-14">
                                                <?php echo e(translate('Payment Status')); ?> :</small>
                                            <?php if($order->payment_status == '1'): ?>
                                                <?php echo e(translate('Unpaid')); ?>

                                            <?php else: ?>
                                                <?php echo e(translate('Paid')); ?>

                                            <?php endif; ?>
                                        </span>
                                        <span class="fs-14 d-flex align-items-center gap-3"> <small
                                                class="text-muted fs-14">
                                                <?php echo e(translate('Order Status')); ?> :</small>

                                                <?php echo order_status_badge($order->status)  ?>
                                        </span>

                                        <span class="fs-14 d-flex align-items-center gap-3"> <small
                                            class="text-muted fs-14">
                                            <?php echo e(translate('Date')); ?> :</small>

                                            <?php echo e(diff_for_humans($order->created_at)); ?>

                                        </span>


                                    </div>
                                </div>
                            </div>


                            <?php if($order->order_type == App\Models\Order::DIGITAL): ?>

    
                               <?php
                                   
                                   $order = $order->load(['digitalProductOrder']);
                                   $orderDetail = $order->digitalProductOrder->load(['digitalProductAttributeValue','digitalProductAttributeValue.digitalProductAttributeValueKey']);

                                   $attribute = $orderDetail?->digitalProductAttributeValue;

                                   $attributeValues    =   $orderDetail?->digitalProductAttributeValue?->digitalProductAttributeValueKey;
                             

                               ?>

                               <?php if( @$attribute && @$attributeValues ): ?>


                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center gap-3">
                                                    <h4 class="card-title fs-16">
                                                        <?php echo e(translate('Attribute info')); ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="card-body ">

                                            <div class="d-flex gap-4 mb-4 fs-14">
                                                <?php echo e(translate("Attribute Name")); ?> : <span class="badge-soft-success fs-12 badge"><?php echo e(@$attribute->name); ?></span>
                                            </div>

                                            <?php $__currentLoopData = @$attributeValues->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="d-flex align-items-start flex-column gap-4 billing-list mb-3">
                                                    <span class="d-flex align-items-start flex-column gap-2">
                                                         <small class="fs-14">
                                                            <?php echo e($value->name ? $value->name : 'N/A'); ?> :
                                                        </small>  
                                                        <p class="fs-12 text-muted d-flex align-items-center gap-2"> 
                                                            
                                                            <?php if($value->file ): ?>
                                                   
                                                                <a href="<?php echo e(route('attribute.download',['order_id' => $order->order_id,'id'=>$value->id])); ?>" class="badge badge-soft-info fs-12 pointer">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a> 
                                                            <?php endif; ?>
                                                            <?php echo e($value->value); ?>

                                                        </p>                                                        
                                                    </span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </div>
                                    </div>

                                <?php endif; ?>
                            <?php endif; ?>


                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>





    <?php if(@$deliveryMan): ?>

        <div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <?php if(is_null($deliveryman_rating)): ?>
                            <?php echo e(translate('Add Review')); ?>

                            <?php else: ?>
                            <?php echo e(translate('Your Review')); ?>

                            <?php endif; ?>
                        </h5>
                        <button type="button" class="btn btn-light fs-14 modal-closer rounded-circle"
                            data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body">
                        <?php if(is_null($deliveryman_rating)): ?>
                            <div class="add-review">
                                <form action="<?php echo e(route('user.deliveryman.rating')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="deliveryman_id" value="<?php echo e($deliveryMan->id); ?>">
                                    <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">

                                    <div class="rate">
                                        <input type="radio" id="star5" name="rating" value="5">
                                        <label for="star5" title="text"></label>
                                        <input type="radio" id="star4" name="rating" value="4">
                                        <label for="star4" title="text"></label>
                                        <input type="radio" id="star3" name="rating" value="3">
                                        <label for="star3" title="text"></label>
                                        <input type="radio" id="star2" name="rating" value="2">
                                        <label for="star2" title="text"></label>
                                        <input type="radio" id="star1" name="rating" value="1">
                                        <label for="star1" title="text"></label>
                                    </div>

                                    <textarea rows="5" name="message" placeholder="Your review" class="form-control my-4"></textarea>

                                    <button class="add-review-btn">
                                        <?php echo e(translate('Submit Review')); ?>

                                    </button>
                                </form>

                            </div>
                        <?php else: ?>
                            <div class="see-review">

                                <div class="text-center">

                                    <div class="d-flex justify-content-center gap-3">
                                        <h4 class="fs-30"><?php echo e($deliveryman_rating->rating); ?></h4>
                                    <i class="fa fa-star fs-30 text--primary"></i>
                                    </div>


                                </div>

                                <textarea disabled rows="5" name="message" placeholder="Your review" class="form-control my-4"><?php echo e($deliveryman_rating->message); ?></textarea>


                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/track_order.blade.php ENDPATH**/ ?>