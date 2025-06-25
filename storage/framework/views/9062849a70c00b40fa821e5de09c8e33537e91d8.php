
<?php $__env->startSection('content'); ?>
<?php
    $contact = frontend_section('contact');
?>


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


<section class="contact-section" style="background:#404040 !important; padding: 5rem 2rem !important;">
    <div class="Container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section-title">
                    <div class="title-left-content">
                        <h3 class="text-white">   <?php echo e(@frontend_section_data($contact->value,'heading')); ?></h3>
                        <p class="text-white"> <?php echo e(@frontend_section_data($contact->value,'sub_heading')); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="form-wrapper">
                    <form action="<?php echo e(route('contact.store')); ?>" class="contact-form" method="post">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label for="name" class="form-label"><?php echo e(translate('Your Name')); ?></label>
                                <input type="text" required  name="name" value="<?php echo e(old('name')); ?>" id="name" class="form-control" placeholder="<?php echo e(translate('Your Name')); ?>">
                        </div>

                        <div>
                            <label for="email" class="form-label"><?php echo e(translate('Your Email')); ?></label>
                            <input required type="email" class="form-control"  name="email" id="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Your Email')); ?>">
                        </div>

                        <div>
                            <label for="subject" class="form-label"><?php echo e(translate('Subject')); ?></label>
                            <input required type="text" class="form-control"  name="subject" id="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(translate('Your subject')); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label"><?php echo e(translate(' Message')); ?> </label>
                            <textarea required id="message" name="message" rows="4" class="form-control" placeholder="<?php echo e(translate('Your Message Here')); ?>"><?php echo e(old('message')); ?></textarea>
                        </div>
                        <input type="submit" value="Send" class="form-submit-btn">
                    </form>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="form-image-wrapper img-adjus contact-bg" >
                    <ul class="contact-list">
                        <li>
                            <div class="icon">
                                <i class="las la-envelope"></i>
                            </div>
                            <div class="content">
                                <span><?php echo e(translate("Eamil")); ?></span>
                                <a href="mailto:<?php echo e(site_settings('mail_from')); ?>">
                                     <?php echo e(site_settings('mail_from')); ?>

                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="las la-phone-volume"></i>
                            </div>
                            <div class="content">
                                <span><?php echo e(translate('Phone')); ?></span>
                                <a href="tel:<?php echo e(site_settings('phone')); ?>"><?php echo e(site_settings('phone')); ?></a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="las la-map-marker"></i>
                            </div>
                            <div class="content">
                                <span><?php echo e(translate('Address')); ?></span>


                                 <a 
                                 href="https://maps.google.com/maps?q=<?php echo e(site_settings('latitude')); ?>,<?php echo e(site_settings('longitude')); ?>" target="_blank" class="footer-contact-link"><?php echo e(site_settings('address')); ?></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


 <section class="map-section">

    <div  id="map"></div>

 </section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scriptpush'); ?>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    
<script
src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(site_settings('gmap_client_key')); ?>&callback=initMap&v=weekly"
defer
></script>

<script>







let map;

function initMap() {
  const mapOptions = {
    zoom: 8,
    center: { lat: parseFloat("<?php echo e(site_settings('latitude')); ?>"), lng:  parseFloat("<?php echo e(site_settings('longitude')); ?>") },
  };

  map = new google.maps.Map(document.getElementById("map"), mapOptions);

  const marker = new google.maps.Marker({

    position: { lat: parseFloat("<?php echo e(site_settings('latitude')); ?>"), lng:  parseFloat("<?php echo e(site_settings('longitude')); ?>") },
    map: map,
  });

  const infowindow = new google.maps.InfoWindow({
    content: "<p>Marker Location:" + marker.getPosition() + "</p>",
  });

  google.maps.event.addListener(marker, "click", () => {
    infowindow.open(map, marker);
  });
}

window.initMap = initMap;



</script>




    



<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/contact.blade.php ENDPATH**/ ?>