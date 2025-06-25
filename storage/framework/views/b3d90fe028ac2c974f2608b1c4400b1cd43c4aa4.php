

<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            "use strict";
            <?php
              $message = translate($message);
            ?>
            toaster("<?php echo e($message); ?>",'danger')
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(Session::has('success') ): ?>
    <script>
        "use strict";
        toaster("<?php echo e(Session::get('success')); ?>",'success')
    </script>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <script>
        "use strict";
        toaster("<?php echo e(Session::get('error')); ?>",'danger')
    </script>
    <?php
      session()->forget('error');
    ?>
<?php endif; ?>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/partials/notify.blade.php ENDPATH**/ ?>