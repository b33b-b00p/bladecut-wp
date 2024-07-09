<!doctype html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <?php wp_body_open(); ?>
   <!-- Spinner Start -->
   <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
      </div>
   </div>
   <!-- Spinner End -->

   <!-- Navbar Start -->
   <header>
      <nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
         <a href="/" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="mb-0 text-primary text-uppercase"><i class="fa fa-cut me-3"></i><?php the_field('header_logo-text', 'option') ?></h1>
         </a>
         <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <?php
            wp_nav_menu([
               'theme_location'  => 'header',
               'container'       => '',
               'menu_class'      => 'navbar-nav ms-auto p-4 p-lg-0',
               'depth'           => 0,
            ]);
            ?>
            <a href="<?php echo get_field('header_red-button', 'option')['url'] ?>" class="btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-block"><?php echo get_field('header_red-button', 'option')['title'] ?><i class="fa fa-arrow-right ms-3"></i></a>
         </div>

      </nav>
   </header>
   <!-- Navbar End -->