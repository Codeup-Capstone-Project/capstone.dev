(function($){
    $(function(){

        $('.ninja-star').animate();

        $('.button-collapse').sideNav({
            edge: 'right'
        });

        $("#scroll-to-about").on("click",function(){
            $("html, body").animate({
                scrollTop: $("#about").offset().top
            },"slow")
        });

        $('.modal-trigger').leanModal();

    //==================== Leader Board Triggers on Profile Page =======================

        $('.modal-trigger#size3x3').leanModal({ // Callback for Modal open
            ready: function() {
                $.get('/play/leaders/3', null, function(data){
                    $("#leaderModalContent").html(data);
                });
            }
        });

        $('.modal-trigger#size4x4').leanModal({ // Callback for Modal open
            ready: function() {
                $.get('/play/leaders/4', null, function(data){
                    $("#leaderModalContent").html(data);
                });
            }
        });

        $('.modal-trigger#size5x5').leanModal({ // Callback for Modal open
            ready: function() {
                $.get('/play/leaders/5', null, function(data){
                    $("#leaderModalContent").html(data);
                });
            }
        });

    }); // end of document ready
})(jQuery); // end of jQuery name space
