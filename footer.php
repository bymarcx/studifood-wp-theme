<?php
/**
 * The template for displaying the footer.
 *
 * (C) BYMARC
 *
 */
?>

<section id="footer">
    <div class="container container--1">
        <div class="row">
            <div class="col-12 col--0">
            <?php the_custom_logo(); ?>
            </div>
            <div class="col--1 col-md-7">
                <div class="inner">
                    <?php dynamic_sidebar('footerLeft'); ?>
                </div>
            </div>
            <div class="col--2 col-md-5">
                <?php dynamic_sidebar('footerRight'); ?>
                <a href="https://bymarc.media"><strong>BYMARC</strong>.media</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12  px-5 py-2">
            <p><?php echo get_theme_mod('footer_copy_setting', ''); ?></p>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

<!-- SEE YOU LATER ALLIGATOR! -->

</body>

</html>