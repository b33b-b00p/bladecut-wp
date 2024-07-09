<!-- Working Hours Start -->
<div class="container-xxl py-5">
   <div class="container">
      <div class="row g-0">
         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="h-100">
               <img class="img-fluid h-100" src="<?php the_field('schedule_img', 'option') ?>" alt="">
            </div>
         </div>
         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
               <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto"><?php the_field('schedule_subtitle', 'option') ?></p>
               <h1 class="text-uppercase mb-4"><?php the_field('schedule_title', 'option') ?></h1>
               <div>
                  <?php
                  if (have_rows('schedule_repeater', 'option')) :
                     while (have_rows('schedule_repeater', 'option')) : the_row();
                  ?>
                        <div class="d-flex justify-content-between border-bottom py-2">
                           <h6 class="text-uppercase mb-0"><?php the_sub_field('week-day', 'option') ?></h6>
                           <?php
                           if (get_sub_field('is-closed')) {
                           ?>
                              <span class="text-uppercase text-primary">Closed</span>
                           <?php } else { ?>
                              <span class="text-uppercase"><?php the_sub_field('work-hours', 'option') ?></span>
                           <?php } ?>
                        </div>
                  <?php
                     endwhile;
                  else :
                     echo 'ERROR! Fields not found...';
                  endif;
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Working Hours End -->