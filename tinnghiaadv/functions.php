<?php
######## BLOCK CODE NAY LUON O TREN VA KHONG DUOC XOA ##########################
include 'includes/config.php';
include 'libs/HttpFoundation/Request.php';
include 'libs/HttpFoundation/Response.php';
include 'libs/HttpFoundation/Session.php';
include 'libs/custom.php';
include 'libs/common-scripts.php';
include 'libs/meta-box.php';
include 'libs/theme_functions.php';
include 'libs/theme_settings.php';
######## END: BLOCK CODE NAY LUON O TREN VA KHONG DUOC XOA ##########################
include 'includes/custom-user.php';;
include 'includes/widgets/ads.php';
include 'includes/project.php';
include 'includes/service.php';
include 'includes/slider.php';
include 'includes/brand.php';
include 'includes/feedback.php';
if (is_admin()) {
    include 'libs/ppofeedback.php';
//    add_action('admin_menu', 'custom_remove_menu_pages');
    add_action('admin_menu', 'remove_menu_editor', 102);
}

/**
 * Remove admin menu
 */
function custom_remove_menu_pages() {
    remove_menu_page('edit-comments.php');
}

function remove_menu_editor() {
    remove_submenu_page('themes.php', 'theme-editor.php');
}

/* ----------------------------------------------------------------------------------- */
# Setup Theme
/* ----------------------------------------------------------------------------------- */
if (!function_exists("ppo_theme_setup")) {

    function ppo_theme_setup() {
        ## Enable Links Manager (WP 3.5 or higher)
        add_filter('pre_option_link_manager_enabled', '__return_true');

        ## Post Thumbnails
        if (function_exists('add_theme_support')) {
            add_theme_support('post-thumbnails');
             ## Post formats
            add_theme_support( 'post-formats', array('video' ) );
        }
        /* if (function_exists('add_image_size')) {
          add_image_size('thumbnail176', 176, 176, FALSE);
          } */

        ## Register menu location
        register_nav_menus(array(
            'primary' => 'Primary Location',
            'footermenu' => 'Footer Menu',
        ));
    }

}
/* ---------------------------------------------------
  Register Sidebars
  ---------------------------------------------------- */
if (function_exists('register_sidebar')){
    register_sidebar(array(
        'name' => __('footer', 'ppotext'),
        'id' => 'footersidebar',
        'description' => __('Footer Sidebar Widget Area', 'ppotext'),
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action('after_setup_theme', 'ppo_theme_setup');
/* ----------------------------------------------------------------------------------- */
# Widgets init
/* ----------------------------------------------------------------------------------- */
if (!function_exists("ppo_widgets_init")) {

    // Register Sidebar
    function ppo_widgets_init() {
        register_sidebar(array(
            'id' => __('sidebar'),
            'name' => __('Sidebar'),
            'before_widget' => '<div id="%1$s" class="widget-container widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }

    // Register widgets
    register_widget('Ads_Widget');
}

add_action('widgets_init', 'ppo_widgets_init');

/* ----------------------------------------------------------------------------------- */
# Unset size of post thumbnails
/* ----------------------------------------------------------------------------------- */

function ppo_filter_image_sizes($sizes) {
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'ppo_filter_image_sizes');
/* ----------------------------------------------------------------------------------- */
# User login
/* ----------------------------------------------------------------------------------- */
add_action('init', 'redirect_after_logout');

function redirect_after_logout() {
    if (preg_match('#(wp-login.php)?(loggedout=true)#', $_SERVER['REQUEST_URI']))
        wp_redirect(get_option('siteurl'));
}

//PPO Feed all post type

function ppo_feed_request($qv) {
    if (isset($qv['feed']))
        $qv['post_type'] = get_post_types();
    return $qv;
}

add_filter('request', 'ppo_feed_request');

function get_attachment_id_from_src($image_src) {
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;
}

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !current_user_can('editor') && !is_admin()) {
        show_admin_bar(false);
    }
}