<?php

/**
 * The template part for displaying the "Own Recipe Block" inline.
 *
 * (C) BYMARC
 *
 */
?>

<section class="widget_ownRecipewidget wp-block-studifood-ownrecipe content" data-aos="fade">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1 offset-0 col-12 col--1">
        <h2 class="studifood-ownRecipetitle">
          <?php echo get_theme_mod('ownrecipeblock_title_setting'); ?>

        </h2>
        <p class="studifood-ownRecipetext">
          <?php echo get_theme_mod('ownrecipeblock_text_setting'); ?>
        </p>
        <a class="studifood-ownRecipeButton studifood-ownRecipelink btn btn-secondary" href="<?php echo get_permalink(get_theme_mod('ownrecipeblock_btn-select_setting')); ?>" class="">
          <?php echo get_theme_mod('ownrecipeblock_btn-text_setting'); ?>
        </a>
      </div>
    </div>
  </div>
</section>