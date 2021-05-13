<?php

/**
 * The template for displaying the 404-page.
 *
 * BYMARC
 *
 */
?>

<?php get_header(); ?>

<section class="stage small">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="image">

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h1-recipe"><span>Error 404</span></h1>
                            </div>
                        </div>
                    </div>
                    <div class="img_overlay"></div>
                    <img src="<?= get_template_directory_uri() ?>/dist/img/footer_bg.jpg" />

                </div>



            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/content/breadcrumb') ?>

<section id="page404">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Upps, diese Seite existiert leider nicht.</h2>
                <p> Die gewünschte Seite konnte leider nicht gefunden werden. </p>
                <p>
                    <a href="/" class="btn btn-primary">zur Startseite!</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>