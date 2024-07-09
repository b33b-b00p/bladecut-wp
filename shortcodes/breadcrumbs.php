<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
   <div class="container text-center py-5">
      <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown"><?php the_title() ?></h1>
      <nav aria-label="breadcrumb animated slideInDown">
         <div class="breadcrumb justify-content-center text-uppercase mb-0">
            <?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs('/'); ?>
         </div>
      </nav>
   </div>
</div>

<style>
   .page-header {
      background: linear-gradient(rgba(0, 0, 0, .85), rgba(0, 0, 0, .85)), url(<?php the_field('breadcrumbs_bg', 'option') ?>) center center no-repeat;
      background-size: cover;
   }
</style>
<!-- Page Header End -->