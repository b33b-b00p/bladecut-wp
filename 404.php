<?php
get_header();
?>

<!-- Page Header Start -->
<?php if (get_field('add-breadcrumbs', 'option')) { ?>
   <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container text-center py-5">
         <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">404 Error</h1>
         <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center text-uppercase mb-0">
               <li class="breadcrumb-item text-primary active" aria-current="page">404</li>
            </ol>
         </nav>
      </div>
   </div>
   
   <style>
      .page-header {
         background: linear-gradient(rgba(0, 0, 0, .85), rgba(0, 0, 0, .85)), url(<?php the_field('breadcrumbs_bg', 'option') ?>) center center no-repeat;
         background-size: cover;
      }
   </style>
<?php } ?>
<!-- Page Header End -->

<!-- 404 Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
   <div class="container text-center">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
            <h1 class="display-1">404</h1>
            <h1 class="mb-4">Page Not Found</h1>
            <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
            <a class="btn btn-primary py-3 px-5" href="/">Go Back To Home</a>
         </div>
      </div>
   </div>
</div>
<!-- 404 End -->
<?php
get_footer();
