<?php

/**
 * Template part for displaying the stage
 *
 * (C) BYMARC
 * 
 */
?>

<section class="stage small">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="image">

                    <?php get_template_part('template-parts/stage/headerbar') ?>

                    <div class="img_overlay"></div>
                        <?php
                        $page_for_posts = get_option('page_for_posts');
                        echo get_the_post_thumbnail($page_for_posts, 'large');


                        // Get the recipes inside the current post.
                        $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

                        // Access the first recipe, if there is one.
                        if (isset($recipes[0])) {
                            $recipe_id = $recipes[0];
                            $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);

                            $recipe->image();
                        }


                        ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-duration="800">Alle Rezepte</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/content/breadcrumb') ?>