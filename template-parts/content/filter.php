<?php

/**
 * The template part for displaying the filter options.
 *
 * (C) BYMARC
 *
 */
?>
<!-- <section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="searchbar " data-aos="fade-in" data-aos-easing="ease-in-sine" data-aos-duration="800" data-aos-delay="100">
                    <?php echo do_shortcode('[searchandfilter fields="search" types="select"]'); ?>
                </div>
                <div class="filterbar" data-aos="fade-in" data-aos-easing="ease-in-sine" data-aos-duration="800" data-aos-delay="100">
                    <?php echo do_shortcode('[searchandfilter fields="aufwand,zutat,utensil,mahlzeit," types="multiselect,multiselect,multiselect,multiselect" operators="OR" submit_label="Suchen"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section> -->
<div class="searchbar">
    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="search">
        <input type="text" name="keyword" id="keyword" placeholder="Suche..."></input>
        <button>Suchen</button>
        <input type="hidden" name="action" value="mysearch">
    </form>
</div>

<div class="filterbar">
    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
        <ul class="filterbarul">
            <li class="filterbarli">
                <?php
                if ($terms = get_terms(array('taxonomy' => 'wprm_course', 'orderby' => 'name'))) :

                    echo '<select data-placeholder="Mahlzeit" class="filter-select" name="categoryfiltercourse[]" multiple><option></option>';
                    foreach ($terms as $term) :
                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                    endforeach;
                    echo '</select>';
                endif;
                ?>
            </li>
            <li class="filterbarli">
                <?php
                if ($terms = get_terms(array('taxonomy' => 'wprm_ingredient', 'orderby' => 'name'))) :

                    echo '<select data-placeholder="Utensilien" class="filter-select" name="categoryfilteringredient[]" multiple><option></option>';
                    foreach ($terms as $term) :
                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                    endforeach;
                    echo '</select>';
                endif;
                ?>
            </li>
            <li class="filterbarli">
                <?php
                if ($terms = get_terms(array('taxonomy' => 'wprm_equipment', 'orderby' => 'name'))) :
                    echo '<select data-placeholder="Zutaten" class="filter-select" name="categoryfilterequipment[]" multiple><option></option>';
                    foreach ($terms as $term) :
                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                    endforeach;
                    echo '</select>';
                endif;
                ?>
            </li>
            <li class="filterbarli">
                <?php
                if ($terms = get_terms(array('taxonomy' => 'wprm_difficulty', 'orderby' => 'name'))) :

                    echo '<select data-placeholder="Schwierigkeit" class="filter-select" name="categoryfilterdifficulty[]" multiple><option></option>';
                    foreach ($terms as $term) :
                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                    endforeach;
                    echo '</select>';
                endif;
                ?>
            </li>
            <!-- <li class="filterbarli">
                <label>
                    <input type="checkbox" name="with_video" /> mit Video!
                </label>
            </li> -->
            <li class="filterbarli">
                <button>Suchen</button>
                <input type="hidden" name="action" value="myfilter">
            </li>
        </ul>
    </form>
</div>


<div id="response">
    <?php

    $args = array(
        'post_type' => 'wprm_recipe',
        'orderby' => 'date', // we will sort posts by date
        'order'    => 'ASC' // ASC or DESC

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

    ?>

</div>