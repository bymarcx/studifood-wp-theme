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

import AOS from 'aos';
// import Rellax from 'rellax';

AOS.init({
  duration: 800, // values from 0 to 3000, with step 50ms
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 200, // the delay on throttle used while scrolling the page (advanced)
  mirror: true, // whether elements should animate out while scrolling past them
});

var rellax = new Rellax('.rellax');

//if website loaded show content
$(document).ready(function(){
	$(window).on("load", function() {
		$("body").addClass("loaded");
	});
 });


$(document).ready(function () {

    // INIT SLIDER HEADER
    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 1500,
        fade: true,
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


    // INIT SLIDER CONTENT
    $('.sf-slider-wrapper').slick({
        dots: true,
        infinite: true,
        speed: 1500,
        arrows: true,
        autoplay: true,
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 3,
        centerMode: true,
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

// NAV BUTTON TOGGLE
$('.nav-btn').click(function() {
	$('.nav').toggleClass('active');
	$(this).toggleClass('active');
});


//Nav on scroll
$(window).scroll(function() {

    if ($(document).scrollTop() > 50) {
        $("#headerbar").addClass("fixed");
    }
    else {
        $("#headerbar").removeClass("fixed");
    }


});

// MOBILE NAVBAR
// When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;

  if (currentScrollPos <= (5)) {
    document.getElementById("headerbar").style.top = "0";
    $("#headerbar").removeClass("fixed");

  }
  else {
    document.getElementById("headerbar").style.top = "-150px";

    $("#headerbar").addClass("fixed");

    if (prevScrollpos > currentScrollPos) {
      document.getElementById("headerbar").style.top = "0";
    } else {
      document.getElementById("headerbar").style.top = "-150px";
    }
    prevScrollpos = currentScrollPos;

  }
}
