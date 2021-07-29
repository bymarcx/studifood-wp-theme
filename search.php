<?php
/**
 * The template for displaying the search page.
 *
 * (C) BYMARC
 *
 */
?>

<?php get_header(); ?>

<!-- HTML content starts! -->

<?php get_template_part( 'template-parts/stage/stage-archive')?>

<?php get_template_part( 'template-parts/content/filter')?>

<?php
// the query
$wpb_all_query = new WP_Query(array('post_type' => 'recipes', 'post_status' => 'publish', 'posts_per_page' => -1)); ?>

<?php if ($wpb_all_query->have_posts()) : ?>

    <ul>

        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <?php get_template_part( 'template-parts/content/recipe-loop')?>

        <?php endwhile; ?>

    </ul>

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<!-- HTML content ends! -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>