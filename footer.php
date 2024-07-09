<!-- Footer Start -->
<footer class="container-fluid bg-secondary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
   <div class="container py-5">
      <div class="row g-5">
         <div class="col-lg-4 col-md-6">
            <h4 class="text-uppercase mb-4"><?php the_field('footer_get-in-touch-title', 'option') ?></h4>
            <?php
            if (have_rows('footer_get-in-touch-repeater', 'option')) :
               while (have_rows('footer_get-in-touch-repeater', 'option')) : the_row();
            ?>
                  <div class="d-flex align-items-center mb-2">
                     <div class="btn-square bg-dark flex-shrink-0 me-3">
                        <span class="fa <?php the_sub_field('icon', 'option') ?> text-primary"></span>
                     </div>
                     <?php
                     if (get_sub_field('is-address', 'option')) {
                     ?>
                        <span><?php the_sub_field('address', 'option') ?></span>
                     <?php } else { ?>
                        <span><a href="<?php echo get_sub_field('link', 'option')['url'] ?>"><?php echo get_sub_field('link', 'option')['title'] ?></a></span>
                     <?php } ?>
                  </div>
            <?php
               endwhile;
            else :
               echo 'ERROR! Fields not found...';
            endif;
            ?>
         </div>
         <div class="col-lg-4 col-md-6">
            <h4 class="text-uppercase mb-4"><?php the_field('footer_menu-title', 'option') ?></h4>
            <?php
            wp_nav_menu([
               'theme_location'  => 'footer',
               'container'       => '',
               'depth'           => 0,
            ]);
            ?>
         </div>
         <div class="col-lg-4 col-md-6">
            <h4 class="text-uppercase mb-4"><?php the_field('footer_newsletter-title', 'option') ?></h4>
            <div class="position-relative mb-4">
               <?php
               echo do_shortcode('[contact-form-7 id="61f07b0" title="Footer Newsletter"]');
               ?>
            </div>
            <div class="d-flex pt-1 m-n1">
               <?php
               if (have_rows('footer_socials-repeater', 'option')) :
                  while (have_rows('footer_socials-repeater', 'option')) : the_row();
               ?>
                     <a class="btn btn-lg-square btn-dark text-primary m-1" href="<?php the_sub_field('link', 'option') ?>"><i class="fab <?php the_sub_field('icon', 'option') ?>"></i></a>
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
   <div class="container">
      <div class="copyright">
         <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
               &copy; <a class="border-bottom" href="/"><?php the_field('header_logo-text', 'option') ?></a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
               <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
               Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- Footer End -->

<!-- Back to Top Start -->
<a class="btn btn-primary btn-lg-square btn-scroll-to-top" tabindex="0"><i class="bi bi-arrow-up"></i></a>
<script>
   const btnScrollToTop = document.querySelector(".btn-scroll-to-top");

   window.addEventListener("scroll", () => {
      if (window.pageYOffset > 100) {
         btnScrollToTop.classList.add("btn-scroll-to-top-show");
      } else {
         btnScrollToTop.classList.remove("btn-scroll-to-top-show");
      }
   })

   btnScrollToTop.addEventListener('click', (e) => {
      window.scrollTo(0, 0);
   });
</script>
<!-- Back to Top End -->

<?php wp_footer(); ?>

</body>

</html>