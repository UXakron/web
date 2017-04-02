// Smooth Scroll //

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

// Sticky Navigation - Removed until navigation is actually added //

/*var mn = $("header");
    mns = "main-nav-scrolled";
    bns = "body-nav-scrolled";
    body = $("body");
    hnav = $('header').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > (hnav+175) ) {
    mn.addClass(mns);
    body.addClass(bns);
  } else {
    mn.removeClass(mns);
    body.removeClass(bns);
  }
});*/
$(window).on('load', function (){
  $('.owl-carousel').owlCarousel({
      loop:true,
      center: true,
      nav: true,
      startPosition: 1,
      margin: 5,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
      },
      navText : ['<span>Back</span>','<span>Next</span>'],
  })
});
