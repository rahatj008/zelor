
<?php $__env->startSection('main_content'); ?>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center flex-column">
            <div class="row w-100 justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <div class="w-50 mx-auto" >
                                    <a href="<?php echo e(route('admin.dashboard')); ?>">
                                        <img src="<?php echo e(show_image('assets/images/backend/logoIcon/'.site_settings('site_logo'), file_path()['site_logo']['size'])); ?>" class="w-100 h-100" alt="<?php echo e(site_settings('site_logo')); ?>">
                                    </a>
                                </div>

                                <p class="text-muted mt-2">
                                    <?php echo e(translate("Sign in to continue to")); ?> <?php echo e(site_settings('site_name')); ?>

                                </p>
                            </div>
                            <div class="p-2 ">
                                <form action="<?php echo e(route('admin.authenticate')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">
                                            <?php echo e(translate("Username")); ?> <span class="text-danger" >*</span>
                                        </label>
                                        <input type="text" name="user_name" <?php if(is_demo()): ?> value="admin" <?php endif; ?>  required   class="form-control" id="username" placeholder="<?php echo e(translate('Enter username')); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <div class="float-end mb-half">
                                            <a href="<?php echo e(route('admin.password.request')); ?>" class="text-muted">
                                                    <?php echo e(translate("Forgot password")); ?>?
                                            </a>
                                        </div>
                                        <label class="form-label" for="password-input">
                                            <?php echo e(translate("Password")); ?> <span class="text-danger" >*</span>
                                        </label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input required <?php if(is_demo()): ?> value="123123" <?php endif; ?>  type="password"  name="password" class="form-control pe-5 password-input" placeholder="<?php echo e(translate('Enter Password')); ?>" id="password-input">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i id="toggle-password" class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="remember_me" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">
                                            <?php echo e(translate("Remember me")); ?>

                                        </label>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100 rounded-10" type="submit">
                                            <?php echo e(translate("Sign In")); ?>

                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <p class="mb-0 text-muted">
                                    <?php echo e(site_settings('copyright_text')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-push'); ?>
<script>
    'use strict'
    $(document).on('click','#toggle-password',function(e){
        var passwordInput = $("#password-input");
        var passwordFieldType = passwordInput.attr('type');
        if (passwordFieldType == 'password') {
        passwordInput.attr('type', 'text');
        $("#toggle-password").removeClass('ri-eye-fill').addClass('ri-eye-off-fill');
        } else {
        passwordInput.attr('type', 'password');
        $("#toggle-password").removeClass('ri-eye-off-fill').addClass('ri-eye-fill');
        }
   });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>