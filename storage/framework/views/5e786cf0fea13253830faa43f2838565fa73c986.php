
<?php $__env->startSection('main_content'); ?>
<div class="page-content">
    <div class="container-fluid">
        <div class="h-100">
            <div class="d-flex align-items-lg-center flex-lg-row flex-column mb-3 pb-1">
                <div class="flex-grow-1">
                    <h4 class="fs-3 mb-0">
                        <?php echo e(translate('Wellcome back')); ?>,
                        <span class="text-primary">
                            <?php echo e(auth_user()->name); ?>

                        </span>
                    </h4>
                </div>
                <div class="mt-3 mt-lg-0">

                     <span class="fw-semibold"><?php echo e(translate('Last Cron Run')); ?></span> :
                      <span class="badge badge-soft-success fs-12">
                         <?php  
                             $setting = App\Models\Setting::where("key", 'last_cron_run')->first();
                         ?>
                         <?php echo e($setting && $setting->value   ?  $setting->value : 'N/A'); ?>

                      </span>

                </div>
            </div>

            <?php
                $taskConfig = site_settings('task_config') 
                                   ? json_decode(site_settings('task_config'),true)  
                                   : [];
            ?>

            <?php if(!in_array('mail_config',$taskConfig) ||  !in_array('ai_config',$taskConfig)): ?>

                <div class="mb-4">
                    <h4>
                        <?php echo e(translate('Tasks to be done!')); ?>

                    </h4>

                    <div class="d-flex flex-column gap-3">
                        <?php if(!in_array('mail_config',$taskConfig)): ?>
                            <div class="alert alert-primary alert-dismissible alert-border-left  alert-label-icon fade show mb-xl-0 todo-alart material-shadow" role="alert">
                                <span class="me-2">
                                    <a href="<?php echo e(route('admin.mail.configuration')); ?>" class="btn btn-secondary btn-sm py-1">
                                        <?php echo e(translate('Setup')); ?>

                                    </a>
                                </span>

                                <?php echo e(translate('Mail Configuration - used for sending emails')); ?>

                                <a  onclick="return confirm('Have you completed this task?')"  href="?task=mail_config" class="todo-alart-close"><i class="ri-close-line"></i></a>
                            </div>
                        <?php endif; ?>

                        <?php if(!in_array('ai_config',$taskConfig)): ?>
                            <div class="alert alert-primary alert-dismissible alert-border-left alert-label-icon fade show mb-xl-0 todo-alart material-shadow" role="alert">
                                <span class="alert-icon">
                                    <a href="<?php echo e(route('admin.general.ai.configuration')); ?>" class="btn btn-secondary btn-sm py-1">
                                        <?php echo e(translate('Setup')); ?>

                                    </a>
                                </span>

                                <?php echo e(translate('AI Configuration - used for generating content using open AI')); ?>

                                <a onclick="return confirm('Have you completed this task?')"  href="?task=ai_config" class="todo-alart-close"><i class="ri-close-line"></i></a>

                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="ri-money-dollar-circle-line text-success"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                        <?php echo e(short_amount(Arr::get($data,'total_payment',0))); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate("Total Earnings")); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.report.user.transaction')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="ri-money-dollar-circle-fill text-info"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                       <?php echo e(short_amount(Arr::get($data,'subscription_earning',0))); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate("Subscription Payment")); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.plan.subscription')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="ri-money-pound-circle-line text-primary"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                        <?php echo e(short_amount(Arr::get($data,'order_payment',0))); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate("Order Payment")); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.inhouse.order.index')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="ri-wallet-3-fill text-warning"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                        <?php echo e(short_amount(Arr::get($data,'total_withdraw',0))); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate("Withdraw Amount")); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.withdraw.log.index')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                         <i class="bx bxl-product-hunt text-success"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                        <?php echo e(Arr::get($data,'physical_product',0)); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate("Products")); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.item.product.inhouse.index')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="col-xxl-3 col-xl-4 col-sm-6">-->
                <!--    <div class="card card-animate">-->
                <!--        <div class="card-body">-->
                <!--            <div class="d-flex align-items-start justify-content-between">-->
                <!--                <div class="flex-shrink-0">-->
                <!--                    <span class="overview-icon">-->
                <!--                        <i class="ri-disc-line text-primary"></i>-->
                <!--                    </span>-->
                <!--                </div>-->

                <!--                <div class="text-end">-->
                <!--                    <h4 class="fs-22 fw-bold ff-secondary mb-2">-->
                <!--                        <?php echo e(Arr::get($data,'digital_product',0)); ?>-->
                <!--                    </h4>-->


                <!--                    <p class="text-uppercase fw-medium text-muted mb-3">-->
                <!--                        <?php echo e(translate("Digital Products")); ?>-->
                <!--                    </p>-->

                <!--                    <a href="<?php echo e(route('admin.digital.product.index')); ?>" class="d-flex align-items-center justify-content-end gap-1">-->
                <!--                        <?php echo e(translate('View All')); ?>-->
                <!--                         <i class="ri-arrow-right-line"></i>-->
                <!--                    </a>-->
                <!--                </div>-->

                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="bx bxs-group text-info"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                        <?php echo e(Arr::get($data,'total_customer',0)); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate("Total Customers")); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.customer.index')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="bx bx-user-circle text-warning"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                         <?php echo e(Arr::get($data,'total_seller',0)); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate("Total Sellers")); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.seller.info.index')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="ri-home-gear-fill text-primary"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                          <?php echo e(Arr::get($data,'inhouse_order',0)); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                         <?php echo e(translate('Inhouse Orders')); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.inhouse.order.index')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="ri-check-double-line text-primary"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                          <?php echo e(Arr::get($data,'delivered_order',0)); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate('Delivered Orders')); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.inhouse.order.delivered')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                        <i class="ri-ship-2-line text-info"></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                          <?php echo e(Arr::get($data,'shipped_order',0)); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                        <?php echo e(translate('Shipped Orders')); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.inhouse.order.shipped')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0">
                                    <span class="overview-icon">
                                         <i class='bx bx-x-circle text-danger'></i>
                                    </span>
                                </div>

                                <div class="text-end">
                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                          <?php echo e(Arr::get($data,'cancel_order',0)); ?>

                                    </h4>


                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                         <?php echo e(translate('Canceld Orders')); ?>

                                    </p>

                                    <a href="<?php echo e(route('admin.inhouse.order.cancel')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                        <?php echo e(translate('View All')); ?>

                                         <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-height-100">
                        <div class="card-header border-bottom-dashed align-items-center d-flex mb-2">
                            <h4 class="card-title mb-0 flex-grow-1">
                                <?php echo e(translate('Monthly Order Insight')); ?>

                            </h4>

                        </div>

                        <div class="card-body">
                            <?php if(count($data['monthly_order_report'])): ?>
                                <div id="monthlyOrderChart" class="apex-charts"  data-colors='["--ig-primary", "--ig-success", "--ig-secondary", "--ig-danger", "--ig-info","--ig-primary","--ig-warning"]'>
                                </div>
                            <?php else: ?>
                                <?php echo $__env->make('admin.partials.not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                            <h4 class="card-title mb-0 flex-grow-1">
                                    <?php echo e(translate("Latest Orders")); ?>

                            </h4>

                            <div class="flex-shrink-0">
                                <a href="<?php echo e(route('admin.inhouse.order.index')); ?>" class="text-decoration-underline">
                                    <?php echo e(translate('View All')); ?>

                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-hover align-middle table-nowrap " >
                                    <thead class="text-muted table-light">
                                        <tr class="text-uppercase">
                                            <th>
                                                <?php echo e(translate(
                                                    "Order ID"
                                                )); ?>

                                            </th>
                                            <th>
                                                <?php echo e(translate('Qty')); ?>

                                            </th>
                                            <th  ><?php echo e(translate('Time')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(translate('Customer Info')); ?>

                                            </th>

                                            <th >
                                                <?php echo e(translate('Amount')); ?>

                                            </th>
                                            <th >
                                                <?php echo e(translate('Delivery')); ?>

                                            </th>
                                            <th >
                                                <?php echo e(translate('Action')); ?>

                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="form-check-all">

                                        <?php $__empty_1 = true; $__currentLoopData = Arr::get($data,'latest_orders'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                            <tr>
                                                <td data-label="<?php echo e(translate('Order Number')); ?>">
                                                    <span class="text-primary fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Order Number">
                                                        <?php echo e($order->order_id); ?>

                                                    </span>
                                                </td>

                                                <td data-label="<?php echo e(translate('Qty')); ?>">
                                                    <span><?php echo e($order->qty); ?></span><br>
                                                </td>
                                                <td data-label="<?php echo e(translate('Time')); ?>">
                                                    <span class="fw-bold"><?php echo e(diff_for_humans($order->created_at)); ?></span><br>
                                                    <?php echo e(get_date_time($order->created_at)); ?>

                                                </td>
                                                <td data-label="<?php echo e(translate('Customer')); ?>" class="text-align-left">

                                                    <?php if($order->customer_id): ?>
                                                        <a href="<?php echo e(route('admin.customer.details', $order->customer_id)); ?>" class="fw-bold text-dark">
                                                            <?php echo e(@$order->customer->name ?? $order->customer->email); ?>

                                                        </a>
                                                    <?php else: ?>
                                      
                                                         <?php echo e(@$order->billingAddress ? @$order->billingAddress->email :  @$order->billing_information->email ?? 'N/A'); ?>

                                                    <?php endif; ?>

                                                </td>


                                                <td data-label="<?php echo e(translate('Amount')); ?>">
                                                    <span class="fw-bold">
                                                        <?php echo e((short_amount($order->amount))); ?>

                                                    </span><br>

                                                    <?php echo order_payment_status($order->payment_status) ?>

                                                </td>
                                                <td data-label="<?php echo e(translate('Delivery Status')); ?>">

                                                    <?php echo order_status_badge($order->status) ?>

                                                </td>
                                                <td data-label="<?php echo e(translate('Action')); ?>">
                                                    <div class="hstack gap-3">
                                                        <?php if(permission_check('view_order')): ?>
                                                            <a title="<?php echo e(translate('Print')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" href="<?php echo e(route('admin.inhouse.order.print', [$order->id, 'inhouse'])); ?>"
                                                                class="fs-18 link-success order_id">
                                                                <i class="ri-printer-line"></i>
                                                            </a>

                                                            <a title="<?php echo e(translate('Details')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"  href="<?php echo e(route('admin.inhouse.order.details', $order->id)); ?>"
                                                                class="fs-18 link-info ms-1"><i class="ri-list-check"></i></a>
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-8 col-xl-7">
                    <div class="card card-height-100">
                        <div class="card-header border-bottom-dashed align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                <?php echo e(translate('Best Selling Products')); ?>

                            </h4>

                            <div class="flex-shrink-0">
                                <a href="<?php echo e(route('admin.item.product.inhouse.index')); ?>" class="text-decoration-underline">
                                    <?php echo e(translate('View All')); ?>

                                </a>
                            </div>

                        </div>

                        <div class="card-body card-height-100">
                            <div class="table-responsive table-card">
                                <table class="table table-hover align-middle table-nowrap ">
                                    <thead class="text-muted table-light">
                                        <tr class="text-uppercase">
                                            <th class="text-start"><?php echo e(translate('Product')); ?></th>
                                            <th><?php echo e(translate('Categories - Sold Item')); ?></th>
                                            <th><?php echo e(translate('Info')); ?></th>
                                            <th><?php echo e(translate('Top Item - Todays Deal')); ?></th>
                                            <th><?php echo e(translate('Time - Status')); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody class="form-check-all">

                                        <?php $__empty_1 = true; $__currentLoopData = Arr::get($data,'best_selling_product'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inhouseProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img class="rounded avatar-sm img-thumbnail" alt="<?php echo e(@$inhouseProduct->featured_image); ?>" src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$inhouseProduct->featured_image,file_path()['product']['featured']['size'])); ?>"
                                                            >
                                                        </div>
                                                        <div class="flex-grow-1">
                                                           <?php echo e(limit_words($inhouseProduct->name,2)); ?>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    <span class="badge bg-info text-white fw-bold"><?php echo e((@get_translation($inhouseProduct->category->name))); ?>


                                                    </span>
                                                    <br>
                                                    <span>
                                                        <?php echo e(translate('Total Sold')); ?> : <?php echo e($inhouseProduct->order->count()); ?>

                                                    </span>
                                                </td>

                                                <td data-label="<?php echo e(translate('Info')); ?>">
                                                    <span><?php echo e(translate('Regular Price')); ?> : <?php echo e((short_amount($inhouseProduct->price))); ?> <br> <?php echo e(translate('Discount Price')); ?> : <?php echo e((short_amount($inhouseProduct->discount))); ?></span>

                                                </td>


                                                <td data-label="<?php echo e(translate('Top Product')); ?>">
                                                    <a href="<?php echo e(route('admin.item.product.inhouse.top', $inhouseProduct->id)); ?>" class=" fs-15 link-<?php echo e($inhouseProduct->top_status == 1 ? 'danger':'success'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Top Product')); ?>"><?php echo e(($inhouseProduct->top_status==1?'No':'Yes')); ?> <i class="las la-arrow-alt-circle-left"></i></a> <i class="las la-arrows-alt-v"></i>
                                                    <a href="<?php echo e(route('admin.item.product.inhouse.featured.status', $inhouseProduct->id)); ?>" class="fs-15 link-<?php echo e($inhouseProduct->featured_status == 1 ? 'danger':'success'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Todays Deal')); ?>"><?php echo e(($inhouseProduct->featured_status==1?'No':'Yes')); ?> <i class="las la-arrow-alt-circle-left"></i></a>
                                                </td>

                                                <td data-label="<?php echo e(translate('Time - Status')); ?>">
                                                    <span><?php echo e(get_date_time($inhouseProduct->created_at, 'd M Y')); ?></span><br>
                                                    <?php echo product_status($inhouseProduct->status) ?>

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
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5">
                    <div class="card card-height-100">
                        <div class="card-header border-bottom-dashed align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                <?php echo e(translate("Top Category")); ?>

                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="top-category" data-simplebar>
                                <ul class="list-group">
                                    <?php $__empty_1 = true; $__currentLoopData = Arr::get($data,'top_categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img class="rounded avatar-sm img-thumbnail" src="<?php echo e(show_image(file_path()['category']['path'].'/'.$category->banner,file_path()['category']['size'])); ?>" alt="<?php echo e($category->banner); ?>"
                                                            >
                                                        </div>

                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="fs-14 fw-semibold mb-0 text-break">
                                                                <?php echo e(@get_translation($category->name)); ?>

                                                            </p>
                                                            <small class="text-muted">
                                                                    <?php echo e(diff_for_humans($category->created_at)); ?>

                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <p class="text-info mb-0">
                                                            <?php echo e($category->product_count); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <li class="list-group-item">
                                                <?php echo $__env->make('admin.partials.not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                <?php echo e(translate('Orders Insight')); ?>

                            </h4>

                        </div>

                        <div class="card-header p-0 border-0 bg-light-subtle">
                            <div class="row g-0 text-center">

                                <div class="col-4 col-sm-4">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span><?php echo e(Arr::get($data,'inhouse_order',0) + Arr::get($data,'digital_order',0)); ?></span></h5>
                                        <p class="text-muted mb-0">
                                                <?php echo e(translate("Total Orders")); ?>

                                        </p>
                                    </div>
                                </div>

                                <div class="col-4 col-sm-4">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1">
                                            <span>
                                                <?php echo e(Arr::get($data,'inhouse_order',0)); ?>

                                            </span>
                                        </h5>
                                        <p class="text-muted mb-0">
                                            <?php echo e(translate("Orders")); ?>

                                        </p>
                                    </div>
                                </div>

                                <!--<div class="col-4 col-sm-4">-->
                                <!--    <div class="p-3 border border-dashed border-start-0-->
                                <!--    border-end-0">-->
                                <!--        <h5 class="mb-1">-->
                                <!--            <?php echo e(Arr::get($data,'digital_order',0)); ?>-->
                                <!--        </h5>-->
                                <!--        <p class="text-muted mb-0"><?php echo e(translate("Digital Orders")); ?></p>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>

                        <div class="card-body p-2">
                            <div id="orderChart" class="apex-charts"  data-colors='["--ig-primary", "--ig-success", "--ig-secondary", "--ig-danger", "--ig-info","--ig-primary","--ig-warning"]'>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header border-0">
                            <h4 class="card-title mb-0 flex-grow-1">
                                <?php echo e(translate("Product Insight")); ?>

                            </h4>
                        </div>


                        <div class="card-header p-0 border-0 bg-light-subtle">
                            <div class="row g-0 text-center">

                                <div class="col-4 col-sm-4">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1"><span><?php echo e(Arr::get($data,'physical_product',0) + Arr::get($data,'digital_product',0)); ?></span></h5>
                                        <p class="text-muted mb-0">
                                                <?php echo e(translate("Total Product")); ?>

                                        </p>
                                    </div>
                                </div>

                                <div class="col-4 col-sm-4">
                                    <div class="p-3 border border-dashed border-start-0">
                                        <h5 class="mb-1">
                                            <span>
                                                <?php echo e(Arr::get($data,'physical_product',0)); ?>

                                            </span>
                                        </h5>
                                        <p class="text-muted mb-0">
                                            <?php echo e(translate("Product")); ?>

                                        </p>
                                    </div>
                                </div>

                                <!--<div class="col-4 col-sm-4">-->
                                <!--    <div class="p-3 border border-dashed border-start-0-->
                                <!--    border-end-0">-->
                                <!--        <h5 class="mb-1">-->
                                <!--            <?php echo e(Arr::get($data,'digital_product',0)); ?>-->
                                <!--        </h5>-->
                                <!--        <p class="text-muted mb-0"><?php echo e(translate("Digital Product")); ?></p>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>

                        <div class="card-body p-2">
                                <div id="productInsight" class="apex-charts"  data-colors='["--ig-primary", "--ig-success", "--ig-secondary", "--ig-danger", "--ig-info","--ig-primary","--ig-warning"]'>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header border-bottom-dashed align-items-center  d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">
                                    <?php echo e(translate("Latest Transactions")); ?>

                            </h4>
                            <div class="flex-shrink-0">
                                <a href="<?php echo e(route('admin.report.user.transaction')); ?>" class="text-decoration-underline">
                                    <?php echo e(translate('View All')); ?>

                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-hover align-middle table-nowrap ">
                                    <thead class="text-muted table-light">
                                        <tr class="text-uppercase">

                                            <th><?php echo e(translate('Date')); ?></th>

                                            <th><?php echo e(translate('Customer/Selller')); ?></th>

                                            <th>
                                                <?php echo e(translate('Transaction ID')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(translate('Amount')); ?>

                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $__empty_1 = true; $__currentLoopData = Arr::get($data,'latest_transaction'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>

                                                <td data-label="<?php echo e(translate('Date')); ?>">
                                                    <span class="fw-bold"><?php echo e(diff_for_humans($transaction->created_at)); ?></span>
                                                    <br>
                                                    <?php echo e(get_date_time($transaction->created_at)); ?>

                                                </td>

                                                <?php if($transaction->user_id): ?>
                                                    <td data-label="<?php echo e(translate('User')); ?>">
                                                        <span><?php echo e(@$transaction->user->name); ?></span><br>
                                                        <a href="<?php echo e(route('admin.customer.details', $transaction->user_id)); ?>" class="fw-bold text-dark"><?php echo e((@$transaction->user->email)); ?></a>
                                                    </td>
                                                <?php elseif($transaction->seller_id): ?>
                                                    <td data-label="<?php echo e(translate('Seller')); ?>">
                                                        <span><?php echo e(@$transaction->seller? @$transaction->seller->name : 'N/A'); ?></span><br>
                                                        <a href="<?php echo e(route('admin.seller.info.details', $transaction->seller_id)); ?>" class="fw-bold text-dark"><?php echo e((@$transaction->seller->email)); ?></a>
                                                    </td>
                                                <?php else: ?>
                                                    <td data-label="<?php echo e(translate('Guest')); ?>">
                                                        <?php echo e(@$transaction->guest_user->email ?? 'Guest User'); ?>

                                                    </td>
                                                <?php endif; ?>


                                                <td data-label="<?php echo e(translate('TRX ID')); ?>">
                                                    <?php echo e((@$transaction->transaction_number)); ?>

                                                </td>

                                                <td data-label="<?php echo e(translate('Amount')); ?>">
                                                    <span class="<?php if($transaction->transaction_type == '+'): ?> text-success <?php else: ?> text-danger <?php endif; ?> fw-bold">
                                                        <?php echo e($transaction->transaction_type == "+" ? '+' : '-'); ?>

                                                        <?php echo e(show_amount($transaction->amount,default_currency()->symbol)); ?>

                                                    </span>
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

                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header border-bottom-dashed align-items-center d-flex mb-2">
                            <h4 class="card-title mb-0 flex-grow-1">
                                <?php echo e(translate('Earning Insight')); ?>

                            </h4>

                        </div>


                        <div class="card-body p-2">
                            <div id="earningChart"  class="apex-charts"  data-colors='["--ig-primary", "--ig-success", "--ig-secondary", "--ig-danger", "--ig-info","--ig-primary","--ig-warning"]'>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-height-100">
                        <div class="card-header border-bottom-dashed align-items-center d-flex mb-2">
                            <h4 class="card-title mb-0 flex-grow-1">
                                <?php echo e(translate('Web Visitors Insight')); ?>

                            </h4>

                            
                            <a href="<?php echo e(route('admin.security.ip.list')); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                <?php echo e(translate('View All')); ?>

                                 <i class="ri-arrow-right-line"></i>
                            </a>

                        </div>

                        <div class="card-body">
                            <div id="vistorChart"  class="apex-charts"  data-colors='["--ig-primary", "--ig-success", "--ig-secondary", "--ig-danger", "--ig-info","--ig-primary","--ig-warning"]'>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php

$ordersArr      = $data['order_by_year'];
$productArr     = $data['product_by_year'];
$totalArray     = array_column($ordersArr , 'total');
$digitalArray   = array_column($ordersArr , 'digital');
$physicalArray  = array_column($ordersArr , 'physical');

$totalProductArr            = array_column($productArr , 'total');
$digitalProductArray        = array_column($productArr , 'digital');
$physicalPorductArray       = array_column($productArr , 'physical');
$productSell                = array_values($data['product_sell_by_month']);
$webVisitors                = array_values($data['web_visitors']);



?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-include'); ?>
<script src="<?php echo e(asset('assets/global/js/apexcharts.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-push'); ?>
<script type="text/javascript">
   "use strict";
    var chartDonutBasicColors = getChartColorsArray("store-visits-source");

    var monthlyLabel = <?php echo json_encode(array_keys($data['order_by_year']), 15, 512) ?>;
    var options = {
        chart: {
        height: 350,
        type: "line",
        },
        dataLabels: {
        enabled: false,
        },


        colors: chartDonutBasicColors,
        series: [
        {
            name: "<?php echo e(translate('Total Order')); ?>",
            data:  <?php echo json_encode($totalArray, 15, 512) ?>,
        },
        // {
        //     name: "<?php echo e(translate('Digital Order')); ?>",
        //     data: <?php echo json_encode($digitalArray, 15, 512) ?>,
        // },
        {
            name: "<?php echo e(translate('Physical Order')); ?>",
            data: <?php echo json_encode($physicalArray, 15, 512) ?>,
        },
        ],
        xaxis: {
        categories:  monthlyLabel,
        },

        tooltip: {
            shared: false,
            intersect: true,

        },

        markers: {
        size: 6,
        },
        stroke: {
        width: [4, 4],
        },
        legend: {
        horizontalAlign: "center",
        },
    };

    var chart = new ApexCharts(document.querySelector("#orderChart"), options);
    chart.render();


    var options = {
          series: [
          {
            name: "<?php echo e(translate('Physical Product')); ?>",
            data: <?php echo json_encode($physicalPorductArray, 15, 512) ?>,
          },
        //   {
        //     name: "<?php echo e(translate('Digital Product')); ?>",
        //     data: <?php echo json_encode($digitalProductArray, 15, 512) ?>,
        //   },
          {
            name: "<?php echo e(translate('Total Product')); ?>",
            data:  <?php echo json_encode($totalProductArr, 15, 512) ?>,

          },

          {
            name: "<?php echo e(translate('Total Sell')); ?>",
            data:  <?php echo json_encode($productSell, 15, 512) ?>,

          },

        ],
          chart: {
          type: 'bar',
          height: 350,
          stacked: true,
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },

        plotOptions: {
          bar: {
            horizontal: false
          }
        },
        xaxis: {
          categories: monthlyLabel
        },
        fill: {
          opacity: 1
        },
        colors: chartDonutBasicColors,

        legend: {
          position: 'top',
          horizontalAlign: 'left'
        }
        };

        var chart = new ApexCharts(document.querySelector("#productInsight"), options);
        chart.render();


        var payment = <?php echo json_encode(array_values($data['earning_per_months']), 15, 512) ?>;
        var paymentCharge = <?php echo json_encode(array_values($data['monthly_payment_charge']), 15, 512) ?>;
        var withdrawCharge = <?php echo json_encode(array_values($data['monthly_withdraw_charge']), 15, 512) ?>;



    var options = {
        chart: {
        height: 350,
        type: "line",
        },
        dataLabels: {
        enabled: false,
        },

        colors: chartDonutBasicColors,
        series: [
        {
            name: "<?php echo e(translate('Order Payment')); ?>",
            data: payment,
        },
        {
            name: "<?php echo e(translate('Payment Charge')); ?>",
            data: paymentCharge,
        },
        {
            name: "<?php echo e(translate('Withdraw Charge')); ?>",
            data: withdrawCharge,
        },
        ],
        xaxis: {
        categories:  monthlyLabel,
        },

        tooltip: {
            shared: false,
            intersect: true,
            y: {
                formatter: function (value, { series, seriesIndex, dataPointIndex, w }) {
                return formatCurrency(value);
                }
            }
            },
        markers: {
        size: 6,
        },
        stroke: {
        width: [4, 4],
        },
        legend: {
        horizontalAlign: "center",
        },
    };

    var chart = new ApexCharts(document.querySelector("#earningChart"), options);
    chart.render();


    var orderStatus = <?php echo json_encode(array_keys($data['monthly_order_report']), 15, 512) ?>;
    var orderValues = <?php echo json_encode(array_values($data['monthly_order_report']), 15, 512) ?>;

    var options = {
            series: orderValues,
            chart: {
            height: 380,
            width:"100%",
            type: "donut",
            dropShadow: {
            enabled: true,
            color: '#111',
            top: -1,
            left: 3,
            blur: 3,
            opacity: 0.2
            }
        },

        legend: {
        position: 'bottom'
        },
        stroke: {
            width: 0,
        },
        plotOptions: {
            pie: {
            donut: {
                labels: {
                show: true,
                total: {
                    showAlways: true,
                    show: true
                }
                }
            }
            }
        },
        labels: orderStatus,

        dataLabels: {
            dropShadow: {
            blur: 3,
            opacity: 0.8
            }
        },
        fill: {
            opacity: 1,
            pattern: {
            enabled: true,
            },


              colors: chartDonutBasicColors,

        },
        states: {
            hover: {
            filter: 'none'
            }
        },
        responsive: [{
            breakpoint: 991,
            options: {
                chart: {
                    width: "100%",
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#monthlyOrderChart"), options);
    chart.render();



var options = {
  chart: {
    height: 280,
    type: "area"
  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "Series 1",
      data: <?php echo json_encode($webVisitors, 15, 512) ?>,
    }
  ],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 0.9,
      stops: [0, 90, 100]
    }
  },
  xaxis: {
    categories:  monthlyLabel,
  }
};

var chart = new ApexCharts(document.querySelector("#vistorChart"), options);

chart.render();


    function formatCurrency(value) {
        var suffixes = ["", "K", "M", "B", "T"];
        var order = Math.floor(Math.log10(value) / 3);
        var suffix = suffixes[order];
        if(value < 1)
        {return "$"+value}
        var scaledValue = value / Math.pow(10, order * 3);
        return "$" + scaledValue.toFixed(2) + suffix;
    }

    function getChartColorsArray(e) {
    if (null !== document.getElementById(e)) {
        e = document.getElementById(e).getAttribute("data-colors");
        if (e)
            return (e = JSON.parse(e)).map(function (e) {
                var t = e.replace(" ", "");
                return -1 === t.indexOf(",")
                    ? getComputedStyle(document.documentElement).getPropertyValue(t) || t
                    : 2 == (e = e.split(",")).length
                        ? "rgba(" +
                        getComputedStyle(document.documentElement).getPropertyValue(e[0]) +
                        "," +
                        e[1] +
                        ")"
                        : t;
            });
    }
}

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>