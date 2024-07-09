<?php
/*
   Template Name: PRICING PLAN template
   */
get_header();
?>

<!-- Page Header Start -->
<?php if (get_field('add-breadcrumbs')) {
   echo do_shortcode('[breadcrumbs]');
} ?>
<!-- Page Header End -->

<!-- Price Start -->
<?php if (get_field('add-pricing')) {
   echo do_shortcode('[pricing]');
} ?>
<!-- Price End -->

<?php get_footer(); ?>