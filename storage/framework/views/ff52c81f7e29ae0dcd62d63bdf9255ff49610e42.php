

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
                            <?php echo e(translate('Categories')); ?>

                        </li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-0">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                                <h5 class="card-title mb-0">
                                    <?php echo e(translate('Category List')); ?>

                                </h5>
                        </div>

                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <a href="<?php echo e(route('admin.item.category.create')); ?>" class="btn btn-success btn-sm w-100 add-btn"><i
                                    class="ri-add-line align-bottom me-1"></i>
                                   <?php echo e(translate('create')); ?>

                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form action="<?php echo e(route('admin.item.category.search')); ?>" method='get'>
                        <div class="row g-3">
                            <div class="col-xl-4 col-sm-6">
                                <div class="search-box">
                                    <input value="<?php echo e(@$search); ?>"  name="search" type="text" class="form-control search"
                                        placeholder="Search by name">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>

                            <div class="col-xl-2 col-md-3 col-6">
                                <div>
                                    <button type="submit" class="btn btn-primary w-100"> <i
                                            class="ri-equalizer-fill me-1 align-bottom"></i>
                                        <?php echo e(translate('Search')); ?>

                                    </button>
                                </div>
                            </div>

                            <div class="col-xl-2 col-md-3 col-6">
                                <div>
                                    <a href="<?php echo e(route('admin.item.category.index')); ?>" class="btn btn-danger w-100"> <i
                                            class="ri-refresh-line me-1 align-bottom"></i>
                                        <?php echo e(translate('Reset')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col">#</th>

                                    <th scope="col">
                                        <?php echo e(translate('Name')); ?>

                                    </th>

                                    <th scope="col">
                                        <?php echo e(translate('Parent Category')); ?>

                                    </th>

                                    <th scope="col">
                                        <?php echo e(translate('Top Category')); ?>

                                    </th>


                                    <th scope="col">
                                        <?php echo e(translate('Status')); ?>

                                    </th>

                                    <th scope="col">
                                        <?php echo e(translate('Options')); ?>

                                    </th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="fw-medium">
                                            <?php echo e($loop->iteration); ?>

                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <img class="rounded avatar-sm img-thumbnail" src="<?php echo e(show_image(file_path()['category']['path'].'/'.$category->banner ,file_path()['category']['size'])); ?>" alt="<?php echo e($category->banner); ?>">
                                                </div>

                                                <div class="flex-grow-1">
                                                    <?php echo e(@get_translation($category->name)); ?>

                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <?php if($category->parent_id): ?>

                                                <?php echo e(@get_translation($category->parentCategory->name)); ?>


                                            <?php else: ?>
                                                <?php echo e(translate('N/A')); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo e(route('admin.item.category.top', $category->id)); ?>" class="
                                                fs-18 link-<?php echo e($category->top=='1' ? 'success' :'danger'); ?>

                                                " data-bs-toggle="tooltip" data-bs-placement="top" title="Top category">
                                            <?php if($category->top =='0'): ?>
                                                <i class="ri-close-circle-line"></i>
                                            <?php else: ?>
                                                <i class="ri-check-double-line"></i>
                                            <?php endif; ?>
                                            </a>
                                        </td>

                                        <td>
                                            <?php if($category->status == 1): ?>
                                            <span class="badge badge-soft-success"><?php echo e(translate('Active')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-soft-danger"><?php echo e(translate('Inactive')); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <div class="hstack justify-content-center gap-3">
                                                <?php if(permission_check('update_category')): ?>
                                                    <a  title="<?php echo e(translate('Update')); ?>" data-bs-toggle="tooltip" data-bs-placement="top"  href="<?php echo e(route('admin.item.category.edit', $category->id)); ?>"  class=" fs-18 link-warning"><i class="ri-pencil-fill"></i></a>
                                                <?php endif; ?>
                                                <?php if(permission_check('delete_category')): ?>
                                                    <a title="<?php echo e(translate('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" href="javascript:void(0);" data-href="<?php echo e(route('admin.item.category.delete',$category->id)); ?>" class="delete-item fs-18 link-danger">
                                                        <i class="ri-delete-bin-line"></i></a>
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
                        <?php echo e($categories->appends(request()->all())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php echo $__env->make('admin.modal.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>








<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/category/index.blade.php ENDPATH**/ ?>