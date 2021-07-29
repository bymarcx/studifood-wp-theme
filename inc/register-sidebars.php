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
        'name' => __('Footer Left', '_customtheme'),
        'id' => 'footerleft-sidebar-area',
        'description' => __('Footer Left :: Menu', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Right', '_customtheme'),
        'id' => 'footerright-sidebar-area',
        'description' => __('Footer Right :: Kontakt', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Bottom Left', '_customtheme'),
        'id' => 'footerbottom-sidebar-area',
        'description' => __('Footer Bottom Left :: Hochschule ', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Bottom Right', '_customtheme'),
        'id' => 'footerbottom2-sidebar-area',
        'description' => __('Footer Bottom Right :: Sponsors', '_customtheme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

}
add_action('widgets_init', '_customtheme_widgets_init');