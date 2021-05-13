<section class="stage slide">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="image">
                    <div class="slider">

                        <?php if (is_home()) { ?>
                            <?php
                            $page_for_posts = get_option('page_for_posts');
                            echo get_the_post_thumbnail($page_for_posts, 'large');
                            ?>
                        <?php }

                        // the query
                        $the_query = new WP_Query(array(
                            'post_type' => 'recipes',
                            'posts_per_page' => '5',
                            'orderby' => 'rand',
                        ));

                        while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                            <div class="slider_page">

                                <!-- <a href=" <?php the_permalink(); ?> "> -->

                                <?php
                                // Get the recipes inside the current post.
                                $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

                                // Access the first recipe, if there is one.
                                if (isset($recipes[0])) {
                                    $recipe_id = $recipes[0];
                                    $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);
                                    // Output the recipe name.
                                ?><a href="<?php the_permalink(); ?>" class="btn btn-primary" >Rezept ansehen</a><?php

                                                                                                                ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="headline">
                                                    <h1><?php bloginfo('description'); ?></h1>
                                                    <?php
                                                    echo ("<p><span>" . $recipe->name() . "</span></p>");
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php

                                    echo ("<div class=\"img_overlay\"></div>");
                                    echo $recipe->image(1920, 1080);
                                }
                                ?>

                                <!-- </a> -->


                            </div>

                        <?php
                        endwhile;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>