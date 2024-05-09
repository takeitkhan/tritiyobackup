<section class="work-category pad-tb tilt3d">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 v-center">
            <div class="common-heading text-l">
               <span><?php echo $options ['third_section_subtitle']; ?></span>
               <h2><?php echo $options ['third_section_title']; ?></h2>
               <p><?php echo $options ['third_section_desc']; ?></p>
            </div>
         </div>
         <div class="col-lg-8">
            <div class="work-card-set">
            <?php 
             $industriesItems = new WP_Query(array(
                'post_type' => 'industries',
                'posts_per_page' => '-1',
            ));
			$i = 1;
		
            if ($industriesItems->have_posts()) : while ($industriesItems->have_posts()) : $industriesItems->the_post(); ?>
                    <div class="icon-set wow fadeIn" data-wow-delay="<?php echo the_field('industries_wow_delay_time');?>s">
                        <div class="work-card cd<?php echo $i;?>" style="background: <?php the_field('industries_color');?>">
                          <a href="<?php the_permalink();?>">
                              <div class="icon-bg"><img src="<?php the_post_thumbnail_url();?>" alt="Industries" /></div>
                              <p><?php echo get_the_title(); ?></p>
                          </a>
                        </div>
                </div>
              <?php $i++;?>
               
            <?php endwhile; else : ?>        
             <?php endif;  wp_reset_query(); ?>    
               
            </div>
         </div>
      </div>
   </div>
</section>