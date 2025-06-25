<div class="js-cookie-consent cookie-consent  cookies">
    <h5><?php echo e(@frontend_section_data($cookie->value,'heading')); ?></h5>
        <p>
            <span class="cookie-icon"><i class="fa-solid fa-cookie-bite"></i></span> <?php echo e(@frontend_section_data($cookie->value,'sub_heading')); ?>

        </p>
        
        <div class="cookies-action">
            <button class="js-cookie-consent-agree cookie-consent__agree cursor-pointer accept-cookie cookie-control">
                <?php echo e(translate("Accept & Continue")); ?>

            </button>
        </div>
</div>

<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/cookie.blade.php ENDPATH**/ ?>