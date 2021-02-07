<?php
/**
 *
 * theme functions
 *
 * (C) BYMARC
 *
 */

/** Theme Setup */
if (!function_exists('_customtheme_setup')):
    function _customtheme_setup()
    {
        /** Wordpress will manage our page title */
        add_theme_support( 'title-tag' );

        /** Add support for post images */
        add_theme_support('post-thumbnails');

        /** Add support for YOAST-SEO Breadcrumb nav */
        add_theme_support( 'yoast-seo-breadcrumbs' );

        /** add images sizes  */
        set_post_thumbnail_size(250, 9999, false);
        add_image_size('_customtheme-single-post', 800, 9999);
        add_image_size('_customtheme-fullhd', 1920, 9999);

        /** Add support for custom logo */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
                // 'header-text' => array( 'site-title', 'site-description' ),
            )
        );

    }
endif;
add_action('after_setup_theme', '_customtheme_setup');


/** Init scripts and styles */
function _customtheme_loadmyscript() {
    /** Load style */
    wp_enqueue_style('theme_style', get_template_directory_uri() . '/dist/css/bundle.css', '', '1.0.0', 'all');

    /** Load script */
    wp_deregister_script('jquery');
    wp_enqueue_script('theme_script', get_template_directory_uri() . '/dist/js/bundle.js', '', '1.0.0', true);
}
add_action('wp_enqueue_scripts', '_customtheme_loadmyscript');


/** Init admin styles and scripts */
function _customtheme_admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/dist/css/admin.css');

    wp_enqueue_script('admin_script', get_template_directory_uri() . '/dist/js/admin.js', '', '');
}
add_action('admin_enqueue_scripts', '_customtheme_admin_style');
add_action('login_enqueue_scripts', '_customtheme_admin_style');

/** Register Menus */
if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
        'primary' => __('Main-Navigation'),
        'meta' => __('Meta-Navigation'),
    ));
}

/** Replace Menu Class */
function _customtheme_add_menuclass($ulclass) {
    return preg_replace('/<a/', '<a class="nav_single"', $ulclass, 6);
}
add_filter('wp_nav_menu', '_customtheme_add_menuclass');

/** Init sidebar and widgets */
function _customtheme_widgets_init() {
    register_sidebar(array(
        'name' => __('FooterLeft', '_customtheme'),
        'id' => 'footerleft-sidebar-area',
        'description' => __('Footer Left', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('FooterRight', '_customtheme'),
        'id' => 'footerright-sidebar-area',
        'description' => __('Footer Right', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('FooterBottom', '_customtheme'),
        'id' => 'footerbottom-sidebar-area',
        'description' => __('Footer Bottom :: Images', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Startseite', '_customtheme'),
        'id' => 'home',
        'description' => __('Starseite', '_customtheme'),
        'before_widget' => '<section class="section %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

}
add_action('widgets_init', '_customtheme_widgets_init');

/** Add support for own block styles */
function _customtheme_gutenberg_scripts() {
    wp_enqueue_script(
        '_customtheme-editor',
        get_stylesheet_directory_uri() . '/dist/js/admin.js',
        array( 'wp-blocks', 'wp-dom' ),
        filemtime( get_stylesheet_directory() . '/dist/js/admin.js' ),
        true
    );
}
add_action( 'enqueue_block_editor_assets', '_customtheme_gutenberg_scripts' );

/** register sidebar / widget area */

require get_template_directory() . '/inc/widgets/AboutUs.php';
require get_template_directory() . '/inc/widgets/FeaturedRecipes.php';

function register_widgets(){
    register_widget('AboutUsWidget');
    register_widget('FeaturedRecipesWidget');
}
add_action('widgets_init', 'register_widgets');


/** Add custom login page */
require get_template_directory() . '/inc/include-login-styles.php';

/** Include Customizer */
require get_template_directory() . '/inc/customizer.php';


/** Register a slider block. **/
add_filter( 'render_block', 'GutenGallery' , 10, 2 );

  function GutenGallery( $block_content, $block )
  {
    if ( 'core/gallery' !== $block['blockName'] || ! isset( $block['attrs']['ids'] ) )
    {
      return $block_content;
    }

    $li = '';

    foreach( (array) $block['attrs']['ids'] as $id ) {
        $li .= sprintf( '<div class="sf-slider-element">%s</div>', wp_get_attachment_image( $id, 'large' ) );
    }
	  
    return sprintf( '<div class="sf-slider-wrapper">%s</div>', $li );

  }

/** Remove Website field from comment-form **/
add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}

// *** FLUSH REWRITE RULES FOR CHANGING CPT SLUG ***//
// flush_rewrite_rules();