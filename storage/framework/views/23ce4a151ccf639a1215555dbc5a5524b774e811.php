
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.item.product.inhouse.index')); ?>">
                        <?php echo e(translate('Products')); ?>

                    </a></li>
                    <li class="breadcrumb-item active">
                        <?php echo e(translate("Details")); ?>

                    </li>
                </ol>
            </div>
        </div>

		<div class="row">
			<div class="col-xxl-3 col-xl-4 col-lg-5">
				<div class="card sticky-side-div">
					<div class="card-header border-bottom-dashed">
						<div class="d-flex align-items-center">
							<h5 class="card-title mb-0 flex-grow-1">
								<?php echo e(translate('Product Details')); ?>

							</h5>
						</div>
					</div>

					 <div class="card-body">
							<div class="px-3">
								<div class="profile-section-image">
									<img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($product->featured_image); ?>" class="w-100 img-thumbnail">
								</div>
								<div class="mt-3">
									<h6 class="mb-0"><?php echo e(($product->name)); ?></h6>
									<p><?php echo e(translate('Date')); ?> <?php echo e(get_date_time($product->created_at,'d M, Y h:i A')); ?></p>
								</div>
							</div>

							<div class="p-3 bg-body rounded">
                                <h6 class="mb-3 fw-bold"><?php echo e(translate('Product information')); ?></h6>

                                <ul class="list-group">

                                    <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                        <span class="fw-semibold">
                                            <?php echo e(translate('Categories')); ?>

                                        </span>

                                        <div>
                                            <span class="badge bg-light text-dark"><?php echo e((get_translation($product->category->name))); ?></span>
                                            <?php if($product->subCategory): ?>
                                                <span class="badge bg-light text-dark"><?php echo e((get_translation($product->subCategory->name))); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </li>

                                    <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                        <span class="fw-semibold">
                                            <?php echo e(translate('Brand')); ?>

                                        </span>
                                        <span><?php echo e(($product->brand ? get_translation($product->brand->name) : 'N/A')); ?></span>
                                    </li>

                                    <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                        <span class="fw-semibold">
                                            <?php echo e(translate('Price')); ?>

                                        </span>
                                        <span><?php echo e(short_amount($product->price)); ?> </span>
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                        <span class="fw-semibold">
                                            <?php echo e(translate('Weight')); ?>

                                        </span>
                                        <span><?php echo e(round($product->weight,site_settings('digit_after_decimal',2))); ?> <?php echo e(translate('KG')); ?></span>
                                    </li>

                                    <?php if($product->shippingDelivery->isNotEmpty()): ?>
                                        <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                            <span class="fw-semibold">
                                                <?php echo e(translate('Shipping Country')); ?>

                                            </span>
                                            <div>
                                                <?php $__currentLoopData = $product->shippingDelivery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="badge bg-light text-dark"><?php echo e($shipping->shippingDelivery?->name); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                        <span class="fw-semibold">
                                            <?php echo e(translate('Status')); ?>

                                        </span>
                                        <?php if($product->status == 1): ?>
                                            <span class="badge badge-soft-success"><?php echo e(translate('Published')); ?></span>
                                        <?php elseif($product->status == 2): ?>
                                            <span class="badge badge-soft-warning"><?php echo e(translate('Inactive')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-primary"><?php echo e(translate('New')); ?></span>
                                        <?php endif; ?>
                                    </li>

                                </ul>

                                <ul class="mt-3 list-group">
                                    <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                        <span class="fw-semibold">
                                            <?php echo e(translate('Number Of Orders')); ?>

                                        </span>

                                        <span class="font-weight-bold"><?php echo e($product->order->count()); ?></span>
                                    </li>

                                    <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                        <span class="fw-semibold">
                                            <?php echo e(translate('Order Amount')); ?>

                                        </span>
                                        <span class="font-weight-bold"><?php echo e($product->order->sum('amount')); ?> <?php echo e(default_currency()->name); ?></span>
                                    </li>

                                    <li class=" d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                        <span class="fw-semibold">
                                            <?php echo e(translate('Total Item Wishlist')); ?>

                                        </span>
                                        <span class="font-weight-bold"><?php echo e($product->wishlist->count()); ?></span>
                                    </li>


                                </ul>
							</div>
					 </div>
				</div>
			</div>

			<div class="col-xxl-9 col-xl-8 col-lg-7">
				<div class="card">
					<div class="card-header border-bottom-dashed">
						<div class="d-flex align-items-center">
							<h5 class="card-title mb-0 flex-grow-1">
								<?php echo e(translate('latest product order')); ?>

							</h5>
						</div>
					</div>

				     <div class="card-body">
						<div>
							<h5 class="fw-bold mb-3 fs-14"><?php echo e(translate('New order list')); ?></h5>
							<div class="row">

                                <div class="col-xxl-3 col-xl-6">
									<div class="card card-animate bg-soft-green">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon link-info">
                                                        <i class="ri-star-smile-line"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                      <span data-target ="<?php echo e($product->rating_count); ?>"
															class="counter-value"><?php echo e($product->rating_count); ?>

                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                       <?php echo e(translate('Total Reviews')); ?>

                                                    </p>

                                                    <a href="<?php echo e(route('admin.product.reviews', $product->id)); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                                        <?php echo e(translate('View All')); ?>

                                                        <i class="ri-arrow-right-line"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
									</div>
								</div>
								<div class="col-xxl-3 col-xl-6">
									<div class="card card-animate bg-soft-gray">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon">
                                                       <i class="ri-disc-line text-primary"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                        <span
															class="counter-value" data-target = "<?php echo e($product->order->count()); ?>" ><?php echo e($product->order->count()); ?>

                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                       <?php echo e(translate('Total orders')); ?>

                                                    </p>

                                                    <a href="<?php echo e(route('admin.item.product.inhouse.order', $product->id)); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                                        <?php echo e(translate('View All')); ?>

                                                        <i class="ri-arrow-right-line"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
									</div>
								</div>

								<div class="col-xxl-3 col-xl-6">
									<div class="card card-animate bg-soft-orange">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon">
                                                       <i class="las la-shopping-cart text-warning"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                        <span
															class="counter-value" data-target = "<?php echo e($product->order->where('status', App\Models\Order::PLACED)->count()); ?>"><?php echo e($product->order->where('status', App\Models\Order::PLACED)->count()); ?>

                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                        <?php echo e(translate('placed orders')); ?>

                                                    </p>

                                                    <a href="<?php echo e(route('admin.item.product.inhouse.order.placed', $product->id)); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                                        <?php echo e(translate('View All')); ?>

                                                        <i class="ri-arrow-right-line"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
									</div>
								</div>

								<div class="col-xxl-3 col-xl-6">
									<div class="card card-animate bg-soft-green">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="flex-shrink-0">
                                                    <span class="overview-icon">
                                                       <i class="las la-wallet text-success"></i>
                                                    </span>
                                                </div>

                                                <div class="text-end">
                                                    <h4 class="fs-22 fw-bold ff-secondary mb-2">
                                                       <span data-target ="<?php echo e($product->order->where('status', App\Models\Order::DELIVERED)->count()); ?>"
															class="counter-value"><?php echo e($product->order->where('status', App\Models\Order::DELIVERED)->count()); ?>

                                                        </span>
                                                    </h4>


                                                    <p class="text-uppercase fw-medium text-muted mb-3">
                                                       <?php echo e(translate('Delivered orders')); ?>

                                                    </p>

                                                    <a href="<?php echo e(route('admin.item.product.inhouse.order.delivered', $product->id)); ?>" class="d-flex align-items-center justify-content-end gap-1">
                                                        <?php echo e(translate('View All')); ?>

                                                        <i class="ri-arrow-right-line"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
									</div>
								</div>
							</div>
						</div>

						<div class="my-4">
							<h5 class="fw-bold mb-3 fs-14"><?php echo e(translate('Product Description')); ?></h5>
							<div>
								<div class="text-muted border p-3 rounded">
									<h6 class="fs-14"><?php echo e(translate('Short Description')); ?>:</h6>
									<p><?php echo ($product->short_description) ?></p>
								</div>

								<div class="mt-3 text-muted border p-3 rounded">
									<h6 class="fs-14"><?php echo e(translate('Long Description')); ?>:</h6>

									<div>
										<?php echo $product->description ?>
									</div>
								</div>


			                    <?php if($product->warranty_policy): ?>
									<div class="mt-3 text-muted border p-3 rounded">
										<h6 class="fs-14"><?php echo e(translate('Warranty Policy')); ?>:</h6>
										<div>
											<?php echo $product->warranty_policy ?>
										</div>
									</div>
								<?php endif; ?>
							</div>

						</div>

						<div>
							<h5 class="fw-bold mb-3 fs-14"><?php echo e(translate('Product Gallery')); ?></h5>
							<div>
                                <section class="gallery-container mt-3">
                                    <div class="row g-3 gallary popup-gallery">
                                        <?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-xl-3 col-lg-4 col-6">
                                            <img class="img-fluid img-thumbnail p-md-2 p-1 gal-img" alt='<?php echo e($gallery->image); ?>' src="<?php echo e(show_image(file_path()['product']['gallery']['path'].'/'.$gallery->image,file_path()['product']['gallery']['size'])); ?>">
                                        </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </section>
							</div>
						</div>

					 </div>
				</div>
			</div>
		</div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/seller_product/details.blade.php ENDPATH**/ ?>