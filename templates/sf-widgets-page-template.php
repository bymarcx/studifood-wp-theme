<?php

/**
 * Template Name: StudiFood :: Widgets only
 *
 * (C) BYMARC
 *
 */
?>

<?php get_header(); ?>

<!-- HTML content starts! -->

<?php get_template_part('template-parts/stage/stage-home') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
        <?php if ( is_active_sidebar( 'home' ) ): ?>
            <?php dynamic_sidebar( 'home' ); ?>
        <?php endif; ?>
        </div>
    </div>
</div>

<!-- HTML content ends! -->

<?php get_footer(); ?>