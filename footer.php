<?php
/**
 * The template for displaying the footer.
 *
 * (C) BYMARC
 *
 */
?>

<section id="footer">

<a href="#top">
<div class="totop">
    <span>NACH OBEN</span>
</div>
</a>

    <div class="container container--1">
        <div class="row">
            <div class="col-12 col--0" data-aos="fade-right">
            <?php the_custom_logo(); ?>
            </div>
            <div class="col--1 col-md-7 col-lg-8" data-aos="fade-right">
                <div class="inner">
                    <?php dynamic_sidebar('footerLeft'); ?>
                </div>
            </div>
            <div class="col--2 col-md-5 col-lg-4" data-aos="fade-right" data-aos-delay="200">
                <?php dynamic_sidebar('footerRight'); ?>
                <!-- <div><a href="https://bymarc.media"><strong>BYMARC</strong>.media</a></div> -->
            </div>
            <div class="col--3 col-12" data-aos="fade-right">
            <?php dynamic_sidebar('footerBottom'); ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-2 px-2 px-sm-5" >
            <p><?php echo get_theme_mod('footer_copy_setting', ''); ?></p>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>
<script src="<?= get_stylesheet_directory_uri()?>/vendor/chosen.jquery.js"></script>
<script>
// jQuery and WebPack is just crap
$(".filter-select").chosen(
    {
        allow_single_deselect: true,
        disable_search_threshold: 10
    }
);
</script>

<!-- SEE YOU LATER ALLIGATOR! -->

</body>

</html>