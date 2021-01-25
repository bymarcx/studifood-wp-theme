<?php
/**
 * The template for displaying the footer.
 *
 * (C) BYMARC
 *
 */
?>

<section id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col--1 col-md-7">
                <div class="inner">
                    <?php dynamic_sidebar('footerLeft'); ?>

                    <p><?php echo get_theme_mod('footer_copy_setting', ''); ?></p>
                </div>
            </div>
            <div class="col--2 col-md-5">

                <?php dynamic_sidebar('footerRight'); ?>

                <a href="https://bymarc.media"><strong>BYMARC</strong>.media</a>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

<!-- SEE YOU LATER ALLIGATOR! -->

</body>

</html>