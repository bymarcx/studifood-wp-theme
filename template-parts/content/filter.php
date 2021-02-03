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
                <div class="searchbar">
                    <?php echo do_shortcode('[searchandfilter fields="search" types="select"]'); ?>
                </div>
                <div class="filterbar">
                    <?php echo do_shortcode('[searchandfilter fields="wprm_test_tax,mahlzeit,zutat" types="select"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>