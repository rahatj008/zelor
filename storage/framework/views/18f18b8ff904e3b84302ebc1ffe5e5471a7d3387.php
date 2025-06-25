
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
                            <?php if(request()->routeIs('blog.category')): ?>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo e(route('blog')); ?>">
                                        <?php echo e(translate('Blogs')); ?>

                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo e(translate($title)); ?>

                                </li>
                                <?php else: ?>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo e(translate($title)); ?>

                                </li>
                            <?php endif; ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="blog pb-80">
        <div class="Container">
            <div class="row g-4 g-xl-5">
                <?php
                    $flag = 1;
                ?>
                <div class="col-md-8">
                    <div class="blog-left">
                        <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="blog-item">
                                <div class="blog-left-img">
                                    <img class="w-100" src="<?php echo e(show_image(file_path()['blog']['path'].'/'.$blog->image,file_path()['blog']['size'])); ?>" alt="<?php echo e($blog->image); ?>" />
                                </div>
                                <div class="blog-left-contents">
                                    <div class="blog-date-wrapper">
                                        <span class="blog-date"
                                        ><?php echo e(get_date_time($blog->created_at, 'd')); ?> <br />
                                        <?php echo e(get_date_time($blog->created_at, 'M')); ?></span
                                        >
                                    </div>
                                    <div class="blog-content">
                                        <h2 class="blog-item-title">
                                            <?php echo e(($blog->post)); ?>

                                        </h2>
                                        <p>
                                            <?php echo e(limit_words(strip_tags(@$blog->body), 100)); ?>

                                        </p>
                                        <a href="<?php echo e(route('blog.details', [make_slug($blog->post), $blog->id])); ?>">
                                        <?php echo e(translate("CONTINUE READING")); ?>


                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"   width="16" height="16" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve" ><g><path d="m506.134 241.843-.018-.019-104.504-104c-7.829-7.791-20.492-7.762-28.285.068-7.792 7.829-7.762 20.492.067 28.284L443.558 236H20c-11.046 0-20 8.954-20 20s8.954 20 20 20h423.557l-70.162 69.824c-7.829 7.792-7.859 20.455-.067 28.284 7.793 7.831 20.457 7.858 28.285.068l104.504-104 .018-.019c7.833-7.818 7.808-20.522-.001-28.314z" data-original="#000000"></path></g></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="no-data-wrapper">
                                <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endif; ?>

                        <div class="mt-5 mx-4 d-flex align-items-center justify-content-end">
                            <?php echo e($blogs->withQueryString()->links()); ?>

                        </div>


                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-right">
                        <div class="card mb-4 mb-xl-5">
                            <div class="card-body">
                                <div>
                                    <form action="<?php echo e(route(Route::currentRouteName(),Route::current()->parameters())); ?>"  class="blog-search-bar" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" placeholder="<?php echo e(translate('Search by title')); ?>" value="<?php echo e(request()->input('search')); ?>">
                                            <button type="submit" class="input-group-text fs-20 search-btn wave-btn" id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4 mb-xl-5">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4 class="card-title">
                                            <?php echo e(translate("Blog Categories")); ?>

                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div>
                                    <div class="blog-categories">
                                        <ul>
                                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <li>
                                                    <a  <?php if(request()->routeIs('blog.category') && request()->route('id') ==  $category->id ): ?> class="active" <?php endif; ?> href="<?php echo e(route('blog.category',[make_slug(get_translation($category->name)), $category->id])); ?>"><?php echo e((get_translation($category->name))); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <li>
                                                    <?php echo $__env->make("frontend.partials.empty",['message' => 'No Categories Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                               </li>
     
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card ">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4 class="card-title">
                                            <?php echo e(translate('RECENT POSTS')); ?>

                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div>
                                  

                                    <div class="recent-post">
                                        <?php $__empty_1 = true; $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="recent-post-item">
                                                <a href="<?php echo e(route('blog.details', [make_slug($recentPost->post), $recentPost->id])); ?>">
                                                    <?php echo e($recentPost->post); ?>

                                                </a>
                                                <p><?php echo e(get_date_time($recentPost->created_at, 'M d Y')); ?></p>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        
                                           <div class="recent-post-item">
                                               <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                           </div>
    
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/blog.blade.php ENDPATH**/ ?>