<?php

/**
 * Template part for displaying the stage
 *
 * (C) BYMARC
 * 
 */
?>

<div class="container all-recipe-card" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="800">
    <div class="row">

        <?php  // Get the recipes inside the current post.
        $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

        // Access the first recipe, if there is one.
        if (isset($recipes[0])) {
            $recipe_id = $recipes[0];
            $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);

        ?>
            <div class="col-md-6 col--1">

                <a href="<?php get_post_permalink(the_permalink()) ?>">
                    <h4>
                        <?php
                        echo $recipe->name();
                        ?>
                    </h4>
                </a>

                <div class="recipe-icons">
                    <?php
                    if ($recipe->total_time()) : ?>
                        <div class="wprm-recipe-meta-container wprm-color-accent2 wprm-recipe-total-time-container">
                            <span class="wprm-recipe-details-name wprm-recipe-total-time-name timer-ico"> <?php echo $recipe->total_time_formatted(); ?></span>
                        </div>
                    <?php endif; // Total time. 

                    if ($recipe->video()) : ?>
                        <div class="wprm-recipe-meta-container wprm-color-accent2">
                            <span class="wprm-recipe-details-name video-ico">Video</span>
                        </div>

                    <?php endif; // video. 
                    ?>
                    <?php
                    $taxonomy_names = wp_get_object_terms(get_the_ID(), 'mahlzeit',  array("fields" => "names"));
                    if (!empty($taxonomy_names)) :
                        foreach ($taxonomy_names as $tax_name) : ?>
                            <div class="wprm-recipe-meta-container wprm-color-accent2">
                                <span class="wprm-recipe-details-name mahlzeit-ico"><?php echo $tax_name; ?> </span>
                            </div>
                    <?php endforeach;
                    endif;
                    ?>
                    <?php
                    $taxonomy_names = wp_get_object_terms(get_the_ID(), 'aufwand',  array("fields" => "names"));
                    if (!empty($taxonomy_names)) :
                        foreach ($taxonomy_names as $tax_name) : ?>
                            <div class="wprm-recipe-meta-container wprm-color-accent2">
                                <span class="wprm-recipe-details-name aufwand-ico"><?php echo $tax_name; ?> </span>
                            </div>
                    <?php endforeach;
                    endif;
                    ?>

                </div>

                <div class="text">
                    <?php echo  substr($recipe->notes(50), 0, 200); ?>
                    <?php echo  substr(the_excerpt(), 0, 200); ?>
                </div>
                <?php


                ?>
                <a class="btn btn-recipe" href="<?php get_post_permalink(the_permalink()) ?> ">
                    Zum Rezept
                </a>



            </div>
            <div class="col-md-6 col--2">
                <?php
                echo $recipe->image(600, 600);

                ?>
            </div>
        <?php
        } ?>

    </div>
</div>