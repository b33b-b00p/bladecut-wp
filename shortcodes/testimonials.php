<!-- Testimonial Start -->
<div class="container-xxl py-5">
   <div class="container">
      <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
         <p class="d-inline-block bg-secondary text-primary py-1 px-4"><?php the_field('testimonials_subtitle', 'option') ?></p>
         <h1 class="text-uppercase"><?php the_field('testimonials_title', 'option') ?></h1>
      </div>
      <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
         <?php
         if (have_rows('testimonials_repeater', 'option')) :
            while (have_rows('testimonials_repeater', 'option')) : the_row();
         ?>
               <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='<?php echo get_sub_field('img', 'option')['url'] ?>' alt='<?php echo get_sub_field('img', 'option')['alt'] ?>'>">
                  <h4 class="text-uppercase"><?php the_sub_field('name', 'option') ?></h4>
                  <p class="text-primary"><?php the_sub_field('profession', 'option') ?></p>
                  <span class="fs-5"><?php the_sub_field('text-area', 'option') ?></span>
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
<!-- Testimonial End -->