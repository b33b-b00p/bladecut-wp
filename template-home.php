<?php
/*
   Template Name: HOME template
   */
get_header();
?>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
   <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
         <?php
         $firstItem = true;
         if (have_rows('hero_carousel')) :
            while (have_rows('hero_carousel')) : the_row();
         ?>
               <?php if ($firstItem) { ?>
                  <div class="carousel-item active">
                  <?php } else { ?>
                     <div class="carousel-item">
                     <?php } ?>
                     <!-- <div class="carousel-item"> -->
                     <img class="w-100" src="<?php the_sub_field('slide-bg') ?>" alt="Image">
                     <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                           <h1 class="display-2 text-white text-uppercase mb-4"><?php the_sub_field('title') ?></h1>
                           <?php
                           if (have_rows('repeater-contact')) :
                              while (have_rows('repeater-contact')) : the_row();
                           ?>
                                 <?php
                                 if (get_sub_field('is-address')) {
                                 ?>
                                    <h4 class="text-white text-uppercase mb-4"><i class="fa <?php the_sub_field('icon') ?> text-primary me-3"></i><?php the_sub_field('address') ?></h4>
                                 <?php } else { ?>
                                    <h4 class="text-white text-uppercase mb-4"><i class="fa <?php the_sub_field('icon') ?> text-primary me-3"></i><a href="<?php echo get_sub_field('link')['url'] ?>"><?php echo get_sub_field('link')['title'] ?></a></h4>
                                 <?php } ?>
                           <?php
                              endwhile;
                           else :
                              echo 'ERROR! Fields not found...';
                           endif;
                           ?>
                        </div>
                     </div>
                     </div>
                     <?php $firstItem = false; ?>
               <?php
            endwhile;
         else :
            echo 'ERROR! Fields not found...';
         endif; ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Next</span>
                  </button>
      </div>
   </div>
   <!-- Carousel End -->


   <!-- About Start -->
   <div class="container-xxl py-5">
      <div class="container">
         <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
               <div class="d-flex flex-column">
                  <img class="img-fluid w-75 align-self-end" src="<?php echo get_field('about-us_img')['url'] ?>" alt="<?php echo get_field('about-us_img')['alt'] ?>">
                  <div class="w-50 bg-secondary p-5" style="margin-top: -25%;">
                     <h1 class="text-uppercase text-primary mb-3"><?php the_field('about-us_accent-text') ?></h1>
                     <h2 class="text-uppercase mb-0"><?php the_field('about-us_regular-text') ?></h2>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
               <p class="d-inline-block bg-secondary text-primary py-1 px-4"><?php the_field('about-us_subtitle') ?></p>
               <h1 class="text-uppercase mb-4"><?php the_field('about-us_title') ?></h1>
               <p class="mb-4"><?php the_field('about-us_text-area') ?></p>
               <div class="row g-4">
                  <?php
                  if (have_rows('about-us_repeater')) :
                     while (have_rows('about-us_repeater')) : the_row();
                  ?>
                        <div class="col-md-6">
                           <h3 class="text-uppercase mb-3"><?php the_sub_field('title') ?></h3>
                           <p class="mb-0"><?php the_sub_field('text-area') ?></p>
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
   <!-- About End -->


   <!-- Service Start -->
   <div class="container-xxl py-5">
      <div class="container">
         <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block bg-secondary text-primary py-1 px-4"><?php the_field('services_subtitle') ?></p>
            <h1 class="text-uppercase"><?php the_field('services_title') ?></h1>
         </div>
         <div class="row g-4">
            <?php
            // задаем нужные нам критерии выборки данных из БД
            $args = array(
               'posts_per_page' => get_field('services_quantity'),
               'post_type' => 'service', //change to your post type
               'orderby' => 'date',
               'order' => 'ASC',
            );

            $query = new WP_Query($args);

            // Цикл
            if ($query->have_posts()) {
               while ($query->have_posts()) {
                  $query->the_post(); ?>
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center" style="width: 60px; height: 60px;">
                           <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                        </div>
                        <div class="ps-4">
                           <h3 class="text-uppercase mb-3"><?php the_title(); ?></h3>
                           <p><?php the_field('service_description') ?></p>
                           <span class="text-uppercase text-primary">From $<?php the_field('service_price') ?></span>
                        </div>
                        <a class="btn btn-square" href="#"><i class="fa fa-plus text-primary"></i></a>
                     </div>
                  </div>
            <?php }
            } else {
               // Постов не найдено
            }

            // Возвращаем оригинальные данные поста. Сбрасываем $post.
            wp_reset_postdata();
            ?>
         </div>
      </div>
   </div>
   <!-- Service End -->


   <!-- Price Start -->
   <?php if (get_field('add-pricing'))
   {
      echo do_shortcode('[pricing]');
   } ?>
   <!-- Price End -->


   <!-- Team Start -->
   <div class="container-xxl py-5">
      <div class="container">
         <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block bg-secondary text-primary py-1 px-4"><?php the_field('team_subtitle') ?></p>
            <h1 class="text-uppercase"><?php the_field('team_title') ?></h1>
         </div>
         <div class="row g-4">
            <?php
            // задаем нужные нам критерии выборки данных из БД
            $args = array(
               'posts_per_page' => get_field('team_quantity'),
               'post_type' => 'barber', // change to your post type
               'orderby' => 'date', // сортировка по дате
               'order' => 'ASC', // сортировка от большего к меньшему
            );

            $query = new WP_Query($args);

            // Цикл
            if ($query->have_posts()) {
               while ($query->have_posts()) {
                  $query->the_post(); ?>
                  <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                           <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                           <div class="team-social">
                              <?php
                              if (have_rows('barber_socials-repeater')) :
                                 while (have_rows('barber_socials-repeater')) : the_row();
                              ?>
                                    <a class="btn btn-square" href="<?php the_sub_field('link') ?>"><i class="fab <?php the_sub_field('icon') ?>"></i></a>
                              <?php
                                 endwhile;
                              else :
                                 echo 'ERROR! Fields not found...';
                              endif;
                              ?>
                           </div>
                        </div>
                        <div class="bg-secondary text-center p-4">
                           <h5 class="text-uppercase"><?php the_title() ?></h5>
                           <span class="text-primary"><?php the_field('barber_designation') ?></span>
                        </div>
                     </div>
                  </div>
            <?php }
            } else {
               // Постов не найдено
            }

            // Возвращаем оригинальные данные поста. Сбрасываем $post.
            wp_reset_postdata();
            ?>
         </div>
      </div>
   </div>
   <!-- Team End -->


   <!-- Working Hours Start -->
   <?php if (get_field('add-schedule'))
   {
      echo do_shortcode('[schedule]');
   } ?>
   <!-- Working Hours End -->


   <!-- Testimonial Start -->
   <?php if (get_field('add-testimonials'))
   {
      echo do_shortcode('[testimonials]');
   } ?>
   <!-- Testimonial End -->

   <?php get_footer(); ?>