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

<!-- LOOP? page-->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('template-parts/stage/stage-page') ?>

        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="content">
                            <?php the_content(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>

<?php endwhile;
endif; ?>



<!-- HTML content ends! -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>