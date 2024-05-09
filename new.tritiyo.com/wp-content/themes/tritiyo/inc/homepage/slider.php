<section class="hero-section hero-bg-bg1 bg-gradient">
   <div class="text-block">
      <div class="container" style="max-width: 83%;">
          <?php 
            $slideritems = new WP_Query(array(
                'post_type' => 'slider',
                'posts_per_page' => '-1',
            ));
            if ($slideritems->have_posts()) : while ($slideritems->have_posts()) : $slideritems->the_post(); ?>
         <div class="row">
            <div class="col-lg-5 v-center">
               <div class="header-heading">
                  <h1 class="wow fadeInUp" data-wow-delay=".2s"><?php echo get_field('slider_custom_title'); ?></h1>
                  <p class="wow fadeInUp" data-wow-delay=".4s">
                      <?php echo get_the_content();?>
                  </p>
                  <?php if(get_field('slider_button_url') && get_field('slider_button_label')){ ?>
                     <a  href="<?php the_field('slider_button_url');?>" class="btn-main bg-btn lnk wow fadeInUp" data-wow-delay=".6s"><?php the_field('slider_button_label');?> <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
                  <?php } ?>
               </div>
            </div>
            <div class="col-lg-7 v-center text-right">
               <div class="single-image wow fadeIn" data-wow-delay=".5s">
                  <img src="<?php the_post_thumbnail_url();?>" alt="<?php echo get_the_title(); ?>" class="img-fluid" />
               </div>
            </div>
         </div>
         <?php endwhile; else : ?>        
         <?php endif;  wp_reset_query(); ?> 
      </div>
   </div>
</section>