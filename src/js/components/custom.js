/*
 * Place your custom JavaScript in here!
 *
 * (C) BYMARC
 *
 */

//First get jquery, then popper, then bootstrap

import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'popper.js'
import 'bootstrap';

import 'slick-carousel';


$(document).ready(function () {

    // INIT SLIDER HEADER
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 1500,
        fade: false,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [{
            breakpoint: 576,
            settings: {
                arrows: false
            }
        }]
    });

});

console.log('custom')
console.log('hallo')

//Nav on scroll
$(window).scroll(function() {

    if ($(document).scrollTop() > 50) {
        $("#headerbar").addClass("fixed");
    }
    else {
        $("#headerbar").removeClass("fixed");
    }


});