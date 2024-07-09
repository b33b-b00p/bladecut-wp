<?php
/*
   Template Name: WORKING HOURS template
   */
get_header();
?>

<!-- Page Header Start -->
<?php if (get_field('add-breadcrumbs')) {
   echo do_shortcode('[breadcrumbs]');
} ?>
<!-- Page Header End -->

<!-- Working Hours Start -->
<?php if (get_field('add-schedule')) {
   echo do_shortcode('[schedule]');
} ?>
<!-- Working Hours End -->

<?php get_footer(); ?>