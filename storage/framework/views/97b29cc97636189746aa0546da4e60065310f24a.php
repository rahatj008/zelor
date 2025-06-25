
<?php if(count($campaigns)>0): ?>
<section class="upcomming-Campaign pb-80" style="background:#404040;">
    <div class="Container">
        <div class="campaign-container">
            <div class="section-title">
                <div class="section-title-left">
                    <div class="title-left-content">
                        <h3 class="mb-0" style="color:white;">
                            <?php echo e(@frontend_section_data($campaign_section->value,'heading')); ?>

                        </h3>
                    </div>
                </div>
                <div class="section-title-right">
                    <a href="<?php echo e(route('campaign')); ?>" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;">
                        <?php echo e(translate("View More")); ?>


                    </a>
                </div>
            </div>

            <?php
               $dates = [];
            ?>


            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="<?php echo e(route('campaign.details',$campaign->slug)); ?>" class="campaign">
                            <div class="campaign-ban">
                                <img src="<?php echo e(show_image(file_path()['campaign_banner']['path'].'/'.$campaign->banner_image,file_path()['campaign_banner']['size'])); ?>" alt="<?php echo e($campaign->banner_image); ?>">
                            </div>
                            <div class="campaign-info text-center">
                                <h5 class="fs-16 text-muted mb-4">
                                    <?php echo e($campaign->name); ?>

                                </h5>
                                <div class="campaign-time mt-3">
                                        <div class="campaign-time-item">
                                            <span class="days"></span>
                                            <small>
                                                <?php echo e(translate("Days")); ?>

                                            </small>
                                        </div>
                                        <div class="campaign-time-item">
                                            <span class='hours'></span>
                                            <small >
                                               <?php echo e(translate("Hours")); ?>

                                            </small>
                                        </div>
                                        <div class="campaign-time-item">
                                            <span class="minutes"></span>
                                            <small >
                                                <?php echo e(translate("Minute")); ?>

                                            </small>
                                        </div>
                                        <div class="campaign-time-item">
                                            <span class="seconds"></span>
                                            <small >
                                                <?php echo e(translate('Second')); ?>

                                            </small>
                                        </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                       array_push($dates ,date("Y-m-d H:i:s",strtotime($campaign->end_time)))
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                   <div class="col-12">
                        <?php echo $__env->make("frontend.partials.empty",['message' => 'No Data Found'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>

<?php if( @frontend_section_data($promo_banner->value,'position') == 'campaign'): ?>
  <?php echo $__env->renderWhen($promo_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>

<?php if( @frontend_section_data($promo_second_banner->value,'position') == 'campaign'): ?>
    <?php echo $__env->renderWhen($promo_second_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_second_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
<?php endif; ?>

<?php $__env->startPush('scriptpush'); ?>
<script>
    'use strict';
     var dateTime = <?php echo json_encode($dates); ?>;
     const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;
        var days = document.getElementsByClassName('days')
        var hours = document.getElementsByClassName('hours')
        var minutes = document.getElementsByClassName('minutes')
        var seconds = document.getElementsByClassName('seconds')
     for(let i =0 ;i<dateTime.length; i++){
        var time = dateTime[i];
        const countDown = new Date(time).getTime(),
            x = setInterval(function() {
            const now = new Date().getTime(),
            distance = countDown - now;
            days[i].innerText =  Math.floor(distance / (day));
            hours[i].innerText =  Math.floor((distance % (day)) / (hour));
            minutes[i].innerText =  Math.floor((distance % (hour)) / (minute));
            seconds[i].innerText =   Math.floor((distance % (minute)) / second);

        }, 0)
     }
</script>
<?php $__env->stopPush(); ?>

<?php endif; ?>
<?php /**PATH /home/u935716083/domains/testlinkdesigns.com/public_html/zelor/resources/views/frontend/section/campaigns.blade.php ENDPATH**/ ?>