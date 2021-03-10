<?php

/**
 * The template for displaying the footer.
 *
 * (C) BYMARC
 *
 */
?>

<section id="footer">

    <a href="#top" class="page-scroll">
        <div class="totop">
            <span>NACH OBEN</span>
        </div>
    </a>

    <div class="container container--1">
        <div class="row">
            <div class="col-12 col--0">
                <?php the_custom_logo(); ?>
            </div>
            <div class="col--1 col-md-7 col-lg-8">
                <div class="inner">
                    <?php dynamic_sidebar('footerLeft'); ?>
                </div>
            </div>
            <div class="col--2 col-md-5 col-lg-4">
                <?php dynamic_sidebar('footerRight'); ?>
                <!-- <div><a href="https://bymarc.media"><strong>BYMARC</strong>.media</a></div> -->
            </div>
            <div class="col--3 col-12">
                <?php dynamic_sidebar('footerBottom'); ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 footer-copy">
                <p><?php echo get_theme_mod('footer_copy_setting', ''); ?></p>
            </div>
        </div>
    </div>
</section>


<?php wp_footer(); ?>

<script src="<?= get_stylesheet_directory_uri() ?>/vendor/chosen.jquery.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/vendor/jquery-easing.min.js"></script>

<script>
    // jQuery and WebPack is just crap
    $(".filter-select").chosen({
        allow_single_deselect: true,
        disable_search_threshold: 10
    });

    // $(document).ready(function() {
    //     $(".animatelink").click(function(e) {
    //         e.preventDefault();
    //         $link = $(this).attr("href");
    //         $(".overlayclick").animate({
    //             height: '100%',
    //             opacity: 1
    //         }, 500, function() {
    //             window.location = $link;
    //         });
    //     });

    //     $(".animatemenu").click(function(e) {
    //         e.preventDefault();
    //         $link = $(this).attr('href');
    //         $(".overlaymenu").hide().fadeIn(250, function() {
    //             window.location = $link;
    //         });
    //     });
    // });

    // //get all internal links
    // var siteURL = "https://" + top.location.host.toString();
    // var $internalLinks = $("a[href^='" + siteURL + "'], a[href^='/'], a[href^='./'], a[href^='../']").addClass('animatelink');

</script>

<!-- SEE YOU LATER ALLIGATOR! -->
</body>

</html>