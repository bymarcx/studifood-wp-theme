<?php
/**
 * Register own sidebars
 *
 *
 */

 
/** Init sidebar and widgets */
function _customtheme_widgets_init()
{
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
        'name' => __('FooterBottomRight', '_customtheme'),
        'id' => 'footerbottom-sidebar-area',
        'description' => __('Footer Bottom :: Logos :: Left ', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('FooterBottomLeft', '_customtheme'),
        'id' => 'footerbottom2-sidebar-area',
        'description' => __('Footer Bottom :: Logos :: Right', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    // register_sidebar(array(
    //     'name' => __('Startseite', '_customtheme'),
    //     'id' => 'home',
    //     'description' => __('Starseite', '_customtheme'),
    //     'before_widget' => '<section class="section %2$s">',
    //     'after_widget' => '</section>',
    //     'before_title' => '<h3 class="widget-title">',
    //     'after_title' => '</h3>',
    // ));
}
add_action('widgets_init', '_customtheme_widgets_init');