<section class="our-office pad-tb" style="xbackground: linear-gradient(to bottom, #ffffff 50%, #e0f8fff2 100%);">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="common-heading">
               <h2>Blog</h2>
            </div>
         </div>
      </div>
      <div class="row justify-content-center upset shape-numm">
           <?php 
            $postItems = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => '4',
            ));
            if ($postItems->have_posts()) : while ($postItems->have_posts()) : $postItems->the_post(); ?>
            <div class="col-lg-4 mt60">
               <div class="single-blog-post- shdo">
                  <div class="single-blog-img-">
                     <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url();?>" alt="<?php echo get_the_title(); ?><?php echo get_the_title(); ?>" class="img-fluid"></a>
                     <div class="entry-blog-post dg-bg2">
                        <span class="bypost-">
                           <?php $category = get_the_category(); ?>
                           <a href="#"><i class="fas fa-tag"></i> 
                              <?php echo $category[0]->cat_name; ?>
                           </a>
                     </span>
                        <span class="posted-on-">
                           <a href="#"><i class="fas fa-clock"></i>
                              <?php echo get_the_date( 'M m  , Y' );?>
                           </a>
                        </span>
                     </div>
                  </div>
                  <div class="blog-content-tt">
                     <div class="single-blog-info-">
                        <h4><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h4>
                        <p><?php echo WP_trim_words(get_the_content(), '20');?></p>
                     </div>
                  </div>
               </div>
            </div>
         <?php endwhile; else : ?>        
        <?php endif;  wp_reset_query(); ?> 
      </div>
   </div>
</section>