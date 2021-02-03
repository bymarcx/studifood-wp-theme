<?php

/**
 * The template for displaying the content.
 *
 * (C) BYMARC
 *
 */
?>

<?php get_header(); ?>

<!-- HTML content starts! -->

<!-- LOOP? single-->


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



        <section class="stage">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <?php get_template_part('template-parts/stage/headerbar') ?>

                        <div class="image">

                            <?php if (is_home()) { ?>
                                <?php
                                $page_for_posts = get_option('page_for_posts');
                                echo get_the_post_thumbnail($page_for_posts, 'large');
                                ?>
                            <?php }


                            // Get the recipes inside the current post.
                            $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

                            // Access the first recipe, if there is one.
                            if (isset($recipes[0])) {
                                $recipe_id = $recipes[0];
                                $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);

                                // Output the recipe name.
                            ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php

                                            echo ("<h1>" . $recipe->name() . "</h1>");
                                            ?>
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


                    </div>
                </div>
            </div>
            </div>
        </section>





        <section class="recipes">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="comments">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>

<?php endwhile;
endif; ?>



<!-- HTML content ends! -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>