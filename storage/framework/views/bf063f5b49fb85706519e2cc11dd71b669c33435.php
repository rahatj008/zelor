
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

<section class="" style="background-color: #404040 !important; padding: 5rem 0rem !important;">
    <div class="Container">
        <div class="title-with-tab section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 class="text-white">
                        <?php echo e(translate($title)); ?>

                    </h3>
                </div>
            </div>
            <div class="section-title-right">
                <div class="section-title-tabs">
                    <a href="<?php echo e(route('all.category')); ?>" class="title-tab-btn <?php echo e(request()->routeIs('all.category') ?'active-title-tab' : ''); ?> ">
                        <?php echo e(translate("All")); ?>

                    </a>
                    <a href="<?php echo e(route('top.category')); ?>" class="title-tab-btn  <?php echo e(request()->routeIs('top.category') ?'active-title-tab' : ''); ?>">
                       <?php echo e(translate("Top Category")); ?>

                    </a>

                </div>
            </div>
        </div>

        <div class="all-categories">
            <div class="row g-2 g-md-4">
                <?php $__empty_1 = true; $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                        <a href="<?php echo e(route('category.product', [$category->slug ? $category->slug :  make_slug(get_translation($category->name)), $category->id])); ?>" class="categorie-item">
                            <div class="categorie-item-img">
                                <img src="<?php echo e(show_image(file_path()['category']['path'].'/'.$category->banner,file_path()['category']['size'])); ?>" alt="<?php echo e($category->banner); ?>">
                            </div>
                            <div class="categorie-item-content">
                                <h4>
                                    <?php echo e(get_translation($category->name)); ?>

                                </h4>
                                <p><?php echo e($category->houseProduct->count()); ?>

                                    <?php echo e(translate("Items Available")); ?>

                                </p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-5 mx-4 d-flex align-items-center justify-content-end">
                    <?php echo e($listings->withQueryString()->links()); ?>

            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/catagories.blade.php ENDPATH**/ ?>