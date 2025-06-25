
<?php $__env->startPush('style-include'); ?>

   <link href="<?php echo e(asset('assets/backend/css/summnernote.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopPush(); ?>

<?php $__env->startSection('main_content'); ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">
                <?php echo e(translate("Create Product")); ?>

            </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('seller.dashboard')); ?>">
                            <?php echo e(translate("Dashboard")); ?>

                    </a></li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('seller.product.index')); ?>">
                            <?php echo e(translate("Products")); ?>

                        </a>
                    </li>
                    <li class="breadcrumb-item active">

                        <?php echo e(translate("Create Product")); ?>

                    </li>
                </ol>
            </div>

        </div>

        <form  id="createproduct-form" autocomplete="off" class="needs-validation"  action="<?php echo e(route('seller.product.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                                <?php echo e(translate('Product Basic Information')); ?>

                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label" for="name">
                                            <?php echo e(translate("Product Title")); ?> <span class="text-danger" >*</span>
                                        </label>

                                        <input  name="name" id="name" type="text" class="form-control"  value="<?php echo e(old('name')); ?>"
                                            placeholder="Enter product title" required>
                                        <div class="invalid-feedback">
                                            <?php echo e(translate("Please Enter a product title")); ?>

                                            </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-12">
                                    <div>
                                        <label class="form-label" for="slug">
                                            <?php echo e(translate("Slug")); ?> <span class="text-danger" >*</span>
                                        </label>

                                        <input  name="slug" id="slug" type="text" class="form-control"  value="<?php echo e(old('slug')); ?>"
                                            placeholder="<?php echo e(translate('Enter slug')); ?>" required>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label" for="price">
                                            <?php echo e(translate("Regular price")); ?> <span class="text-danger" >*</span>
                                        </label>

                                        <input step="any" required type="text" class="form-control" id="price" name="price"
                                            value="<?php echo e(old('price')); ?>" placeholder="<?php echo e(translate('Product price')); ?>">

                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div>
                                        <label class="form-label" for="discount_percentage">
                                            <?php echo e(translate("Discount
                                            Percentage(%)")); ?>

                                        </label>

                                        <input type="number" class="form-control discount_percentage"
                                        id="discount_percentage" name="discount_percentage"
                                        value="<?php echo e(old('discount_percentage') ? old('discount_percentage') :0); ?>"
                                        placeholder="<?php echo e(translate('Discount Percentage')); ?>" >

                                        <div class="text-danger" id="dicountAmount">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <label for="minimum_purchase_qty" class="form-label"><?php echo e(translate('Purchase
                                            Quantity (Min)')); ?> <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="minimum_purchase_qty"
                                            id="minimum_purchase_qty" value="<?php echo e(old('minimum_purchase_qty')); ?>"
                                            placeholder="<?php echo e(translate('Min qty should be 1')); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <label for="maximum_purchase_qty" class="form-label"><?php echo e(translate('Purchase
                                            Quantity (Max)')); ?> <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="maximum_purchase_qty"
                                            id="maximum_purchase_qty" value="<?php echo e(old('maximum_purchase_qty')); ?>"
                                            placeholder="<?php echo e(translate('Max qty unlimited number')); ?>" required>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div>
                                        <label for="club_point" class="form-label"><?php echo e(translate('Club point')); ?> <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="point"
                                            id="club_point" value="<?php echo e(old('point') ? old('point') : 0); ?>"
                                            placeholder="<?php echo e(translate('Enter club point')); ?>" required>
                                    </div>
                                </div>

                                

                                <div class="col-12">
                                    <label for="short_description">
                                        <?php echo e(translate("Short Description")); ?><span class="text-danger" >*</span>
                                    </label>

                                    <textarea required id="short_description" name="short_description" class="form-control  text-editor" placeholder="Must enter minimum of a 100 characters" rows="3"> <?php echo e(old('short_description')); ?></textarea>

                                </div>

                                <div class="col-12">
                                    <label for="mail-composer">
                                        <?php echo e(translate("Product Description")); ?> <span class="text-danger" >*</span>
                                    </label>

                                    <textarea  id="mail-composer" class="form-control div_editor1 text-editor " name="description" rows="5"
                                     placeholder="<?php echo e(translate('Enter Description')); ?>" required>
                                    <?php echo e(old('description')); ?>

                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                                <?php echo e(translate("Product Gallery")); ?>

                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xl-6">
                                    <div>
                                        <label for="featured_image" class="form-label"><?php echo e(translate('Thumbnail Image')); ?> <span class="text-danger" >*</span></label>
                                        <input type="file" name="featured_image" id="featured_image"
                                            class="form-control" required>
                                        <div id="emailHelp" class="text-danger"><?php echo e(translate('Image Size Should Be')); ?>

                                            <?php echo e(file_path()['product']['featured']['size']); ?>

                                        </div>
                                    </div>
                                    <div class="featured_img">

                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div>
                                        <label for="product_gallery_image" class="form-label"><?php echo e(translate('Gallery Image')); ?> <span class="text-danger" >*</span></label>
                                        <input type="file" name="gallery_image[]" id="product_gallery_image"
                                            class="form-control" multiple required>
                                        <div class="text-danger"><?php echo e(translate('Image Size Should Be')); ?>

                                            <?php echo e(file_path()['product']['gallery']['size']); ?>

                                        </div>
                                        <div class="d-flex flex-wrap gap-2 gallery_img"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                              <?php echo e(translate("Product Stock")); ?>

                            </h5>
                        </div>

                        <div class="card-body pb-3">
                            <div class="form-group row g-3">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="<?php echo e(translate('Attributes')); ?>" disabled>
                                </div>
                                <div class="col-md-9">
                                    <select name="choice_attributes[]" id="select_attributes" class="form-control" multiple >
                                        <?php $__currentLoopData = \App\Models\Attribute::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-3">
                                <p><?php echo e(translate('Choose the attributes')); ?></p>
                            </div>

                            <div class="mb-3 attribute_options" id="attribute_options">

                            </div>

                            <div class="varient_combination" id="varient_combination">

                            </div>
                        </div>

                    </div>


                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                              <?php echo e(translate("Product Taxes")); ?>

                            </h5>
                        </div>

                        <div class="card-body pb-3">
                            <div>
                                <div class="row g-3">
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="col-md-4">
                                            <input type="text" class="form-control" value="<?php echo e($tax->name); ?>" disabled>
                                            <input type="hidden" name="tax_id[]" class="form-control" value="<?php echo e($tax->id); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <input step="any" name="tax_amount[]" type="number" class="form-control" value="" placeholder="<?php echo e(translate('Amount')); ?>" >
                                        </div>
                                        <div class="col-md-4">
                                            <select name="tax_type[]" class="form-select">
                                                <option value="1">
                                                    <?php echo e(translate("Flat")); ?>

                                                </option>
                                                <option value="0">
                                                    <?php echo e(translate("Percentage")); ?>

                                                </option>
                                            </select>
                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                              <?php echo e(translate("Meta Data")); ?>

                            </h5>
                        </div>

                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div>
                                        <label class="form-label" for="meta_title">
                                            <?php echo e(translate("Meta
                                            title")); ?>

                                        </label>

                                        <input type="text" name="meta_title" id="meta_title"  class="form-control"
                                        value="<?php echo e(old('meta_title')); ?>"    placeholder="Enter meta title">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="meta_keyword" class="form-label"><?php echo e(translate('Meta Keywords')); ?></label>
                                        <select
                                            name="meta_keywords[]" id="meta_keyword" class="form-control keywords"
                                            multiple=multiple></select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="meta_description" class="form-label"><?php echo e(translate('Meta Description')); ?></label>
                                        <textarea class="form-control" rows="3" name="meta_description" id="meta_description" placeholder="<?php echo e(translate('Enter meta description')); ?>"><?php echo e(old('meta_description')); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-start mb-3">
                        <button type="submit" class="btn btn-success w-sm waves ripple-light">
                            <?php echo e(translate("Submit")); ?>

                        </button>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                                <?php echo e(translate("Product Categories")); ?>

                            </h5>
                        </div>

                        <div class="card-body">
                            <div>
                                <label for="category_id" class="form-label"><?php echo e(translate('Category')); ?> <span
                                        class="text-danger">*</span>
                                </label>

                                <select name="category_id" id="category_id" class="form-select w-100" required>
                                    <option value=""><?php echo e(translate('--Select One--')); ?></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  <?php echo e(old('category_id') == $category->id ? "selected" : ''); ?>   value="<?php echo e($category->id); ?>" data-subcategory="<?php echo e($category->parent); ?>">
                                        <?php echo e((get_translation($category->name))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mt-2">
                                <label for="subcategory_id" class="form-label"><?php echo e(translate('Sub Category')); ?></label>
                                <select name="subcategory_id" id="subcategory_id" class="form-select" >
                                    <option value=""><?php echo e(translate('--Select One--')); ?></option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                                <?php echo e(translate("Product Brand")); ?>

                            </h5>
                        </div>

                        <div class="card-body">
                            <div>
                                <label for="brand_id" class="form-label"><?php echo e(translate('Brand')); ?> </label>
                                <select name="brand_id" id="brand_id" class="form-select" >
                                    <option value=""><?php echo e(translate('--Select One--')); ?></option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  <?php echo e(old('brand_id') == $brand->id ? "selected" : ''); ?> value="<?php echo e($brand->id); ?>"><?php echo e(get_translation($brand->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                                <?php echo e(translate("Product Warranty Policy")); ?>

                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-2">
                                <?php echo e(translate("Add warranty policy of product")); ?>

                            </p>

                            <textarea class="form-control" name="warranty_policy" rows="5"
                                    placeholder="<?php echo e(translate('Enter warranty policy')); ?>" ><?php echo e(old('warranty_policy')); ?></textarea>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">
                                <?php echo e(translate("Product Shipping Configuration")); ?>

                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="mb-3">
                        
                                <div>
                                    <label class="form-label" for="weight">
                                        <?php echo e(translate("Weight")); ?><span class="text-danger" > (<?php echo e(translate('In KG')); ?>)</span>
                                    </label>

                                    <input step="any" type="number" class="form-control" id="weight" name="weight"
                                     value="<?php echo e(old('weight') ? old('weight') :0); ?>" placeholder="<?php echo e(translate('Product Weight')); ?>">

                                </div>
                            
                            </div>

                            <div class="mb-3">
                                <label for="shipping_delivery_id" class="form-label"><?php echo e(translate('Shipping Carrier/Delivery')); ?>

                                </label>

                                <select  class="form-select select2"
                                multiple  name="shipping_delivery_id[]" id="shipping_delivery_id">
                                    <?php if($shippingDeliveries->count() > 1): ?>
                                      <option value="0"><?php echo e(translate('All')); ?></option>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $shippingDeliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e((collect(old('shipping_delivery_id'))->contains($shipping->id)) ? 'selected':''); ?>    value="<?php echo e($shipping->id); ?>"><?php echo e(($shipping->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-3">

                                <label class="form-label" for="shipping_fee">
                                    <?php echo e(translate("Flat shipping fees")); ?> <span class="text-danger" >*</span>
                                </label>

                                <input step="any" placeholder="<?php echo e(translate("Enter shipping fees")); ?>"  name="shipping_fee" id="shipping_fee" type="number" class="form-control"  value="<?php echo e(old('shipping_fee')); ?>"
                                     required>

                            </div>

                            <div class="mb-3">

                                <div class="form-check form-switch">
                                    <input  type="checkbox" class="form-check-input"
                                        name="shipping_fee_multiply"
                                        value="1"
                                    id="status-switch" >
                                    <label class="form-check-label" for="status-switch"> <?php echo e(translate('Shipping fees multiply by product QTY')); ?></label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-include'); ?>
	<script src="<?php echo e(asset('assets/backend/js/summnernote.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/backend/js/editor.init.js')); ?>"></script>


<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-push'); ?>
<script>
	"use strict";
    $(".select2").select2({
		placeholder:"<?php echo e(translate('Select Keywords')); ?>",
	})

    $('select[name=category_id]').on('change', function() {
        $('select[name=subcategory_id]').html('<option value="" selected="" disabled=""><?php echo e(translate("--Select One--")); ?></option>');
        var subcategorys = $('select[name=category_id] :selected').data('subcategory');
        var html = '';
        var lang_code = "<?php echo e(session()->get('locale')); ?>"
        subcategorys.forEach(function myFunction(item, index) {

            const x =  `<?php echo e(old('subcategory_id')); ?>`;
            html += `<option   value="${item.id}">${JSON.parse(item.name)[lang_code]}</option>`
        });
        $('select[name=subcategory_id]').append(html);
    });

    $('.keywords').select2({
        tags: true,
        tokenSeparators: [','],
        placeholder:"<?php echo e(translate('Type keywords')); ?>",
    });

    $('#select_attributes').select2({
        placeholder:"<?php echo e(translate('Choose Value')); ?>",
    });

    $('.discount_percentage').on('keyup', function() {
        var discount = $(this).val();
        var original_price = $("#price").val();
        if (discount > 100) {
            $(this).val('');
            $("#dicountAmount").text('');
            toaster( "<?php echo e(translate('Discount Can Not Be Greater Than Original Price')); ?>", 'danger');
        } else {
            var discounted_price = original_price - (original_price * discount / 100);

            if(discount!=0){
                $("#dicountAmount").text(`Discount Price <?php echo e(default_currency()->symbol); ?>`+discounted_price);
            }else{
                $("#dicountAmount").text('');
            }

        }
    });

    $('#price').on('keyup', function() {
        var price = $(this).val();
        var discount = $("#discount_percentage").val();
        if(price!=0 && discount!=0){
            var discounted_price = price - (price * discount / 100);
            $("#dicountAmount").text(`Discount Price<?php echo e(default_currency()->symbol); ?>`+discounted_price);
        }else{
            $("#dicountAmount").text('');
        }
    });

    if (window.File && window.FileList && window.FileReader) {
        $("#product_gallery_image").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
                $(".gallery_img").html('')
            for (var i = 0; i < filesLength; i++) {
                var f = files[i];
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    var galleryHtml = $(`<div class=" gallery_img-item">
								<img  src="${e.target.result}" alt="${file.name}">
								<div class="gallery_img-item_icon remove">
									<i class="las la-times-circle"></i>
								</div>
							</div>`)
                    $(".gallery_img").append(galleryHtml);
                    $(".remove").click(function() {
                        $(this).parent(".gallery_img-item").remove();
                        window.filesToUpload.splice(i, 1);
                    });
                });
                fileReader.readAsDataURL(f);
            }
        });
    }

    if(window.File && window.FileList && window.FileReader) {
        $("#featured_image").on("change", function(e) {
            let file = e.target.files[0];
            $(`.featured_img`).html('')
            $(`.featured_img`).append(
                `<img alt='${file.type}'class='mt-2' src='${URL.createObjectURL(file)}'>`
            );
        });
    }

    function selectInit(){
        $('.attribute_value').select2({
          placeholder:"<?php echo e(translate('Select Value')); ?>",
        });
    }

    $('#select_attributes').on('change', function() {
        $('#attribute_options').html(null);
        $.each($("#select_attributes option:selected"), function(){
            attrVal($(this).val(), $(this).text());
        });

        combinations()

    });

    function attrVal(i, name){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url:'<?php echo e(route('seller.product.attribute.value')); ?>',
            data:{
               attribute_id: i
            },
            success: function(data) {
                var html = JSON.parse(data);
                $('#attribute_options').append('\
                <div class="form-group row mb-2">\
                    <div class="col-md-3">\
                        <input type="hidden" name="choice_no[]" value="'+i+'">\
                        <input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="<?php echo e(translate('Choice Title')); ?>" readonly>\
                    </div>\
                    <div class="col-md-9">\
                        <select class="form-select  attribute_value" required name="choice_options_'+ i +'[]" multiple>\
                            '+html+'\
                        </select>\
                    </div>\
                </div>');
                selectInit()

           }
       });

    }

    $(document).on("change", ".attribute_value",function() {
        combinations();
    });

    function combinations(){
        $.ajax({
           type:"POST",
           url:'<?php echo e(route('seller.product.combination')); ?>',
           data:$('#createproduct-form').serialize(),
           success: function(data) {
                $('#varient_combination').html(data);
           }
       });
    }

</script>
<?php $__env->stopPush(); ?>







<?php echo $__env->make('seller.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/seller/product/create.blade.php ENDPATH**/ ?>