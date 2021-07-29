<?php

/**
 * Template part for displaying a single recipe card
 *
 * (C) BYMARC
 * 
 */
?>

<div class="container all-recipe-card" data-aos="fade-up">
    <div class="row">
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


                $taxonomies = WPRM_Taxonomies::get_taxonomies();

                foreach ($taxonomies as $taxonomy => $options) :
                    $key = substr($taxonomy, 5);
                    $terms = $recipe->tags($key);

                    if (count($terms) > 0) : ?>
                        <div class="wprm-recipe-meta-container wprm-color-accent2 wprm-recipe-<?php echo $key; ?>-container">
                            <span class="wprm-recipe-<?php echo $key; ?>">
                                <?php foreach ($terms as $index => $term) {
                                    if (0 !== $index) {
                                        echo ', ';
                                    }
                                    echo $term->name;
                                } ?>
                            </span>
                        </div>
                    <?php endif; // Count.
                endforeach; // Taxonomies.



                if ($recipe->video()) : ?>
                    <div class="wprm-recipe-meta-container wprm-color-accent2">
                        <span class="wprm-recipe-details-name video-ico">Video</span>
                    </div>

                <?php endif; // video. 
                ?>

            </div>

            <div class="text">
                <?= substr($recipe->notes(), 0, 200); ?>
            </div>
            <?php


            ?>
            <a class="btn btn-recipe" href="<?php get_post_permalink(the_permalink()) ?> ">
                Zum Rezept
            </a>



        </div>
        <div class="col-md-6 col--2">

            <a href="<?php get_post_permalink(the_permalink()) ?>">
                <?= $recipe->image(600, 600); ?>
            </a>

        </div>
        <?php
        // } 
        ?>

    </div>
</div>