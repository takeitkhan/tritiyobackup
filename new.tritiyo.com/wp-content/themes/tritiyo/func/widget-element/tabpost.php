<?php

class tritiyo_popular_post_tab_widget extends WP_Widget {

    public function __construct() {

    	parent::__construct('tritiyo_popular_post_tab_widget', 'Popular & Current Post Tab', array(
            'description' => 'Show Popular and Current day Post',
    	));
    }

    public function widget($args, $instance) {
    ?>
     <?php    
      global $options; 
      $options= get_option ('my_framework');
    ?>
        <div class="row mb-3">
            <div class="col-md-12 col-lg-12 col-sm-6 ">
                <div class="main-carrd-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php if($options['language-select'] == 'ver-bn') {?>  
                            <a class="nav-item nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">আজকের খবর</a>
                            <a class="nav-item nav-link" id="nav-two-tab" data-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">জনপ্রিয়</a>
                        <?php } else{ ?> 
                            <a class="nav-item nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Latest News</a>
                            <a class="nav-item nav-link" id="nav-two-tab" data-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Popular</a>
                        
                        <?php } ;?>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <ul>
                                <?php
                                    $day = date('j');
                                    query_posts('day='.$day);
                                    if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </li>
                               <?php endwhile; ?><?php endif; ?>

                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                            <ul>

                                 <?php 
                                  $popular_posts_args = new WP_Query (array(
                                     'posts_per_page' => 20,
                                     'meta_key' => 'nipun_post_views_count',
                                     'orderby' => 'meta_value_num',
                                     'order'=> 'DESC'
                                  ));                        
                                if($popular_posts_args->have_posts()) : while($popular_posts_args->have_posts()) : $popular_posts_args->the_post()?>
                                <li>
                                    <a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(), 5 );?></a>
                                </li>

                                <?php endwhile; else: ?>
                                  No Posts
                                <?php endif; wp_reset_query();?>
                                
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    	<?php
    } // end widget function


} // end Class

//call Function
function tritiyo_popular_post_tab_widget_func() {
	register_widget('tritiyo_popular_post_tab_widget');
}
add_action('widgets_init' , 'tritiyo_popular_post_tab_widget_func');

?>