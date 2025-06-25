<div class="app-menu navbar-menu">


    <div class="brand-logo">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(show_image(file_path()['site_logo']['path'] . "/" . site_settings('admin_logo_sm'), file_path()['loder_logo']['size'])); ?>"
                    alt="<?php echo e(@site_settings('admin_logo_lg')); ?>">
            </span>

            <span class="logo-lg">
                <img src="<?php echo e(show_image(file_path()['site_logo']['path'] . "/" . site_settings('admin_logo_lg'), file_path()['admin_site_logo']['size'])); ?>"
                    alt="<?php echo e(site_settings('admin_logo_lg')); ?>">


            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" class="scroll-bar" data-simplebar>

        

        <div class="container-fluid">
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span>
                        <?php echo e(translate('Menu')); ?>

                    </span>
                </li>

                <?php if(permission_check('view_dashboard') || permission_check('view_seller') || permission_check('view_admin') || permission_check('view_roles')): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link  <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>  "
                            href="<?php echo e(route('admin.dashboard')); ?>">
                            <i class="bx bxs-dashboard"></i> <span>
                                <?php echo e(translate('Dashboard')); ?>

                            </span>
                        </a>
                    </li>

                    <?php if(permission_check('view_admin') || permission_check('view_roles')): ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?php echo e(!request()->routeIs('admin.role.*') || !request()->routeIs('admin.index') || !request()->routeIs('admin.edit') || !request()->routeIs('admin.create') ? 'collapsed' : ''); ?>"
                                href="#manage-staff" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                aria-controls="manage-staff">
                                <i class='bx bxs-user-detail'></i> <span>
                                    <?php echo e(translate('Access Control')); ?>

                                </span>
                            </a>
                            <div class="pt-1 collapse  <?php echo e(request()->routeIs('admin.role.*') || request()->routeIs('admin.index') || request()->routeIs('admin.edit') || request()->routeIs('admin.create') ? 'show' : ''); ?>   menu-dropdown"
                                id="manage-staff">
                                <ul class="nav nav-sm flex-column gap-1">

                                    <?php if(permission_check('view_admin')): ?>
                                                    <li class="nav-item">
                                                        <a href="<?php echo e(route('admin.index')); ?>" class="nav-link  <?php echo e(request()->routeIs('admin.index')
                                        || request()->routeIs('admin.edit') || request()->routeIs('admin.create')
                                        ? 'active' : ''); ?>  ">
                                                            <?php echo e(translate('Staffs')); ?>

                                                        </a>
                                                    </li>
                                    <?php endif; ?>

                                    <?php if(permission_check('view_roles')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.role.index')); ?>"
                                                class="nav-link <?php echo e(request()->routeIs('admin.role.*') ? 'active' : ''); ?>">
                                                <?php echo e(translate('Roles')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>



                    <?php if(permission_check('view_seller') && site_settings('multi_vendor', App\Enums\StatusEnum::true->status()) == App\Enums\StatusEnum::true->status()): ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link
                                            <?php echo e(!request()->routeIs('admin.seller.shop') || !request()->routeIs('admin.seller.info.*') || !request()->routeIs('admin.plan.*') ? 'collapsed' : ''); ?>

                                            " href="#sellermanage" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sellermanage">
                                <i class='bx bxs-store'></i> <span>
                                    <?php echo e(translate("Sellers")); ?>


                                </span>
                            </a>
                            <div class="pt-1 collapse
                                            <?php echo e(request()->routeIs('admin.seller.shop') || request()->routeIs('admin.seller.info.*') || request()->routeIs('admin.plan.*') ? 'show' : ''); ?>

                                            menu-dropdown mega-dropdown-menu" id="sellermanage">
                                <ul class="nav nav-sm flex-column gap-1">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.seller.shop')); ?>" class="
                                                        <?php echo e(request()->routeIs('admin.seller.shop') ? 'active' : ''); ?>

                                                        nav-link">
                                            <?php echo e(translate('Shop Analytics')); ?>

                                        </a>
                                    </li>

                                    <?php if(permission_check('view_seller')): ?>

                                        <li class="nav-item">
                                            <a class="nav-link <?php echo e(request()->routeIs('admin.seller.info.*') ? 'active' : ''); ?>"
                                                href="<?php echo e(route('admin.seller.info.index')); ?>">
                                                <?php echo e(translate("Manage Seller")); ?>

                                            </a>
                                        </li>

                                        <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link <?php echo e(request()->routeIs('admin.plan.subscription') ? 'active' : ''); ?>  "-->
                                        <!--        href="<?php echo e(route('admin.plan.subscription')); ?>">-->
                                        <!--        <?php echo e(translate("Seller Subscription")); ?>-->
                                        <!--    </a>-->
                                        <!--</li>-->

                                        <li class="nav-item">
                                            <a class="nav-link <?php echo e(request()->routeIs('admin.plan.index') ? 'active' : ''); ?> "
                                                href="<?php echo e(route('admin.plan.index')); ?>">
                                                <?php echo e(translate("Pricing Plan")); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>


                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>

                <?php endif; ?>


                <?php if(permission_check('view_brand') || permission_check('view_categroy') || permission_check('view_product') || permission_check('view_order')): ?>
                    <li class="menu-title">
                        <span>
                            <?php echo e(translate('Product & Order')); ?>

                        </span>
                    </li>
                <?php endif; ?>

                <?php if(permission_check('view_brand') || permission_check('view_categroy') || permission_check('view_product')): ?>
                    <li class="nav-item">
                        <a class="nav-link   <?php echo e(!request()->routeIs('admin.item.*') ? 'collapsed' : ''); ?> menu-link"
                            href="#inhouseProduct" data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="inhouseProduct">
                            <i class='bx bxl-product-hunt'></i> <span>
                                <?php echo e(translate("Manage Product")); ?>

                                <?php if($seller_new_digital_product_count > 0 || $seller_new_physical_product_count > 0): ?>
                                    <i class=" text-danger las la-exclamation "></i>
                                <?php endif; ?>
                            </span>
                        </a>
                        <div class="pt-1 collapse  <?php echo e(request()->routeIs('admin.item.*') || request()->routeIs('admin.product.seller.*') || request()->routeIs('admin.digital.product.*') || request()->routeIs('admin.product.reviews') ? 'show' : ''); ?> menu-dropdown mega-dropdown-menu"
                            id="inhouseProduct">
                            <ul class="nav nav-sm flex-column gap-1">

                                <?php if(permission_check('view_product')): ?>
                                    <!-- <li class="nav-item">
                                                        <a href="<?php echo e(route('admin.item.product.inhouse.index')); ?>" class=" <?php echo e(request()->routeIs('admin.item.product.inhouse.*') || request()->routeIs('admin.product.reviews')?'active' :''); ?>  nav-link">
                                                            <?php echo e(translate("Inhouse Product")); ?>

                                                        </a>
                                                    </li> -->

                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(request()->routeIs('admin.product.seller.*') ? 'active' : ''); ?>  "
                                            href="<?php echo e(route('admin.product.seller.index')); ?>">

                                            <?php echo e(translate("Seller Product")); ?>

                                            <?php if($seller_new_physical_product_count > 0): ?>
                                                <span title="<?php echo e(translate('Seller New Product')); ?>" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" class="badge bg-danger ">
                                                    <?php echo e($seller_new_physical_product_count); ?>

                                                </span>
                                            <?php endif; ?>
                                        </a>
                                    </li>


                                    <!-- <li class="nav-item">
                                                        <a class="nav-link" href="#digitalProduct" data-bs-toggle="collapse" role="button"
                                                            aria-expanded="false" aria-controls="digitalProduct">

                                                                <?php echo e(translate("Digital Product")); ?>


                                                                <?php if($seller_new_digital_product_count > 0 ): ?>
                                                                   <i class=" text-danger las la-exclamation "></i>
                                                                <?php endif; ?>

                                                        </a>
                                                        <div class="pt-1 collapse <?php echo e(request()->routeIs('admin.digital.product.*')?'show' :''); ?> menu-dropdown" id="digitalProduct">
                                                            <ul class="nav nav-sm flex-column gap-1">
                                                                <li class="nav-item">
                                                                    <a href="<?php echo e(route('admin.digital.product.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.digital.product.index') || request()->routeIs('admin.digital.product.create') || request()->routeIs('admin.digital.product.edit') || request()->routeIs('admin.digital.product.attribute') ||   request()->routeIs('admin.digital.product.attribute.*')  ?'active' :''); ?>">
                                                                    <?php echo e(translate("Inhouse Product")); ?>

                                                                    </a>
                                                                </li>

                                                                <li class="nav-item">
                                                                    <a href="<?php echo e(route('admin.digital.product.seller')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.digital.product.seller') ||  request()->routeIs('admin.digital.product.seller.*')  ?'active' :''); ?>">
                                                                        <?php echo e(translate("Seller Product")); ?>

                                                                        <?php if($seller_new_digital_product_count > 0): ?>
                                                                            <span title="<?php echo e(translate('Seller New Product')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" class="badge bg-danger">
                                                                              <?php echo e($seller_new_digital_product_count); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li> -->


                                <?php endif; ?>


                                <?php if(permission_check('view_brand')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.item.brand.index')); ?>" class="
                                                        <?php echo e(request()->routeIs('admin.item.brand.*') ? 'active' : ''); ?>

                                                        nav-link">
                                            <?php echo e(translate('Brand')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if(permission_check('view_category')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.item.category.index')); ?>"
                                            class="<?php echo e(request()->routeIs('admin.item.category.*') ? 'active' : ''); ?>  nav-link">
                                            <?php echo e(translate("Category")); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(permission_check('view_product')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.item.attribute.index')); ?>"
                                            class="<?php echo e(request()->routeIs('admin.item.attribute.*') ? 'active' : ''); ?>  nav-link">
                                            <?php echo e(translate("Attribute")); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(permission_check('manage_taxes')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.tax.list')); ?>"
                                            class="<?php echo e(request()->routeIs('admin.tax.*') ? 'active' : ''); ?>  nav-link">
                                            <?php echo e(translate("Tax")); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(permission_check('view_order')): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link
                                <?php echo e(!request()->routeIs('admin.inhouse.order.*') || !request()->routeIs('admin.digital.order.*') || !request()->routeIs('admin.seller.order.*') ? 'collapsed' : ''); ?>

                                " href="#manageOrder" data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="manageOrder">
                            <i class='bx bxs-shopping-bags'></i> <span>
                                <?php echo e(translate('Manage Order')); ?>

                                <?php if($physical_product_order_count > 0 || $physical_product_seller_order_count > 0): ?>
                                    <i class=" text-danger las la-exclamation "></i>
                                <?php endif; ?>
                            </span>
                        </a>
                        <div class="pt-1 collapse
                                <?php echo e(request()->routeIs('admin.inhouse.order.*') || request()->routeIs('admin.digital.order.*') || request()->routeIs('admin.seller.order.*') ? 'show' : ''); ?>

                                menu-dropdown mega-dropdown-menu" id="manageOrder">
                            <ul class="nav nav-sm flex-column gap-1">
                                <!-- <li class="nav-item">
                                            <a href="<?php echo e(route('admin.inhouse.order.index')); ?>" class="
                                            <?php echo e(request()->routeIs('admin.inhouse.order.*')?'active' :''); ?>

                                            nav-link">
                                                <span>
                                                    <?php echo e(translate('Inhouse Order')); ?>


                                                    <?php if($physical_product_order_count > 0 ): ?>
                                                       <small title="<?php echo e(translate('Placed Order')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" class="badge bg-danger ms-2">
                                                       <?php echo e($physical_product_order_count); ?>

                                                       </small>
                                                    <?php endif; ?>
                                                </span>
                                            </a>
                                        </li> -->

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.seller.order.index')); ?>"
                                        class="nav-link   <?php echo e(request()->routeIs('admin.seller.order.*') ? 'active' : ''); ?>">
                                        <span>
                                            <?php echo e(translate('Seller Order')); ?>

                                            <?php if($physical_product_seller_order_count > 0): ?>
                                                <small title="<?php echo e(translate('Seller Placed Order')); ?>" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" class="badge bg-danger ms-2">
                                                    <?php echo e($physical_product_seller_order_count); ?>

                                                </small>
                                            <?php endif; ?>
                                        </span>
                                    </a>
                                </li>

                                <!-- <li class="nav-item">
                                            <a class="nav-link <?php echo e(!request()->routeIs('admin.digital.order.*') ? 'collapsed' :''); ?>" href="#digitalOrder" data-bs-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="digitalOrder">
                                                <span>
                                                    <?php echo e(translate('Digital Order')); ?>

                                                </span>
                                            </a>
                                            <div class="pt-1 collapse <?php echo e(request()->routeIs('admin.digital.order.*') ? 'show' :''); ?> menu-dropdown" id="digitalOrder">
                                                <ul class="nav nav-sm flex-column gap-1">
                                                    <li class="nav-item">
                                                        <a href="<?php echo e(route('admin.digital.order.product.inhouse')); ?>" class="nav-link  <?php echo e(request()->routeIs('admin.digital.order.product.inhouse') ? 'active' : ''); ?>  ">

                                                            <?php echo e(translate('Inhouse
                                                            Order')); ?>

                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="<?php echo e(route('admin.digital.order.product.seller')); ?>" class=" <?php echo e(request()->routeIs('admin.digital.order.product.seller') ? 'active' : ''); ?> nav-link">
                                                            <?php echo e(translate('Seller
                                                            Order')); ?>

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li> -->
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(permission_check('manage_customer')): ?>
                            <li class="menu-title">
                                <span>
                                    <?php echo e(translate("USER,REPORTS & SUPPORT
                                                    ")); ?>

                                </span>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link menu-link <?php echo e(!request()->routeIs('admin.customer.*') ? 'collapsed' :
                    ''); ?>" href="#customer" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                    aria-controls="customer">
                                    <i class='bx bxs-user-detail'></i> <span>
                                        <?php echo e(translate("Customers")); ?>


                                    </span>
                                </a>
                                <div class="pt-1 collapse  <?php echo e(request()->routeIs('admin.customer.*') ? 'show' : ''); ?>   menu-dropdown"
                                    id="customer">
                                    <ul class="nav nav-sm flex-column gap-1">

                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.customer.index')); ?>" class="nav-link 
                                                                <?php echo e(request()->routeIs('admin.customer.*') &&
                    !request()->routeIs('admin.customer.rewards') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("List")); ?>

                                            </a>
                                        </li>

                                        <!-- <li class="nav-item">
                                                                <a href="<?php echo e(route('admin.customer.rewards')); ?>" class="nav-link  <?php echo e(request()->routeIs('admin.customer.rewards')? 'active' :''); ?>  ">
                                                                    <?php echo e(translate("Reward point")); ?>

                                                                </a>
                                                            </li> -->

                                    </ul>
                                </div>
                            </li>

                <?php endif; ?>
                <?php if(permission_check('view_support')): ?>

                            <li class="nav-item">
                                <a class="nav-link menu-link <?php echo e(request()->routeIs('admin.support.*') ? 'active' : ''); ?>  "
                                    href="<?php echo e(route('admin.support.ticket.index')); ?>">
                                    <i class='bx bx-support'></i>
                                    <span class="w-100">
                                        <?php echo e(translate('Support Ticket')); ?>


                                        <?php if($running_ticket > 0): ?>
                                            <small title="<?php echo e(translate('Running Ticket')); ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="top" class="badge bg-danger ms-2">
                                                <?php echo e($running_ticket); ?>

                                            </small>
                                        <?php endif; ?>
                                    </span>

                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link <?php echo e(!request()->routeIs('admin.report.user.*') ? 'collapsed' :
                    ''); ?>" href="#userReport" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                    aria-controls="userReport">
                                    <i class='bx bxs-report'></i> <span>
                                        <?php echo e(translate('Reports')); ?>

                                        <?php if($withdraw_pending_log_count > 0 || $deposit_pending_log_count > 0): ?>
                                            <i class=" text-danger las la-exclamation "></i>
                                        <?php endif; ?>
                                    </span>
                                </a>
                                <div class="pt-1 collapse  <?php echo e(request()->routeIs('admin.report.*') || request()->routeIs('admin.payment.index') || request()->routeIs('admin.payment.*') || request()->routeIs('admin.deposit.*') || request()->routeIs('admin.withdraw.log.*') ? 'show' : ''); ?>   menu-dropdown"
                                    id="userReport">
                                    <ul class="nav nav-sm flex-column gap-1">

                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.report.user.transaction')); ?>"
                                                class="nav-link  <?php echo e(request()->routeIs('admin.report.*.transaction') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("Transactions")); ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.payment.index')); ?>"
                                                class="nav-link  <?php echo e(request()->routeIs('admin.payment.*') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("Payment")); ?>

                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.deposit.index')); ?>"
                                                class="nav-link  <?php echo e(request()->routeIs('admin.deposit.*') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("Deposit")); ?>


                                                <?php if($deposit_pending_log_count > 0): ?>
                                                    <span title="<?php echo e(translate('Pending Deposit')); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" class="badge bg-danger ">
                                                        <?php echo e($deposit_pending_log_count); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.withdraw.log.index')); ?>"
                                                class="nav-link  <?php echo e(request()->routeIs('admin.withdraw.log.*') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("Widthdraw")); ?>


                                                <?php if($withdraw_pending_log_count > 0): ?>
                                                    <span title="<?php echo e(translate('Pending Withdraw')); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" class="badge bg-danger ">
                                                        <?php echo e($withdraw_pending_log_count); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.report.kyc.log')); ?>"
                                                class="nav-link  <?php echo e(request()->routeIs('admin.report.kyc.*') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("KYC Log")); ?>


                                                <?php if($requested_kyc_log > 0): ?>
                                                    <span title="<?php echo e(translate('Requested KYC log')); ?>" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" class="badge bg-danger ">
                                                        <?php echo e($requested_kyc_log); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                <?php endif; ?>

                <?php if(permission_check('manage_delivery_man')): ?>

                    <!-- <li class="menu-title">
                                <span>
                                    <?php echo e(translate("Delivery Man
                                    ")); ?>

                                </span>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link menu-link <?php echo e(!request()->routeIs('admin.delivery-man.*') || !request()->routeIs('admin.general.deliveryman.setting')  ?'collapsed' :
                                ''); ?>" href="#deliveryMan" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="deliveryMan">
                                    <i class='bx bxs-user-detail'></i>  <span>
                                        <?php echo e(translate("Delivery Man
                                        ")); ?>


                                    </span>
                                </a>
                                <div class="pt-1 collapse  <?php echo e(request()->routeIs('admin.delivery-man.*') || request()->routeIs('admin.general.deliveryman.setting')  ?'show' :''); ?>   menu-dropdown" id="deliveryMan">
                                    <ul class="nav nav-sm flex-column gap-1">

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.delivery-man.list')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.delivery-man.*') &&  
                                                    !request()->routeIs('admin.delivery-man.configuration') &&  
                                                    !request()->routeIs('admin.delivery-man.kyc.configuration') && 
                                                    !request()->routeIs('admin.delivery-man.rewards') &&
                                                    !request()->routeIs('admin.delivery-man.referral') 
                                                    ? 'active' :''); ?>  ">
                                                    <?php echo e(translate("List")); ?>

                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.delivery-man.rewards')); ?>" class="nav-link  <?php echo e(request()->routeIs('admin.delivery-man.rewards')? 'active' :''); ?>  ">
                                                    <?php echo e(translate("Reward log")); ?>

                                                </a>
                                            </li>


                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.delivery-man.referral')); ?>" class="nav-link  <?php echo e(request()->routeIs('admin.delivery-man.referral')? 'active' :''); ?>  ">
                                                    <?php echo e(translate("Referral log")); ?>

                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.delivery-man.configuration')); ?>" class="nav-link  <?php echo e(request()->routeIs('admin.delivery-man.configuration')? 'active' :''); ?>  ">
                                                    <?php echo e(translate("Configuration")); ?>

                                                </a>
                                            </li>


                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.delivery-man.kyc.configuration')); ?>" class="nav-link  <?php echo e(request()->routeIs('admin.delivery-man.kyc.configuration')? 'active' :''); ?>  ">
                                                    <?php echo e(translate("KYC configuration")); ?>

                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="<?php echo e(route('admin.general.deliveryman.setting')); ?>" class="nav-link  <?php echo e(request()->routeIs('admin.general.deliveryman.setting')? 'active' :''); ?>  ">
                                                    <?php echo e(translate("APP Setting")); ?>

                                                </a>
                                            </li>

                                    </ul>
                                </div>
                            </li> -->

                <?php endif; ?>


                <?php if(permission_check('manage_frontend') || permission_check('manage_blog') || permission_check('manage_deal') || permission_check('manage_offer') || permission_check('manage_cuppon') || permission_check('manage_campaign')): ?>
                    <li class="menu-title">
                        <span>
                            <?php echo e(translate("Website Setup")); ?>

                        </span>
                    </li>

                    <li class="nav-item mt-1">
                        <a class="nav-link <?php echo e(!request()->routeIs('admin.frontend.promotional.*') || !request()->routeIs('admin.frontend.section.*') ? 'collapsed' : ''); ?> menu-link"
                            href="#forntendSection" data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="forntendSection">
                            <i class='bx bx-world'></i> <span>
                                <?php echo e(translate("Appearances")); ?>

                            </span>
                        </a>
                        <div class="pt-1 collapse <?php echo e(request()->routeIs('admin.frontend.section') || request()->routeIs('admin.menu.*') || request()->routeIs('admin.page.*') || request()->routeIs('admin.faq.*') || request()->routeIs('admin.frontend.testimonial.*') || request()->routeIs('admin.blog.*') || request()->routeIs('admin.home.category') ? 'show' : ''); ?> menu-dropdown"
                            id="forntendSection">
                            <ul class="nav nav-sm flex-column gap-1">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.frontend.section')); ?>"
                                        class="nav-link <?php echo e(request()->routeIs('admin.frontend.section') ? 'active' : ''); ?>  ">
                                        <?php echo e(translate("Frontend Section")); ?>

                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.menu.index')); ?>"
                                        class="nav-link <?php echo e(request()->routeIs('admin.menu.*') ? 'active' : ''); ?>  ">
                                        <?php echo e(translate("Menus")); ?>

                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.frontend.testimonial.index')); ?>"
                                        class="nav-link <?php echo e(request()->routeIs('admin.frontend.testimonial.*') ? 'active' : ''); ?>  ">
                                        <?php echo e(translate("Testimonials")); ?>

                                    </a>
                                </li>

                                <?php if(permission_check('manage_blog')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.blog.index')); ?>"
                                            class="nav-link <?php echo e(request()->routeIs('admin.blog.*') ? 'active' : ''); ?>  ">
                                            <?php echo e(translate("Blogs")); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.page.index')); ?>"
                                        class="nav-link <?php echo e(request()->routeIs('admin.page.*') ? 'active' : ''); ?>  ">
                                        <?php echo e(translate("Pages")); ?>

                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.faq.index')); ?>"
                                        class="nav-link <?php echo e(request()->routeIs('admin.faq.*') ? 'active' : ''); ?>  ">
                                        <?php echo e(translate('Support FAQ')); ?>

                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.home.category')); ?>"
                                        class="nav-link <?php echo e(request()->routeIs('admin.home.category') ? 'active' : ''); ?>  ">
                                        <?php echo e(translate("Home Category")); ?>

                                    </a>
                                </li>


                            </ul>
                        </div>
                    </li>


                    <li class="nav-item mt-1">
                        <a class="nav-link <?php echo e(!request()->routeIs('admin.frontend.promotional.*') || !request()->routeIs('admin.frontend.section.*') ? 'collapsed' : ''); ?> menu-link"
                            href="#manageBanner" data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="manageBanner">
                            <i class='bx bx-images'></i> <span>
                                <?php echo e(translate("Banner")); ?>

                            </span>
                        </a>
                        <div class="pt-1 collapse <?php echo e(request()->routeIs('admin.frontend.promotional.*') || request()->routeIs('admin.frontend.section.*') ? 'show' : ''); ?> menu-dropdown"
                            id="manageBanner">
                            <ul class="nav nav-sm flex-column gap-1">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.frontend.promotional.banner')); ?>"
                                        class="nav-link <?php echo e(request()->routeIs('admin.frontend.promotional.*') ? 'active' : ''); ?>  ">
                                        <?php echo e(translate("Promotional Banner")); ?>

                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.frontend.section.banner')); ?>"
                                        class="nav-link <?php echo e(request()->routeIs('admin.frontend.section.*') ? 'active' : ''); ?>  ">
                                        <?php echo e(translate("Banner")); ?></a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <?php if(permission_check('manage_deal') || permission_check('manage_offer') || permission_check('manage_cuppon') || permission_check('manage_campaign') || permission_check('manage_frontend')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(!request()->routeIs('admin.promote.*') || !request()->routeIs('admin.campaign.*') ? 'collapsed' : ''); ?> menu-link"
                                href="#managePromotion" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                aria-controls="managePromotion">
                                <i class='bx bx-volume-low'></i> <span>
                                    <?php echo e(translate("Marketing")); ?>

                                </span>
                            </a>
                            <div class="pt-1 collapse <?php echo e(request()->routeIs('admin.promote.*') || request()->routeIs('admin.campaign.*') || request()->routeIs('admin.subscriber.*') || request()->routeIs('admin.contact.*') ? 'show' : ''); ?> menu-dropdown"
                                id="managePromotion">
                                <ul class="nav nav-sm flex-column gap-1">


                                    <?php if(permission_check('manage_cuppon')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.promote.coupon.index')); ?>"
                                                class="nav-link <?php echo e(request()->routeIs('admin.promote.coupon.*') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("Coupon")); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(permission_check('manage_campaign')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.campaign.index')); ?>"
                                                class="nav-link <?php echo e(request()->routeIs('admin.campaign.*') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("Campaign")); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(permission_check('manage_offer')): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.promote.flash.deals.index')); ?>"
                                                class="nav-link <?php echo e(request()->routeIs('admin.promote.flash.deals.*') ? 'active' : ''); ?>  ">
                                                <?php echo e(translate("Flash Deals")); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
         

                <?php if(permission_check('view_system_settings')): ?>
                    <?php if(permission_check('view_settings') || permission_check('view_languages') || permission_check('view_method')): ?>
                        <li class="menu-title">
                            <span>
                                <?php echo e(translate('System Setting')); ?>

                            </span>
                        </li>
                        <li class="nav-item mt-1">
                            <a class="nav-link <?php echo e(!request()->routeIs('admin.general.setting.*') ? 'collapsed' : ''); ?> menu-link"
                                href="#generalSetting" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                aria-controls="generalSetting">
                                <i class='bx bx-cog'></i> <span>
                                    <?php echo e(translate('Setup & Configuration')); ?>

                                </span>
                            </a>
                            <div class="pt-1 collapse <?php echo e(request()->routeIs('admin.general.setting.*') || request()->routeIs('admin.seo.index') || request()->routeIs('admin.mail.*') || request()->routeIs('admin.sms.*') || request()->routeIs('admin.general.app.setting') || request()->routeIs('admin.shipping.*') || request()->routeIs('admin.withdraw.method.*') || request()->routeIs('admin.notification.templates.*') || request()->routeIs('admin.gateway.payment.*') || request()->routeIs('admin.language.*') ? 'show' : ''); ?> menu-dropdown"
                                id="generalSetting">
                                <ul class="nav nav-sm flex-column gap-1">
                                    
                                    <?php if(permission_check('view_settings') || permission_check('manage_countries') || permission_check('manage_states') || permission_check('manage_cities') || permission_check('manage_zones')): ?>
                                    
                                        <li class="nav-item">
                                            <a class="nav-link   <?php echo e(request()->routeIs('admin.shipping.*') ? 'collapsed' : ''); ?>"
                                                href="#shippingMethod" data-bs-toggle="collapse" role="button" aria-expanded="false"
                                                aria-controls="shippingMethod">
                                                <span>

                                                    <?php echo e(translate('Shipping')); ?>

                                                </span>
                                            </a>
                                            <div class="pt-1 collapse <?php echo e(request()->routeIs('admin.shipping.*') ? 'show' : ''); ?> menu-dropdown"
                                                id="shippingMethod">
                                                <ul class="nav nav-sm flex-column gap-1">

                                                    <li class="nav-item">
                                                        <a href="<?php echo e(route('admin.shipping.configuration.index')); ?>"
                                                            class=" <?php echo e(request()->routeIs('admin.shipping.configuration.*') ? 'active' : ''); ?>  nav-link">
                                                            <?php echo e(translate('Configuration')); ?>

                                                        </a>
                                                    </li>

                                                    <?php if(permission_check('manage_countries')): ?>
                                                        <li class="nav-item">
                                                            <a href="<?php echo e(route('admin.shipping.country.index')); ?>"
                                                                class=" <?php echo e(request()->routeIs('admin.shipping.country.*') ? 'active' : ''); ?>  nav-link">
                                                                <?php echo e(translate('Shipping Country')); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(permission_check('manage_states')): ?>
                                                        <li class="nav-item">
                                                            <a href="<?php echo e(route('admin.shipping.state.index')); ?>"
                                                                class=" <?php echo e(request()->routeIs('admin.shipping.state.*') ? 'active' : ''); ?>  nav-link">
                                                                <?php echo e(translate('Shipping Sate')); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>


                                                    <?php if(permission_check('manage_cities')): ?>
                                                        <li class="nav-item">
                                                            <a href="<?php echo e(route('admin.shipping.city.index')); ?>"
                                                                class=" <?php echo e(request()->routeIs('admin.shipping.city.*') ? 'active' : ''); ?>  nav-link">
                                                                <?php echo e(translate('Shipping Cities')); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(permission_check('manage_zones')): ?>
                                                        <li class="nav-item">
                                                            <a href="<?php echo e(route('admin.shipping.zone.index')); ?>"
                                                                class=" <?php echo e(request()->routeIs('admin.shipping.zone.*') ? 'active' : ''); ?>  nav-link">
                                                                <?php echo e(translate('Shipping Zone')); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>


                                                    <li class="nav-item">
                                                        <a href="<?php echo e(route('admin.shipping.delivery.index')); ?>"
                                                            class="<?php echo e(request()->routeIs('admin.shipping.delivery.*') ? 'active' : ''); ?>  nav-link">
                                                            <?php echo e(translate('Shipping Delivery')); ?>


                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.general.setting.currency.index')); ?>"
                                            class="nav-link <?php echo e(request()->routeIs('admin.general.setting.currency.index') ? 'active' : ''); ?>   ">
                                            <?php echo e(translate('Currencies')); ?>

                                        </a>
                                    </li>




                                </ul>
                            </div>
                        </li>
                    
                        <!-- <li class="nav-item">
                                    <a class="nav-link menu-link
                                        <?php echo e(request()->routeIs('admin.system.update.init')?'active' :''); ?>

                                    " href="<?php echo e(route('admin.system.update.init')); ?>">
                                    <i class="ri-refresh-line"></i> <span>
                                            <?php echo e(translate('System Upgrade')); ?>

                                        </span>
                                    </a>
                                </li> -->

                        <!-- <li class="nav-item">
                                    <a class="nav-link menu-link
                                        <?php echo e(request()->routeIs('admin.addon.manager')?'active' :''); ?>

                                    " href="<?php echo e(route('admin.addon.manager')); ?>">

                                    <i class="ri-sound-module-fill"></i>
                                    <span>
                                            <?php echo e(translate('Addon manager')); ?>

                                        </span>
                                    </a>
                                </li> -->

                        <!-- <li class="nav-item mt-1">
                                    <a class="nav-link menu-link <?php echo e(request()->routeIs('admin.system.info')? 'active' :''); ?>  " href="<?php echo e(route('admin.system.info')); ?>">
                                        <i class='bx bx-info-circle'></i> <span>
                                            <?php echo e(translate('System Information')); ?>

                                        </span>
                                    </a>
                                </li> -->
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>

<div class="vertical-overlay"></div><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/partials/sidebar.blade.php ENDPATH**/ ?>