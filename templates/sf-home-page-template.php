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
    <div class="row">
        <div class="col-12">
        <?php dynamic_sidebar('home'); ?>
        </div>
    </div>
</div>

<!-- HTML content ends! -->

<?php get_footer(); ?>