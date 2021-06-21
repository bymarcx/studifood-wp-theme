<?php

/**
 * The template for displaying the footer.
 *
 * (C) BYMARC
 *
 */
?>
</main>

<footer id="footer">

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
                    <?php dynamic_sidebar('footer Left'); ?>
                </div>
            </div>
            <div class="col--2 col-md-5 col-lg-4">
                <?php dynamic_sidebar('footer Right'); ?>
                <!-- <div><a href="https://bymarc.media"><strong>BYMARC</strong>.media</a></div> -->
            </div>
            <div class="col--3 col-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?php dynamic_sidebar('footer Bottom Right'); ?>
                    </div>

                    <div class="col-12 col-md-6">
                        <?php dynamic_sidebar('footer Bottom Left'); ?>
                    </div>
                </div>
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
</footer>

</div>

<?php wp_footer(); ?>

<script src="<?= get_stylesheet_directory_uri() ?>/vendor/jquery-easing.min.js"></script>

<!-- SEE YOU LATER ALLIGATOR! -->
</body>

</html>