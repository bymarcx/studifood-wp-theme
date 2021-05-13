<?php

/**
 * Template part for displaying the stage
 *
 * (C) BYMARC
 * 
 */
?>

<section class="stage small">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="image">

                    <div class="img_overlay"></div>
                        <?php
                        echo the_post_thumbnail('large');

                        ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1> <?php the_title(); ?> </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/content/breadcrumb') ?>