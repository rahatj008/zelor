<header id="header">
    <div class="header-layout">
        <div class="header-navbar">
            <div class="d-flex align-items-center">
                <div class="brand-logo horizontal-logo">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(show_image(file_path()['admin_site_logo']['path'].'/'.site_settings('admin_logo_sm') ,file_path()['loder_logo']['size'])); ?>" alt="<?php echo e(site_settings('admin_logo_sm')); ?>">
                        </span>

                        <span class="logo-lg">
                            <img src="<?php echo e(show_image(file_path()['admin_site_logo']['path'].'/'.site_settings('admin_logo_lg'),file_path()['admin_site_logo']['size'])); ?>" alt="<?php echo e(site_settings('admin_logo_lg')); ?>">
                        </span>
                    </a>
                </div>

                <div class="header-action-btn d-flex align-items-center me-md-2 me-xl-3">
                    <button type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle vertical-menu-btn hamburger-btn  waves ripple-dark"
                        id="hamburger-btn">
                        <i class='bx bx-chevrons-left fs-22 '></i>
                    </button>

                    <div class="dropdown card-header-dropdown d-none d-sm-block">

                        <button data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Add New')); ?>"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle waves ripple-dark">
                        <i class='bx bx-plus fs-22'></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-start">
                            <!--<a class="dropdown-item" href='<?php echo e(route("admin.item.product.inhouse.create")); ?>'>-->
                            <!--    <?php echo e(translate("New Product")); ?>-->
                            <!--</a>-->
                            <a class="dropdown-item" href="<?php echo e(route('admin.item.brand.create')); ?>">
                                <?php echo e(translate("New Brand")); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('admin.item.category.create')); ?>">
                                <?php echo e(translate("New Category")); ?>

                            </a>

                        </div>
                    </div>

                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Clear Cache')); ?>" href='<?php echo e(route("admin.general.setting.cache.clear")); ?>'
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle waves ripple-dark">
                        <i class='bx bx-brush fs-22'></i>
                    </a>

                    <a target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Browse Frontend')); ?>" href="<?php echo e(route('home')); ?>"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle waves ripple-dark">
                        <i class='bx bx-world fs-22'></i>
                    </a>
                </div>
            </div>

                <?php
                    $currency  = session()->get('web_currency');
                ?>

            <div class="d-flex align-items-center">

                <div class="dropdown card-header-dropdown header-item">
                    <button  <?php if(count($currencys) != 0): ?> data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php endif; ?>
                    class="dropdown-toggle btn btn-icon btn-topbar btn-ghost-secondary rounded-circle currency-btn waves ripple-dark">
                        <span class="fw-bold fs-12">
                            <?php echo e($currency->name); ?>

                        </span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">

                        <?php $__currentLoopData = $currencys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item chanage_currency" data-value="<?php echo e($currency->id); ?>" href="javascript:void(0)">
                                <?php echo e($currency->name); ?>

                            </a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

                <div class="dropdown topbar-head-dropdown header-item ms-1">

                    <?php
                        $lang = $languages->where('code',session()->get('locale'));

                        $code = count($lang)!=0 ? $lang->first()->code:"en";
                        $languages = $languages->where('code','!=',$code);
                    ?>
                    <button type="button" class="dropdown-toggle btn btn-icon topbar-btn btn-ghost-secondary rounded-circle lang-btn waves ripple-dark"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="fw-bold fs-12">
                            <?php echo e($code); ?>

                        </span>

                    </button>

                    <?php if(count($languages) != 0): ?>
                        <div class="dropdown-menu dropdown-menu-end">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('language.change',$language->code)); ?>" class="dropdown-item notify-item language py-2" data-lang="<?php echo e($language->code); ?>"
                                    title="<?php echo e($language->name); ?>">
                                    <span class="align-middle lang-code">
                                        <?php echo e($language->code); ?>

                                    </span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="dropdown topbar-head-dropdown ms-sm-1 header-item" id="notificationDropdown">
                    <a title="<?php echo e(translate('Placed Order')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" href="<?php echo e(route('admin.inhouse.order.placed')); ?>" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-cart fs-22'></i>
                        <?php if($physical_product_order_count > 0): ?>
                            <span
                                class="position-absolute topbar-badge  translate-middle badge rounded-pill bg-danger">
                                <?php echo e($physical_product_order_count); ?>

                            </span>
                        <?php endif; ?>
                    </a>
                </div>

                <div class="ms-sm-1 header-item d-none d-lg-flex">
                    <button type="button"
                        class="btn btn-icon topbar-btn btn-ghost-secondary rounded-circle waves ripple-dark"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-md-3 ms-2 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="<?php echo e(show_image(file_path()['profile']['admin']['path'].'/'.auth_user()->image,file_path()['profile']['admin']['size'])); ?>"
                                alt="<?php echo e(auth_user()->image); ?>">

                            <span class="text-start ms-xl-2 d-none d-lg-flex flex-column lh-1">
                                <span class="mb-0 fw-bold user-name-text text-light">
                                    <?php echo e(auth_user()->name); ?>

                                </span>
                                <span class="fs-10 user-name-sub-text text-light">
                                    <?php echo e(auth_user()->role?auth_user()->role->name : ''); ?>

                                </span>
                            </span>
                        </span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">

                        <h6 class="dropdown-header">
                            <?php echo e(translate('Welcome')); ?>

                            <?php echo e(auth_user()->name); ?></h6>
                              <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">
                               <?php echo e(translate('Settings')); ?>

                            </span></a>

                        <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">
                                <?php echo e(translate('Logout')); ?>

                             </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/partials/topbar.blade.php ENDPATH**/ ?>