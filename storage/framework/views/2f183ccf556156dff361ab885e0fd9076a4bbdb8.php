
<?php $__env->startSection('content'); ?>
    <main>
        <div class="breadcrumb-banner">
            <div class="breadcrumb-banner-img">
                <img src="<?php echo e(show_image(file_path()['frontend']['path'].'/'.@frontend_section_data($breadcrumb->value,'image'),@frontend_section_data($breadcrumb->value,'image','size'))); ?>" alt="breadcrumb.jpg">
            </div>
            <div class="page-Breadcrumb">
                <div class="Container">
                    <div class="breadcrumb-container">
                        <h2 class="breadcrumb-title"><?php echo e($page->name); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">
                                    <?php echo e(translate("Home")); ?>

                                </a></li>
                                <li class="breadcrumb-item"> <?php echo e(translate($title)); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="pb-80">
            <div class="Container">
                <div class="w-75 mx-auto">
                    <div class="mb-3">
                        <h4 class="fs-20 mb-2">
                           <?php echo e($title); ?>

                        </h4>
                        <p class="text-muted fs-14">
                            <?php echo $page->description ?>
                        </p>
                    </div>

                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/page_setup.blade.php ENDPATH**/ ?>