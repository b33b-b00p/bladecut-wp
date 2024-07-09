<!-- Price Start -->
<div class="container-xxl py-5">
   <div class="container">
      <div class="row g-0">
         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
               <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto"><?php the_field('pricing_subtitle', 'option') ?></p>
               <h1 class="text-uppercase mb-4"><?php the_field('pricing_title', 'option') ?></h1>
               <div>
                  <?php
                  // задаем нужные нам критерии выборки данных из БД
                  $args = array(
                     'post_type' => 'service',
                  );

                  $query = new WP_Query($args);

                  // Цикл
                  if ($query->have_posts()) {
                     while ($query->have_posts()) {
                        $query->the_post(); ?>
                        <div class="d-flex justify-content-between border-bottom py-2">
                           <h6 class="text-uppercase mb-0"><?php the_title(); ?></h6>
                           <span class="text-uppercase text-primary">$<?php the_field('service_price') ?></span>
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
         <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="h-100">
               <img class="img-fluid h-100" src="<?php the_field('pricing_img', 'option') ?>" alt="">
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Price End -->