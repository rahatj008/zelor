

    <div class="table-responsive">
        <table class="table table-nowrap align-middle">
            <thead class="table-light">
                <tr class="text-muted fs-14">
                    <th scope="col" class="text-start">
                        <?php echo e(translate("Product")); ?>

                    </th>
                    <th scope="col" class="text-center">
                        <?php echo e(translate("Varient")); ?>

                    </th>
                    <th scope="col" class="text-center">
                        <?php echo e(translate("Qty")); ?>

                    </th>
                    <th scope="col" class="text-center">
                        <?php echo e(translate("Total Price")); ?>

                    </th>
    
                    <th scope="col" class="text-end">
                        <?php echo e(translate("Action")); ?>

                    </th>
                </tr>
            </thead>
            <?php
               $subtotal = 0;
               $flag = 1;
            ?>
            <tbody class="border-bottom-0">
    
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            
                    <?php if($data->product): ?>
                        <?php
                          $subtotal += ($data->price - $data->total_taxes)*$data->quantity;
                        ?>
                        <tr class="fs-14 cart-item" id="cart-<?php echo e($data->id); ?>">
                            <td>
                                <div class="wishlist-product align-items-center">
                                    <div class="wishlist-product-img">
                                        <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$data->product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($data->product->name); ?>">
                                    </div>
    
                                    <div class="wishlist-product-info">
                                        <h4 class="product-title mb-2" style="color:black !important;"><?php echo e($data->product->name); ?></h4>
                                        <div class="ratting mb-0">
                                            <?php echo show_ratings($data->product->review->avg('ratings')) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <?php echo e(($data->attributes_value)); ?>

                            </td>
    
                            <td class="text-center">
                                    <div class="input-step ">
                                        <button type="button" class="quantitybutton x decrement">–</button>
    
                                                <input  data-price="<?php echo e(short_amount($data->price,false)); ?>" value="<?php echo e($data->quantity); ?>" data-id="<?php echo e($data->id); ?>" type="number" class="product-quantity"  name="quantity" id="quantity">
    
                                        <button type="button" class="quantitybutton y increment ">+</button>
                                    </div>
    
                            </td>
    
                            <td class="text-center">
                                
                                <span class="item-product-amount">
                                    <?php echo e(short_amount(($data->price - $data->total_taxes)*$data->quantity)); ?>

                                 
                                </span>
                              
                             
                            </td>
    
                            <td class="text-end">
                                <div class="d-flex align-items-center gap-3 justify-content-end">
                                    <button data-id="<?php echo e($data->id); ?>" class="remove-cart-data badge badge-soft-danger fs-12 pointer"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php
                        $flag = 0;
                    ?>
                    <tr>
                        <td class="text-center" colspan="100"><?php echo e(translate('No Data Found')); ?></td>
                    </tr>
                <?php endif; ?>
    
                <?php if($flag == 1): ?>
    
                    <tr class="shopping-chat-table-bottom">
                        <td class="text-start text-muted"><?php echo e(translate('Subtotal')); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-end text-muted">
                             <span id="subtotalamount"> <?php echo e(short_amount($subtotal)); ?></span>
                        </td>
                    </tr>
    
                    <tr class="shopping-chat-table-bottom">
                        <td class="text-start"><?php echo e(translate('Total')); ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-end">
                             <span id="totalamount"> <?php echo e(short_amount($subtotal)); ?></span>
                        </td>
                    </tr>
                <?php endif; ?>
                
            </tbody>
        </table>

    </div>
    <?php if($flag == 1): ?>
        <div class="d-flex align-items-center justify-content-between  mt-4 gap-4 flex-wrap">
            <a href="<?php echo e(route('product')); ?>" class="btn-label previestab fs-12"><i class="fa-solid fa-arrow-left label-icon align-middle fs-14 "></i> <?php echo e(translate('Continue
                Shopping')); ?></a>
            <a href="<?php echo e(route('user.checkout')); ?>" class="btn-label nexttab fs-12"><?php echo e(translate('CHECKOUT')); ?> <i class="fa-solid fa-credit-card label-icon align-middle fs-14"></i></a>
        </div>
    <?php endif; ?>
    
  
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/ajax/cart_list.blade.php ENDPATH**/ ?>