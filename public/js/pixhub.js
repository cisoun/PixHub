$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('nav').addClass('navbar-scroll');
  } else {
    $('nav').removeClass('navbar-scroll');
  }
});
