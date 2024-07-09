<?php
/*
   Template Name: SERVICES template
   */
get_header();
?>

<!-- Page Header Start -->
<?php if (get_field('add-breadcrumbs')) {
   echo do_shortcode('[breadcrumbs]');
} ?>
<!-- Page Header End -->

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


<!-- Testimonial Start -->
<?php if (get_field('add-testimonials')) {
   echo do_shortcode('[testimonials]');
} ?>
<!-- Testimonial End -->

<?php get_footer(); ?>