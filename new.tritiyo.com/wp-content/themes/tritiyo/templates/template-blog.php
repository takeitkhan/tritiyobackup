<?php 
/* 
   Template Name: Blog
*/
get_header();?>

<section class="breadcrumb-area banner-2">
   <div class="text-block">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 v-center">
               <div class="bread-inner">
                  <div class="bread-menu">
                     <ul>
                        <li><a href="<?php bloginfo('url');?>">Home</a></li>
                        <li><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></li>
                     </ul>
                  </div>
                  <div class="bread-title">
                     <h2><?php echo get_the_title(); ?></h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<section class="service pad-tb">
   <div class="container">
      <div class="row">
         <?php 
            $postItems = new WP_Query(array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => '-1', 
                'order'        =>  'DESC',
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



<?php get_footer();?>