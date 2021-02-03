<?php

/**
 * Template part for displaying the stage
 *
 * (C) BYMARC
 * 
 */
?>

<div class="container all-recipe-card">
    <div class="row ">

        <?php  // Get the recipes inside the current post.
        $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

        // Access the first recipe, if there is one.
        if (isset($recipes[0])) {
            $recipe_id = $recipes[0];
            $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);

        ?>
            <div class="col-md-6">

                <a href="<?php get_post_permalink(the_permalink()) ?>">
                    <h4>
                        <?php
                        echo $recipe->name();
                        ?>
                    </h4>
                </a>
                <p>
                    <?php
                    if ( $recipe->prep_time() || $recipe->prep_time_zero() ) : ?>
                        <div class="wprm-recipe-prep-time-container">
                            <span class="wprm-recipe-details-name wprm-recipe-prep-time-name"><?php echo WPRM_Template_Helper::label( 'prep_time' ); ?>:</span> <?php echo $recipe->prep_time_formatted(); ?>
                        </div>
                    <?php endif; // Prep time. ?>
                    <?php if ( $recipe->cook_time() || $recipe->cook_time_zero() ) : ?>
                        <div class="wprm-recipe-cook-time-container">
                            <span class="wprm-recipe-details-name wprm-recipe-cook-time-name"><?php echo WPRM_Template_Helper::label( 'cook_time' ); ?>:</span> <?php echo $recipe->cook_time_formatted(); ?>
                        </div>
                    <?php endif; 

                    echo $recipe->notes();

                    ?>
                </p>
            </div>
            <div class="col-md-6">
                <?php
                echo $recipe->image(600, 600);

                ?>
            </div>
        <?php
        } ?>

    </div>
</div>