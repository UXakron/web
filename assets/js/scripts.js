$(function(){
 //the shrinkHeader variable is where you tell the scroll effect to start.
 var shrinkHeader = 20;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('header').addClass('header--smaller');
           $('main').addClass('main--smaller');
        }
        else {
            $('header').removeClass('header--smaller');
            $('main').removeClass('main--smaller');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});
