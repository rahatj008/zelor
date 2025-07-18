<?php
$seller           = auth()->guard('seller')->user();
$sellerOrderCount = App\Models\Order::sellerOrder()->placed()->physicalOrder()->whereHas('orderDetails', function($q)
                        use ($seller){
                                $q->whereHas('product', function($query) use ($seller){
                                $query->where('seller_id', $seller->id);
                                });
                        })->count();
?>

<div class="app-menu navbar-menu">
    <div class="brand-logo">
        <a href="<?php echo e(route('seller.dashboard')); ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(show_image(file_path()['seller_site_logo']['path'].'/'.@$seller->sellerShop->logoicon,file_path()['loder_logo']['size'])); ?>" alt="logo.png" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(show_image(file_path()['seller_site_logo']['path'].'/'.@$seller->sellerShop->seller_site_logo,file_path()['seller_site_logo']['size'])); ?>" alt="logo.png" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" class="scroll-bar" data-simplebar>
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span>
                    <?php echo e(translate('Menu')); ?>

                    </span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  <?php echo e(request()->routeIs('seller.dashboard') ? 'active' :''); ?>  " href="<?php echo e(route('seller.dashboard')); ?>">
                        <i class="bx bxs-dashboard"></i> <span>
                            <?php echo e(translate('Dashboard')); ?>

                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link chat-link  <?php echo e(request()->routeIs('seller.customer.chat.*') ? 'active' :''); ?>" href="<?php echo e(route('seller.customer.chat.list')); ?>">
                        <i class="bx bxs-chat"></i> <span>
                            <?php echo e(translate('Chat')); ?>

                        </span>
                    </a>
                </li>

                <li class="menu-title">
                    <span>
                        <?php echo e(translate('Product & Orders')); ?>

                    </span>
                </li>

                <li class="nav-item">
                    <a class='nav-link   <?php echo e(!request()->routeIs("seller.product.*") || !request()->routeIs("seller.digital.product.*") ?"collapsed" :""); ?> menu-link' href="#inhouseProduct" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="inhouseProduct">
                        <i class='bx bx-home-smile'></i> <span>
                            <?php echo e(translate("Manage Product")); ?>

                        </span>
                    </a>

                    <div class='collapse  <?php echo e(request()->routeIs("seller.product.*") || request()->routeIs("seller.digital.product.*") ?"show" :""); ?> menu-dropdown mega-dropdown-menu pt-1' id="inhouseProduct">
                        <ul class="nav nav-sm flex-column gap-1">

                            <li class="nav-item">
                                <a href="<?php echo e(route('seller.product.index')); ?>" class='<?php echo e(request()->routeIs("seller.product.*")?"active" :""); ?>  nav-link'>
                                    <?php echo e(translate("Product")); ?>

                                </a>
                            </li>

                            <!--<li class="nav-item">-->
                            <!--    <a href="<?php echo e(route('seller.digital.product.index')); ?>" class='<?php echo e(request()->routeIs("seller.digital.product.*")?"active" :""); ?>  nav-link'>-->
                            <!--        <?php echo e(translate("digital Products")); ?>-->
                            <!--    </a>-->
                            <!--</li>-->

                        </ul>
                    </div>
                </li>

                <li class="nav-item mt-1">
                    <a class='nav-link menu-link
                        <?php echo e(!request()->routeIs("seller.order.*") ||  !request()->routeIs("seller.digital.order.*") ? "collapsed" :""); ?>

                        ' href="#manageOrder" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="manageOrder">
                            <i class='bx bxs-shopping-bags'></i>
                            <span>
                                <?php echo e(translate('Manage order')); ?>

                            </span>
                    </a>

                    <div class='collapse
                    <?php echo e(request()->routeIs("seller.order.*") ||  request()->routeIs("seller.digital.order.*") ? "show" :""); ?>

                    menu-dropdown mega-dropdown-menu pt-1' id="manageOrder">
                        <ul class="nav nav-sm flex-column gap-1">
                            <li class="nav-item">
                                <a href="<?php echo e(route('seller.order.index')); ?>" class='
                                <?php echo e(request()->routeIs("seller.order.*")? "active" :""); ?>

                                nav-link'>
                                    <?php echo e(translate('Orders')); ?>

                                </a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a href="<?php echo e(route('seller.digital.order.index')); ?>" class='-->
                            <!--    <?php echo e(request()->routeIs("seller.digital.order.*")?"active" :""); ?>-->
                            <!--    nav-link'>-->
                            <!--        <?php echo e(translate('Digital Orders')); ?>-->
                            <!--    </a>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </li>

                <li class="menu-title">
                    <span>
                        <?php echo e(translate("Settings & Report")); ?>

                    </span>
                </li>

                <li class="nav-item">
                    <a class='nav-link menu-link <?php echo e(request()->routeIs("seller.withdraw.*")?"active" :""); ?>  ' href="<?php echo e(route('seller.withdraw.history')); ?>">
                        <i class='bx bx-money' ></i> <span>
                            <?php echo e(translate("Withdrawal History")); ?>

                        </span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class='nav-link menu-link <?php echo e(request()->routeIs("seller.deposit.*")?"active" :""); ?>  ' href="<?php echo e(route('seller.deposit.list')); ?>">
                        <i class='bx bxs-wallet'></i> <span>
                            <?php echo e(translate("Deposit Logs")); ?>

                        </span>
                    </a>
                </li>
                

                <li class="nav-item mt-1">
                    <a class="nav-link menu-link  <?php echo e(request()->routeIs('seller.kyc.log.list') ? 'active' :''); ?>  " href="<?php echo e(route('seller.kyc.log.list')); ?>">
                        <i class='bx bx-list-ul'></i> <span>
                            <?php echo e(translate('KYC
                            Logs')); ?>

                        </span>
                    </a>
                </li>


                <li class="nav-item mt-1">
                    <a class="nav-link menu-link  <?php echo e(request()->routeIs('seller.transaction.history') ? 'active' :''); ?>  " href="<?php echo e(route('seller.transaction.history')); ?>">
                        <i class='bx bx-transfer-alt' ></i> <span>
                            <?php echo e(translate('Transaction
                            Logs')); ?>

                        </span>
                    </a>
                </li>

                <!--<li class="nav-item mt-1">-->
                <!--    <a class="nav-link menu-link  <?php echo e(request()->routeIs('seller.plan.*') ? 'active' :''); ?>  " href="<?php echo e(route('seller.plan.index')); ?>">-->
                <!--        <i class='bx bx-purchase-tag' ></i> <span>-->
                <!--            <?php echo e(translate('Subscription-->
                <!--            Plan')); ?>-->
                <!--        </span>-->
                <!--    </a>-->
                <!--</li>-->

                <li class="nav-item mt-1">
                    <a class="nav-link menu-link  <?php echo e(request()->routeIs('seller.ticket.*') ? 'active' :''); ?>  " href="<?php echo e(route('seller.ticket.index')); ?>">
                        <i class='bx bx-message' ></i> <span>
                            <?php echo e(translate('Support
                            Ticket')); ?>

                        </span>
                    </a>
                </li>

                <li class="nav-item mt-1">
                    <a class="nav-link menu-link  <?php echo e(request()->routeIs('seller.shop.setting') ? 'active' :''); ?>  " href="<?php echo e(route('seller.shop.setting')); ?>">
                        <i class='bx bx-store' ></i> <span>
                            <?php echo e(translate('Shop & Site Setting')); ?>

                        </span>
                    </a>
                </li>

                <?php if(@$seller->sellerShop->status == 1): ?>
                    <li class="nav-item mt-1">
                        <a class="nav-link menu-link  <?php echo e(request()->routeIs('seller.store.visit') ? 'active' :''); ?>  " href="<?php echo e(route('seller.store.visit',[make_slug(@$seller->sellerShop->name ? @$seller->sellerShop->name :'none'), @$seller->id])); ?>">
                            <i class='bx bxs-store-alt' ></i> <span>
                                <?php echo e(translate('View Store')); ?>

                            </span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/seller/partials/sidebar.blade.php ENDPATH**/ ?>