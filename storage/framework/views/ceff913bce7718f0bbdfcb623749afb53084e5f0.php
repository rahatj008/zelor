

<?php $__env->startPush('style-push'); ?>

   <style>
        .timeline-log{
            max-height: 440px;
            height: 100%;
            margin-top: 20px;
        }

   </style>
<?php $__env->stopPush(); ?>
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
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.inhouse.order.index')); ?>">
                                <?php echo e(translate('Orders')); ?>

                            </a></li>


                        <li class="breadcrumb-item active">
                            <?php echo e(translate('Order Details')); ?>

                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header border-bottom-dashed d-flex align-items-center justify-content-between">
                            <div class="d-flex gap-2 align-items-center">
                                <h5 class="card-title mb-0">
                                    <?php echo e(translate('Order')); ?> -
                                    <?php echo e($order->order_id); ?>

                                </h5>

                                <?php if($order->payment_status == App\Models\Order::UNPAID): ?>
                                    <span class="badge badge-soft-danger"><?php echo e(translate('Unpaid')); ?></span>
                                <?php elseif($order->payment_status == App\Models\Order::PAID): ?>
                                    <span class="badge badge-soft-success"><?php echo e(translate('Paid')); ?></span>
                                <?php endif; ?>
                                &

                                <?php echo order_status_badge($order->status)  ?>


                                <?php if($order->verification_code): ?>
                                   -
                                    <div>
                                        <span class="text-success" title="<?php echo e(translate('Order verification code')); ?>" data-bs-toggle="tooltip"
                                        data-bs-placement="top" >
                                            <?php echo e($order->verification_code); ?>

                                          
                                        </span>
                                    </div>
                                <?php endif; ?>
                               
                            </div>

                     
                          
                            <div>
                                <button type="button" class="btn btn-primary btn-md add-btn waves ripple-light" data-bs-toggle="offcanvas" data-bs-target="#deliveryOffcanvas" aria-controls="deliveryOffcanvas">
                                    <?php if(!$order->deliveryManOrder): ?>
                                      <i class="ri-add-line align-bottom me-1 fs-16"></i>
                                        <?php echo e(translate("Deliveryman")); ?>

                                    <?php else: ?>
                                              <?php echo e(translate("View Deliveryman")); ?>

                                    <?php endif; ?>
                                    
                                </button>
                            </div>

                    
                        </div>
                        
                        <?php if(@$order->deliveryManOrder && 
                            @$order->deliveryManOrder->status == App\Models\DeliveryManOrder::DELIVERED &&
                            $order->status  != App\Models\Order::DELIVERED): ?>
                            <div class="card-body">
                                <div class="alert alert-success material-shadow m-2 mb-2" role="alert">
                                    <strong>  <?php echo e(translate('This order has been delivered by delivery man')); ?>  
                                    </strong> 
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(@$order->deliveryManOrder && 
                        @$order->deliveryManOrder->status == App\Models\DeliveryManOrder::RETURN &&
                        $order->status  != App\Models\Order::RETURN): ?>
                        <div class="card-body">
                            <div class="alert alert-success material-shadow m-2 mb-2" role="alert">
                                <strong>  <?php echo e(translate('This order has been returned by delivery man')); ?>  
                                </strong> 
                            </div>
                        </div>
                    <?php endif; ?>


                  

                        <div class="card-body">
                           
                            <div class="table-responsive table-card">
                                <table class="table table-nowrap align-middle table-borderless mb-0">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            <th scope="col">
                                                <?php echo e(translate('Product Name')); ?>

                                            </th>
                                            <th scope="col">
                                                <?php echo e(translate('Item Price')); ?>

                                            </th>
                                            <th scope="col">
                                                <?php echo e(translate('Qty')); ?>

                                            </th>
                                            <th scope="col">
                                                <?php echo e(translate('Total')); ?>

                                            </th>
                                            <th scope="col">
                                                <?php echo e(translate('Status')); ?>

                                            </th>
                                            <th scope="col">
                                                <?php echo e(translate('Action')); ?>

                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                         
                                            $originalPrice = 0;
                                            $discount = 0;
                                            $tax = 0;
                                            $totalAmount = 0;
                                            
                                        ?>
                                        <?php $__currentLoopData = $orderDeatils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img alt="<?php echo e(@$orderDetail->product->featured_image); ?>"
                                                                class="avatar-md rounded img-thumbnail"
                                                                src="<?php echo e(show_image(file_path()['product']['featured']['path'] . '/' . @$orderDetail->product->featured_image, file_path()['product']['featured']['size'])); ?>">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h5 class="fs-14">
                                                                <a href="<?php echo e(route('admin.item.product.inhouse.details', $orderDetail->product_id)); ?>"
                                                                    class="text-body"><?php echo e($orderDetail->product->name); ?>

                                                                </a>
                                                            </h5>
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="btn btn-outline-primary btn-sm rounded py-0 me-2"><?php echo e($orderDetail->attribute); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo e(short_amount($orderDetail->original_price / $orderDetail->quantity)); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($orderDetail->quantity); ?>

                                                </td>

                                                <td>
                                                    <?php echo e(short_amount($orderDetail->original_price / $orderDetail->quantity*$orderDetail->quantity)); ?>

                                                </td>
                                                <td data-label="<?php echo e(translate('Status')); ?>">
                                                    <?php echo order_status_badge($orderDetail->status)  ?>
                                                </td>
                                                <td data-label="<?php echo e(translate('Action')); ?>">
                                                    <a class="btn-soft-primary fs-18 link-warning p-1 rounded orderstatus"
                                                        title="Delivery Status update" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-toggle="modal"
                                                        data-bs-target="#updateorderstatus" href="javascript:void(0)"
                                                        data-id="<?php echo e($orderDetail->id); ?>"
                                                        data-status="<?php echo e($orderDetail->status); ?>"><i
                                                            class="ri-pencil-line"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                $originalPrice += $orderDetail->original_price;
                                                $tax += $orderDetail->total_taxes;
                                                $discount += $orderDetail->discount;
                                                $totalAmount += $orderDetail->total_price;
                                           ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="border-top border-top-dashed">
                                            <td colspan="4"></td>
                                            <td colspan="3" class="fw-medium p-0">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-start">
                                                                <?php echo e(translate('Original Amount')); ?>

                                                                :</td>
                                                            <td class="text-end">
                                                                <?php echo e(short_amount($originalPrice)); ?>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-start">
                                                                <?php echo e(translate('Tax Amount')); ?>

                                                                :</td>
                                                            <td class="text-end">
                                                                <?php echo e(short_amount($tax)); ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-start">
                                                                <?php echo e(translate('Shipping Cost')); ?>

                                                            </td>
                                                            <td class="text-end">

                                                                 <?php echo e(short_amount($order->shipping_charge)); ?>


                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-start">
                                                                <?php echo e(translate('All Discount')); ?>


                                                                :</td>
                                                            <td class="text-end">
                                                                <?php echo e(short_amount($order->discount)); ?>

                                                            </td>
                                                        </tr>

                                                        <tr class="border-top border-top-dashed">
                                                            <th scope="row" class="fw-bold text-start">
                                                                <?php echo e(translate('Total')); ?>:</th>

                                                            <th class="text-end">
                                                                <?php echo e(short_amount($order->amount)); ?>

                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                                <i class="ri-map-pin-line align-middle me-1 text-muted"></i>
                                <?php echo e(translate('Product Status Update')); ?>

                            </h5>
                        </div>

                        <div class="card-body">
                            <form action="<?php echo e(route('admin.inhouse.order.status.update', $order->id)); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="payment_status" class="form-label"><?php echo e(translate('Payment Status')); ?>

                                            <span class="text-danger">*</span></label>
                                        <select class="form-select" name="payment_status" id="payment_status">


                                            <option value="2" <?php if($order->payment_status == 2): ?> selected <?php endif; ?>>
                                                <?php echo e(translate('Paid')); ?></option>
                                            <option value="1" <?php if($order->payment_status == 1): ?> selected <?php endif; ?>>
                                                <?php echo e(translate('Unpaid')); ?></option>
                                        </select>
                                        <div class="form-group mt-2">
                                            <textarea name="payment_note" placeholder="Write short note" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="status" class="form-label"><?php echo e(translate('Delivery Status')); ?> <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="status" id="status">


                                            <?php $__currentLoopData = App\Models\Order::delevaryStatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <option <?php echo e($order->status ==  $value ? 'selected' : ''); ?> value="<?php echo e($value); ?>">
                                                <?php echo e(ucfirst( $status)); ?>

                                             </option>
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                        <div class="form-group mt-2">
                                            <textarea name="delivery_note" placeholder="Write short note" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-success btn-xl fs-6 px-4 text-light mb-4"><?php echo e(translate('Save')); ?></button>
                            </form>

                            <?php $__currentLoopData = $orderStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center mb-3">
                                                <div>
                                                    <p class="d-block pmd-list-subtitle mb-0"><?php echo e(translate('Note')); ?> :
                                                        <?php echo e($status->payment_note); ?></p>
                                                    <span
                                                        class="text-muted fs-12"><?php echo e($status->created_at->format('d-m-Y')); ?></span>
                                                </div>
                                                <span
                                                    class="badge  bg-<?php echo e($status->payment_status == 1 || !$status->payment_status ? 'danger' : 'success'); ?>">
                                                    <?php echo e($status->payment_status == 1 || !$status->payment_status ? 'Unpaid' : 'paid'); ?>


                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6">
                                        <ul class="list-group">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center mb-3">
                                                <div>
                                                    <p class="d-block pmd-list-subtitle mb-0"><?php echo e(translate('Note')); ?> :
                                                        <?php echo e($status->delivery_note); ?></p>
                                                    <span
                                                        class="text-muted fs-12"><?php echo e($status->created_at->format('d-m-Y')); ?></span>
                                                </div>


                                                <?php echo order_status_badge($status->delivery_status)  ?>
                                             
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">
                                    <?php echo e(translate('Customer Details')); ?>

                                </h5>
                            </div>
                        </div>

                        <div class="card-body">

                             <?php
                                   $customerName = @$order->customer->name ?? @$order->billing_information->first_name;

                                   $email = @$order->customer->email ?? @$order->billing_information->email;

                                   $phone = @$order->customer->phone ?? @$order->billing_information->phone ;
                                   if(@$order->billingAddress){
                                      $email = @$order->billingAddress->email;
                                      $phone = @$order->billingAddress->phone;
                                      $customerName  = @$order->billingAddress->first_name;
                                   }
                             ?>
                            <ul class="list-unstyled mb-0 vstack gap-3">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <?php if($order->customer): ?>
                                            <div class="flex-shrink-0">
                                                <img src="<?php echo e(show_image(file_path()['profile']['user']['path'] . '/' . @$order->customer->image, file_path()['profile']['user']['size'])); ?>"
                                                    alt="<?php echo e(@$order->customer->name); ?>" class="avatar-sm rounded">
                                            </div>
            
                                        <?php endif; ?>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-14 mb-1">
                                                <?php echo e(@$customerName); ?>

                                            </h6>
                                            <p class="text-muted mb-0">
                                                <?php echo e(translate('Customer')); ?>

                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <i class="ri-mail-line me-2 align-middle text-muted fs-16 text-break"></i>
                                    <span class="text-break">
                                        <?php echo e(@$email); ?>

                                    </span>
                                </li>

                                <li>
                                    <i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>
                                    <span
                                        class="text-break"><?php echo e(@$phone); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">
                                    <?php echo e(translate('Payment Information')); ?>

                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-unstyled mb-0 vstack gap-3">

                                <li>
                                    <span class="font-weight-bold text-break"> <?php echo e(translate('Payment status')); ?> :

                                        <?php if($order->payment_status == App\Models\Order::UNPAID): ?>
                                            <span class="badge badge-soft-danger"><?php echo e(translate('Unpaid')); ?></span>
                                        <?php elseif($order->payment_status == App\Models\Order::PAID): ?>
                                            <span class="badge badge-soft-success"><?php echo e(translate('Paid')); ?></span>
                                        <?php endif; ?>
                                    </span>
                                </li>

                                <li>
                                    <span class="font-weight-bold text-break"> <?php echo e(translate('Payment VIA')); ?> :
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
                                </li>


                                <?php if($order->payment_details): ?>
                                    <?php $__currentLoopData = $order->payment_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <span class="font-weight-bold text-break"><?php echo e(k2t($key)); ?> :
                                                <?php echo e($value); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                 
                    <?php if(@$order->billingAddress): ?>
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    <i class="ri-map-pin-line align-middle me-1 text-muted"></i>
                                    <?php echo e(translate('Billing Address')); ?>

                                </h5>
                            </div>

                            <div class="card-body">
                                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">

                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('Address')); ?> :
                                            <?php echo e($order->billingAddress->address->address); ?></span>
                                    </li>

                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('City')); ?> :
                                            <?php echo e($order->billingAddress->city->name); ?></span>
                                    </li>

                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('Email')); ?> :
                                            <?php echo e($order->billingAddress->email); ?></span>
                                    </li>

                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('First Name')); ?> :
                                            <?php echo e($order->billingAddress->first_name); ?></span>
                                    </li>

                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('Last Name')); ?> :
                                            <?php echo e($order->billingAddress->last_name); ?></span>
                                    </li>

                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('Phone')); ?> :
                                            <?php echo e($order->billingAddress->phone); ?></span>
                                    </li>
                                    <?php if(isset($order->billingAddress->state)): ?>
                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('State')); ?> :
                                            <?php echo e($order->billingAddress->state->name); ?></span>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('Zip')); ?> :
                                            <?php echo e($order->billingAddress->zip); ?></span>
                                    </li>
                                        <?php if(isset($order->billingAddress->country)): ?>
                                    <li>
                                        <span class="font-weight-bold text-break"><?php echo e(translate('Country')); ?> :
                                            <?php echo e($order->billingAddress->country->name); ?></span>
                                    </li>
                                        <?php endif; ?>
                                </ul>
                                <?php if(@$order->billingAddress->address->latitude && @$order->billingAddress->address->longitude): ?>
                                    <div class="rounded w-100 h-200 mt-4" id="gmap-site-address"></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php elseif(@$order->billing_information): ?>
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    <i class="ri-map-pin-line align-middle me-1 text-muted"></i>
                                    <?php echo e(translate('Billing Address')); ?>

                                </h5>
                            </div>

                            <div class="card-body">
                                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                                    <?php $__currentLoopData = @$order->billing_information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <span class="font-weight-bold text-break"><?php echo e(k2t($key)); ?> :
                                                <?php echo e($value); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(@$order->shipping): ?>
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    <i class="ri-map-pin-line align-middle me-1 text-muted">
                                    </i>
                                    <?php echo e(translate('Shipping Address')); ?>

                                </h5>
                            </div>

                            <div class="card-body">
                                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                                    <li>
                                      <?php echo e(translate("Carrier")); ?> :  <span><?php echo e(@$order->shipping->name); ?></span>
                                    </li>
                                
                                    <li>
                                        <?php echo e(translate("Duration")); ?> :  <span class="font-weight-bold"><?php echo e(@$order->shipping->duration); ?>

                                            <?php echo e(translate('Days')); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateorderstatus" tabindex="-1" aria-labelledby="updateorderstatus"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?php echo e(route('admin.inhouse.order.product.status.update')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(translate('Status Update')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ostatus" class="form-label"><?php echo e(translate('Status')); ?> <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="status" id="ostatus">
                             
                                <?php $__currentLoopData = App\Models\Order::delevaryStatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option value="<?php echo e($value); ?>">
                                        <?php echo e(ucfirst( $status)); ?>

                                    </option>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="status_html"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="deliveryOffcanvas" aria-labelledby="deliveryOffcanvasLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="deliveryOffcanvasLabel"><?php echo e(translate('Delivery Man Assign')); ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <?php
                 $deliveryData = $order->deliveryManOrder;
            ?>

            <div>
                <form action="<?php echo e(route('admin.order.assign')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="id" value="<?php echo e($order->id); ?>">

                    <div id="deliveryman-assign">
                        <div class="mb-3">
                            <label for="delivery_man_id"
                                class="form-label"><?php echo e(translate('Delivery Man')); ?>

                                <span class="text-danger">*</span></label>
                            <select <?php if($order->status  == App\Models\Order::DELIVERED): ?> disabled <?php endif; ?> class="form-select" name="delivery_man_id" id="delivery_man_id"
                                required>

                                <option disabled selected value="">
                                    <?php echo e(translate('Select a deliveryman')); ?></option>

                                <?php $__currentLoopData = $deliverymen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        <?php echo e($deliveryman->id == @$deliveryData->deliveryman_id ? 'selected' : ''); ?>

                                        value=<?php echo e($deliveryman->id); ?>>
                                        <?php echo e($deliveryman->first_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>

    
                        <div class="mb-3">
                            <label for="pickup_address"
                                class="form-label"><?php echo e(translate('Pickup address')); ?> <span class="text-danger">*</span>
                            </label>


                            <textarea <?php if($order->status  == App\Models\Order::DELIVERED): ?> readonly <?php endif; ?> name="pickup_address" class="form-control"  required  placeholder="<?php echo e(translate('Enter pickup address')); ?>  "  id="note" cols="4" rows="4"><?php echo e(@$deliveryData->pickup_location); ?></textarea>

                        </div>

              
                        <div class="mb-3"
                            id="deliveryManCharge">
                            <label for="delivery_man_charge"
                                class="form-label"><?php echo e(translate('Delivery Fee')); ?>

                            <i  data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Deliveryman charge (this will goes into admin expenses)')); ?>" class="ri-information-line link-danger "></i>
              
                            </label>

                            <input <?php if($order->status  == App\Models\Order::DELIVERED): ?> readonly <?php endif; ?>   value="<?php echo e(round(@$deliveryData->amount,site_settings("digit_after_decimal",2))); ?>" type="number"
                                class="form-control" id="delivery_man_charge" name="delivery_man_charge"
                                placeholder="<?php echo e(translate('Enter an Amount')); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="note"
                                class="form-label"><?php echo e(translate('Note')); ?>

                            </label>


                            <textarea    <?php if($order->status  == App\Models\Order::DELIVERED): ?> readonly <?php endif; ?> name="note" class="form-control"  placeholder="<?php echo e(translate('Enter note')); ?>"  id="note" cols="4" rows="4"><?php echo e(@$deliveryData->note); ?></textarea>


                        </div>

                        

                    </div>

                    <?php if($order->status  != App\Models\Order::DELIVERED): ?>
  
                       <button type="submit"
                        class="btn btn-md btn-primary"><?php echo e(translate('Assign')); ?></button>
                    <?php endif; ?>
                </form>
            </div>
     



            <?php if(@$deliveryData->time_line): ?>
              <hr>

              <div class="mt-4">

                 <h5>
                     <?php echo e(translate("Timeline")); ?>

                 </h5>
                <div data-simplebar class="timeline-log">

                  
                    <div class="acitivity-timeline acitivity-main">

                        <?php $__currentLoopData = @$deliveryData->time_line; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $timeLine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="acitivity-item d-flex mb-1">
                                <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle material-shadow">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 lh-base">
                                        <?php echo e(k2t($key)); ?>

                                    </h6>
                                    <p class="text-muted mb-1">
                                        <?php echo e($timeLine->details); ?>

                                    </p>
                                    <small class="mb-0 text-muted">
                                        <?php echo e(diff_for_humans($timeLine->time)); ?>

                                    </small>
                                </div>
                            </div>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
             
                    </div>
    
                </div>

              </div>

            <?php endif; ?>
       

         
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-push'); ?>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(site_settings('gmap_client_key')); ?>&callback=loadGmap&libraries=places&v=3.49"
        defer></script>

    <script>

        if("<?php echo e(@$order->billingAddress->address->latitude && @$order->billingAddress->address->longitude); ?>"){
            loadGmap()
        }

        function loadGmap() {


            try {

                var latitude = isNaN(parseFloat("<?php echo e(@$order->billingAddress->address->latitude); ?>")) ? 33.14751827254395 : parseFloat(
                        "<?php echo e(@$order->billingAddress->address->latitude); ?>");

            var longitude = isNaN(parseFloat("<?php echo e(@$order->billingAddress->address->longitude); ?>")) ? 73.7561387589157 : parseFloat("<?php echo e(@$order->billingAddress->address->longitude); ?>");



            var mapConfig = {
                lat: latitude,
                lng: longitude
            };

            const map = new google.maps.Map(document.getElementById("gmap-site-address"), {
                center: {
                    lat: latitude,
                    lng: longitude
                },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            var marker = new google.maps.Marker({
                position: mapConfig,
                map: map,
            });

            marker.setMap(map);
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(mapsMouseEvent) {

                var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinates);
                var latlng = new google.maps.LatLng(coordinates['lat'], coordinates['lng']);
                marker.setPosition(latlng);
                map.panTo(latlng);

                document.getElementById('latitude').value = coordinates['lat'];
                document.getElementById('longitude').value = coordinates['lng'];

                geocoder.geocode({
                    'latLng': latlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('address').value = results[1].formatted_address;
                        }
                    }

                });
            });

            const input = document.getElementById("map-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function(event) {


                        document.getElementById('latitude').value = this.position.lat();
                        document.getElementById('longitude').value = this.position.lng();

                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
                
            } catch (error) {
                
            }

            
        };


        (function($) {
            "use strict";
            $('.orderstatus').on('click', function() {
                var modal = $('#updateorderstatus');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('select[name=status]').val($(this).data('status'));
                modal.modal('show');
            });

          
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/order/details.blade.php ENDPATH**/ ?>