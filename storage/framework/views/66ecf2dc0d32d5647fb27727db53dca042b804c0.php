<?php $__env->startSection('content'); ?>

    <div class="breadcrumb-banner">
        <div class="breadcrumb-banner-img">
            <img src="<?php echo e(show_image(file_path()['frontend']['path'].'/'.@frontend_section_data($breadcrumb->value,'image'),@frontend_section_data($breadcrumb->value,'image','size'))); ?>" alt="breadcrumb.jpg">
        </div>  
        <div class="page-Breadcrumb">
            <div class="Container">
                <div class="breadcrumb-container">
                    <h1 class="breadcrumb-title"><?php echo e(($title)); ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">
                                <?php echo e(translate('home')); ?>

                            </a></li>

                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo e(translate($title)); ?>

                            </li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <section class="" style="background:#404040 !important; padding: 5rem 2rem !important;">
        <div class="Container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <div class="form-wrapper">
                        <div class="login-options">
                            <button class="login-tab login-tab-btn signintab login-option-active">
                                <i class="las la-sign-in-alt"></i>
                                <?php echo e(translate("Sign in")); ?>

                            </button>
                            
                            <button class="login-tab login-tab-btn">
                                <i class="las la-user-plus"></i>
                                <?php echo e(translate("Sign Up")); ?>

                            </button>
                        </div>

                        <div class="login-form-container">

                
                            <form action="<?php echo e(route('login.store')); ?>" id="login-form" method="POST" class="login-form sign-in-form show-form">
                                <?php echo csrf_field(); ?>

                                <div>
                                    <label for="authEmail" class="form-label">
                                        <?php if(site_settings('email_otp_login', App\Enums\StatusEnum::false->status()) == App\Enums\StatusEnum::true->status() &&   site_settings('phone_otp_login', App\Enums\StatusEnum::false->status()) == App\Enums\StatusEnum::true->status()): ?>
                                            <?php echo e(translate('Enter your email or phone')); ?>

                                        <?php elseif(site_settings('phone_otp_login', App\Enums\StatusEnum::false->status()) == App\Enums\StatusEnum::true->status()): ?>
                                            <?php echo e(translate('Enter your phone')); ?>

                                        <?php elseif(site_settings('email_otp_login', App\Enums\StatusEnum::false->status()) == App\Enums\StatusEnum::true->status()): ?>
                                            <?php echo e(translate('Enter your email')); ?>

                                        <?php else: ?>
                                            <?php echo e(translate('Enter your email')); ?>

                                        <?php endif; ?>
                                    </label>
                                    
                                    <input type="text" name="email" <?php if(is_demo()): ?> value="demo@zelorwines.com" <?php endif; ?>
                                    placeholder="<?php echo e(translate('Type here')); ?>"  class="form-control" id="authEmail">
                                </div>

                                <?php if(site_settings('login_with_password',App\Enums\StatusEnum::true->status()) ==  App\Enums\StatusEnum::true->status()): ?>

                                    <div>
                                        <label for="authPass" class="form-label"><?php echo e(translate('Password')); ?></label>
                                        <input type="password"  <?php if(is_demo()): ?> value="123123" <?php endif; ?> name="password" id="authPass"  class="form-control" placeholder="<?php echo e(translate('Password')); ?>">
                                    </div>

                                    <div class="remember-forgot">
                                        <a href="javascript:void(0)" class="forgot-pass login-tab-btn">
                                            <?php echo e(translate("Forgot Password")); ?> ?
                                        </a>
                                    </div>
                                    
                                <?php endif; ?>


                                <input type="submit" value="<?php echo e(translate("Signin")); ?>"  
                                
                                <?php if(site_settings('recaptcha_status',App\Enums\StatusEnum::false->status()) ==  App\Enums\StatusEnum::true->status()): ?>       
                                class="g-recaptcha form-submit-btn"
                                data-sitekey="<?php echo e(site_settings('recaptcha_public_key')); ?>"
                                data-callback='onSubmit'
                                data-action='register'
                                <?php else: ?>
                                    class="form-submit-btn"
                                <?php endif; ?> 
                            >
        
                 
                            </form>

                            <form action="<?php echo e(route('register.store')); ?>" id="registration-form" class="sign-up-form login-form" method="POST">
                                <?php echo csrf_field(); ?>

                                <div>
                                    <label for="authregEmail" class="form-label"><?php echo e(translate('Enter your email')); ?></label>
                                    <input type="email" name="email" id="authregEmail" value="<?php echo e(old('email')); ?>"  class="form-control"  aria-describedby="authregEmail" placeholder="Email Address">
                                </div>
                                <div>
                                    <label for="phone" class="form-label"><?php echo e(translate('Enter your phone')); ?></label>
                                    <input type="text" name="phone" id="phone" value="<?php echo e(old('phone')); ?>"  class="form-control"  aria-describedby="phone" placeholder="Phone number">
                                </div>

                                <div>
                                    <label for="authregPass" class="form-label"><?php echo e(translate('Enter your password')); ?></label>
                                    <input type="password"  value="<?php echo e(old('password')); ?>" id="authregPass" name="password" id="password" class="form-control" aria-describedby="authPass" placeholder="Password">
                                </div>

                                <div>
                                    <label for="confirmAuthPass" class="form-label"><?php echo e(translate('Confirmation password')); ?></label>
                                    <input type="password" value="<?php echo e(old('password_confirmation')); ?>" name="password_confirmation" id="confirmAuthPass" class="form-control" aria-describedby="confirmAuthPass" placeholder="Confirm Password">
                                </div>
                            
                                <?php
                                    $tc = App\Models\PageSetup::where('status','1')
                                                    ->where(function($q){
                                                        $q->where('uid','1dRR-7BkgK045-kV4k')
                                                        ->orwhere('name','like','%Terms and Conditions%');
                                                    })->first();
                                ?>
                            
                                <?php if($tc): ?>
                                    <div class="form-check ">
                                        <input required name="t_c" class="form-check-input cursor-pointer" type="checkbox" value="" id="t_c">
                                        <label class="form-check-label" for="t_c">
                                            <?php echo e(translate('I Accept')); ?> 
                                        </label>
                                        <a class="text-decoration-underline" href="<?php echo e(route('pages',[make_slug($tc->name),$tc->id])); ?>"><?php echo e($tc->name); ?></a>
                                    </div>
                                <?php endif; ?>
                            


                                <input type="submit" value="<?php echo e(translate("Sign up")); ?>"  
                                
                                    <?php if(site_settings('recaptcha_status',App\Enums\StatusEnum::false->status()) ==  App\Enums\StatusEnum::true->status()): ?>       
                                    class="g-recaptcha form-submit-btn"
                                    data-sitekey="<?php echo e(site_settings('recaptcha_public_key')); ?>"
                                    data-callback='onRegister'
                                    data-action='register'
                                    <?php else: ?>
                                        class="form-submit-btn"
                                    <?php endif; ?> >
                            </form>

                            <form action="<?php echo e(route('password.email')); ?>" method="POST" class="reset-password login-form">
                                <?php echo csrf_field(); ?>
                                <div class="text-center d-flex flex-column gap-3">
                                        <h4 class="fs-16"> <?php echo e(translate('Forgot Password')); ?> </h4>
                                        <p class="fs-12 text-muted">
                                            <?php echo e(translate("Please Enter Your Email")); ?>

                                        </p>
                                </div>

                                <div>
                                    <label for="authregEmail" class="form-label"><?php echo e(translate('Enter your email')); ?></label>
                                    <input type="email"  name="email" class="form-control"  aria-describedby="authregEmail" placeholder="<?php echo e(translate("Email Address")); ?>">
                                </div>

                                
                                <div class="remember-forgot">
                                    <a href="javascript:void(0)" class="login-tab-btn back-login">
                                        <?php echo e(translate("Login")); ?>?
                                    </a>
                                </div>

                                <input type="submit" value="Contiune" class="form-submit-btn">
                            </form>

                        </div>

                        <div class="login-with-options">
                            <h4><?php echo e(translate('Or Sign Up With')); ?></h4>
                            <ul class="login-with-option">

                                <?php 		 
                                    $google    = json_decode(site_settings('s_login_google_info'),true);
                                    $facebook  = json_decode(site_settings('s_login_facebook_info'),true);
                                ?>
                                <?php if(array_key_exists('g_status',$google)): ?>
                                    <?php if($google['g_status'] == 1): ?>
                                        <li class="mb-4">
                                            <a href="<?php echo e(url('auth/google')); ?>" class="google-log">
                                                <span class="log-icon"><i class="fa-brands fa-google"></i></span><?php echo e(translate('Google')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if(array_key_exists('f_status',$facebook)): ?>
                                    <?php if($facebook['f_status'] == 1): ?>
                                        <li>
                                            <a href="<?php echo e(url('auth/facebook')); ?>" class="facebook-log">
                                                <span class="log-icon"><i class="fa-brands fa-facebook-f"></i></span><?php echo e(translate('Facebook')); ?>

                                            </a>
                                    </li>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="form-image-wrapper img-adjust login-bg">
                        <div class="swiper testi-two-slider">
                            <div class="swiper-wrapper">
                                <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <div class="swiper-slide">
                                        <div class="testi-single-two">
                                            <p><?php echo e($testimonial->quote); ?></p>
                                            <div class="author-area">
                                                <h6><?php echo e($testimonial->author); ?></h6>
                                                <span><?php echo e($testimonial->designation); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="testi-two-pagination pagination-one"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>


<?php if(site_settings('recaptcha_status') == App\Enums\StatusEnum::true->status()): ?>

    <?php $__env->startPush('script-include'); ?>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>


<?php $__env->startPush('scriptpush'); ?>

  <?php if(site_settings('recaptcha_status') == App\Enums\StatusEnum::true->status()): ?>

      <script>
          'use strict'
          function onSubmit(token) {

            document.getElementById("login-form").submit();
          }
          function onRegister(token) {
       
            document.getElementById("registration-form").submit();
          }
      </script>

    <?php endif; ?>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/auth/login.blade.php ENDPATH**/ ?>