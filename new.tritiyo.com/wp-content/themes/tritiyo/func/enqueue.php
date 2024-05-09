<?php

function enqueue_by_riptware_scripts() {


//css


wp_enqueue_style( 'bootstrap.min.css', get_template_directory_uri() . '/assets/css/bootstrap.min.css',false,'3.1','all');

wp_enqueue_style( 'plugin.css', get_template_directory_uri() . '/assets/css/plugin.min.css',false,'3.1','all');

wp_enqueue_style( 'style.css', get_template_directory_uri() . '/assets/css/style.css',false,rand('11','999'),'all');
wp_enqueue_style( 'responsive.css', get_template_directory_uri() . '/assets/css/responsive.css',false,rand('11','999'),'all');

wp_enqueue_style('font-awesome-5', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css", false, null);   
wp_enqueue_style('open-sans-font', "https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap", false, null);   

wp_enqueue_style('ubuntu-font', "https://fonts.googleapis.com/css2?family=Ubuntu&display=swap", false, null);   



// JS

wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/modernizr-3.5.0.min.js', array ( 'jquery' ), 1.5, true);

wp_enqueue_script( 'jquery-min-js', get_template_directory_uri() . '/assets/js/jquery.min.js', array ( 'jquery' ), 1.1, true);

wp_enqueue_script( 'bootstrap.min-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array ( 'jquery' ), 1.1, true);
wp_enqueue_script( 'plugin.min-js', get_template_directory_uri() . '/assets/js/plugin.min.js', array ( 'jquery' ), 1.1, true);
wp_enqueue_script( 'preloader-js', get_template_directory_uri() . '/assets/js/preloader.js', array ( 'jquery' ), 1.1, true);

wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array ( 'jquery' ), 1.1, true);

}
add_action( 'wp_enqueue_scripts', 'enqueue_by_riptware_scripts' );


// Admin css
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

//Disabe Default Emoji
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}


function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {

 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}

//

function dequeue_jquery_migrate($scripts){
    if(!is_admin() && !empty($scripts->registered['jquery'])){
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps=array_diff($jquery_dependencies,array('jquery-migrate'));
    }
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );



//Remove All Meta Generators
ini_set('output_buffering', 'on'); // turns on output_buffering
function remove_meta_generators($html) {
    $pattern = '/<meta name(.*)=(.*)"generator"(.*)>/i';
    $html = preg_replace($pattern, '', $html);
    return $html;
}
function clean_meta_generators($html) {
    ob_start('remove_meta_generators');
}
add_action('get_header', 'clean_meta_generators', 100);
add_action('wp_footer', function(){ ob_end_flush(); }, 100);


// Disable use XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

remove_action( 'wp_head',      'rest_output_link_wp_head' );


////Remove the REST API endpoint.
remove_action('rest_api_init', 'wp_oembed_register_route');
 
// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );
 
//Don't filter oEmbed results.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
 
//Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_discovery_links');
 
//Remove oEmbed JavaScript from the front-end and back-end.
remove_action('wp_head', 'wp_oembed_add_host_js');


remove_action ('wp_head', 'rsd_link');

remove_action( 'wp_head', 'wlwmanifest_link');

remove_action( 'wp_head', 'wp_shortlink_wp_head');

remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

remove_action( 'wp_head', 'feed_links', 2 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

remove_action('wp_head', 'rel_canonical');


remove_action('wp_head', 'wp_resource_hints', 2);