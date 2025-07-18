
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

<section class="pb-80" style="background:#404040;">
	<div class="Container">
		<div class="row g-4 flex-items-lg-start categories-container">
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <?php echo $__env->make('frontend.partials.product_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="col-xl-9 col-lg-8">
                <div class="category-product">
                    <div class="product-filter-right">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-4">
                                <button class="filter-btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filter-sidebar" aria-controls="filter-sidebar">
                                    <svg  version="1.1"   x="0" y="0" viewBox="0 0 25 25"   xml:space="preserve" ><g><g data-name="Layer 28"><path d="M2.54 5H15v.5A1.5 1.5 0 0 0 16.5 7h2A1.5 1.5 0 0 0 20 5.5V5h2.33a.5.5 0 0 0 0-1H20v-.5A1.5 1.5 0 0 0 18.5 2h-2A1.5 1.5 0 0 0 15 3.5V4H2.54a.5.5 0 0 0 0 1ZM16 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5ZM22.4 20H18v-.5a1.5 1.5 0 0 0-1.5-1.5h-2a1.5 1.5 0 0 0-1.5 1.5v.5H2.55a.5.5 0 0 0 0 1H13v.5a1.5 1.5 0 0 0 1.5 1.5h2a1.5 1.5 0 0 0 1.5-1.5V21h4.4a.5.5 0 0 0 0-1ZM17 21.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5ZM8.5 15h2a1.5 1.5 0 0 0 1.5-1.5V13h10.45a.5.5 0 1 0 0-1H12v-.5a1.5 1.5 0 0 0-1.5-1.5h-2A1.5 1.5 0 0 0 7 11.5v.5H2.6a.5.5 0 1 0 0 1H7v.5A1.5 1.5 0 0 0 8.5 15ZM8 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5Z" data-original="#000000" ></path></g></g></svg></button>
                                <div>
                                    <h5 class="card-title"><?php echo e(translate($title)); ?></h5>
                                 </div>
                            </div>
                        </div>

                        <div class="flex-shrink-0">
                            <div class="d-flex align-items-start align-items-md-center flex-column flex-sm-row  gap-lg-5 gap-3">
                                <form action="<?php echo e(route(Route::currentRouteName(),Route::current()->parameters())); ?>" method="GET" class="sorting-option">
                                    <div class="d-flex align-items-center gap-3">
                                        <label for="sort" class="nowrap form-label mb-0"><?php echo e(translate('Sort By:')); ?></label>
                                        <select name="sort_by" id="sort" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option value="default" <?php if(request()->input('sort_by') == "default"): ?> selected="" <?php endif; ?>><?php echo e(translate('SORT BY DEFAULT')); ?></option>
                                            <option value="hightolow" <?php if(request()->input('sort_by') == "hightolow"): ?> selected="" <?php endif; ?>><?php echo e(translate('Price (High to low)')); ?></option>
                                            <option value="lowtohigh" <?php if(request()->input('sort_by') == "lowtohigh"): ?> selected="" <?php endif; ?>><?php echo e(translate('Price (low to High)')); ?></option>
                                        </select>
                                    </div>
                                </form>
                                <p class="fs-14"><?php echo e(translate('Showing')); ?> <?php echo e($products->firstItem()); ?> <?php echo e(translate('of')); ?> <?php echo e($products->lastItem()); ?> <?php echo e(translate('of')); ?> <?php echo e($products->total()); ?> <?php echo e(translate('Results')); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 g-md-4">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-xl-3 col-md-4 col-6">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="<?php echo e(route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])); ?>">
                                            <img src="<?php echo e(show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image,file_path()['product']['featured']['size'])); ?>" alt="<?php echo e($product->name); ?>">
                                        </a>
                                        <div class="quick-view">
                                            <button class="quick-view-btn quick--view--product"  data-product_id="<?php echo e($product->id); ?>">
                                                <svg  version="1.1"   width="18" height="18" x="0" y="0" viewBox="0 0 519.644 519.644"   xml:space="preserve" ><g><path d="M259.822 427.776c-97.26 0-190.384-71.556-251.854-145.843-10.623-12.839-10.623-31.476 0-44.314 15.455-18.678 47.843-54.713 91.108-86.206 108.972-79.319 212.309-79.472 321.492 0 50.828 36.997 91.108 85.512 91.108 86.206 10.623 12.838 10.623 31.475 0 44.313-61.461 74.278-154.572 145.844-251.854 145.844zm0-304c-107.744 0-201.142 102.751-227.2 134.243a2.76 2.76 0 0 0 0 3.514c26.059 31.492 119.456 134.243 227.2 134.243s201.142-102.751 227.2-134.243c1.519-1.837-.1-3.514 0-3.514-26.059-31.492-119.456-134.243-227.2-134.243z"  data-original="#000000" ></path><path d="M259.822 371.776c-61.757 0-112-50.243-112-112s50.243-112 112-112 112 50.243 112 112-50.243 112-112 112zm0-192c-44.112 0-80 35.888-80 80s35.888 80 80 80 80-35.888 80-80-35.888-80-80-80z"  data-original="#000000" ></path></g></svg>
                                                <?php echo e(translate("Quick View")); ?>

                                            </button>
                                        </div>
                                        <ul class="hover-action">
                                            <li><a class="comparelist compare-btn wave-btn" data-product_id="<?php echo e($product->id); ?>" href="javascript:void(0)"><i class="fa-solid fa-code-compare"></i></a></li>

                                        </ul>
                                        <?php if($product->discount_percentage > 0): ?>
                                        <span class="offer-tag"><?php echo e(translate('off')); ?>  <?php echo e(round($product->discount_percentage)); ?> %</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-info">
                                            <div class="ratting">
                                                <?php echo show_ratings($product->review->avg('rating')) ?>
                                            </div>
                                            <h4 class="product-title">
                                                  <a href="<?php echo e(route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])); ?>">
                                                        <?php echo e($product->name); ?>

                                                  </a>
                                            </h4>
                                            <div class="priceAndRatting">
                                                    <div class="product-price">
                                                        <?php
                                                            $price      =  (@$product->stock->first()?->price ?? $product->price);
                                               
                               
                                                        ?>
                        
                                                        <?php if(($product->discount_percentage) > 0): ?>
                                                            
                                                            <span>
                                                                <?php echo e(short_amount(cal_discount($product->discount_percentage,$price))); ?>

                                                            </span>
                                    
                                                            <del>
                                                                <?php echo e(short_amount($price)); ?></del>
                                                        <?php else: ?>
                                                            <span>
                                                                <?php echo e(short_amount($price)); ?>

                                                            </span>
                                    
                                                        <?php endif; ?>
                                                    </div>

                                            </div>

                                            <?php
                                                $authUser = auth_user('web');
                                                $wishedProducts = $authUser ? $authUser->wishlist->pluck('product_id')->toArray() : [];
                                                $randNum = "prod-".rand(6666,10000000);
                                            ?>

                                            <div class="product-action">
                                                <a href="javascript:void(0)" data-product_id="<?php echo e($randNum); ?>" class="buy-now addtocartbtn">
                                                    <span class="buy-now-icon"><svg  version="1.1"  x="0" y="0" viewBox="0 0 511.997 511.997"   xml:space="preserve" ><g><path d="M405.387 362.612c-35.202 0-63.84 28.639-63.84 63.84s28.639 63.84 63.84 63.84 63.84-28.639 63.84-63.84-28.639-63.84-63.84-63.84zm0 89.376c-14.083 0-25.536-11.453-25.536-25.536s11.453-25.536 25.536-25.536c14.083 0 25.536 11.453 25.536 25.536s-11.453 25.536-25.536 25.536zM507.927 115.875a19.128 19.128 0 0 0-15.079-7.348H118.22l-17.237-72.12a19.16 19.16 0 0 0-18.629-14.702H19.152C8.574 21.704 0 30.278 0 40.856s8.574 19.152 19.152 19.152h48.085l62.244 260.443a19.153 19.153 0 0 0 18.629 14.702h298.135c8.804 0 16.477-6.001 18.59-14.543l46.604-188.329a19.185 19.185 0 0 0-3.512-16.406zM431.261 296.85H163.227l-35.853-150.019h341.003L431.261 296.85zM173.646 362.612c-35.202 0-63.84 28.639-63.84 63.84s28.639 63.84 63.84 63.84 63.84-28.639 63.84-63.84-28.639-63.84-63.84-63.84zm0 89.376c-14.083 0-25.536-11.453-25.536-25.536s11.453-25.536 25.536-25.536 25.536 11.453 25.536 25.536-11.453 25.536-25.536 25.536z" opacity="1" data-original="#000000" ></path></g></svg></span>
                                                <?php echo e(translate('Add to cart')); ?>

                                                </a>
                                                <button data-product_id ="<?php echo e($product->id); ?>" class="heart-btn  wishlistitem"><i class=" <?php if(in_array($product->id,$wishedProducts)): ?>
                                                    fa-solid
                                                  <?php else: ?>
                                                    fa-regular
                                                  <?php endif; ?> fa-heart"></i></button>
                                            </div>

                                            <form class="attribute-options-form-<?php echo e($randNum); ?>">
                                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                            </form>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-12">
                                <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-5 mx-4 d-flex align-items-center justify-content-end">
                            <?php echo e($products->withQueryString()->links()); ?>

                    </div>
                </div>
            </div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scriptpush'); ?>
    <script>
        'use strict';
        $('#sort').on('change', function(){
            this.form.submit();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/product.blade.php ENDPATH**/ ?>