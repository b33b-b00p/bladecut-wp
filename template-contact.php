<?php
/*
   Template Name: CONTACT template
   */
get_header();
?>

<!-- Page Header Start -->
<?php if (get_field('add-breadcrumbs')) {
   echo do_shortcode('[breadcrumbs]');
} ?>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
   <div class="container">
      <div class="row g-0">
         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="bg-secondary p-5">
               <p class="d-inline-block bg-dark text-primary py-1 px-4"><?php the_field('contact_subtitle') ?></p>
               <h1 class="text-uppercase mb-4"><?php the_field('contact_title') ?></h1>
               <p class="mb-4"><?php the_field('contact_description') ?></p>
               <?php
               // Вставка формы ContactForm7
               echo do_shortcode('[contact-form-7 id="7d0ac1a" title="CONTACT page"]');
               ?>
            </div>
         </div>
         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="h-100" style="min-height: 400px;">
               <?php echo get_field('contact_map') ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Contact End -->

<?php get_footer(); ?>