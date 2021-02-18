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


        <section>
            <?php
            // Get the recipes inside the current post.
            $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

            // Access the first recipe, if there is one.
            if (isset($recipes[0])) {
                $recipe_id = $recipes[0];
                $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);

                if ($recipe->video()) : ?>
                    <div id="wprm-recipe-video-container-<?php echo $recipe->id(); ?>" class="wprm-recipe-video-container">
                        <?php echo do_shortcode($recipe->video()) ?>
                    </div>
            <?php endif; // Video. 
            }
            ?>
        </section>

        <?php get_template_part('template-parts/content/breadcrumb') ?>

        <section class="recipes">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="content " data-aos="fade-up">
                            <?php the_content(); ?>
                            <?php
                            //get the taxonomy terms of custom post type
                            $customTaxonomyTerms = wp_get_object_terms($post->ID, 'your_taxonomy', array('fields' => 'ids'));

                            //query arguments
                            $args = array(
                                'post_type' => 'recipes',
                                'post_status' => 'publish',
                                'posts_per_page' => 5,
                                'orderby' => 'rand',
                                'tax_query' => array(
                                    array(
                                        'field' => 'id',
                                    )
                                ),
                                'post__not_in' => array($post->ID),
                            );

                            //the query
                            $relatedPosts = new WP_Query($args);

                            //loop through query
                            if ($relatedPosts->have_posts()) {
                                echo '<ul>';
                                while ($relatedPosts->have_posts()) {
                                    $relatedPosts->the_post();
                            ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php
                                }
                                echo '</ul>';
                            } else {
                                //no posts found
                            }

                            //restore original post data
                            wp_reset_postdata();

                            ?>



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

        <section class="morerecipes">
            <div class="container">
                <div class="row">

                        <div class="col-12" data-aos="fade-right">
                            <h2>Weitere Rezepte</h2>
                        </div>

                        <?php
                        $related_query = new WP_Query(array(
                            'post_type' => 'recipes',
                            'category__in' => wp_get_post_categories(get_the_ID()),
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                        ));


                        while ($related_query->have_posts()) : $related_query->the_post();

                            echo ("<div class=\"col-lg-4  col-xxl-3 recipe-card\" data-aos=\"fade-up\">");
                            echo ("<a href=\" ");
                            the_permalink();
                            echo (" \">");
                            // Get the recipes inside the current post.
                            $recipes = WPRM_Recipe_Manager::get_recipe_ids_from_post();

                            // Access the first recipe, if there is one.
                            if (isset($recipes[0])) {
                                $recipe_id = $recipes[0];
                                $recipe = WPRM_Recipe_Manager::get_recipe($recipe_id);

                                // Output the recipe name.
                                echo ("<p>" . $recipe->name() . "</p>");
                                echo ("<div class=\"img_overlay\"></div>");
                                echo $recipe->image(1920, 1080);
                            }
                            echo("</div></a>");

                        endwhile;
                        ?>

                <?php

                ?>



                <div class=" col-md-12 col-lg-4 col-xxl-3 all-recipes" data-aos="fade-up">
                    <div class="all-recipes-inner">
                        <a href="/rezepte" class="btn btn-secondary">Alle Rezepte</a>
                    </div>

                </div>
            </div>
        </section>


<?php endwhile;
endif; ?>



<!-- HTML content ends! -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>