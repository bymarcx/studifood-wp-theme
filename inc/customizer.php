<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 */

function bymarc_customize_register( $wp_customize ) {

// FOOTER OPTIONS

$wp_customize->add_section( 'footer_options', array(
    'title'          => __( 'Footer', 'bymarc' ),
    'description' => __( 'Footer anpassen', 'bymarc' ),
    'priority' => 50,
) );

$wp_customize->add_setting(
    'footer_copy_setting',
    array(
        'default' => 'StudiFood izz da!',
    )
);

$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'footer_copy_control',
    array(
        'label'      => __( 'Copyright Text', 'textdomain' ),
        'settings'   => 'footer_copy_setting',
        'priority'   => 10,
        'section'    => 'footer_options',
        'type'       => 'text',
    )
));




}
add_action( 'customize_register', 'bymarc_customize_register' );