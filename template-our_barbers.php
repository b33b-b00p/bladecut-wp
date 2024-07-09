<?php
/*
   Template Name: OUR BARBERS template
   */
get_header();
?>

<!-- Page Header Start -->
<?php if (get_field('add-breadcrumbs')) {
   echo do_shortcode('[breadcrumbs]');
} ?>
<!-- Page Header End -->

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

<?php get_footer(); ?>