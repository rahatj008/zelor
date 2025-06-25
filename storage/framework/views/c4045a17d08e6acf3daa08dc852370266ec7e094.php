
<?php $__env->startSection('main_content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">
                <?php echo e(translate($title)); ?>

            </h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">
                        <?php echo e(translate('Home')); ?>

                    </a></li>
                    <li class="breadcrumb-item active">
                        <?php echo e(translate("Customers")); ?>

                    </li>
                </ol>
            </div>

        </div>

        <div class="card">
            <div class="card-header border-0">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <h5 class="card-title mb-0 flex-grow-1">
                            <?php echo e(translate('Customer List')); ?>

                        </h5>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2">
                            <a href="<?php echo e(route('admin.customer.create')); ?>" class="btn btn-success btn-sm w-100 waves ripple-light"> <i
                                class="ri-add-line me-1 align-bottom"></i>
                            <?php echo e(translate('Create')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form action="<?php echo e(route(Route::currentRouteName(),Route::current()->parameters())); ?>" method="get">
                    <div class="row g-3">
                        <div class="col-xl-4 col-sm-6">
                            <div class="search-box">
                                <input type="text" name="search" class="form-control search"
                                    placeholder="<?php echo e(translate('Search by name , email ,username or phone')); ?>">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>

                        <div class="col-xl-2 col-sm-3 col-6">
                            <div>
                                <button type="submit" class="btn btn-primary w-100 waves ripple-light"> <i
                                        class="ri-equalizer-fill me-1 align-bottom"></i>
                                    <?php echo e(translate('Search')); ?>

                                </button>
                            </div>
                        </div>

                        <div class="col-xl-2 col-sm-3 col-6">
                            <div>
                                <a href="<?php echo e(route(Route::currentRouteName(),Route::current()->parameters())); ?>" class="btn btn-danger w-100 waves ripple-light"
                                    > <i
                                        class="ri-refresh-line me-1 align-bottom"></i>
                                    <?php echo e(translate('Reset')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body pt-0">
                <ul class="nav nav-tabs nav-tabs-custom nav-primary mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.customer.index') ? 'active' :''); ?> All py-3"  id="All"
                            href="<?php echo e(route('admin.customer.index')); ?>" >
                            <i class="ri-group-fill me-1 align-bottom"></i>
                            <?php echo e(translate('All
                            Customer')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.customer.active') ? 'active' :''); ?>   py-3"  id="Placed"
                            href="<?php echo e(route('admin.customer.active')); ?>" >

                            <i class="ri-user-follow-line me-1 align-bottom"></i>
                            <?php echo e(translate('Active Customer')); ?>


                        </a>
                    </li>
                    <li class="nav-item">
                        <a class='nav-link <?php echo e(request()->routeIs("admin.customer.banned") ? "active" :""); ?> Confirmed py-3'  id="Confirmed"
                            href="<?php echo e(route('admin.customer.banned')); ?>" >

                            <i class="ri-user-unfollow-line me-1 align-bottom"></i>
                            <?php echo e(translate("Banned Customer")); ?>


                        </a>
                    </li>
                </ul>

                <div class="table-responsive table-card">
                    <table class="table table-hover table-nowrap align-middle mb-0" >
                        <thead class="text-muted table-light">
                            <tr class="text-uppercase">
                                <th><?php echo e(translate('Customer - Username')); ?></th>
                                <th><?php echo e(translate('Email - Phone')); ?></th>
                                <th><?php echo e(translate('Balance')); ?>

                                </th>
                                <th><?php echo e(translate('Point')); ?>

                                </th>
                        
                                <th><?php echo e(translate('Number of Orders')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                                <th><?php echo e(translate('Joined At')); ?></th>
                                <th><?php echo e(translate('Action')); ?></th>
                            </tr>
                        </thead>

                        <tbody class="list form-check-all">
                            <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label='<?php echo e(translate("Customer - Username")); ?>'>
                                        <span class="fw-bold">
                                            <?php echo e(($customer->name ?? 'N/A')); ?>

                                        </span>
                                            <br>
                                        <?php echo e(($customer->username ?? 'N/A')); ?>

                                    </td>

                                    <td data-label="<?php echo e(translate('Email - Phone')); ?>">
                                        <?php echo e(($customer->email)); ?><br>
                                        <?php echo e(($customer->phone ?? 'N/A')); ?>

                                    </td>

                                    <td data-label="<?php echo e(translate('Balance')); ?>">
                                        <div>
                                            <a href="javascript:void(0)" data-id="<?php echo e($customer->id); ?>" class="update-balance"  data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Update Balance')); ?>"><span><i class="fs-4 lar la-edit"></i></span></a>
                                            <span><?php echo e(round(($customer->balance))); ?> <?php echo e(default_currency()->name); ?></span>
                          
                                        </div>
                                   </td>


                                   <td data-label="<?php echo e(translate('Rewards')); ?>">
                                   
                                        <a   title="<?php echo e(translate('View rewards')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" href="<?php echo e(route('admin.customer.rewards',['user_id' => $customer->id])); ?>">
                                            <?php echo e($customer->rewards->sum("point")); ?>

                                        </a>
                                   </td>


                                
                                    <td class="text-start" data-label="<?php echo e(translate('Number of Orders')); ?>">
                                        <?php echo e($customer->order->count()); ?>

                                    </td>

                                    <td data-label="<?php echo e(translate('Status')); ?>">
                       
                                        <?php if($customer->status == 1): ?>
                                           <span class="badge badge-soft-success"><?php echo e(translate('Active')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger"><?php echo e(translate('Banned')); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td data-label="<?php echo e(translate('Joined At')); ?>">
                                        <?php echo e(diff_for_humans($customer->created_at)); ?><br>
                                        <?php echo e(get_date_time($customer->created_at)); ?>

                                    </td>

                                    <td data-label="<?php echo e(translate('Action')); ?>">
                                        <div class="hstack justify-content-center gap-3">

                                            <a target="_blank" class="link-success fs-18 " data-bs-toggle="tooltip" data-bs-placement="top" title="Login" href="<?php echo e(route('admin.customer.login', $customer->id)); ?>"><i class="ri-login-box-line"></i></a>

                                            <a class="link-info fs-18 " data-bs-toggle="tooltip" data-bs-placement="top" title="Details"  href="<?php echo e(route('admin.customer.details', $customer->id)); ?>"><i class="ri-list-check"></i></a>

                                                                     
                                            <a href="javascript:void(0);"  title="<?php echo e(translate('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-href="<?php echo e(route('admin.customer.delete',$customer->id)); ?>" class="delete-item fs-18 link-danger">
                                                <i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="border-bottom-0" colspan="100">
                                            <?php echo $__env->make('admin.partials.not_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper d-flex justify-content-end mt-4 ">
                    <?php echo e($customers ->appends(request()->all())->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('admin.modal.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="modal fade" id="balanceupdate" tabindex="-1" aria-labelledby="balanceupdate" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-light p-3">
				<h5 class="modal-title" ><?php echo e(translate('Update Blance')); ?>

				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"
					aria-label="Close" id="close-modal"></button>
			</div>
			<form action="<?php echo e(route('admin.customer.balance.update')); ?>" method="POST">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="user_id" id="userID" value="">
				<div class="modal-body">

					<div class="mb-3">
						<label for="balance_type" class="form-label"><?php echo e(translate('Balance Type')); ?> <span class="text-danger">*</span></label>
						<select class="form-select" name="balance_type" id="balance_type" required>
							<option value="1"><?php echo e(translate('Add Balance')); ?></option>
							<option value="2"><?php echo e(translate('Subtract Balance')); ?></option>
						</select>
					</div>

					<div class="mb-3">
						<label for="amount" class="form-label"><?php echo e(translate('Amount')); ?> <span class="text-danger">*</span></label>
						<div class="input-group">
							<input type="text" class="form-control" id="amount" name="amount" placeholder="<?php echo e(translate('Enter amount')); ?>" >
							<span class="input-group-text" ><?php echo e(default_currency()->name); ?></span>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
					<button type="submit" class="btn btn-success waves ripple-light"><?php echo e(translate('Update')); ?></button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-push'); ?>
<script>
	(function($){
       	"use strict";

		$(document).on('click','.update-balance', function(e){

			e.preventDefault();


			var modal = $('#balanceupdate');

			modal.find('#userID').val($(this).attr('data-id'));

			modal.modal('show');
		})
        
	})(jQuery);
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/customer/index.blade.php ENDPATH**/ ?>