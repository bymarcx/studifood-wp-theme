<?php

/**
 * The template part for displaying the filter options.
 *
 * (C) BYMARC
 *
 */
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="searchbar " data-aos="fade-in" data-aos-easing="ease-in-sine" data-aos-duration="800" data-aos-delay="100">
                    <?php echo do_shortcode('[searchandfilter fields="search" types="select"]'); ?>
                </div>
                <div class="filterbar" data-aos="fade-in" data-aos-easing="ease-in-sine" data-aos-duration="800" data-aos-delay="100">
                    <?php echo do_shortcode('[searchandfilter fields="aufwand,zutat,utensil,mahlzeit," types="select" submit_label="Suchen"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>