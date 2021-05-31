<?php
/**
 * Contains functions for the custom filter and searchbar!
 *
 *
 */

add_action('wp_ajax_myfilter', 'sf_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'sf_filter_function');

function sf_filter_function()
{
    $args = array(
        'post_type' => 'wprm_recipe',
        'orderby' => 'date', // we will sort posts by date
        'order'    => $_POST['date'], // ASC or DESC
        'post_status' => 'publish'

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
        's'    => $_POST['keyword'], // ASC or DESC
        'post_status' => 'publish'
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
