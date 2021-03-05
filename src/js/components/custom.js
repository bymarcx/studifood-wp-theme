/*
 * Place your custom JavaScript in here!
 *
 * (C) BYMARC
 *
 */

import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'popper.js'
import 'bootstrap';
import 'slick-carousel';
import AOS from 'aos';

// AJAX call for filter
jQuery(function ($) {

  // Filter call
  $('#filter').submit(function () {
    var filter = $('#filter');
    $.ajax({
      url: filter.attr('action'),
      data: filter.serialize(), // form data
      type: filter.attr('method'), // POST
      beforeSend: function (xhr) {
        filter.find('button').text('Suchen...'); // changing the button label
      },
      success: function (data) {
        filter.find('button').text('Suchen'); // changing the button label back
        $('#response').html(data); // insert data
      }
    });
    return false;
  });

  // Search call
  $('#search').submit(function () {
    var filter = $('#search');

    $.ajax({
      url: filter.attr('action'),
      data: filter.serialize(), // form data
      type: filter.attr('method'), // POST

      beforeSend: function (xhr) {
        filter.find('button').text('Suchen...'); // changing the button label
      },
      success: function (data) {
        filter.find('button').text('Suchen'); // changing the button label back
        $('#response').html(data); // insert data
      }
    });
    return false;
  });

});

// Init AnimateOnScroll
AOS.init({
  duration: 1800, // values from 0 to 3000, with step 50ms
  debounceDelay: 0, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 0, // the delay on throttle used while scrolling the page (advanced)
  mirror: false, // whether elements should animate out while scrolling past them
});

//if website loaded show content
window.onload = (event) => {
  $("body").addClass("loaded");
}


// ***
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
    autoplay: false,
    slidesToShow: 3,
    variableWidth: true,
    infinite: true,
    slidesToScroll: 3,
    centerMode: true,
    autoplaySpeed: 5000,
    responsive: [{
      breakpoint: 576,
      settings: {
        arrows: true
      }
    }]
  });

});

// NAV BUTTON TOGGLE
$('.nav-btn').click(function () {
  $('.nav').toggleClass('active');
  $(this).toggleClass('active');
});

//Nav on scroll
$(window).scroll(function () {
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

  // run progressBar
  if(window.innerWidth >= 768) {
    progressBar();
  }
  else {
    document.getElementById("scroll-bar").style.width = 0 + "%";
  }
  

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

// Scroll bar function
function progressBar() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("scroll-bar").style.width = scrolled + "%";
}

console.log('*** custom.js loaded ***')


//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
  $('.page-scroll').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
          scrollTop: $($anchor.attr('href')).offset().top - 150
      }, 1500, 'easeInOutExpo');
      event.preventDefault();
  });
});

