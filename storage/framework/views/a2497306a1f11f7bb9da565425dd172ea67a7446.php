
<?php $__env->startPush('style-include'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dataTables.bootstrap5.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/responsive.bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/buttons.dataTables.min.css')); ?>">
<?php $__env->stopPush(); ?>
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
                        <?php echo e(translate('Roles')); ?>

                    </li>
                </ol>
            </div>

        </div>

		<div class="card">
			<div class="card-header border-bottom-dashed">
				<div class="row g-4 align-items-center">
					<div class="col-sm">
                        <h5 class="card-title mb-0">
                            <?php echo e(translate('Roles List')); ?>

                        </h5>
					</div>
                    <?php if(permission_check('create_roles')): ?>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <a href="<?php echo e(route('admin.role.create')); ?>" class="btn btn-success btn-sm add-btn waves ripple-light"
                                ><i class="ri-add-line align-bottom me-1"></i>
                                        <?php echo e(translate('Add New Roles')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
				</div>
			</div>

			<div class="card-body">
			    <table id="roles-table" class="w-100 table table-bordered dt-responsive nowrap table-striped align-middle" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                <?php echo e(translate('Name')); ?>

                            </th>
                            <th>
                                <?php echo e(translate('Status')); ?>

                            </th>
                            <th>
                                <?php echo e(translate('Created By')); ?>

                            </th>
                            <th>
                                <?php echo e(translate('Options')); ?>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(auth_user()->role->name != 'SuperAdmin'): ?>
                        <?php $__currentLoopData = $roles->where('id', '!=', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($loop->iteration); ?>

                                </td>
                                <td>
                                    <?php echo e($role->name); ?>

                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="status-update form-check-input"
                                            data-column="status"
                                            data-route="<?php echo e(route('admin.role.status.update')); ?>"
                                            data-model="Role"
                                            data-status="<?php echo e($role->status == '1' ? '0':'1'); ?>"
                                            data-id="<?php echo e($role->id); ?>" <?php echo e($role->status == "1" ? 'checked' : ''); ?>

                                        id="status-switch-<?php echo e($role->id); ?>" >
                                        <label class="form-check-label" for="status-switch-<?php echo e($role->id); ?>"></label>

                                    </div>
                                </td>
                                <td>
                                   <?php echo e($role->createdBy?$role->createdBy->name :'N/A'); ?>

                                </td>

                                <td>
                                    <div class="hstack justify-content-center gap-3">
                                        <?php if(permission_check('update_roles')): ?>
                                           <a href="<?php echo e(route('admin.role.edit',$role->id)); ?>" title="<?php echo e(translate('Update')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" class=" fs-18 link-warning"><i class="ri-pencil-fill"></i></a>
                                        <?php endif; ?>
                                        <?php if(permission_check('delete_roles')): ?>
                                            <?php if($role->name != 'SuperAdmin'): ?>
                                                <a href="javascript:void(0);" title="<?php echo e(translate('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-href="<?php echo e(route('admin.role.destroy',$role->id)); ?>" class="delete-item fs-18 link-danger">
                                                <i class="ri-delete-bin-line"></i></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $roles->where('id', '!=', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($loop->iteration); ?>

                                </td>
                                <td>
                                    <?php echo e($role->name); ?>

                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="status-update form-check-input"
                                            data-column="status"
                                            data-route="<?php echo e(route('admin.role.status.update')); ?>"
                                            data-model="Role"
                                            data-status="<?php echo e($role->status == '1' ? '0':'1'); ?>"
                                            data-id="<?php echo e($role->id); ?>" <?php echo e($role->status == "1" ? 'checked' : ''); ?>

                                        id="status-switch-<?php echo e($role->id); ?>" >
                                        <label class="form-check-label" for="status-switch-<?php echo e($role->id); ?>"></label>

                                    </div>
                                </td>
                                <td>
                                   <?php echo e($role->createdBy?$role->createdBy->name :'N/A'); ?>

                                </td>

                                <td>
                                    <div class="hstack justify-content-center gap-3">
                                        <?php if(permission_check('update_roles')): ?>
                                           <a href="<?php echo e(route('admin.role.edit',$role->id)); ?>" title="<?php echo e(translate('Update')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" class=" fs-18 link-warning"><i class="ri-pencil-fill"></i></a>
                                        <?php endif; ?>
                                        <?php if(permission_check('delete_roles')): ?>
                                            <?php if($role->name != 'SuperAdmin'): ?>
                                                <a href="javascript:void(0);" title="<?php echo e(translate('Delete')); ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-href="<?php echo e(route('admin.role.destroy',$role->id)); ?>" class="delete-item fs-18 link-danger">
                                                <i class="ri-delete-bin-line"></i></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                        
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

<?php echo $__env->make('admin.modal.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-include'); ?>

<script src="<?php echo e(asset('assets/backend/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/dataTables.bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/dataTables.responsive.min.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-push'); ?>
<script>
	(function($){
       	"use strict";
        document.addEventListener("DOMContentLoaded", function () {
            new DataTable("#roles-table", {
                fixedHeader: !0
            })
        })
	})(jQuery);
</script>
<?php $__env->stopPush(); ?>






<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/admin/roles/index.blade.php ENDPATH**/ ?>