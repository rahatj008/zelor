
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="menu-sidebar" aria-labelledby="menu-sidebar">
    <div class="sidebar-top">
        <div class="sidebar-logo">
            <a href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(show_image('assets/images/backend/logoIcon/'.site_settings('site_logo'), file_path()['site_logo']['size'])); ?>" alt="site_logo.png">
            </a>
        </div>
        <button type="button" class="sidebar-closer" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="sidebar-middel-container">
            <div class="mt-4 mb-4 pb-3 d-flex align-items-center justify-content-between gap-3">
                <div class="lang-dropdown">
                    <div class="Dropdown">
                        <?php
                            $lang = $languages->where('code',strtolower(session()->get('locale')));
                            $code = count($lang)!=0 ? $lang->first()->code:"en";
                            $languages = $languages->where('code','!=',$code);
                        ?>

                        <button class="dropdown__button" type="button"><?php echo e($lang->first()->name); ?>

                            <?php if(count($languages) != 0): ?>
                            <span class="dropdown_button_icon"><i class="fa-solid fa-chevron-down"></i></span>
                            <?php endif; ?>
                        </button>

                        <?php if(count($languages) != 0): ?>
                            <ul class="dropdown__list">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dropdown__list-item" data-value="<?php echo e($language->code); ?>">
                                        <a href="<?php echo e(route('language.change',$language->code)); ?>" class="notify-item language" data-lang="<?php echo e($language->code); ?>">

                                                <?php echo e($language->name); ?>


                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                        <input class="dropdown__input_hidden" type="text" name="select-category" value=""/>
                    </div>
                </div>
                <div class="currency-dropdown">
                    <?php
                        $site_currency  = session()->get('web_currency');
                    ?>
                    <div class="Dropdown">
                        <button class="dropdown__button" type="button"> <?php echo e($site_currency->name); ?>

                            <?php if(count($languages) != 0): ?>
                              <span class="dropdown_button_icon"><i class="fa-solid fa-chevron-down"></i></span>
                            <?php endif; ?>
                        </button>
                        <ul class="dropdown__list">
                            <?php $__currentLoopData = $currencys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="chanage_currency dropdown__list-item <?php echo e($site_currency->id == $currency->id ? 'dropdown__list-item_active' :''); ?>  " data-value="<?php echo e($currency->id); ?>"><?php echo e($currency->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <input class="dropdown__input_hidden" type="text" name="select-category" value=""/>
                    </div>
                </div>
            </div>
            <div class="sidebar-middel">
                <div class="mobile-category-container">
                    <button class="w-100 mobile-categoryBtn" type="button" data-bs-toggle="collapse" data-bs-target="#mobileCategoryBtn" aria-expanded="false" aria-controls="mobileCategoryBtn">
                        <span class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-border-all fs-14"></i>

                            <?php echo e(translate("All Categories")); ?>

                        </span>
                        <i class="fa-solid fa-chevron-down fs-14 chevron-rotate"></i>
                    </button>
                    <div class="collapse" id="mobileCategoryBtn">
                        <ul class="browse-categories-items">
                            <?php
                                    $physicalCategories = $categories->filter(function ($category) {
                                       return $category->physicalProduct->isNotEmpty();
                                    });
                      
                           ?>
                            <?php $__currentLoopData = $physicalCategories->take(9); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="browse-categories-item flex-column">
                                    <a href="<?php echo e(route('category.product', [ $category->slug ? $category->slug :  make_slug(@get_translation($category->name)), $category->id])); ?>" <?php if($category->parent_count > 0): ?> data-bs-toggle="collapse" data-bs-target="#mobileCategory-<?php echo e($loop->index); ?>" aria-expanded="false" aria-controls="mobileCategory-<?php echo e($loop->index); ?>" <?php endif; ?> >
                                        <div >
                                            <span>
                                                <img src="<?php echo e(show_image(file_path()['category']['path'].'/'.$category->image_icon,file_path()['category']['size'])); ?>" alt="<?php echo e($category->image_icon); ?>">
                                            </span>
                                            <?php echo e(@get_translation($category->name)); ?>

                                        </div>
                                        <?php if($category->parent_count !=0): ?>
                                            <i class="fa-solid fa-chevron-down"></i>
                                        <?php endif; ?>
                                    </a>
                                    <?php if($category->parent_count !=0): ?>
                                        <div class="collapse mobilecategories-dropdown" id="mobileCategory-<?php echo e($loop->index); ?>">
                                            <ul class="categories-dropdown-items">
                                                <?php $__currentLoopData = $category->parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="categories-dropdown-item"><a href="<?php echo e(route('category.product', [$category->slug ? $category->slug :  make_slug(@get_translation($category->name)), $category->id])); ?>">    <?php echo e(@get_translation($childCat->name)); ?> <i
                                                            class="fa-solid fa-chevron-right"></i></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="browse-categories-item">
                                <a href="<?php echo e(route('all.category')); ?>">
                                        <?php echo e(translate("See All Categories")); ?>

                                    <span><i class="fa-solid fa-chevron-right"></i></span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="sidebar-navbar mt-3">
                    <ul class="sidebar-nav">
                        <li class="sidebar-nav-item">
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url($menu->url)); ?>" class="sidebar-nav-link ">
                                    <span>
                                    <small class="mobile-nav-icon"><img class="rounded-circle " src="<?php echo e(show_image(file_path()['menu']['path'].'/'.$menu->image,file_path()['menu']['size'])); ?>" alt="<?php echo e($menu->name); ?>"> </small>
                                    <?php echo e($menu->name); ?></span> <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-navbar border-top mt-4 pt-2">
                    <ul class="sidebar-nav">
                        <li class="sidebar-nav-item">
                            <a href="<?php echo e('user.wishlist.item'); ?>" class="sidebar-nav-link">
                                <span>
                                <small class="mobile-nav-icon"><i class="fa-regular fa-heart"></i></small>
                                    <?php echo e(translate("Wishlist")); ?>

                                </span>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                        <li class="sidebar-nav-item">
                            <a href="<?php echo e(route('compare')); ?>" class="sidebar-nav-link">
                                <span> <small class="mobile-nav-icon"><i class="fa-solid fa-code-compare"></i></small>
                                    <?php echo e(translate("Compare")); ?>

                                </span> <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                        <?php if(auth_user('web')): ?>
                            <li class="sidebar-nav-item">
                                <a href="<?php echo e('user.track.order'); ?>" class="sidebar-nav-link">
                                    <span>
                                        <small class="mobile-nav-icon"><i class="fa-solid fa-location-crosshairs"></i></small>
                                        <?php echo e(translate("Track Order")); ?>

                                    </span>
                                <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                        <?php endif; ?>

       
                        <?php if(site_settings('multi_vendor',App\Enums\StatusEnum::true->status()) ==  App\Enums\StatusEnum::true->status()): ?>
                            <li class="sidebar-nav-item">
                                <a href="<?php echo e(route('seller.register')); ?>" class="sidebar-nav-link">
                                    <span>
                                        <small class="mobile-nav-icon"><i class="fa-solid fa-store"></i></small>
                                        <?php echo e(translate("Become A Seller")); ?>

                                    </span>
                                <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="filter-sidebar" aria-labelledby="filter-sidebar">
    <div class="sidebar-top">
        <div class="sidebar-logo">
            <a href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(show_image('assets/images/backend/logoIcon/'.site_settings('site_logo'), file_path()['site_logo']['size'])); ?>" alt="<?php echo e(site_settings('site_logo')); ?>">
            </a>
        </div>
        <button type="button" class="sidebar-closer" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="sidebar-middel-container">
            <div class="sidebar-middel">
                <div>
                    <div class="card-header px-0 py-4">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h5 class="card-title">
                                    <?php echo e(translate('Filter')); ?>

                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class=" filter-accordion">
                        <div class="py-4 border-bottom">
                            <p class="text-uppercase fs-13 fw-semibold filter-by">
                                <?php echo e(translate('Category')); ?>

                            </p>
                            <ul class="list-unstyled mb-0 mt-3 filter-list">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('category.product', [$category->slug ? $category->slug :   make_slug(@get_translation($category->name)), $category->id])); ?>" class="d-flex py-1 align-items-center position-relative">
                                            <div class="flex-grow-1">
                                                <h5 class="listname"><?php echo e(@get_translation($category->name)); ?></h5>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <span class="flex-shrink-0 ms-2 badge bg-light text-muted fs-12">
                                                    <?php echo e($category->houseProduct->count()); ?>

                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="py-4 border-bottom">
                            <p class="text-uppercase fs-13 fw-semibold filter-by">
                                <?php echo e(translate("Filter By Price")); ?>

                            </p>
                            <form action="<?php echo e(route(Route::currentRouteName(),Route::current()->parameters())); ?>" method="GET">
                                <div class="range-slider mb-4">
                                    <?php
                          			$search_min = request()->input('search_min') 
						                    ? request()->input('search_min') 
											: ((short_amount(site_settings('search_min',0),false,false)));

                                $search_max = request()->input('search_max') 
                                                        ?  request()->input('search_max') 
                                                        :  ((short_amount(site_settings('search_max',0),false,false)));
                                    ?>
                                    <div class="slider-area">
                                        <div id="responsive-range" class="slider">

                                        </div>
                                    </div>
                                    <div class="formCost d-flex gap-2 align-items-center">
                                        <input class="form-control form-control-sm" name="search_min" id="skip-value-lower-1" type="number"  value="<?php echo e($search_min); ?>" min="<?php echo e($search_min); ?>" max="<?php echo e($search_max); ?>" />
                                            <span class="text-muted fs-14">
                                                <?php echo e(translate('to')); ?>

                                            </span>
                                        <input
                                            class="form-control form-control-sm" name="search_max" id="skip-value-upper-1" type="number" value="<?php echo e($search_max); ?>" min="<?php echo e($search_min); ?>" max="<?php echo e($search_max); ?>"/>
                                    </div>
                                </div>
                                <button type="submit" class="address-btn wave-btn w-100">
                                    <?php echo e(translate('filter')); ?>

                                </button>
                           </form>
                        </div>
                        <div class="py-4">
                            <span class="text-uppercase fs-13 fw-semibold filter-by">
                                <?php echo e(translate('Brands')); ?>

                            </span>
                            <div class="d-flex flex-column gap-2 mt-3 filter-check">
                                <ul class="list-unstyled mb-0 filter-list">
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('brand.product',[ $brand->slug ? $brand->slug :  make_slug(@get_translation($brand->name)), $brand->id])); ?>" class="d-flex align-items-center position-relative">
                                                <div class="flex-grow-1">
                                                    <h5 class="listname <?php if(request()->routeIs('brand.product')): ?>
                                                        <?php echo e(request()->route('brand_id') == $brand->id ? 'cate-menu-active' :''); ?>

                                                        <?php endif; ?> "><?php echo e((@get_translation($brand->name))); ?></h5>
                                                </div>

                                                <span class="flex-shrink-0 ms-2 badge bg-light text-muted fs-12"><?php echo e(($brand->houseProduct->count())); ?></span>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scriptpush'); ?>
<script>
    'use strict';

	var rangeSearch = document.getElementById("responsive-range");
	if (rangeSearch != null) {
		var y = [
			document.getElementById("skip-value-lower-1"),
			document.getElementById("skip-value-upper-1")
		];

		noUiSlider.create(rangeSearch, {
			start: [<?php echo e($search_min); ?>,<?php echo e($search_max); ?>],
			connect: true,
			behaviour: "drag",
			step: 1,
            range: {
				min: <?php echo e(round((double)short_amount(site_settings('search_min',0),false,false))); ?>,
				max: <?php echo e(round((double)short_amount( site_settings('search_max',0),false,false))); ?>

			},
			format: {
				from: function (value) {
					return parseInt(value);
				},
				to: function (value) {
					return parseInt(value);
				}
			}
		});

		rangeSearch.noUiSlider.on("update", function (values, handle) {
			y[handle].value = values[handle];
		});
	}

</script>
<?php $__env->stopPush(); ?>

<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/sidebar.blade.php ENDPATH**/ ?>