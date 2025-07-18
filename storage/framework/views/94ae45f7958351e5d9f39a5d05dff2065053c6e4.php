
<?php $__env->startSection('main_content'); ?>
    <div class="page-content">
        <div class="container-fluid">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">
                    <?php echo e(translate($title)); ?>

                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">
                                <?php echo e(translate('Home')); ?>

                            </a></li>
                        <li class="breadcrumb-item active">
                            <?php echo e(translate('Seller Orders')); ?>

                        </li>
                    </ol>
                </div>
            </div>

            <div class="card" id="orderList">
                <div class="card-header border-0">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">
                                    <?php echo e(translate('Order List')); ?>

                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body  border border-dashed border-end-0 border-start-0">
                    <form action="<?php echo e(route(Route::currentRouteName(), Route::current()->parameters())); ?>" method="get">
                        <div class="row g-3">
                            <div class="col-xl-4 col-sm-6">
                                <div class="search-box">
                                    <input type="text" name="search" value="<?php echo e(request()->input('search')); ?>"
                                        class="form-control search" placeholder="Search for order ID, customer">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>

                            <div class="col-xl-4 col-sm-6">
                                <div class="search-box">
                                    <input type="text" id="datePicker" name="date"
                                        value="<?php echo e(request()->input('date')); ?>" class="form-control search"
                                        placeholder="<?php echo e(translate('Search by date')); ?>">
                                    <i class="ri-time-line search-icon"></i>

                                </div>
                            </div>

                            <div class="col-xl-2 col-sm-3 col-6">
                                <div>
                                    <button type="submit" class="btn btn-primary w-100 waves ripple-light"> <i
                                            class="ri-equalizer-fill me-1 align-bottom"></i>
                                        <?php echo e(translate('Search')); ?>

                                    </button>
                                </div>
                            </div>

                            <div class="col-xl-2 col-sm-3 col-6">
                                <div>
                                    <a href="<?php echo e(route(Route::currentRouteName(), Route::current()->parameters())); ?>"
                                        class="btn btn-danger w-100 waves ripple-light"> <i
                                            class="ri-refresh-line me-1 align-bottom"></i>
                                        <?php echo e(translate('Reset')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="card-body pt-0">
                    <ul class="nav nav-tabs nav-tabs-custom nav-primary mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('admin.seller.order.index') ? 'active' : ''); ?> All py-3"
                                id="All" href="<?php echo e(route('admin.seller.order.index')); ?>">
                                <i class="ri-luggage-cart-line me-1 align-bottom"></i>
                                <?php echo e(translate('All
                                                                                                                                Orders')); ?>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs('admin.seller.order.pending') ? 'active' : ''); ?>  Placed py-3'
                                id="pending" href="<?php echo e(route('admin.seller.order.pending')); ?>">
                     
                                <i class="ri-pause-circle-line me-1 align-bottom"></i>
                                <?php echo e(translate('Pending Orders')); ?>

                             
                            </a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('admin.seller.order.placed') ? 'active' : ''); ?>  Placed py-3"
                                id="Placed" href="<?php echo e(route('admin.seller.order.placed')); ?>">
                                <i class="ri-map-pin-line me-1 align-bottom"></i>
                                <?php echo e(translate('Placed Orders')); ?>



                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('admin.seller.order.confirmed') ? 'active' : ''); ?> Confirmed py-3"
                                id="Confirmed" href="<?php echo e(route('admin.seller.order.confirmed')); ?>">
                                <i class="ri-rocket-line me-1 align-bottom"></i>
                                <?php echo e(translate('Confirmed Order')); ?>


                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link Processing <?php echo e(request()->routeIs('admin.seller.order.processing') ? 'active' : ''); ?>   py-3"
                                id="Processing" href="<?php echo e(route('admin.seller.order.processing')); ?>">
                                <i class="ri-refresh-line me-1 align-bottom"></i>
                                <?php echo e(translate('Processing')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link Processing <?php echo e(request()->routeIs('admin.seller.order.shipped') ? 'active' : ''); ?>   py-3"
                                id="shipped" href="<?php echo e(route('admin.seller.order.shipped')); ?>">
                                <i class="ri-ship-line me-1 align-bottom"></i>
                                <?php echo e(translate('Shipped')); ?>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link py-3 <?php echo e(request()->routeIs('admin.seller.order.delivered') ? 'active' : ''); ?>   Delivered"
                                id="Delivered" href="<?php echo e(route('admin.seller.order.delivered')); ?>">
                                <i class="ri-checkbox-circle-line me-1 align-bottom"></i>

                                <?php echo e(translate('Delivered')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('admin.seller.order.cancel') ? 'active' : ''); ?>   py-3 Returns"
                                id="Returns" href="<?php echo e(route('admin.seller.order.cancel')); ?>">
                                <i class="ri-close-circle-line me-1 align-bottom"></i>

                                <?php echo e(translate('Canceled Order')); ?>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs('admin.seller.order.return') ? 'active' : ''); ?>   py-3 Returns'
                                id="Returns" href="<?php echo e(route('admin.seller.order.return')); ?>">
                                
                                <i class="ri-text-wrap me-1 align-bottom"></i>

                                <?php echo e(translate('Return Order')); ?>

                            </a>
                        </li>
                    </ul>

                    <div class="table-responsive table-card">
                        <table class="table table-hover table-nowrap align-middle mb-0">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th>
                                        <?php echo e(translate('Order ID')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(translate('Qty')); ?>

                                    </th>
                                    <th><?php echo e(translate('Time')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(translate('Customer Info')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(translate('Product Details')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(translate('Amount')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(translate('Delivery')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(translate('Action')); ?>

                                    </th>
                                </tr>
                            </thead>

                            <tbody class="list form-check-all">
                                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo e(translate('Order Number')); ?>">

                                            <a href="<?php echo e(route('admin.seller.order.details', $order->id)); ?>"
                                                class="text-primary fw-bold" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Order Number">
                                                <?php echo e($order->order_id); ?>

                                            </a>
                                        </td>
                                        <td data-label="<?php echo e(translate('Qty')); ?>">
                                            <span><?php echo e($order->qty); ?></span><br>
                                        </td>
                                        <td data-label="<?php echo e(translate('Time')); ?>">
                                            <span class="fw-bold"><?php echo e(diff_for_humans($order->created_at)); ?></span><br>
                                            <?php echo e(get_date_time($order->created_at)); ?>

                                        </td>

                                        <td data-label="<?php echo e(translate('Customer Info')); ?>" class="text-align-left">

                                            <?php
                                               $firstName = @$order->billingAddress ?  @$order->billingAddress->first_name : @$order->billing_information->first_name ;
                                               $lastName  = @$order->billingAddress ?  @$order->billingAddress->last_name : @$order->billing_information->last_name ;
                                               $phone  = @$order->billingAddress ?  @$order->billingAddress->phone : @$order->billing_information->phone ;
                                               $email  = @$order->billingAddress ?  @$order->billingAddress->email : @$order->billing_information->email ;
                                               $city  = @$order->billingAddress ?  @$order->billingAddress->city->name : @$order->billing_information->city ;
                                               $country  = @$order->billingAddress ?  @$order->billingAddress->country->name : @$order->billing_information->country ;
                                               $zip  = @$order->billingAddress ?  @$order->billingAddress->zip : @$order->billing_information->zip ;
                                               $address  = @$order->billingAddress ?  @$order->billingAddress->address->address : @$order->billing_information->address ;
                                            ?>



                                           <span><?php echo e(translate('Name')); ?>:
                                               <?php echo e(@$order->customer->name ?? @$firstName); ?></span><br>
                                           <span><?php echo e(translate('Phone')); ?>:
                                               <?php echo e(@$order->customer->phone ?? @$phone); ?></span>
                                           <br>
                                           <?php if($order->customer_id): ?>
                                               <a href="<?php echo e(route('admin.customer.details', $order->customer_id)); ?>"
                                                   class="fw-bold text-dark">
                                                   <span>
                                                       <?php echo e(translate('Email')); ?>

                                                       : <?php echo e(@$order->customer->email ?? 'N\A'); ?></span>
                                               </a>
                                           <?php else: ?>
                                               <span>
                                                   <?php echo e(translate('Email')); ?>

                                                   : <?php echo e(@$email ?? 'N\A'); ?></span>
                                           <?php endif; ?>
                                           <br>

                                           <span>
                                               <?php echo e(translate('Country')); ?>

                                               : <?php echo e(@$country); ?></span> <br>

                                           <span>
                                               <?php echo e(translate('City')); ?>

                                               : <?php echo e(@$city); ?></span> <br>
                                           <span>
                                               <?php echo e(translate('Address')); ?>

                                               :
                                               <?php echo e(@$address); ?>

                                           </span> <br>

                                           <span class="badge bg-primary"><?php echo e(translate('Shipping Method')); ?>:
                                               <?php echo e(@$order->shipping->name ?? 'N\A'); ?></span> <br>
                                       </td>
                                        <td data-label="<?php echo e(translate('Product Details')); ?>" class="tex-align-left">

                                            <button data-details ="<?php echo e($order->orderDetails); ?>"
                                                class="ms-2  order-btn btn btn-info btn-sm custom-toggle active"
                                                data-bs-toggle="modal" id="order-btn"
                                                data-bs-target="#orderDetails"><?php echo e(translate('view All')); ?>

                                                (<?php echo e($order->orderDetails->count()); ?>)
                                            </button>

                                        </td>

                                        <td data-label="<?php echo e(translate('Amount')); ?>">
                                            <span class="fw-bold">
                                                <?php echo e(short_amount($order->amount)); ?></span><br>
                                            <?php if($order->payment_status == App\Models\Order::UNPAID): ?>
                                                <span class="badge badge-soft-danger"><?php echo e(translate('Unpaid')); ?></span>
                                            <?php elseif($order->payment_status == App\Models\Order::PAID): ?>
                                                <span class="badge badge-soft-success"><?php echo e(translate('Paid')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td data-label="<?php echo e(translate('Delivery Status')); ?>">
                                            <?php echo order_status_badge($order->status)  ?>
                                        </td>

                                        <td data-label="<?php echo e(translate('Action')); ?>">
                                            <div class="hstack justify-content-center gap-3">
                                                <a title="Details" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    href="<?php echo e(route('admin.seller.order.details', $order->id)); ?>"
                                                    class="link-info fs-18"><i class="ri-list-check"></i></a>
                                                <a title="Print" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    href="<?php echo e(route('admin.inhouse.order.print', [$order->id, 'seller'])); ?>"
                                                    class="link-success fs-18">
                                                    <i class="ri-printer-line"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="border-bottom-0" colspan="100">
                                            <?php echo $__env->make('admin.partials.not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <?php echo e($orders->appends(request()->all())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="orderDetails" tabindex="-1" aria-labelledby="orderDetails" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title"><?php echo e(translate('Product Info')); ?>

                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-hover table-centered align-middle table-nowrap">
                                <tbody id="product-info">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-danger "
                        data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-push'); ?>
    <script>
        (function($) {
            "use strict";

            $('.order-btn').on('click', function() {
                var modal = $('#orderDetails');
                var order_details = $(this).attr('data-details')

                order_details = JSON.parse(order_details);
                var html = ''
                for (var i in order_details) {

                    if (order_details[i].product) {
                        var url = "<?php echo e(route('product.details', [':slug', ':id'])); ?>"
                        url = (url.replace(':slug', order_details[i].product.slug ? order_details[i].product.slug : convertSlug(order_details[i].product.name))).replace(':id',
                            order_details[i].product.id)
                        html += `  <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                            <img onerror="this.onerror=null;this.src='<?php echo e(route('default.image', '200x200')); ?>';" src="<?php echo e(asset('/assets/images/backend/product/featured')); ?>/${order_details[i].product.featured_image}" alt="${order_details[i].product.featured_image}" class="img-fluid d-block">
                                        </div>
                                        <div>
                                            <h5 class="fs-14 my-1"><a href="${url}" class="text-reset">${order_details[i].product.name}</a></h5>
                                            <span class="text-muted">
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="fs-14 my-1 fw-normal">
                                        <span class='badge badge-soft-info'> ${order_details[i].attribute} </span>
                                    </h5>
                                    <span class="text-muted">
                                        <?php echo e(translate('Attribute')); ?>

                                    </span>
                                </td>

                                <td>
                                    <h5 class="fs-14 my-1 fw-normal"><?php echo e(show_currency()); ?>${Math.round(order_details[i].total_price)} </h5>
                                    <span class="text-muted"><?php echo e(translate('Amount')); ?></span>
                                </td>
                            </tr>`
                    }
                }
                $('#product-info').html(html)
                modal.modal('show');
            });

            //convert string to slug start
            function convertSlug(Text) {
                return Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            }


        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/seller_order/index.blade.php ENDPATH**/ ?>