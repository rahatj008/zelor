
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
                        <?php echo e(translate("Seller Products")); ?>

                    </li>
                </ol>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header border-0">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <div>
                            <h5 class="card-title mb-0">
                                <?php echo e(translate('Seller Product List')); ?>

                            </h5>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form action="<?php echo e(route(Route::currentRouteName(),Route::current()->parameters())); ?>" method="get">
                    <div class="row g-3">
                        <div class="col-xl-3 col-sm-6">
                            <div class="search-box">
                                <input type="text" name="search" value="<?php echo e(request()->input('search')); ?>" class="form-control search"
                                    placeholder="<?php echo e(translate('Search by name or category')); ?>">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="search-box">
                                  <select name="seller_id" id="seller_id">
                                       <option value="">
                                            <?php echo e(translate('Select seller')); ?>

                                       </option>

                                       <?php $__currentLoopData = getSeller(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                         <option <?php echo e(request()->input('seller_id') ==  $seller->id ? 'selected' :""); ?> value="<?php echo e($seller->id); ?>">
                                                <?php echo e($seller->name); ?>

                                        </option>
                                                
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                            </div>
                        </div>


                        <div class="col-xl-2 col-sm-3 col-6">
                            <div>
                                <button type="submit" class="btn btn-primary w-100 waves ripple-light"
                                    > <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                    <?php echo e(translate('Filter')); ?>

                                </button>
                            </div>
                        </div>

                        <div class="col-xl-2 col-sm-3 col-6">
                            <div>
                                <a href="<?php echo e(route(Route::currentRouteName(),Route::current()->parameters())); ?>" class="btn btn-danger w-100 waves ripple-light"> <i
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
                        <a class="nav-link <?php echo e(request()->routeIs('admin.product.seller.index') ? 'active' :''); ?> All py-3"  id="All"
                            href="<?php echo e(route('admin.product.seller.index',request()->query())); ?>" >
                            <i class="ri-store-2-line me-1 align-bottom"></i>
                            <?php echo e(translate('All
                            Product')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.product.seller.new') ? 'active' :''); ?>  Placed py-3"  id="Placed"
                            href="<?php echo e(route('admin.product.seller.new',request()->query())); ?>" >
                            <i class="ri-product-hunt-line me-1 align-bottom"></i>
                            <?php echo e(translate('New Product')); ?>


                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.product.seller.approved') ? 'active' :''); ?> Published py-3"  id="Confirmed"
                            href="<?php echo e(route('admin.product.seller.approved',request()->query())); ?>" >
                            <i class="ri-checkbox-multiple-fill me-1 align-bottom"></i>
                            <?php echo e(translate("Published Products")); ?>


                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Refuse <?php echo e(request()->routeIs('admin.product.seller.refuse') ? 'active' :''); ?>   py-3"  id="Refuse"
                            href="<?php echo e(route('admin.product.seller.refuse',request()->query())); ?>" >

                            <i class="ri-delete-bin-4-line me-1 align-bottom"></i>
                            <?php echo e(translate('Refuse Products')); ?>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link Processing <?php echo e(request()->routeIs('admin.product.seller.trashed') ? 'active' :''); ?>   py-3"  id="trashed"
                            href="<?php echo e(route('admin.product.seller.trashed',request()->query())); ?>" >
                            <i class="ri-delete-bin-fill me-1 align-bottom"></i>
                            <?php echo e(translate('Trashed Products')); ?>

                        </a>
                    </li>
                </ul>

                <div class="table-responsive table-card">
                    <table class="table table-hover table-nowrap align-middle mb-0" >
                        <thead class="text-muted table-light">
                            <tr class="text-uppercase">

                                <th class="text-start"><?php echo e(translate('Product')); ?></th>
                                <th><?php echo e(translate('Categories')); ?></th>
                                <th><?php echo e(translate('Seller')); ?></th>
                                <th><?php echo e(translate('Price')); ?></th>
                                <th><?php echo e(translate('Info')); ?></th>
                                <th><?php echo e(translate('Top Item - Todays Deal')); ?></th>
                                <th><?php echo e(translate('Date')); ?></th>
                                <th><?php echo e(translate('Action')); ?></th>
                            </tr>
                        </thead>

                        <tbody class="list form-check-all">
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <img alt="<?php echo e($product->featured_image); ?>" class="rounded avatar-sm img-thumbnail" src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image , file_path()['product']['featured']['size'])); ?>">
                                            </div>
                                            <div class="flex-grow-1">
                                                <?php echo e($product->name); ?>

                                            </div>
                                        </div>
                                    </td>

                                    <td data-label="<?php echo e(translate('Categories')); ?>">

                                        <span class="badge bg-info text-white fw-bold"><?php echo e((@get_translation($product->category->name))); ?></span><br>

                                        <span><?php echo e(translate('Total Sold')); ?> : <?php echo e($product->order->count()); ?></span>
                                    </td>

                                    <td data-label="<?php echo e(translate('Seller')); ?>">

                                        <?php if($product->seller): ?>
                                           <a class="fw-bold text-dark" href="<?php echo e(route('admin.seller.info.details', $product->seller_id)); ?>"><?php echo e(@($product->seller->username)); ?></a>
                                        <?php else: ?>
                                            <?php echo e(translate('N/A')); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td data-label="<?php echo e(translate('Price')); ?>">
                                        <span><?php echo e(translate('Regular Price')); ?> : <?php echo e((short_amount($product->price))); ?></span><br>
                                        <span><?php echo e(translate('Discount Price')); ?>: <?php echo e((short_amount($product->discount))); ?></span>
                                    </td>
                                    <td data-label="<?php echo e(translate('Info')); ?>">
                                        <!--<span><?php echo e(translate('Regular Price')); ?> : <?php echo e((short_amount($product->price))); ?> <br> <?php echo e(translate('Discount Price')); ?> : <?php echo e((short_amount($product->discount))); ?></span><br>-->
                                        <a href="<?php echo e(route('admin.item.product.inhouse.bestsellingitem.status', $product->id)); ?>" class=" fs-15 link-<?php echo e($product->best_selling_item_status == '1' ? 'danger':'info'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Best Selling Product')); ?>"><?php echo e(translate($product->best_selling_item_status==1?'Best Selling Item - No':'Best Selling Item - Yes')); ?> <i class="las la-arrow-alt-circle-left"></i></a>
                                        <br>

                                        <a href="<?php echo e(route('admin.item.product.inhouse.suggested.status', $product->id)); ?>" class=" fs-15 link-<?php echo e($product->is_suggested == 0 ? 'danger':'info'); ?>"  data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Suggested Product')); ?>"><?php echo e(translate($product->is_suggested == 0?'Suggested Item - No':'Suggested Item  - Yes')); ?> <i class="las la-arrow-alt-circle-left"></i></a>

                                    </td>
                                    <td data-label="<?php echo e(translate('Top Product')); ?>">
                                        <a href="<?php echo e(route('admin.item.product.inhouse.top', $product->id)); ?>" class=" fs-15 link-<?php echo e($product->top_status == 1 ? 'danger':'success'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Top Product')); ?>"><?php echo e(($product->top_status==1?'No':'Yes')); ?> <i class="las la-arrow-alt-circle-left"></i></a> <i class="las la-arrows-alt-v"></i>
                                        <a href="<?php echo e(route('admin.item.product.inhouse.featured.status', $product->id)); ?>" class="fs-15 link-<?php echo e($product->featured_status == 1 ? 'danger':'success'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Todays Deal')); ?>"><?php echo e(($product->featured_status==1?'No':'Yes')); ?> <i class="las la-arrow-alt-circle-left"></i></a>
                                    </td>


                                    <td data-label="<?php echo e(translate('Time - Status')); ?>">
                                        <span><?php echo e(get_date_time($product->created_at)); ?></span><br>
                                        <?php if($product->status == 1): ?>
                                            <span class="badge badge-soft-success"><?php echo e(translate('Published')); ?></span>
                                        <?php elseif($product->status == 2): ?>
                                            <span class="badge badge-soft-warning"><?php echo e(translate('Inactive')); ?></span>
                                        <?php elseif($product->status == 3): ?>
                                            <span class="badge badge-soft-danger"><?php echo e(translate('Cancel')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-primary"><?php echo e(translate('New')); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td data-label="<?php echo e(translate('Action')); ?>">
                                        <div class="hstack justify-content-center gap-3">
                                            <?php if(!request()->routeIs('admin.product.seller.trashed')): ?>
                                                <a href="<?php echo e(route('admin.product.seller.details', $product->id)); ?>" class="fs-18 link-info" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Product Details')); ?>">
                                                    <i class="las la-redo"></i>
                                                </a>
                                            <?php endif; ?>

                                       

                                            <?php if(request()->routeIs('admin.product.seller.new')): ?>
                                                <a href="javascript:void(0)" class="fs-18 link-success productapproved" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Product Approved')); ?>" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-bs-target="#success">
                                                    <i class="las la-check-double"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="fs-18 link-danger productcancel" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Product Cancel')); ?>" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-bs-target="#cancel">
                                                    <i class="las la-times-circle"></i>
                                                </a>
                                            <?php elseif(request()->routeIs('admin.product.seller.refuse')): ?>
                                                <a href="javascript:void(0)" class="fs-18 link-success  productapproved" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Product Approved')); ?>" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-bs-target="#success">
                                                    <i class="las la-check-double"></i>
                                                </a>
                                            <?php elseif(request()->routeIs('admin.product.seller.approved')): ?>
                                                <a href="javascript:void(0)" class="fs-18 link-warning productcancel" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Product Cancel')); ?>" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-bs-target="#cancel">
                                                    <i class="las la-times-circle"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if(!request()->routeIs('admin.product.seller.trashed')): ?>
                                        
                                                <a href="javascript:void(0)" class="fs-18 link-success ms-2 seller_status_edit" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Update')); ?>" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-status="<?php echo e($product->status); ?>"    data-bs-target="#seller_status_edit">
                                                    <i class="las la-pen"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="fs-18 link-danger productdelete" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Product Delete')); ?>" data-id="<?php echo e($product->id); ?>" data-bs-toggle="modal" data-bs-target="#delete">
                                                    <i class="las la-trash"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="javascript:void(0)" class="fs-18 link-success productdeleterestore ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Product Restore')); ?>" data-id="<?php echo e($product->id); ?>" data-bs-toggle="modal" data-bs-target="#restore">
                                                    <i class="las la-undo-alt"></i>
                                                </a>
                                            <?php endif; ?>
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

                <div class="pagination-wrapper d-flex justify-content-end mt-4">
                    <?php echo e($products->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="seller_status_edit" tabindex="-1" aria-labelledby="seller_status_edit" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
        	<form action="<?php echo e(route('admin.product.seller.update.status')); ?>" method="POST">
        		<?php echo csrf_field(); ?>
        		<input type="hidden" name="id">
	            <div class="modal-body">
					<label class="form-label">
						<?php echo e(translate("Status")); ?>

						<span class="text-danger">*</span></label>
					<div id='status-update'>

					</div>

	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-md btn-success"><?php echo e(translate('Update')); ?></button>
	            </div>
	        </form>
        </div>
    </div>
</div>


<div class="modal fade" id="success" tabindex="-1" aria-labelledby="success" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form action="<?php echo e(route('admin.product.seller.approvedby')); ?>" method="POST">
        		<?php echo csrf_field(); ?>
        		<input type="hidden" name="id">

				<div class="modal-body">
					<div class="mt-2 text-center">
						<i class=" fs-18 link-success las la-check"></i>
						<div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
							<h4>
							<?php echo e(translate('Are you sure ?')); ?>

							</h4>
							<p class="text-muted mx-4 mb-0">
								<?php echo e(translate('Are you sure you want to approve this product?')); ?>

							</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
					<button type="submit" class="btn btn-success"><?php echo e(translate('Approved')); ?></button>
				</div>
	        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="cancel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form action="<?php echo e(route('admin.product.seller.cancelby')); ?>" method="POST">
        		<?php echo csrf_field(); ?>
        		<input type="hidden" name="id">

				<div class="modal-body">
					<div class="mt-2 text-center">
						<i class=" fs-18 link-success las la-times"></i>
						<div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
							<h4>
							<?php echo e(translate('Are you sure ?')); ?>

							</h4>
							<p class="text-muted mx-4 mb-0">
								<?php echo e(translate('Are you sure you want to inactive this product?')); ?>

							</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
					<button type="submit" class="btn btn-danger"><?php echo e(translate('Confirm!!')); ?></button>
				</div>
	        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form action="<?php echo e(route('admin.product.seller.delete')); ?>" method="POST">
        		<?php echo csrf_field(); ?>
        		<input type="hidden" name="id">

				<div class="modal-body">
					<div class="mt-2 text-center">
						<lord-icon src="<?php echo e(asset('assets/global/gsqxdxog.json')); ?>" trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548"
                        class="loader-icon"

                        ></lord-icon>
						<div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
							<h4>
							<?php echo e(translate('Are you sure ?')); ?>

							</h4>
							<p class="text-muted mx-4 mb-0">
								<?php echo e(translate('Are you sure you want to delete this product?')); ?>

							</p>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
					<button type="submit" class="btn btn-danger"><?php echo e(translate('Confirm!!')); ?></button>
				</div>
	        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="trashrestore" tabindex="-1" aria-labelledby="trashrestore" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form action="<?php echo e(route('admin.product.seller.restore')); ?>" method="POST">
        		<?php echo csrf_field(); ?>
        		<input type="hidden" name="id">

				<div class="modal-body">
					<div class="mt-2 text-center">
						<i class=" fs-18 link-success las la-check"></i>
						<div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
							<h4>
							<?php echo e(translate('Are you sure ?')); ?>

							</h4>
							<p class="text-muted mx-4 mb-0">
								<?php echo e(translate('Are you sure you want to restore this product?')); ?>

							</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
					<button type="submit" class="btn btn-success"><?php echo e(translate('Restore!!')); ?></button>
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

        $("#seller_id").select2({
        })

		$(".productdelete").on("click", function(){
			var modal = $("#delete");
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

		$(".productapproved").on("click", function(){
			var modal = $("#success");
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

		$(".productcancel").on("click", function(){
			var modal = $("#cancel");
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

		$(".productdeleterestore").on("click", function(){
			var modal = $("#trashrestore");
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

		$(".seller_status_edit").on("click", function(){
			var modal = $("#seller_status_edit");
			const status = $(this).attr('data-status');
			$('#status-update').html('');
			$('#status-update').append(`
				<select class="form-select" name="status" required="">
					<option value="">Select One</option>
					<option ${status == 0 ? 'selected' : ''} value="0">New</option>
					<option ${status == 1 ? 'selected' : ''} value="1">Published</option>
					<option ${status == 2 ? 'selected' : ''} value="2">Inactive</option>
				</select>
					`)
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

	})(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/seller_product/index.blade.php ENDPATH**/ ?>