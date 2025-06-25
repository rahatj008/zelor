
<?php if(count($combinations[0]) > 0): ?>
<div class="table-responsive">
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>
                    <?php echo e(translate('Variant')); ?>

                </th>

                <th >
                    <?php echo e(translate('Display name')); ?>

                </th>
    
                <th >
                    <?php echo e(translate('Price')); ?>

                </th>
    
                <th>
                    <?php echo e(translate('Quantity')); ?>

                </th>
    
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $varient_name = '';

                foreach ($combination as $key => $item){
                    if($key > 0 ){
                        $varient_name .= '-'.str_replace(' ', '', $item);
                    }
                    else{
                        $varient_name .= str_replace(' ', '', $item);
                    }
                }
            ?>
            <?php if(strlen($varient_name) > 0): ?>
                <tr class="variant">
                    <td>
                        <label  class="control-label mt-2 mb-0"><?php echo e(($varient_name)); ?></label>
                    </td>

                    <td>
                        <input type="text"  name="display_name_<?php echo e($varient_name); ?>" value="<?php echo e($varient_name); ?>" class="form-control" required>
                    </td>
                    <td>
                        <input type="number"  name="price_<?php echo e($varient_name); ?>" value="<?php echo e($unit_price); ?>" min="0" step="0.01" class="form-control" required>
                    </td>
    
                    <td>
                        <input type="number"  name="qty_<?php echo e($varient_name); ?>" value="10" min="0" step="1" class="form-control" required>
                    </td>
    
                </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/product/combination.blade.php ENDPATH**/ ?>