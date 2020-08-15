<?php
/** Tell WordPress to run _customtheme_setup() when the 'after_setup_theme' hook is run. */

/** Theme Setup */
if (!function_exists('_customtheme_setup')):
    function _customtheme_setup()
    {
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(250, 9999, false);
        add_image_size('_customtheme-single-post', 800, 9999);
        add_image_size('_customtheme-fullhd', 1920, 9999);
    }
endif;
add_action('after_setup_theme', '_customtheme_setup');
/** ------------------- */

/** Init my scripts */
function _customtheme_loadmyscript() {
    // Load style
    wp_enqueue_style('theme_style', get_template_directory_uri() . '/dist/css/bundle.css', '', '1.0.0', 'all');

    // Load script
    wp_deregister_script('jquery');
    wp_enqueue_script('theme_script', get_template_directory_uri() . 'dist/js/bundle.js', '', '1.0.0', true);
}
add_action('wp_enqueue_scripts', '_customtheme_loadmyscript');
/** ------------------- */

/** Admin styles and scripts */
function _customtheme_admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/dist/css/admin.css');

    wp_enqueue_script('admin_script', get_template_directory_uri() . '/dist/js/admin.js', '', '');
}
add_action('login_enqueue_scripts', '_customtheme_admin_style');
/** ------------------- */

/** Register Menus */
if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
        'primary' => __('Main-Navigation'),
        'meta' => __('Meta-Navigation'),
    ));
}
/** ------------------- */

/** Replace Menu Class */
function _customtheme_add_menuclass($ulclass) {
    return preg_replace('/<a/', '<a class="nav_single"', $ulclass, 6);
}
add_filter('wp_nav_menu', '_customtheme_add_menuclass');
/** ------------------- */

/** Init Widgets */
function _customtheme_widgets_init() {
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
//add_action('widgets_init', '_customtheme_widgets_init');
/** ------------------- */

/** Include customizer */
//require get_template_directory() . '/inc/customizer.php';
/** ------------------- */

/** Customize Login page */
function _customtheme_login_header_url( $login_header_url ) {
    return '/';;
}
add_filter( 'login_headerurl', '_customtheme_login_header_url' );

function _customtheme_login_footer() {
    echo '<p style="text-align: center; margin-top: 30px">&copy; 2020 '; bloginfo( 'name' ); echo '</a> | All rights reserved.</p>';
}
add_action( 'login_footer', '_customtheme_login_footer' );
/** ------------------- */