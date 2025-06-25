<?php 
	$seo = null;
	if($seo_content){
		$seo = json_decode($seo_content->value, true);
		$seoImage       = show_image(file_path()['seo_image']['path'].'/'.$seo['seo_image']);
		$seoSocialImage = show_image(file_path()['seo_image']['path'].'/'.$seo['social_image']);

		$metaKeywords     =  Arr::get($seo,"meta_keywords",[]);
		$socialTitle      =  $seo['social_title'];
		$metaDescription  =  $seo['meta_description'];
		$social_description  =  $seo['social_description'];

	}

	if((@$product  && request()->routeIs("product.details")) || 
	(@$digital_product  && request()->routeIs("digital.product.details"))){

		if(@$digital_product)@$product = @$digital_product;
		
		$seoSocialImage = show_image(file_path()['product']['featured']['path'].'/'.@$product->featured_image,file_path()['product']['featured']['size']);
		$seoImage       = $seoSocialImage;
		$metaKeywords     =  @$product->meta_keywords ?? [];
		$socialTitle      =  @$product->meta_title;
		$metaDescription  =  @$product->meta_description;
		$social_description  = $metaDescription;
	}

	



?>

<?php if($seo): ?>
	<meta name="title" content="<?php echo e($socialTitle); ?>">
	<meta name="description" content="<?php echo e($metaDescription); ?>">
	<meta name="robots" content="index,follow">
	<meta itemprop="image" content="<?php echo e($seoImage); ?>">
	<meta property="og:url" content="<?php echo e(url()->current()); ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo e($socialTitle); ?>">
	<meta property="og:description" content="<?php echo e($social_description); ?>">
	<meta property="og:image" content="<?php echo e($seoSocialImage); ?>">
	<meta name='keywords' content='<?php echo e(implode(",",Arr::get($seo,"meta_keywords",""))); ?>'>

<?php endif; ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/partials/seo.blade.php ENDPATH**/ ?>