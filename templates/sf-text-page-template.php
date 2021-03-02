<?php

/**
 * Template Name: StudiFood :: Text only
 *
 * (C) BYMARC
 *
 */
?>

<?php get_header(); ?>

    <!-- HTML content starts! -->

    <section class="template-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><a href="#main" class=" "><?php the_title(); ?></a></h1>
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- HTML content ends! -->

<?php get_footer(); ?>