/*
 * Place your custom JavaScript in here!
 *
 * (C) BYMARC
 *
 */

import $ from 'jquery';
window.jQuery = $;
window.$ = $;
jQuery = $;

import 'jquery-validation';

import 'popper.js';
import 'bootstrap';
import 'slick-carousel';
import AOS from 'aos';

import select2 from 'select2';

$(document).ready(function() {
  $('.filter-select').select2();
});

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
        filter.find('.search').text('Suchen...'); // changing the button label
      },
      success: function (data) {
        filter.find('.search').text('Suchen'); // changing the button label back
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
  once: true,
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
var siteURL = "https://" + top.location.host.toString();
var $internalLinks = $("a[href^='" + siteURL + "'], a[href^='/'], a[href^='./'], a[href^='../'], a[href^='#']");

$internalLinks = $internalLinks.not(function () {
  return $(this).attr('href').match(/\.(pdf|mp3|jpg|jpeg|etc)$/i);
});


$(document).ready(function () {
  $($internalLinks).click(function (e) {
    // console.log("its an internal link, my friend")
    if ($(this).attr("target") != "_blank") {
      e.preventDefault();
      var link = $(this).attr("href");
      $("body").animate({ opacity: '0' }, 150, function () {
        window.location = link;
      });
    }
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
    autoplay: true,
    slidesToShow: 1,
    variableWidth: true,
    slidesToScroll: 1,
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




//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
  $('a.page-scroll').bind('click', function (event) {
    var $anchor = $(this);
    // console.log("scrolling", top);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top - 150
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });
});


// Make wordpress btns to bootstrap btns
var btn = document.querySelector(".is-style-sf-btn-sec a");
// console.log(btn);
$(btn).addClass("btn btn-secondary");


// WP COMMENTFORM VALIDATION
(function ($) {
  ('use strict');

  function SFValidateCommentForm() {
    $('#commentform').validate({
      rules: {
        author: {
          required: true,
          minlength: 3,
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
          minlength: 'Es sind min. 3 Zeichen erforderlich!',
        },
        email: {
          required: 'Bitte trage Deine E-Mail-Adresse ein.',
          email:
            'Deine E-Mail-Adresse sollte folgendes Format haben: name@adresse.com',
        },
        comment: {
          required: 'Bitte schreibe einen Kommentar.',
          minlength: 'Es sind min. 20 Zeichen erforderlich!',
        },
        datenschutz:
          'Laut DSGVO benötige wir deine Einwilligung zur Erhebung deiner hier getätigten Daten.',
      },

      errorClass: 'invalid alert alert-error',
      validClass: 'valid is-valid was-validated form-control:valid',

      success: function (label) {
        // console.log("remove", label);
        $(label).removeClass('invalid alert alert-warning');
      },

      highlight: function (element, errorClass) {
        $(element).addClass('is-invalid was-validated form-control:invalid');
      },

      errorElement: 'div',
      errorPlacement: function (error, element) {
        element.after(error);
      },

      submitHandler: function(form) {
        // do other things for a valid form
        form.submit();
      }

    });
  }
  $(document).ready(SFValidateCommentForm);
})(jQuery);


// // WPRM Submission Form Validation
// (function ($) {
//   ('use strict');

//   function SFValidateCommentForm1() {
//     $('.wprm-recipe-submission').validate({

//       errorClass: 'invalid alert alert-error',
//       validClass: 'valid is-valid was-validated form-control:valid',

//       success: function (label) {
//         // console.log("remove", label);
//         $(label).removeClass('invalid alert alert-warning');
//       },

//       highlight: function (element, errorClass) {
//         $(element).addClass('is-invalid was-validated form-control:invalid');
//       },

//       errorElement: 'div',
//       errorPlacement: function (error, element) {
//         element.after(error);
//       },

//       submitHandler: function(form) {
//         // do other things for a valid form
//         form.submit();
//       }


//     });
//   }
//   $(document).ready(SFValidateCommentForm1);
// })(jQuery);


console.log('*** SF :: custom.js loaded ***')