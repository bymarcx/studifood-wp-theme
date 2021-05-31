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

<section>
  <div class="container head">
    <div class="row">
      <div class="col-12">
        <?php get_template_part('template-parts/content/filter') ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/content/ownrecipe') ?>

<!-- HTML content ends! -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>