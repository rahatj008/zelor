<?php
    $header = frontend_section('floating-header');
    $header_value = json_decode( $header->value,true);
?>
<?php if($header->status == '1'): ?>
    <div class="header-top">
        <div class="Container">
            <p class="topbar-offer"><?php echo e($header_value['heading']['value']); ?> ✨
            </p>
        </div>
        <span class="header-top-hide"><i class="fa-solid fa-xmark"></i></span>
    </div>
<?php endif; ?>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/topbar.blade.php ENDPATH**/ ?>