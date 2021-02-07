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

<!-- LOOP? archive-->


<?php get_template_part('template-parts/stage/stage-archive') ?>

<?php get_template_part('template-parts/content/filter') ?>

<section>
    <?php
    // the query
    $wpb_all_query = new WP_Query(array('post_type' => 'recipes', 'post_status' => 'publish')); ?>

    <div class="container head">
        <div class="row">
            <div class="col-12">

                <?php
                if ($wp_query->post_count == 1) {
                ?> <h3> <?php echo ($wp_query->post_count); ?> Rezept gefunden </h3> <?php
                                                                                        } else if ($wp_query->post_count > 1) {
                                                                                            ?> <h3> <?php echo ($wp_query->post_count); ?> Rezepte gefunden </h3> <?php
                                                                                            } else {
                                                                                                ?> <h3 style="margin-bottom:100px;"> Keine Rezepte gefunden, such weiter! </h3> <?php
                                                                                                    }
                                                                                                        ?>

            </div>
        </div>
    </div>


    <?php if ($wpb_all_query->have_posts()) : ?>

        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <?php get_template_part('template-parts/content/recipe-loop') ?>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    <!-- HTML content ends! -->

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>