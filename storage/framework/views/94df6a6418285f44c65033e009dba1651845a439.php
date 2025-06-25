
<?php $__env->startSection('main_content'); ?>

	<?php
		$totalProducts = ((Auth::guard('seller')->user()->product))->count();
		$subscription = Auth::guard('seller')->user()->subscription->where('status',1)->first();
     
        $totalSubscriptionProducts = 0;
		if($subscription){
			$totalSubscriptionProducts = @$subscription->total_product ?? 0;
		}


	?>

	<div class="page-content">
		<div class="container-fluid">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">
                    <?php echo e(translate("Inhouse Product")); ?>

                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('seller.dashboard')); ?>">
                        <?php echo e(translate('Dashboard')); ?>

                        </a></li>
                        <li class="breadcrumb-item active">
                            <?php echo e(translate("Inhouse Product")); ?>

                        </li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-0">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <h5 class="card-title mb-0">
                                <?php echo e(translate('Product List')); ?>

                            </h5>
                        </div>

                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <a id="product-create" href="javascript:void(0)" class="btn btn-success waves ripple-light"> <i
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
                            <div class="col-xl-4 col-lg-6">
                                <div class="search-box">
                                    <input type="text" name="search" value="<?php echo e(request()->input('search')); ?>" class="form-control search"
                                        placeholder="<?php echo e(translate('Search  by product name , brand or category')); ?>">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                <div>
                                    <button type="submit" class="btn btn-primary w-100 waves ripple-light"> <i
                                            class="ri-equalizer-fill me-1 align-bottom"></i>
                                        <?php echo e(translate('Search')); ?>

                                    </button>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
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
                            <a class='nav-link <?php echo e(request()->routeIs("seller.product.index") ? "active" :""); ?> All py-3'  id="All"
                                href="<?php echo e(route('seller.product.index')); ?>" >
                                <i class="ri-store-2-line me-1 align-bottom"></i>
                                <?php echo e(translate('All
                                Product')); ?>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs("seller.product.trashed") ? "active" :""); ?>  Placed py-3'  id="trashed"
                                href="<?php echo e(route('seller.product.trashed')); ?>" >
                                <i class="ri-delete-bin-fill me-1 align-bottom"></i>
                                <?php echo e(translate('Trashed Product')); ?>


                            </a>
                        </li>

                        <li class="nav-item">
                            <a class='nav-link <?php echo e(request()->routeIs("seller.product.refuse") ? "active" :""); ?>  Placed py-3'  id="refuse"
                                href="<?php echo e(route('seller.product.refuse')); ?>" >
                                <i class="ri-delete-bin-3-fill me-1 align-bottom"></i>
                                <?php echo e(translate('Refuse
                                Product')); ?>

                            </a>
                        </li>
                    </ul>

                    <div class="table-responsive table-card">
                        <table class="table table-hover table-nowrap align-middle mb-0" id="orderTable">

                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th class="text-start"><?php echo e(translate('Product')); ?></th>
                                    <th><?php echo e(translate('Categories - Sold Item')); ?></th>
                                    <th><?php echo e(translate('Info')); ?></th>
                                    <th><?php echo e(translate('Time - Status')); ?></th>
                                    <th><?php echo e(translate('Action')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img class="rounded avatar-sm img-thumbnail" src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image)); ?>" alt="<?php echo e($product->featured_image); ?>"
                                                        >
                                                </div>
                                                <div class="flex-grow-1">
                                                  <?php echo e($product->name); ?>


                                                </div>
                                            </div>
                                        </td>

                                        <td>

                                            <span class="badge bg-info text-white fw-bold"><?php echo e((get_translation($product->category->name))); ?></span><br>

                                            <span><?php echo e(translate('Total Sold')); ?> : <?php echo e($product->order->count()); ?>

                                            </span>
                                        </td>

                                        <td data-label="<?php echo e(translate('Info')); ?>">
                                            <span><?php echo e(translate('Regular Price')); ?> :<?php echo e((short_amount($product->price))); ?> <?php echo e(translate('Discount Price')); ?> : <?php echo e((short_amount($product->discount))); ?></span>

                                        </td>

                                        <td data-label="<?php echo e(translate('Time - Status')); ?>">
                                            <span><?php echo e(get_date_time($product->created_at, 'd M Y')); ?></span><br>
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

                                        <td>
                                            <div class="hstack justify-content-center gap-3">
                                                
                                                <?php if(request()->routeIs('seller.product.trashed')): ?>
                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"  title="Restore Product"  class="link-success fs-18  productdeleterestore" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-bs-target="#trashrestore"><i class="las la-undo-alt"></i></a>

                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"  title="Delete Product" class="link-danger fs-18  productparmanentdelete" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-bs-target="#permanentDelete"><i class="las la-trash"></i></a>
                                                <?php else: ?>

                                                   <?php if( site_settings('seller_product_status_update_permission') ==  App\Enums\StatusEnum::true->status()  &&  ($product->status == 1 || $product->status == 2)): ?>

                                                        <a href="javascript:void(0)" class="fs-18 link-success ms-2 seller_status_edit" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(translate('Status Update')); ?>" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-status="<?php echo e($product->status); ?>"    data-bs-target="#seller_status_edit">
                                                            <i class="las la-pen"></i>
                                                        </a>

                                                    <?php endif; ?>

                                                    <?php
                                                        $slug = $product->slug ? $product->slug : make_slug($product->name);
                                                    ?>


                                                    <a href="<?php echo e(route('seller.product.details', [$slug,$product->id])); ?>" class="link-success fs-18" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Details"><i class="las la-redo"></i></a>

                                                    <a href="<?php echo e(route('seller.product.edit',[$slug , $product->id])); ?>" class="link-warning fs-18" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Update"><i class="las la-pen"></i></a>

                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" class="link-danger fs-18 productdelete" title="Product Delete" data-bs-toggle="modal" data-id="<?php echo e($product->id); ?>" data-bs-target="#delete">
                                                        <i class="las la-trash"></i>
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

	<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo e(route('seller.product.delete')); ?>" method="POST">
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
									<?php echo e(translate('Are you sure you want to
									remove this record ?')); ?>

								</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
						<button type="submit" class="btn btn-danger"><?php echo e(translate('Delete')); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="trashrestore" tabindex="-1" aria-labelledby="trashrestore" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo e(route('seller.product.restore')); ?>" method="POST">
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
									<?php echo e(translate('Are you sure you want to
									restore this record ?')); ?>

								</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
						<button type="submit" class="btn btn-success"><?php echo e(translate('Restore')); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="permanentDelete" tabindex="-1" aria-labelledby="permanentDelete" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo e(route('seller.product.permanentDelete')); ?>" method="POST">
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
									<?php echo e(translate('Are you sure you want to
									remove this record ?')); ?>

								</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
						<button type="submit" class="btn btn-danger"><?php echo e(translate('Delete')); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>


     <?php if(site_settings('seller_product_status_update_permission') ==  App\Enums\StatusEnum::true->status() ): ?>
        <div class="modal fade" id="seller_status_edit" tabindex="-1" aria-labelledby="seller_status_edit" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo e(route('seller.product.status.update')); ?>" method="POST">
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
     <?php endif; ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-push'); ?>
<script>
	(function($){
       	"use strict";

		$(".productdelete").on("click", function(){
			var modal = $("#delete");
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

		$(".productdeleterestore").on("click", function(){
			var modal = $("#trashrestore");
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

		$(".productparmanentdelete").on("click", function(){
			var modal = $("#permanentDelete");
			modal.find('input[name=id]').val($(this).data('id'));
			modal.modal('show');
		});

        $("#product-create").click(function(){
    
            // if(<?php echo e($totalSubscriptionProducts); ?> < 1)
            // {
            //     toaster("<?php echo e(translate('Renew Your Subsription Plan Or Buy A New Plan')); ?>",'danger')
            // } else{
                window.location = "<?php echo e(route('seller.product.create')); ?>"
            // }
        });


        $(".seller_status_edit").on("click", function(){
			var modal = $("#seller_status_edit");
			const status = $(this).attr('data-status');
			$('#status-update').html('');
			$('#status-update').append(`
				<select class="form-select" name="status" required="">
					<option value="">Select One</option>
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


<?php echo $__env->make('seller.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/seller/product/index.blade.php ENDPATH**/ ?>