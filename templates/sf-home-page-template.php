<?php

/**
 * Template Name: StudiFood :: Home
 *
 * (C) BYMARC
 *
 */
?>

<?php get_header(); ?>

    <!-- HTML content starts! -->

    <?php get_template_part('template-parts/stage/stage-home') ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif; ?>

                </div>
            </div>
        </div>

    <!-- HTML content ends! -->

<?php get_footer(); ?>