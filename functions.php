<?php
/** Tell WordPress to run bymarc_setup() when the 'after_setup_theme' hook is run. */

if (!function_exists('bymarc_setup')):
    function bymarc_setup()
    {
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(250, 9999, false);
        add_image_size('bymarc-single-post', 800, 9999);
    }
endif;
add_action('after_setup_theme', 'bymarc_setup');

// init my scripts
function loadmyscript() {
    // Load style
    wp_enqueue_style('theme_style', get_template_directory_uri() . '/dist/css/bundle.css', '', '1.0.0', 'all');
    //wp_enqueue_style('bootstrap', get_template_directory_uri() . '/style/bootstrap.min.css');

    // Load script
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', '', '', true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '', true);
   // wp_enqueue_script('bymarc', get_template_directory_uri() . '/js/bymarc.js', '', '', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '', true);

}

add_action('wp_enqueue_scripts', 'loadmyscript');

// register menus
if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
        'primary' => __('Hauptnavigation'),
        'meta' => __('Metanavigation'),
    ));
}

function add_menuclass($ulclass) {
    return preg_replace('/<a/', '<a class="nav_single"', $ulclass, 6);
}
add_filter('wp_nav_menu', 'add_menuclass');

// init widgets
function bymarc_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'BYMARC'),
        'id' => 'sidebar_area',
        'description' => __('Sidebar der Seite', 'BYMARC'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}
// add_action('widgets_init', 'bymarc_widgets_init');

// INCLUDE CUSTOMIZER
// require get_template_directory() . '/inc/customizer.php';
