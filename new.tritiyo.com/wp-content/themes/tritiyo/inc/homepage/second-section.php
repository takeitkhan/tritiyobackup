<?php $secondSectionPageID  = get_post($options['second_section_page_id']); ?>
<section class="about-agency pad-tb">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 v-center">
            <div class="image-block">
               <img src="<?php echo get_the_post_thumbnail_url( $secondSectionPageID, 'full' );?>" alt="" class="img-fluid no-shadow" />
            </div>
         </div>
         <div class="col-lg-6">
            <div class="common-heading text-l">
               <span><?php echo $options ['second_section_subtitle']; ?></span>
               <h2><?php echo $options ['second_section_title']; ?></h2>
               <p>
                  <?php echo  $secondSectionPageID->post_excerpt; ?>
               </p>
               <span class="mt30">
                  <a href="<?php echo get_page_link($secondSectionPageID); ?>" class="btn-outline">Read More</a>
               </span>
            </div>
         </div>
      </div>
   </div>
</section>