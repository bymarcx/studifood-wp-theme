/*
 * Place your custom JavaScript in here!
 *
 * (C) BYMARC
 *
 */
// import Highway from '@dogstudio/highway';
// import { TimelineMax, TweenMax, Power4, Power3, Power2, Power1 } from 'gsap';


import $ from 'jquery';
window.jQuery = $;
window.$ = $;
jQuery = $;

import validate from 'jquery-validation'

import 'popper.js'
import 'bootstrap';
import 'slick-carousel';
import AOS from 'aos';

// import CustomRenderer from './customRenderer';
// import Fade from './fade';

// import gsap from 'gsap';
// import { ScrollTrigger } from 'gsap/ScrollTrigger';

// gsap.registerPlugin(ScrollTrigger);


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
  duration: 1800,
  debounceDelay: 0,
  throttleDelay: 0,
  mirror: false,
});

//if website loaded show content
$(document).ready(function () {

  // LOADING FADE ANIMATIONS
  setTimeout(function () {
    $("body").addClass("animate");
  }, 10);

});

var $internalLinks = $("a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#'], a:not(.page.scroll)");

$internalLinks = $internalLinks.not(function () {
  return $(this).attr('href').match(/\.(pdf|mp3|jpg|jpeg|etc)$/i);
});

$(document).ready(function () {
  $($internalLinks).click(function (e) {
    console.log("its an internal link, my friend")
    e.preventDefault();
    var link = $(this).attr("href");
    $("body").animate({ opacity: '0' }, 150, function () {
      window.location = link;
    });
  });

});


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


// NAVBAR
// When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {

  // run progressBar
  if (window.innerWidth >= 768) {
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
$(function () {
  $('a.page-scroll').bind('click', function (event) {
    var $anchor = $(this);
    console.log("scrolling", top);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top - 150
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });
});


// Make wordpress btns to bootstrap btns
var btn = document.querySelector(".is-style-sf-btn-sec a");
$(btn).addClass("btn btn-secondary");


// WP COMMENTFORM VALIDATION

(function ($) {
  ('use strict');

  function webshapedValidateCommentForm() {
    $('#commentform').validate({
      rules: {
        author: {
          required: true,
          minlength: 2,
        },
        email: {
          required: true,
          email: true,
        },
        comment: {
          required: true,
          minlength: 20,
        },
        datenschutz: {
          required: true,
        },
      },

      messages: {
        author: {
          required: 'Bitte trage Deinen Namen ein.',
          minlength: jQuery.validator.format(
            'Es sind {0} Zeichen erforderlich!'
          ),
        },
        email: {
          required: 'Bitte trage Deine E-Mail-Adresse ein.',
          email:
            'Deine E-Mail-Adresse sollte folgendes Format haben: name@adresse.com',
        },
        comment: {
          required: 'Bitte schreibe einen Kommentar.',
          minlength: jQuery.validator.format(
            'Es sind {0} Zeichen erforderlich!'
          ),
        },
        datenschutz:
          'Laut DSGVO benötige wir deine Einwilligung zur Erhebung deiner hier getätigten Daten.',
      },

      errorClass: 'invalid alert alert-error',
      validClass: 'valid is-valid was-validated form-control:valid',

      success: function (label) {
        console.log("remove", label);
        $(label).removeClass('invalid alert alert-warning');
      },

      highlight: function (element, errorClass) {
        $(element).addClass('is-invalid was-validated form-control:invalid');
      },

      errorElement: 'div',
      errorPlacement: function (error, element) {
        element.after(error);
      },
    });
  }
  $(document).ready(webshapedValidateCommentForm);
})(jQuery);
