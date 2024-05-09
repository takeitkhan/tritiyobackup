<?php
function aftertheme_default_functions() {
    
    // Add Title Tag   
    add_theme_support ('title-tag');
	
	//add_theme_support (title-tag);
	add_theme_support ('post-thumbnails');
    add_theme_support( 'html5', array( 'gallery', 'caption' ) );
    add_post_type_support( 'page', 'excerpt' );
		
	//excerpt
	function excerpt($limit){
		$content = preg_replace("/<img(.*?)>/si", "", get_the_content());
		//$post_content = explode(" " , get_the_content());
		$post_content = explode(" " , $content);
		$less_content = array_slice ($post_content, 0, $limit);
		echo implode (" ", $less_content);
	}	
	function tnews_custom_excerpt_length( $length ) {
    return 20;
    }
    add_filter( 'excerpt_length', 'tnews_custom_excerpt_length', 999 );
}
add_action('after_setup_theme' , 'aftertheme_default_functions');

//Load framework
include_once get_template_directory(). '/framework/init.php';
include_once get_template_directory(). '/framework/options.php';

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/metafields/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/metafields/' );
// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

//Acf 
include_once get_template_directory(). '/func/acf.php';

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return true;
}


//Load Nav Menu
include_once get_template_directory(). '/func/nav-walker.php';
register_nav_menus( array(
	'primary' => __( 'Primary Menu', '' ),
    'footer_1' => __( 'Footer Menu 1', '' ),
    'footer_2' => __( 'Footer Menu 2', '' ),
) );

include_once get_template_directory(). '/func/enqueue.php';


//Load Home Slider
include_once get_template_directory(). '/func/post_type_slider.php';

//Load Industries
include_once get_template_directory(). '/func/post_type_industries.php';

//Load Service
include_once get_template_directory(). '/func/post_type_services.php';

//Load Clients
include_once get_template_directory(). '/func/post_type_clients.php';




//Load Register Sidebar
include_once get_template_directory(). '/func/widget.php';





//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);




//Load paginition

include get_template_directory(). '/func/paginition.php';




function techtage_subpage_fix() {
if(is_paged()) echo '<meta name="robots" content="noindex,follow"/>';}
add_action('wp_head', 'techtage_subpage_fix');

// Skip Imgur Image from Photon
function htdat_photon_exception_for_domain ( $val, $src, $tag ) {
        $parse = parse_url( $src ); 
        $img_domain = $parse[ 'host' ]; 

        // specify the domain you want to exclude here. Note: www and non-www are different
        if ( $img_domain == 'i.imgur.com' ) { 
                return true;
        }

        return $val;
}
add_filter( 'jetpack_photon_skip_image', 'htdat_photon_exception_for_domain', 10, 3 );

// Good Quality Photon Image
add_filter('jetpack_photon_pre_args', 'jetpackme_custom_photon_compression' );
function jetpackme_custom_photon_compression( $args ) {
    $args['quality'] = 95;
    $args['strip'] = 'all';
    return $args;
}

// Default GD Library
function wpb_image_editor_default_to_gd( $editors ) {
$gd_editor = 'WP_Image_Editor_GD';
$editors = array_diff( $editors, array( $gd_editor ) );
array_unshift( $editors, $gd_editor );
return $editors;
}
add_filter( 'wp_image_editors', 'wpb_image_editor_default_to_gd' );


// Shortcode by Samrat

function page_content_handler( $atts ) {
	$a = shortcode_atts( array(
      'page_id' => NULL
    ), $atts );
   	
  
  	$id= $a['page_id']; 
    $post = get_post($id); 
    $content = apply_filters('the_content', $post->post_content); 
    
  	echo $content;
}

add_shortcode( 'get_page_content', 'page_content_handler' );

?>