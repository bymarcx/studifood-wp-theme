<?php

/**
 * The template part for displaying the breadcrumbs
 *
 * (C) BYMARC
 *
 */
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
                ?>
            </div>
        </div>
    </div>
</section>