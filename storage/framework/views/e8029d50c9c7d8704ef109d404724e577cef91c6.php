<header id="header">
    <div class="header-layout">
        <div class="header-navbar">
            <div class="d-flex">
                <div class="brand-logo horizontal-logo">

                    <a href="<?php echo e(route('seller.dashboard')); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(show_image(file_path()['seller_site_logo']['path'].'/'.@$seller->sellerShop->logoicon,file_path()['loder_logo']['size'])); ?>" alt="seller_site_logo_sm.png" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(show_image(file_path()['seller_site_logo']['path'].'/'.@$seller->sellerShop->seller_site_logo)); ?>" alt="<?php echo e(@$seller->sellerShop->seller_site_logo); ?>" height="17">
                        </span>
                    </a>
                </div>

                <div class="header-action-btn d-flex align-items-center me-md-2 me-xl-3">
                    <button type="button"
                        class="btn btn-sm px-3 fs-22 vertical-menu-btn hamburger-btn btn-ghost-secondary topbar-btn btn-icon rounded-circle waves ripple-dark"
                        id="hamburger-btn">
                        <i class='bx bx-chevrons-left'></i>
                    </button>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <?php
                        $currency  = session()->get('web_currency');
               
                ?>
                <div class="dropdown card-header-dropdown header-item">
                    <button  <?php if(count($currencys) != 0): ?> data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php endif; ?>
                    class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle currency-btn waves ripple-dark dropdown-toggle">
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

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                        class="btn btn-icon topbar-btn btn-ghost-secondary rounded-circle waves ripple-dark"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-md-3 ms-2 header-item topbar-user">
                    <button type="button" class="btn waves ripple-dark" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="<?php echo e(show_image(file_path()['profile']['seller']['path'].'/'.auth_user('seller')->image,file_path()['profile']['seller']['size'])); ?>"
                                alt="<?php echo e(auth_user('seller')->image); ?>">

                            <span class="text-start ms-xl-2 d-none d-lg-block lh-1">
                                <span class="mb-0 fw-bold user-name-text text-light">
                                    <?php echo e(auth_user('seller')->name); ?>

                                </span>
                            </span>
                        </span>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">

                        <h6 class="dropdown-header">
                        <?php echo e(translate('Welcome')); ?>

                        <?php echo e(auth_user('seller')->name); ?></h6>
                            <a class="dropdown-item" href="<?php echo e(route('seller.profile')); ?>"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">
                            <?php echo e(translate('Settings')); ?>

                        </span></a>
                        <a class="dropdown-item" href="<?php echo e(route('seller.logout')); ?>"><i
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
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/seller/partials/topbar.blade.php ENDPATH**/ ?>