<section class="testinomial-section pad-tb">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 v-center">
            <div class="common-heading text-l">
               <span><?php echo $options ['service_section_subtitle']; ?></span>
               <h2 class="mb0"><?php echo $options ['service_section_title']; ?></h2>
            </div>
         </div>
         <div class="col-lg-8">
            <div class="row">
                <?php 
                $serviceItems = new WP_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' => '-1',
                ));
                $i = 0;
                if ($serviceItems->have_posts()) : while ($serviceItems->have_posts()) : $serviceItems->the_post(); ?>

                     <div class="col-md-4"> 
                        <ul class="list-ul ul-circle">
                           <li><a class="text-dark" href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></li>
                        </ul>
                     </div>
                     
                <?php endwhile; else : ?>        
                <?php endif;  wp_reset_query(); ?> 
            </div>

         </div>
      </div>
   </div>
</section>