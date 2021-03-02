<?php

/**
 * The template for displaying the header.
 *
 * (C) BYMARC
 *
 */
?>
<html <?php language_attributes(); ?>>

<head>

    <!--
    ###############################################
    #                                             #
    #  (C) 2021 MARC EBERHARD                     #
    #  ALL RIGHTS RESERVED!                       #
    #                                             #
    #  Page: https://www.studifood.com            #
    #  Theme: custom-wp-theme :: 21               #
    #  Version: 1.0.0                             #
    #  E-Mail: contact@bymarc.de                  #
    #                                             #
    ###############################################
                                                -->

    <!-- META -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body id="top">
    
    <div class="overlaymenu"></div>
    <div class="overlayclick"></div>
    <div class="overlay"></div>

    <div class="scroll-bar-outer" id="scroll-bar-outer-id">
        <div id="scroll-bar"></div>
    </div>

    <nav class="nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => 'nav-buttons',
                    ));
                    ?>
                </div>
            </div>
        </div>
    </nav>