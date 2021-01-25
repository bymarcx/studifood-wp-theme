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

<!-- LOOP? index-->

<?php get_template_part('template-parts/stage/stage') ?>

<?php get_template_part('template-parts/content/filter') ?>

<?php $the_query = new WP_Query(array(
    'post_type' => 'recipes',
    'posts_per_page' => '2',
    'orderby' => 'rand',
));
?>
<section>
    <?php

    while ($the_query->have_posts()) : $the_query->the_post(); ?>


        <!-- <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('_customtheme-single-post', array('class' => 'single-post-image')); ?>
                            <?php endif; ?>

        <h1><?php the_title(); ?></h1> -->


        <?php get_template_part('template-parts/content/recipe-loop') ?>


    <?php endwhile;
    ?>

</section>

<!-- HTML content ends! -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>