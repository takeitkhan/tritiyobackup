<?php get_header(); ?>
<?php while(have_posts()) : the_post(); ?>

<section class="breadcrumb-area banner-2 text-left" <?php if(get_field('header_image')) {?> style="padding: 50px 50px;  padding-bottom: 0px;" <?php } ?>>
   <div class="text-block">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 v-center">
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
           <div class="col-lg-6 v-center">
             <img src="<?php echo get_field('header_image');?>" class="img-fluid" />
           </div>
         </div>
      </div>
   </div>
</section>


<section class="service pad-tb">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 block-1">
            <div class="common-heading text-l pr25">
              <?php the_content(); ?>
            </div>
         </div>
      </div>
   </div>
</section>


<?php endwhile; ?>

<?php get_footer(); ?>