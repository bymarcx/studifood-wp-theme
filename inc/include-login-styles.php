<?php
/**
 * Customize Login page
 *
 *
 */

function _customtheme_login_header_url( $login_header_url ) {
    return '/';;
}
add_filter( 'login_headerurl', '_customtheme_login_header_url' );

function _customtheme_login_footer() {
    echo '<p style="text-align: center; margin-top: 30px">&copy; 2021 '; bloginfo( 'name' ); echo '</a> | All rights reserved.</p>';
}
add_action( 'login_footer', '_customtheme_login_footer' );

