<?php

// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register our styles
 *
 * @return void
 */
add_action( 'wp_enqueue_scripts', 'category_posts_widget_styles' );

function category_posts_widget_styles() {
	//wp_register_style( 'category-posts', plugins_url( 'category-posts/cat-posts.css' ) );
	wp_register_style( 'category-posts', get_template_directory_uri().( '/func/widget-element/category-posts/cat-posts.css' ) );
	wp_enqueue_style( 'category-posts' );
}

/**
 * Register thumbnail sizes.
 *
 * @return void
 */
function category_posts_add_image_size(){
	$sizes = get_option('mkrdip_cat_post_thumb_sizes');
	
	if ( $sizes ){
		foreach ( $sizes as $id=>$size ) {
			add_image_size( 'cat_post_thumb_size' . $id, $size[0], $size[1], true );
		}
	}
}

add_action( 'init', 'category_posts_add_image_size' );


/**
 * Category Posts Widget Class
 *
 * Shows the single category posts with some configurable options
 */
class CategoryPosts extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'cat-post-widget', 'description' => __('List single category posts'));
		parent::__construct('category-posts', __('Category Posts'), $widget_ops);
	}

	// Displays category posts widget on blog.
	function widget($args, $instance) {
		global $post;
		$post_old = $post; // Save the post object.

		extract( $args );

		$sizes = get_option('mkrdip_cat_post_thumb_sizes');
		
		// If not title, use the name of the category.
		if( !$instance["title"] ) {
			$category_info = get_category($instance["cat"]);
			$instance["title"] = $category_info->name;
		}

		$valid_sort_orders = array('date', 'title', 'comment_count', 'rand');
		if ( in_array($instance['sort_by'], $valid_sort_orders) ) {
			$sort_by = $instance['sort_by'];
			$sort_order = (bool) isset( $instance['asc_sort_order'] ) ? 'ASC' : 'DESC';
		} else {
			// by default, display latest first
			$sort_by = 'date';
			$sort_order = 'DESC';
		}
		
		// Exclude current post
		$current_post_id = get_the_ID();
		$exclude_current_post = (isset( $instance['exclude_current_post'] ) && $instance['exclude_current_post'] != -1) ? $current_post_id : "";		

		// Get array of post info.
		$args = array(
			'showposts' => $instance["num"],
			'cat' => $instance["cat"],
			'post__not_in' => array( $exclude_current_post ),
			'orderby' => $sort_by,
			'order' => $sort_order
		);
		
		if( isset( $instance['hideNoThumb'] ) ) {
			$args = array_merge( $args, array( 'meta_query' => array(
					array(
					 'key' => '_thumbnail_id',
					 'compare' => 'EXISTS' )
					)
				)	
			);
		}
		
		$cat_posts = new WP_Query( $args );
		
		if ( !isset ( $instance["hide_if_empty"] ) || $cat_posts->have_posts() ) {
			
			// Excerpt length filter
            if (!function_exists('category_post_excerpt_length'))   {
            function category_post_excerpt_length() {
                   return  $instance["excerpt_length"];
               }
            }

			//$new_excerpt_length = create_function('$length', "return " . $instance["excerpt_length"] . ";");

			if ( $instance["excerpt_length"] > 0 )
				//add_filter('excerpt_length', $new_excerpt_length);
				add_filter('excerpt_length', 'category_post_excerpt_length');		

			echo $before_widget;

			// Widget title
			if( !isset ( $instance["hide_title"] ) ) {
				echo $before_title;
				if( isset ( $instance["title_link"] ) ) {
					echo '<a href="' . get_category_link($instance["cat"]) . '">' . $instance["title"] . '</a>';
				} else {
					echo $instance["title"];
				}
				echo $after_title;
			}

			// Post list
			echo "<ul>\n";

			while ( $cat_posts->have_posts() )
			{
				$cat_posts->the_post(); ?>
				
				<li <?php if( !isset( $instance['disable_css'] ) ) {
						echo "class=\"cat-post-item";
							if ( is_single(get_the_title() ) ) { echo " cat-post-current"; }
						echo "\"";
					} ?> >
					
					<?php
					if( isset( $instance["thumbTop"] ) ) : 
						if ( function_exists('the_post_thumbnail') &&
								current_theme_supports("post-thumbnails") &&
								isset( $instance["thumb"] ) &&
								has_post_thumbnail() ) : ?>
							<a <?php if( !isset( $instance['disable_css'] ) ) { echo "class=\"cat-post-thumbnail\""; } ?>
								href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'cat_post_thumb_size'.$this->id ); ?>
							</a>
					<?php endif; 
					endif; ?>					
					
					<a class="post-title <?php if( !isset( $instance['disable_css'] ) ) { echo " cat-post-title"; } ?>" 
						href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?>
					</a>

					<?php if ( isset( $instance['date'] ) ) : ?>
						<?php if ( isset( $instance['date_format'] ) && strlen( trim( $instance['date_format'] ) ) > 0 ) { $date_format = $instance['date_format']; } else { $date_format = "j M Y"; } ?>
						<p class="post-date <?php if( !isset( $instance['disable_css'] ) ) { echo "cat-post-date"; } ?>">						
						<?php if( isset ( $instance["date_link"] ) ) { ?> <a href="<?php the_permalink(); ?>"><?php } ?>
							<?php the_time($date_format); ?>
						<?php if( isset ( $instance["date_link"] ) ) { echo "</a>"; } ?>
						</p>
					<?php endif;

					if( !isset( $instance["thumbTop"] ) ) : 
						if ( function_exists('the_post_thumbnail') &&
								current_theme_supports("post-thumbnails") &&
								isset( $instance["thumb"] ) &&
								has_post_thumbnail() ) : ?>
							<a <?php if( !isset( $instance['disable_css'] ) ) { echo "class=\"cat-post-thumbnail\""; } ?>
								href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'cat_post_thumb_size'.$this->id ); ?>
							</a>
					<?php endif;
					endif;

					if ( isset( $instance['excerpt'] ) ) : 
						the_excerpt();
					endif;
					
					if ( isset( $instance['comment_num'] ) ) : ?>
						<p class="comment-num <?php if( !isset( $instance['disable_css'] ) ) { echo "cat-post-comment-num"; } ?>">
							(<?php comments_number(); ?>)
						</p>
					<?php endif;					

					if ( isset( $instance['author'] ) ) : ?>
						<p class="post-author <?php if( !isset( $instance['disable_css'] ) ) { echo "cat-post-author"; } ?>">
							<?php the_author_posts_link(); ?>
						</p>
					<?php endif; ?>
				</li>
				<?php
			}

			echo "</ul>\n";

			// Footer link to category page
			if( isset ( $instance["footer_link"] ) ) {
				echo "<a";
					if( !isset( $instance['disable_css'] ) ) { echo " class=\"cat-post-footer-link\""; }
				echo " href=\"" . get_category_link($instance["cat"]) . "\">" . $instance["footer_link"] . "</a>";
			}

			echo $after_widget;

			//remove_filter('excerpt_length', $new_excerpt_length);
			remove_filter('excerpt_length', 'category_post_excerpt_length');	


			if (function_exists ('wp_reset_postdata')) //wp_reset_postdata only exists in WordPress >3.0.0
				wp_reset_postdata();
			
		} // END if
	} // END function

	/**
	 * Update the options
	 *
	 * @param  array $new_instance
	 * @param  array $old_instance
	 * @return array
	 */
	function update($new_instance, $old_instance) {
		
		// thumbnail size
		$sizes = get_option('mkrdip_cat_post_thumb_sizes');
		if ( !$sizes ) {
			$sizes = array();
		}
		$sizes[$this->id] = array($new_instance['thumb_w'], $new_instance['thumb_h']);
		update_option('mkrdip_cat_post_thumb_sizes', $sizes);
		
		return $new_instance;
	}

	/**
	 * The widget configuration form back end.
	 *
	 * @param  array $instance
	 * @return void
	 */
	function form($instance) {
		$instance = wp_parse_args( ( array ) $instance, array(
			'title'                => __( '' ),
			'hide_title'           => __( '' ),
			'cat'                  => __( '' ),
			'num'                  => __( '' ),
			'sort_by'              => __( '' ),
			'asc_sort_order'       => __( '' ),
			'exclude_current_post' => __( '' ),
			'title_link'           => __( '' ),
			'footer_link'          => __( '' ),
			'excerpt'              => __( '' ),
			'excerpt_length'       => __( '' ),
			'comment_num'          => __( '' ),
			'author'               => __( '' ),
			'date'                 => __( '' ),
			'date_link'            => __( '' ),
			'date_format'          => __( '' ),
			'thumb'                => __( '' ),
			'thumbTop'             => __( '' ),
			'hideNoThumb'          => __( '' ),
			'thumb_w'              => __( '' ),
			'thumb_h'              => __( '' ),
			'disable_css'          => __( '' ),
			'hide_if_empty'        => __( '' )
		) );

		$title                = $instance['title'];
		$hide_title           = $instance['hide_title'];
		$cat                  = $instance['cat'];
		$num                  = $instance['num'];
		$sort_by              = $instance['sort_by'];
		$asc_sort_order       = $instance['asc_sort_order'];
		$exclude_current_post = $instance['exclude_current_post'];
		$title_link           = $instance['title_link'];
		$footer_link          = $instance['footer_link'];
		$excerpt              = $instance['excerpt'];
		$excerpt_length       = $instance['excerpt_length'];
		$comment_num          = $instance['comment_num'];
		$author               = $instance['author'];
		$date                 = $instance['date'];
		$date_link            = $instance['date_link'];
		$date_format          = $instance['date_format'];
		$thumb                = $instance['thumb'];
		$thumbTop             = $instance['thumbTop'];
		$hideNoThumb          = $instance['hideNoThumb'];
		$thumb_w              = $instance['thumb_w'];
		$thumb_h              = $instance['thumb_h'];
		$disable_css          = $instance['disable_css'];
		$hide_if_empty        = $instance['hide_if_empty'];

		?>
		<p>
			<label for="<?php echo $this->get_field_id("title"); ?>">
				<?php _e( 'Title' ); ?>:
				<input class="widefat" style="width:80%;" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("title_link"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("title_link"); ?>" name="<?php echo $this->get_field_name("title_link"); ?>"<?php checked( (bool) $instance["title_link"], true ); ?> />
				<?php _e( 'Make widget title link' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("hide_title"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("hide_title"); ?>" name="<?php echo $this->get_field_name("hide_title"); ?>"<?php checked( (bool) $instance["hide_title"], true ); ?> />
				<?php _e( 'Hide title' ); ?>
			</label>
		</p>
		<p>
			<label>
				<?php _e( 'Category' ); ?>:
				<?php wp_dropdown_categories( array( 'hide_empty'=> 0, 'name' => $this->get_field_name("cat"), 'selected' => $instance["cat"] ) ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("num"); ?>">
				<?php _e('Number of posts to show'); ?>:
				<input style="text-align: center;" id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="text" value="<?php echo absint($instance["num"]); ?>" size='3' />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("sort_by"); ?>">
				<?php _e('Sort by'); ?>:
				<select id="<?php echo $this->get_field_id("sort_by"); ?>" name="<?php echo $this->get_field_name("sort_by"); ?>">
					<option value="date"<?php selected( $instance["sort_by"], "date" ); ?>>Date</option>
					<option value="title"<?php selected( $instance["sort_by"], "title" ); ?>>Title</option>
					<option value="comment_count"<?php selected( $instance["sort_by"], "comment_count" ); ?>>Number of comments</option>
					<option value="rand"<?php selected( $instance["sort_by"], "rand" ); ?>>Random</option>
				</select>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("asc_sort_order"); ?>">
				<input type="checkbox" class="checkbox" 
					id="<?php echo $this->get_field_id("asc_sort_order"); ?>" 
					name="<?php echo $this->get_field_name("asc_sort_order"); ?>"
					<?php checked( (bool) $instance["asc_sort_order"], true ); ?> />
						<?php _e( 'Reverse sort order (ascending)' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("exclude_current_post"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("exclude_current_post"); ?>" name="<?php echo $this->get_field_name("exclude_current_post"); ?>"<?php checked( (bool) $instance["exclude_current_post"], true ); ?> />
				<?php _e( 'Exclude current post' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("date"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>" name="<?php echo $this->get_field_name("date"); ?>"<?php checked( (bool) $instance["date"], true ); ?> />
				<?php _e( 'Show post date' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("date_format"); ?>">
				<?php _e( 'Date format:' ); ?>
			</label>
			<input class="text" placeholder="j M Y" id="<?php echo $this->get_field_id("date_format"); ?>" name="<?php echo $this->get_field_name("date_format"); ?>" type="text" value="<?php echo esc_attr($instance["date_format"]); ?>" size="8" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("date_link"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date_link"); ?>" name="<?php echo $this->get_field_name("date_link"); ?>"<?php checked( (bool) $instance["date_link"], true ); ?> />
				<?php _e( 'Make widget date link' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("excerpt"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("excerpt"); ?>" name="<?php echo $this->get_field_name("excerpt"); ?>"<?php checked( (bool) $instance["excerpt"], true ); ?> />
				<?php _e( 'Show post excerpt' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("excerpt_length"); ?>">
				<?php _e( 'Excerpt length (in words):' ); ?>
			</label>
			<input style="text-align: center;" type="text" id="<?php echo $this->get_field_id("excerpt_length"); ?>" name="<?php echo $this->get_field_name("excerpt_length"); ?>" value="<?php echo $instance["excerpt_length"]; ?>" size="3" />
		</p>
		<?php if ( function_exists('the_post_thumbnail') && current_theme_supports("post-thumbnails") ) : ?>
			<p>
				<label for="<?php echo $this->get_field_id("thumb"); ?>">
					<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("thumb"); ?>" name="<?php echo $this->get_field_name("thumb"); ?>"<?php checked( (bool) $instance["thumb"], true ); ?> />
					<?php _e( 'Show post thumbnail' ); ?>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id("thumbTop"); ?>">
					<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("thumbTop"); ?>" name="<?php echo $this->get_field_name("thumbTop"); ?>"<?php checked( (bool) $instance["thumbTop"], true ); ?> />
					<?php _e( 'Thumbnail to top' ); ?>
				</label>
			</p>
			<p>
				<label>
					<?php _e('Thumbnail dimensions (in pixels)'); ?>:<br />
					<label for="<?php echo $this->get_field_id("thumb_w"); ?>">
						Width: <input class="widefat" style="width:30%;" type="text" id="<?php echo $this->get_field_id("thumb_w"); ?>" name="<?php echo $this->get_field_name("thumb_w"); ?>" value="<?php echo $instance["thumb_w"]; ?>" />
					</label>
					
					<label for="<?php echo $this->get_field_id("thumb_h"); ?>">
						Height: <input class="widefat" style="width:30%;" type="text" id="<?php echo $this->get_field_id("thumb_h"); ?>" name="<?php echo $this->get_field_name("thumb_h"); ?>" value="<?php echo $instance["thumb_h"]; ?>" />
					</label>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id("hideNoThumb"); ?>">
					<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("hideNoThumb"); ?>" name="<?php echo $this->get_field_name("hideNoThumb"); ?>"<?php checked( (bool) $instance["hideNoThumb"], true ); ?> />
					<?php _e( 'Hide posts which have no thumbnail' ); ?>
				</label>
			</p>			
		<?php endif; ?>	
		<p>
			<label for="<?php echo $this->get_field_id("comment_num"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comment_num"); ?>" name="<?php echo $this->get_field_name("comment_num"); ?>"<?php checked( (bool) $instance["comment_num"], true ); ?> />
				<?php _e( 'Show number of comments' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("author"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("author"); ?>" name="<?php echo $this->get_field_name("author"); ?>"<?php checked( (bool) $instance["author"], true ); ?> />
				<?php _e( 'Show post author' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("footer_link"); ?>">
				<?php _e( 'Footer link text' ); ?>:
				<input class="widefat" style="width:60%;" placeholder="... more by this topic" id="<?php echo $this->get_field_id("footer_link"); ?>" name="<?php echo $this->get_field_name("footer_link"); ?>" type="text" value="<?php echo esc_attr($instance["footer_link"]); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("disable_css"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_css"); ?>" name="<?php echo $this->get_field_name("disable_css"); ?>"<?php checked( (bool) $instance["disable_css"], true ); ?> />
				<?php _e( 'Disable widget CSS' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("hide_if_empty"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("hide_if_empty"); ?>" name="<?php echo $this->get_field_name("hide_if_empty"); ?>"<?php checked( (bool) $instance["hide_if_empty"], true ); ?> />
				<?php _e( 'Hide if empty' ); ?>
			</label>
		</p>
		<?php
	}
}
//create_function('', 'return register_widget("CategoryPosts");')

function widget_register_category_post() {
	return register_widget("CategoryPosts");
}

add_action( 'widgets_init',  'widget_register_category_post');

