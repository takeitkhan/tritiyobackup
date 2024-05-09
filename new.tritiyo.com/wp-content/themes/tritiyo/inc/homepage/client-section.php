<section class="clients-section pad-tb">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="common-heading">
               <span>Our happy customers</span>
               <h2>Some of our Clients</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="opl">
               <ul>
                  <?php 
                  $clientsItems = new WP_Query(array(
                     'post_type' => 'clients',
                     'posts_per_page' => '-1',
                  ));
                  if ($clientsItems->have_posts()) : while ($clientsItems->have_posts()) : $clientsItems->the_post(); ?>
                  <li class=" wow fadeIn" data-wow-delay="<?php echo the_field('clients_wow_delay_time');?>s">
                     <a href="<?php the_field('client_website_link');?>" target="_blank" title="<?php echo get_the_title(); ?>">
                        <div class="clients-logo"><img src="<?php the_post_thumbnail_url();?>" alt="text" class="img-fluid" /></div>
                     </a>
                  </li>
                  <?php endwhile; else : ?>        
                  <?php endif;  wp_reset_query(); ?> 
               </ul>
            </div>
         </div>
      </div>
      <div class="-cta-btn mt70">
         <div class="free-cta-title v-center wow zoomInDown" data-wow-delay="1.2s">
            <p>We <span>Promise.</span> We <span>Deliver.</span></p>
            <a href="#" class="btn-main bg-btn2 lnk">Let's Work Together<i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
         </div>
      </div>
   </div>
</section>