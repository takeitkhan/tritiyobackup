// creating a sticky header
$(window).scroll(function() {
  var sticky = $('.needs-to-stick'), scroll = $(window).scrollTop();
  if (scroll >= 100) {
    sticky.addClass('fixed');
  } else {
    sticky.removeClass('fixed');
  }
});
