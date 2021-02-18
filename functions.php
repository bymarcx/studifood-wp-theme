<?php

/**
 *
 * theme functions
 *
 * (C) BYMARC
 *
 */

/** Theme Setup */
if (!function_exists('_customtheme_setup')) :
    function _customtheme_setup()
    {
        /** Wordpress will manage our page title */
        add_theme_support('title-tag');

        /** Add support for post images */
        add_theme_support('post-thumbnails');

        /** Add support for YOAST-SEO Breadcrumb nav */
        add_theme_support('yoast-seo-breadcrumbs');

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
function _customtheme_loadmyscript()
{
    /** Load style */
    wp_enqueue_style('theme_style', get_template_directory_uri() . '/dist/css/bundle.css', '', '1.0.0', 'all');

    /** Load script */
    wp_deregister_script('jquery');
    wp_enqueue_script('theme_script', get_template_directory_uri() . '/dist/js/bundle.js', '', '1.0.0', true);
}
add_action('wp_enqueue_scripts', '_customtheme_loadmyscript');


/** Init admin styles and scripts */
function _customtheme_admin_style()
{
    wp_enqueue_style('admin-styles', get_template_directory_uri() . '/dist/css/admin.css');

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
function _customtheme_add_menuclass($ulclass)
{
    return preg_replace('/<a/', '<a class="nav_single"', $ulclass, 6);
}
add_filter('wp_nav_menu', '_customtheme_add_menuclass');

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
function _customtheme_gutenberg_scripts()
{
    wp_enqueue_script(
        '_customtheme-editor',
        get_stylesheet_directory_uri() . '/dist/js/admin.js',
        array('wp-blocks', 'wp-dom'),
        filemtime(get_stylesheet_directory() . '/dist/js/admin.js'),
        true
    );
}
add_action('enqueue_block_editor_assets', '_customtheme_gutenberg_scripts');

/** register sidebar / widget area */

require get_template_directory() . '/inc/widgets/AboutUs.php';
require get_template_directory() . '/inc/widgets/FeaturedRecipes.php';

function register_widgets()
{
    register_widget('AboutUsWidget');
    register_widget('FeaturedRecipesWidget');
}
add_action('widgets_init', 'register_widgets');


/** Add custom login page */
require get_template_directory() . '/inc/include-login-styles.php';

/** Include Customizer */
require get_template_directory() . '/inc/customizer.php';


/** Register a slider block. **/
add_filter('render_block', 'GutenGallery', 10, 2);

function GutenGallery($block_content, $block)
{
    if ('core/gallery' !== $block['blockName'] || !isset($block['attrs']['ids'])) {
        return $block_content;
    }

    $li = '';

    foreach ((array) $block['attrs']['ids'] as $id) {
        $li .= sprintf('<div class="sf-slider-element">%s</div>', wp_get_attachment_image($id, 'large'));
    }

    return sprintf('<div class="sf-slider-wrapper">%s</div>', $li);
}

/** Remove Website field from comment-form **/
add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields)
{
    if (isset($fields['url']))
        unset($fields['url']);
    return $fields;
}

// *** FLUSH REWRITE RULES FOR CHANGING CPT SLUG ***//
// flush_rewrite_rules();


/*** SHORTCODE :: For post taxes ***/
function tags_function($atts = array())
{
    $atts = array_change_key_case((array) $atts, CASE_LOWER);

    $termsSecteur = wp_get_object_terms(get_the_ID(), $atts['tax']);
    if ($termsSecteur != null) {
        foreach ($termsSecteur as $termsSecteur) {
            $termsSecteur_link = get_term_link($termsSecteur, $atts['tax']);
            $return .= sprintf('<a class="tag-secteur" href="%1$s">%2$s</a>', $termsSecteur_link, $termsSecteur->name);
            unset($termsSecteur);
        }
    }
    return $return;
}
add_shortcode('list_tags', 'tags_function');










add_action('wp_ajax_myfilter', 'sf_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'sf_filter_function');

function sf_filter_function()
{
    $args = array(
        'post_type' => 'wprm_recipe',
        'orderby' => 'date', // we will sort posts by date
        'order'    => $_POST['date'] // ASC or DESC

    );

    // for taxonomies / categories
    if (isset($_POST['categoryfiltercourse']))
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'wprm_course',
                'field' => 'id',
                'terms' => $_POST['categoryfiltercourse']
            )
        );

    if (isset($_POST['categoryfilteringredient']))
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'wprm_ingredient',
                'field' => 'id',
                'terms' =>  $_POST['categoryfilteringredient']
            )
        );

    if (isset($_POST['categoryfilterequipment']))
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'wprm_equipment',
                'field' => 'id',
                'terms' => $_POST['categoryfilterequipment']
            )
        );
    if (isset($_POST['categoryfilterdifficulty']))
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'wprm_difficulty',
                'field' => 'id',
                'terms' => $_POST['categoryfilterdifficulty']
            )
        );

    if (isset($_POST['with_video']))
        $args['meta_query'][] = array(
            array(
                'key' => 'wprm_video_embed',
                'value' => '',
                'compare' => '!='
            )
        );

    // echo("<pre>");
    // echo print_r($args, true);
    // echo("</pre>");
    $tax_query = new WP_Query($args);


    if ($tax_query->post_count == 1) {
?>
        <h3> <?php echo ($tax_query->post_count); ?> Rezept gefunden </h3>
    <?php
    } else if ($tax_query->post_count > 1) {
    ?>
        <h3> <?php echo ($tax_query->post_count); ?> Rezepte gefunden </h3>
    <?php
    } else {
    ?>
        <h3 style="margin-bottom:100px;"> Keine Rezepte gefunden, such weiter! </h3>
    <?php
    }


    $recipe = null;
    while ($tax_query->have_posts()) {
        $tax_query->the_post();
        // Get the recipes inside the current post.
        $post_id = get_the_ID();
        $recipe = WPRM_Recipe_Manager::get_recipe($post_id);
        // Access the first recipe, if there is one.
        if (isset($recipe)) {
            //echo 'result';
            //var_dump ($recipe);
            //echo $recipe->name();
            //echo $recipe->image();
            include(locate_template('./template-parts/content/recipe-loop.php', false, false));
            // get_template_part('template-parts/content/recipe-loop', $post_id); 
        }
        if (!isset($recipe)) {
            echo 'no result';
        }
        wp_reset_postdata();
    }


    // if( $query->have_posts() ) :
    // 	while( $query->have_posts() ) : 
    // 		echo '<h2>' . $query->post_title . '</h2>';
    //         $recipe = WPRM_Recipe_Manager::get_recipe( $query->post->post_id );
    //         // $parent_post = get_post( $recipe->parent_post_id() );
    //         // get_template_part('template-parts/content/recipe-loop'); 

    //         // $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);

    //         echo $recipe->image(600, 600);

    // 	endwhile;
    // 	wp_reset_postdata();
    // else :
    // 	echo 'No posts found';
    // endif;

    die();
}









add_action('wp_ajax_mysearch', 'sf_search_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_mysearch', 'sf_search_function');

function sf_search_function()
{
    $args = array(
        'post_type' => 'wprm_recipe',
        'orderby' => 'date', // we will sort posts by date
        's'    => $_POST['keyword'] // ASC or DESC

    );



    $tax_query = new WP_Query($args);


    if ($tax_query->post_count == 1) {
    ?>
        <h3> <?php echo ($tax_query->post_count); ?> Rezept gefunden </h3>
    <?php
    } else if ($tax_query->post_count > 1) {
    ?>
        <h3> <?php echo ($tax_query->post_count); ?> Rezepte gefunden </h3>
    <?php
    } else {
    ?>
        <h3 style="margin-bottom:100px;"> Keine Rezepte gefunden, such weiter! </h3>
<?php
    }


    $recipe = null;
    while ($tax_query->have_posts()) {
        $tax_query->the_post();
        // Get the recipes inside the current post.
        $post_id = get_the_ID();
        $recipe = WPRM_Recipe_Manager::get_recipe($post_id);
        // Access the first recipe, if there is one.
        if (isset($recipe)) {
            include(locate_template('./template-parts/content/recipe-loop.php', false, false));
        }
        if (!isset($recipe)) {
            echo 'no result';
        }
        wp_reset_postdata();
    }


    die();
}
