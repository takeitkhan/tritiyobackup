<?php
/* 
Template Name: App Single
*/

get_header();

?>
<?php while(have_posts()) : the_post(); ?>

<section class="" style="margin-top: 50px;">
   <div class="text-block">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 v-center">
              &nbsp;
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
              
              
                <div class="tabs">                 
                  <div data-tab="Overview" style="display: block;">
                    <?php do_shortcode('[get_page_content page_id="209"]'); ?>
                  </div>
                  <div data-tab="Features" style="display: none;">

                  </div>
                  <div data-tab="Who using this app?" style="display: none;">

                  </div>
                </div>
              	
            </div>
         </div>
      </div>
   </div>
</section>


<?php endwhile; ?>

<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.cardtabs.js"></script>
<script type='text/javascript'>  
  //$('.tabsholder1').cardTabs();
  //$('.tabsholder2').cardTabs({theme: 'inset'});
  jQuery(document).ready(function($) {
    $.noConflict();
  	$('.tabs').cardTabs({theme: 'inset'});
  });
  
  
  //$('.tabsholder4').cardTabs({theme: 'wiki'});
</script>

<style type="text/css">
  .tabs a {
    border-radius: 10px 10px 0px 0px !important;
    border: 1px dashed #dddddd;
    border-bottom: none;
    text-transform: unset;
    font-size: 15px;
    background: unset;
    padding: 0px 40px;
    font-family: 'Ubuntu', sans-serif !important;
  }
  .tabs a.active {
    border: 1px solid deepskyblue;
    border-bottom: none;
    text-transform: capitalize;
    font-size: 18px;
    background: linear-gradient(to right, #673ab7 0, #2196f3 100%);
    color: white;
    font-family: 'Ubuntu', sans-serif !important;
  }
  .card-tabs-bar.inset {
    text-align: center;
    margin-top: -70px;
    border-bottom: 1px solid #DDDDDD;
    height: 31px;
  }
</style>

<?php get_footer(); ?>