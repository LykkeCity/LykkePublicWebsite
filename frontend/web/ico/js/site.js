$(document).ready(function () {
    var timeOut = 5000;
    var item = ["1-richard.jpg", "2-anton.jpg", "3-mihail.jpg", "4-sergey.jpg"];
    var i = 1;

    var refreshIntervalId = setInterval(function () {
        if (i === item.length) {
            i = 0;
        }
        
        $("#team").css({'background-image': "url('/ico/img/team/" + item[i] + "')"}); 

         i++;
       
    }, timeOut);

    skrollr.init({          
        mobileCheck: function() {
            //hack - forces mobile version to be off
            return false;
        }
    });

    function resize() {
        $(".center-video").height($(window).height() - $(".center-video").offset().top);
        $(".video").height($(window).height());
    }

    $(window).resize(function () {
        resize();
    });
    resize();
    $(".click-campaign-in-figures").on('click', function () {
        $("#campaign-in-figures").css("top", -200);
    });


    $(".play").on('click', function () {
        $("#iframe-video").height($(window).height()).width($(window).width()).fadeIn();
        $(".close-video").fadeIn();
       $("#iframe-video")[0].src = "https://www.youtube.com/embed/P2LqZcTndMM?autoplay=1";
    });
    
    $(".close-video").on('click', function () {
         $("#iframe-video").fadeOut();
         $(this).fadeOut();
          $("#iframe-video")[0].src = "https://www.youtube.com/embed/P2LqZcTndMM?autoplay=0";
    });

    $("a.scrollto").click(function () {
        var _this = $(this);
        var elementClick = _this.attr("href");
        var destination = $(elementClick).offset().top;
        $("a.scrollto").removeClass("active");
        _this.addClass("active");
        jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 800);
        return false;
    });

    $(window).scroll(function () {
        s_top = $("body").scrollTop();
        blockInvest = $("#invest").offset().top;
        if (s_top > blockInvest - 5) {
            $('.head').addClass("scroll-menu");
        }
        if (s_top < blockInvest - 10) {
            $('.head').removeClass("scroll-menu");
        }
    });



    var show = true;
    var countbox = "#campaign-in-figures";
    $(window).on("scroll load resize", function () {

        if (!show)
            return false;               

        var w_top = $(window).scrollTop();
        var e_top = $(countbox).offset().top;     

        var w_height = $(window).height();        
        var d_height = $(document).height();      

        var e_height = $(countbox).outerHeight(); 

        if (w_top + 200 >= e_top || w_height + w_top == d_height || e_height + e_top < w_height) {
            $(".zero").fadeOut(800);
            $(".spincrement").delay(600).fadeIn().spincrement({
                from: 0, 
                decimalPoint: ".", 
                thousandSeparator: ",", 
                duration: 4000          
            });
            show = false;
        }
    });

});


	