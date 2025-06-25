
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
                        <?php echo e(translate('Brands')); ?>

                    </li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <h5 class="card-title mb-0">
                            <?php echo e(translate('Brand List')); ?>

                        </h5>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2">
                            <a href="<?php echo e(route('admin.item.brand.create')); ?>" class="btn btn-success btn-sm w-100 add-btn waves ripple-light"><i
                                class="ri-add-line align-bottom me-1"></i>
                                <?php echo e(translate('Create')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form action="<?php echo e(route('admin.item.brand.search')); ?>" method='get'>
                    <div class="row g-3">
                        <div class="col-xl-4 col-sm-6">
                            <div class="search-box">
                                <input value="<?php echo e(@$search); ?>"  name="search" type="text" class="form-control search"
                                    placeholder="<?php echo e(translate('Search by name')); ?>">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>

                        <div class="col-xl-2 col-sm-3 col-6">
                            <button type="submit" class="btn btn-primary w-100  waves ripple-light"> <i
                                    class="ri-equalizer-fill me-1 align-bottom"></i>
                                <?php echo e(translate('Search')); ?>

                            </button>
                        </div>

                        <div class="col-xl-2 col-sm-3 col-6">
                            <a href="<?php echo e(route('admin.item.brand.index')); ?>" class="btn btn-danger w-100 waves ripple-light"> <i
                                    class="ri-refresh-line me-1 align-bottom"></i>
                                <?php echo e(translate('Reset')); ?>

                            </a>
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
                                    <?php echo e(translate('Top Brand')); ?>

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
                            <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="fw-medium">
                                        <?php echo e($loop->iteration); ?>

                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <img class="rounded avatar-sm img-thumbnail" src="<?php echo e(show_image(file_path()['brand']['path'].'/'.$brand->logo ,file_path()['brand']['size'])); ?>" alt="<?php echo e($brand->logo); ?>"
                                                >
                                            </div>

                                            <div class="flex-grow-1">
                                                <?php echo e(@get_translation($brand->name)); ?>

                                                    <?php if($brand->top == '2'): ?>
                                                        <span class="badge badge-soft-success">
                                                            <i class="ri-star-s-fill"></i>
                                                        </span>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="<?php echo e(route('admin.item.brand.top', $brand->id)); ?>" class="
                                            fs-18 link-<?php echo e($brand->top==1 ? 'danger' :'success'); ?>

                                            " data-bs-toggle="tooltip" data-bs-placement="top" title="Top Brand">
                                        <?php if($brand->top==2): ?>
                                            <i class="ri-check-double-line"></i>

                                        <?php else: ?>
                                            <i class="ri-close-circle-line"></i>
                                        <?php endif; ?>
                                        </a>
                                    </td>

                                    <td>
                                        <?php if($brand->status == 1): ?>
                                            <span class="badge badge-soft-success"><?php echo e(translate('Active')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger"><?php echo e(translate('Inactive')); ?></span>
                                        <?php endif; ?>

                                    </td>

                                    <td>
                                        <div class="hstack justify-content-center gap-3">
                                            <?php if(permission_check('update_brand')): ?>
                                                <a   title="<?php echo e(translate('Update')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-id="<?php echo e($brand->id); ?>" data-serial="<?php echo e($brand->serial); ?>" data-name="<?php echo e(get_translation($brand->name)); ?>" data-slug="<?php echo e($brand->slug); ?>" data-status="<?php echo e($brand->status); ?>" href="javascript:void(0)"  class="brand fs-18 link-warning"><i class="ri-pencil-fill"></i></a>
                                            <?php endif; ?>
                                            <?php if(permission_check('delete_brand')): ?>
                                                <a title="<?php echo e(translate('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" href="javascript:void(0);" data-href="<?php echo e(route('admin.item.brand.delete',$brand->id)); ?>" class="delete-item fs-18 link-danger">
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
                     <?php echo e($brands->appends(request()->all())->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updatebrand" tabindex="-1" aria-labelledby="updatebrand" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light pb-2">
                <h5 class="modal-title"><?php echo e(translate('Update Brand')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="<?php echo e(route('admin.item.brand.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div>
                        <div class="mb-3">
                            <label for="serial" class="form-label"><?php echo e(translate('Serial Number')); ?>

                                <span class="text-danger" > *</span>
                            </label>
                            <input type="text" class="form-control" id="serial" name="serial" placeholder="<?php echo e(translate('Enter serial number')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label"><?php echo e(translate('Name')); ?>(<?php echo e(session()->get("locale")); ?>)  <span class="text-danger" > *</span></label>
                            <input type="text" class="form-control" id="name" name="title[<?php echo e(session()->get('locale')); ?>]" placeholder="<?php echo e(translate('Enter name')); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label"><?php echo e(translate('Slug')); ?> <span class="text-danger" > *</span></label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="<?php echo e(translate('Enter slug')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label"><?php echo e(translate('Logo')); ?></label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            <div class="form-text"><?php echo e(translate('Supported File : jpg,png,jpeg and size')); ?> <?php echo e(file_path()['brand']['size']); ?> <?php echo e(translate('pixels')); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label"><?php echo e(translate('Status')); ?>  <span class="text-danger" > *</span></label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="1"><?php echo e(translate('Active')); ?></option>
                                <option value="2"><?php echo e(translate('Inactive')); ?></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-danger" data-bs-dismiss="modal"><?php echo e(translate('Cancel')); ?></button>
                    <button type="submit" class="btn btn-md btn-success"><?php echo e(translate('Submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.modal.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-push'); ?>
<script>
	(function($){
       	"use strict";
        $('.brand').on('click', function(){
            var modal = $('#updatebrand');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('input[name=serial]').val($(this).data('serial'));
            $('#name').val($(this).data('name'));
            $('#slug').val($(this).data('slug'));
            modal.find('select[name=status]').val($(this).data('status'));
            modal.modal('show');
        });
	})(jQuery);
</script>
<?php $__env->stopPush(); ?>






<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/brand/index.blade.php ENDPATH**/ ?>