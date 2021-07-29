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
        'default' => '(C) - All rights reserved!',
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


// OWN RECIPE BLOCK OPTIONS
$wp_customize->add_section( 'ownrecipeblock_options', array(
    'title'          => __( 'Own Recipe Block', 'bymarc' ),
    // 'description' => __( ' ', 'bymarc' ),
    'priority' => 60,
) );

$wp_customize->add_setting(
    'ownrecipeblock_title_setting',
    array(
        'default' => 'Headline',
    )
);

$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'ownrecipeblock_title_control',
    array(
        'label'      => __( 'Own Recipe Block :: Title', 'textdomain' ),
        'settings'   => 'ownrecipeblock_title_setting',
        'priority'   => 10,
        'section'    => 'ownrecipeblock_options',
        'type'       => 'text',
    )
));


$wp_customize->add_setting(
    'ownrecipeblock_text_setting',
    array(
        'default' => 'Content Text',
    )
);

$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'ownrecipeblock_text_control',
    array(
        'label'      => __( 'Own Reciple Block :: Text', 'textdomain' ),
        'settings'   => 'ownrecipeblock_text_setting',
        'priority'   => 20,
        'section'    => 'ownrecipeblock_options',
        'type'       => 'textarea',
    )
));

$wp_customize->add_setting(
    'ownrecipeblock_btn-text_setting',
    array(
        'default' => 'Button',
    )
);

$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'ownrecipeblock_btn-text_control',
    array(
        'label'      => __( 'Own Recipe Block :: Btn Text', 'textdomain' ),
        'settings'   => 'ownrecipeblock_btn-text_setting',
        'priority'   => 30,
        'section'    => 'ownrecipeblock_options',
        'type'       => 'text',
    )
));

$wp_customize->add_setting(
    'ownrecipeblock_btn-select_setting',
    array(
        'default' => 'Button',
    )
);

$wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'ownrecipeblock_btn-select_control',
    array(
        'label'      => __( 'Own Recipe Block :: Btn URL', 'textdomain' ),
        'settings'   => 'ownrecipeblock_btn-select_setting',
        'priority'   => 40,
        'section'    => 'ownrecipeblock_options',
        'type'       => 'dropdown-pages',
    )
));


}
add_action( 'customize_register', 'bymarc_customize_register' );