$(function () {
    'use strict';

    // JS starts here.

}());
$(document).ready(function() {

  $("#recent a.tab").click(function () {
    $("#trending").removeClass('active');
    $("#recent").addClass('active');
  });
  $("#trending a.tab").click(function () {
    $("#recent").removeClass('active');
    $("#trending").addClass('active');
  });
  $("#nav-toggle").click(function () {
    if ( $("body").hasClass( "open" ) ) {
      $("body").removeClass('open');
    } else {
      $("body").addClass('open');
    }
  });

  $("div.side-cats h3").click(function () {
    if ( $("div.side-cats").hasClass( 'open' ) ) {
      $("div.side-cats").removeClass('open');
    } else {
      $("div.side-cats").addClass('open');
      $("li.shop").removeClass('open');
      $("li.why-we-r-different").removeClass('open');
      $("li.how-to-use").removeClass('open');
    }
    if ( $("body").hasClass( 'side-cats' ) ) {
      $("body").removeClass('side-cats');
    } else {
      $("body").addClass('side-cats');
      $("body").removeClass('side-shop');
      $("body").removeClass('side-about');
      $("body").removeClass('side-how');
    }
  });
  $("li.shop").click(function () {
    if ( $("li.shop").hasClass( 'open' ) ) {
      $("li.shop").removeClass('open');
    } else {
      $("li.shop").addClass('open');
      $("div.side-cats").removeClass('open');
      $("li.why-we-r-different").removeClass('open');
      $("li.how-to-use").removeClass('open');
    }
    if ( $("body").hasClass( 'side-shop' ) ) {
      $("body").removeClass('side-shop');
    } else {
      $("body").addClass('side-shop');
      $("body").removeClass('side-cats');
      $("body").removeClass('side-about');
      $("body").removeClass('side-how');
    }
  });
  $("li.why-we-r-different").click(function () {
    if ( $("li.why-we-r-different").hasClass( 'open' ) ) {
      $("li.why-we-r-different").removeClass('open');
    } else {
      $("li.why-we-r-different").addClass('open');
      $("div.side-cats").removeClass('open');
      $("li.shop").removeClass('open');
      $("li.how-to-use").removeClass('open');
    }
    if ( $("body").hasClass( 'side-about' ) ) {
      $("body").removeClass('side-about');
    } else {
      $("body").addClass('side-about');
      $("body").removeClass('side-cats');
      $("body").removeClass('side-shop');
      $("body").removeClass('side-how');
    }
  });
  $("li.how-to-use").click(function () {
    if ( $("li.how-to-use").hasClass( 'open' ) ) {
      $("li.how-to-use").removeClass('open');
    } else {
      $("li.how-to-use").addClass('open');
      $("div.side-cats").removeClass('open');
      $("li.why-we-r-different").removeClass('open');
      $("li.shop").removeClass('open');
    }
    if ( $("body").hasClass( 'side-how' ) ) {
      $("body").removeClass('side-how');
    } else {
      $("body").addClass('side-how');
      $("body").removeClass('side-cats');
      $("body").removeClass('side-about');
      $("body").removeClass('side-shop');
    }
  });

  $(function(){
      //Keep track of last scroll
      var lastScroll = 0;
      $(window).scroll(function(event){
          //Sets the current scroll position
          var st = $(this).scrollTop();

          if (st > 55) {
            //Determines up-or-down scrolling
            if (st > lastScroll){
               $("body").removeClass('show-nav');
               $("body").addClass('hide-nav');
            }
            else {
               //Replace this with your function call for upward-scrolling
               $("body").addClass('show-nav');
               $("body").removeClass('hide-nav');
            }
            //Updates scroll position
            lastScroll = st;
          } else {
            $("body").removeClass('hide-nav');
            $("body").removeClass('show-nav');
          }
      });
    });

  // Mobile Top Menu

  $("#trending a.tab").click(function () {
    if ( $("#trending").hasClass( "open" ) ) {
      $("#trending").removeClass('open');
    } else {
      $("#trending").addClass('open');
      $("#recent").removeClass('open');
      $(".side-contributors").removeClass('open');
    }
  });
  $("#recent a.tab").click(function () {
    if ( $("#recent").hasClass( "open" ) ) {
      $("#recent").removeClass('open');
    } else {
      $("#recent").addClass('open');
      $("#trending").removeClass('open');
      $(".side-contributors").removeClass('open');
    }
  });
  $(".side-contributors h3").click(function () {
    if ( $(".side-contributors").hasClass( "open" ) ) {
      $(".side-contributors").removeClass('open');
    } else {
      $(".side-contributors").addClass('open');
      $("#recent").removeClass('open');
      $("#trending").removeClass('open');
    }
  });
  $(".col-main").click(function () {
      $(".side-contributors").removeClass('open');
      $("#recent").removeClass('open');
      $("#trending").removeClass('open');
      $("body").removeClass('open');
  });

  $(window).scroll(function() {
    if ($(window).scrollLeft() > 0) {
      $("body").addClass('open');
    }
    if ($(window).scrollLeft() < 0) {
      $("body").removeClass('open');
    }
  });

});