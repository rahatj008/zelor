
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
                            <?php echo e(translate('Inhouse Orders')); ?>

                        </li>
                    </ol>
                </div>
            </div>

            <div class="card" id="orderList">
                <div class="card-header border-0">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <h5 class="card-title mb-0">
                                <?php echo e(translate('Order List')); ?>

                            </h5>
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

                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-custom nav-primary mb-3" role="tablist">
                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs('admin.inhouse.order.index') ? 'active' : ''); ?> All py-3'
                                id="All" href="<?php echo e(route('admin.inhouse.order.index')); ?>">
                                <i class="ri-luggage-cart-line me-1 align-bottom"></i>
                                <?php echo e(translate('All Orders')); ?>

                            </a>
                        </li>



                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs('admin.inhouse.order.pending') ? 'active' : ''); ?>  Placed py-3'
                                id="pending" href="<?php echo e(route('admin.inhouse.order.pending')); ?>">
                     
                                <i class="ri-pause-circle-line me-1 align-bottom"></i>
                                <?php echo e(translate('Pending Orders')); ?>

                             
                            </a>
                        </li>
              

                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs('admin.inhouse.order.placed') ? 'active' : ''); ?>  Placed py-3'
                                id="Placed" href="<?php echo e(route('admin.inhouse.order.placed')); ?>">
                                <i class="ri-map-pin-line me-1 align-bottom"></i>
                                <?php echo e(translate('Placed Orders')); ?>

                                <?php if($physical_product_order_count > 0): ?>
                                    <span
                                        class="badge bg-danger align-middle ms-1"><?php echo e($physical_product_order_count); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs('admin.inhouse.order.confirmed') ? 'active' : ''); ?> Confirmed py-3'
                                id="Confirmed" href="<?php echo e(route('admin.inhouse.order.confirmed')); ?>">
                                <i class="ri-checkbox-multiple-fill me-1 align-bottom"></i>
                                <?php echo e(translate('Confirmed Order')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link Processing <?php echo e(request()->routeIs('admin.inhouse.order.processing') ? 'active' : ''); ?>   py-3'
                                id="Processing" href="<?php echo e(route('admin.inhouse.order.processing')); ?>">
                                <i class="ri-refresh-line me-1 align-bottom"></i>
                                <?php echo e(translate('Processing')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link Processing <?php echo e(request()->routeIs('admin.inhouse.order.shipped') ? 'active' : ''); ?>   py-3'
                                id="shipped" href="<?php echo e(route('admin.inhouse.order.shipped')); ?>">
                                <i class="ri-ship-line me-1 align-bottom"></i>
                                <?php echo e(translate('Shipped')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link py-3 <?php echo e(request()->routeIs('admin.inhouse.order.delivered') ? 'active' : ''); ?>   Delivered'
                                id="Delivered" href="<?php echo e(route('admin.inhouse.order.delivered')); ?>">
                                <i class="ri-checkbox-circle-line me-1 align-bottom"></i>

                                <?php echo e(translate('Delivered')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs('admin.inhouse.order.cancel') ? 'active' : ''); ?>   py-3 Ceturns'
                                id="cancel" href="<?php echo e(route('admin.inhouse.order.cancel')); ?>">
                                <i class="ri-close-circle-line me-1 align-bottom"></i>

                                <?php echo e(translate('Canceled Order')); ?>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs('admin.inhouse.order.return') ? 'active' : ''); ?>   py-3 Returns'
                                id="Returns" href="<?php echo e(route('admin.inhouse.order.return')); ?>">
                                
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

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo e(translate('Order Number')); ?>">
                                            <a href="<?php echo e(route('admin.inhouse.order.details', $order->id)); ?>"
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
                                                $city  = @$order->billingAddress && @$order->billingAddress?->city 
                                                                         ? @$order->billingAddress?->city?->name 
                                                                         : @$order->billing_information?->city ;
                                                $country =@$order->billingAddress ? @$order->billingAddress->country->name : @$order->billing_information->country;
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

                                        <td data-label="<?php echo e(translate('Order Details')); ?>" class="tex-align-left">
                                            <button data-details ="<?php echo e($order->orderDetails); ?>"
                                                class="ms-2  order-btn btn btn-info btn-sm custom-toggle active"
                                                data-bs-toggle="modal"
                                                data-bs-target="#orderDetails"><?php echo e(translate('view All')); ?>

                                                (<?php echo e($order->orderDetails->count()); ?>)
                                            </button>
                                        </td>
                                        <td data-label="<?php echo e(translate('Payment Status')); ?>">
                                            <span class="fw-bold">
                                                <?php echo e(short_amount($order->amount)); ?>

                                            </span><br>
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
                                                <?php if(permission_check('view_order')): ?>
                                                    <a title="<?php echo e(translate('Print')); ?>"
                                                        href="<?php echo e(route('admin.inhouse.order.print', [$order->id, 'inhouse'])); ?>"
                                                        class="fs-18 link-success">
                                                        <i class="ri-printer-line"></i>
                                                    </a>
                                                    <a title="<?php echo e(translate('Details')); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        href="<?php echo e(route('admin.inhouse.order.details', $order->id)); ?>"
                                                        class="fs-18 link-info ms-1"><i class="ri-list-check"></i></a>
                                                <?php endif; ?>
                                                <?php if(permission_check('update_order')): ?>
                                                    <a title="<?php echo e(translate('Order Status')); ?>"
                                                        data-order_id="<?php echo e($order->id); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" href="javascript:void(0)"
                                                        class="fs-18 link-warning order_id">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if(permission_check('delete_order')): ?>
                                                    <?php if($order->status == App\Models\Order::CANCEL): ?>
                                                        <a href="javascript:void(0);"
                                                            data-href="<?php echo e(route('admin.inhouse.order.delete', $order->id)); ?>"
                                                            class="delete-item fs-18 link-danger">
                                                            <i class="ri-delete-bin-line"></i></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
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

                    <div class="pagination-wrapper d-flex justify-content-end mt-4">
                        <?php echo e($orders->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.modal.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="modal fade" id="orderStatus" tabindex="-1" aria-labelledby="orderStatus" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?php echo e(route('admin.inhouse.order.status.update')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="order_id" value="" id="order_id">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title"><?php echo e(translate('Status Update')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-select" id="select_status">
                                <option value=""><?php echo e(translate('Select Status')); ?></option>
                                <option value="payment_status"><?php echo e(translate('Payment Status')); ?></option>
                                <option value="delivery_status"><?php echo e(translate('Delivery Status')); ?></option>
                            </select>
                        </div>

                        <div class="status_html"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo e(translate('Update')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="orderDetails" tabindex="-1" aria-labelledby="orderDetails" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title"><?php echo e(translate('Product Info')); ?>

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal">
                    </button>
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

            $(".order_id").on('click', function() {

                $('.status_html').html('');
                $("#order_id").val($(this).data("order_id"));
                $("#select_status").val('');

                var modal = $('#orderStatus');

                modal.modal('show');
            });

            $('#select_status').on('change', function() {
                var select_status = $('#select_status').val();
                if (select_status == 'payment_status') {
                    $('.status_html').html(`
                    <div class="form-group mt-2">
                        <label for="payment_status" class="form-label"><?php echo e(translate('Status')); ?> <span class="text-danger">*</span></label>
                        <select class="form-control" name="payment_status" id="payment_status">
                            <option value="2"><?php echo e(translate('Paid')); ?></option>
                            <option value="1"><?php echo e(translate('Unpaid')); ?></option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <textarea name="payment_note" placeholder="Write short note" class="form-control"></textarea>
                    </div>
                    `);
                }

                if (select_status == 'delivery_status') {
                    $('.status_html').html(`
                    <div class="form-group mt-2">
                        <label for="status" class="form-label"><?php echo e(translate('Status')); ?> <span class="text-danger">*</span></label>
                        <select class="form-select" name="status" id="status">
                            <option value=""><?php echo e(translate('Nothing Selected')); ?></option>
                            <option value="0"><?php echo e(translate('Pending')); ?></option>
                            <option value="1"><?php echo e(translate('Placed')); ?></option>
                            <option value="2"><?php echo e(translate('Confirmed')); ?></option>
                            <option value="3"><?php echo e(translate('Processed')); ?></option>
                            <option value="4"><?php echo e(translate('Shipped')); ?></option>
                            <option value="5"><?php echo e(translate('Delivered')); ?></option>
                            <option value="6"><?php echo e(translate('Cancel')); ?></option>
                            <option value="7"><?php echo e(translate('Return')); ?></option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <textarea name="delivery_note" placeholder="Write short note" class="form-control"></textarea>
                    </div>
                `)


                }
            });

            $('.order-btn').on('click', function() {
                var modal = $('#orderDetails');
                var order_details = $(this).attr('data-details')

                order_details = JSON.parse(order_details);

                var html = ''
                for (var i in order_details) {
                    if (order_details[i].product) {
                        var url = "<?php echo e(route('product.details', [':slug', ':id'])); ?>"
                        url = (url.replace(':slug', order_details[i].product.slug ? order_details[i].product.slug :  convertSlug(order_details[i].product.name))).replace(':id',
                            order_details[i].product.id)
                        html += `  <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                <img  onerror="this.onerror=null;this.src='<?php echo e(route('default.image', '200x200')); ?>';" src="<?php echo e(asset('/assets/images/backend/product/featured')); ?>/${order_details[i].product.featured_image}" alt="${order_details[i].product.featured_image}" class="img-fluid d-block">
                                            </div>
                                            <div>
                                                <h5 class="fs-14 mb-0"><a href="${url}" class="text-reset">${order_details[i].product.name}</a></h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted fw-semibold">
                                            <?php echo e(translate('Attribute')); ?>

                                        </span>

                                        <h5 class="fs-14 mb-0 mt-1">
                                            <span class='badge badge-soft-info'> ${order_details[i].attribute} </span>
                                        </h5>

                                    </td>

                                    <td>
                                        <span class="text-muted fw-semibold"><?php echo e(translate('Amount')); ?></span>
                                        <h5 class="fs-14 mb-0 mt-1 fw-normal"><?php echo e(default_currency()->symbol); ?>${Math.round(order_details[i].total_price)} </h5>
                                    </td>
                                </tr>`
                    }
                }
                $('#product-info').html(html)
                modal.modal('show');
            });


            function convertSlug(Text) {
                return Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            }




        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/order/index.blade.php ENDPATH**/ ?>