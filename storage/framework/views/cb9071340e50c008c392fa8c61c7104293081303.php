<div class="col-xl-3 col-lg-4">
    <div class="profile-user-left sticky-side-div">
        <div class="profile-user-info">
            <div class="profile-user-top align-items-canter flex-column">
                <div class="profile-user-img flex-shrink-0">
                    <img src="<?php echo e(show_image(file_path()['profile']['user']['path'].'/'.$user->image,file_path()['profile']['user']['size'])); ?>" alt="<?php echo e(auth_user('web')->name); ?>" />
                </div>

                <div class="profile-user-name text-center w-100">
                    <h5>
                        <?php echo e(auth_user('web')->name); ?>

                    </h5>
                    <a href="javascript:void(0)"> <?php echo e(auth_user('web')->email); ?> </a>

                    <?php if(site_settings('customer_wallet') == App\Enums\StatusEnum::true->status()): ?>

              

                        <div class="mt-4 bg-light px-4 py-5 text-center">
                            <h6 class="fs-18 mb-3">
                                 <?php echo e(translate('Wallet Balance')); ?>

                            </h6>
                            <p class="fs-14">
                                <?php echo e(short_amount(auth_user('web')->balance)); ?>

                            </p>

                            <div class="d-flex align-items-center justify-content-center gap-4 mt-5">
                                <a href="<?php echo e(route('user.deposit.create')); ?>" class="btn btn-lg btn-success ">
                                    <?php echo e(translate('Deposit')); ?>

                                </a>
                                <a href="<?php echo e(route('user.withdraw.method')); ?>" class="btn btn-lg btn-danger ">
                                    <?php echo e(translate('Withdraw')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="nav flex-column nav-pills gap-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">


                    <a href="<?php echo e(route('user.dashboard')); ?>"  class="nav-link account-tab <?php echo e(request()->routeIs('user.dashboard') ? 'active' : ''); ?>  ">
                        <span>
                            <?php echo e(translate("Dashboard")); ?>

                        </span>
                    </a>

                    <a href="<?php echo e(route('user.digital.order.list')); ?>"  class="nav-link account-tab <?php echo e(request()->routeIs('user.digital.order.list') ? 'active' : ''); ?>  ">
                        <span>
                            <?php echo e(translate("Orders")); ?>

                        </span>
                    </a>


                    <a href="<?php echo e(route('user.transactions')); ?>"  class="nav-link account-tab <?php echo e(request()->routeIs('user.transactions') ? 'active' : ''); ?>  ">
                        <span>
                            <?php echo e(translate("Transactions")); ?>

                        </span>
                    </a>



                    <a href="<?php echo e(route('user.wishlist.item')); ?>"  class="nav-link account-tab <?php echo e(request()->routeIs('user.wishlist.item') ? 'active' : ''); ?>  ">
                        <span>
                            <?php echo e(translate("Wishlist")); ?>

                        </span>
                    </a>


                    <a href="<?php echo e(route('cart.view')); ?>"  class="nav-link account-tab <?php echo e(request()->routeIs('cart.view') ? 'active' : ''); ?>  ">
                        <span>
                            <?php echo e(translate("Cart")); ?>

                        </span>
                    </a>
                    

                        
                            
                            


                    
                    <a href="<?php echo e(route('user.reviews')); ?>"  class="nav-link account-tab <?php echo e(request()->routeIs('user.reviews') ? 'active' : ''); ?>  ">
                        <span>
                            <?php echo e(translate("My Reviews")); ?>

                        </span>
                    </a>


                    <a href="<?php echo e(route('user.support.ticket.index')); ?>"  class="nav-link account-tab <?php echo e(request()->routeIs('user.support.ticket.index') ? 'active' : ''); ?>  ">
                        <span>
                            <?php echo e(translate("Support Ticket")); ?>

                        </span>
                    </a>


                    <a href="<?php echo e(route('user.profile')); ?>"  class="nav-link account-tab <?php echo e(request()->routeIs('user.profile') ? 'active' : ''); ?>  ">
                        <span>
                            <?php echo e(translate("Manage Profile")); ?>

                        </span>
                    </a>


                    <a href="<?php echo e(route("logout")); ?>" class="nav-link account-tab mt-2">
                        <?php echo e(translate("Log Out")); ?>

                    </a>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/user/partials/dashboard_sidebar.blade.php ENDPATH**/ ?>