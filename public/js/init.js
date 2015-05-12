(function($){
  $(function(){

    $('.button-collapse').sideNav({
        edge: 'right'
    });

    $("#scroll-to-about").on("click",function(){
        $("html, body").animate({
            scrollTop: $("#about").offset().top
        },"slow")
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
