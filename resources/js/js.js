/* ABOUT US */
//var colorsArray = ["FFFFFF", "dfefff", "444444", "f4d3c3", "FF6B6B", "1A535C"];
//
//function colorAuthorSections() {
//    var authorSections = document.querySelectorAll('div.au-author-container');
//    console.log(authorSections);
//    for (var i = 0; i < authorSections.length; i++) {
//        authorSections[i].style.backgroundColor = colorsArray[i];
//        console.log('dd');
//    }
//}


/*jslint browser: true*/
/*global $, jQuery, alert*/
$(function inputShow() {
    "use strict";

    if ($(window).width() < 768) {
        $('.header-left').removeClass('col-xs-2');
        $('.header-left').addClass('col-xs-6');
        $('.header-middle').hide();
        $('.header-right').removeClass('col-xs-2');
        $('.header-right').addClass('col-xs-6');

        $('.search-svg').click(function () {
            $('.header-right').css('transition', 'all 0.5s ease');
            $('#search-input').show();
            $('.header-right').removeClass('col-xs-6');
            $('.header-right').addClass('col-xs-12');
            $('.header-right').addClass('flex');
            $('.header-right-inside').animate({
                width: "100%"
            });
            $('#search-input').animate({
                width: $(window).width() - 60 + "px"
            }), 200;
            $('#search-input').css('padding', '5px');
            $('#search-input-svg').show();
            $('.header-left').hide();
            $('#dropdown-menu').hide();
            console.log('ssk');
        });


        $('#search-input-svg').click(function () {
            $('#search-input').css('display', 'none');
            $('.header-right-inside').css('width', 'auto');
            $('.header-right').removeClass('col-xs-12');
            $('.header-right').addClass('col-xs-6');
            $('.header-left').show();

            $('.header-right').removeClass('flex');
            $('#search-input-svg').hide();



            $('#dropdown-menu').show();
        });
        var delay = 1;
        var i = 0;
        $(".sticky_link span").each(function () {
            $(this).css('-webkit-transition-delay', '.' + delay + 's');
            $(this).css('transition-delay', '.' + delay + 's');
            if (i == 0) {
                delay = 10;
            }
            i++;
            delay += 5;
        });

    } else {
        $('.addflex').addClass("a-flex");
    };
});

$(document).ready(function () {
    $(function everyOtherCategorySection() {
        "use strict";
        if ($(window).width() >= 1024) {
            $('.m-column-second:parent:odd').each(function () {
                $(this).insertBefore($(this).prev('.m-column-first'));
                $(this).parent().addClass('m-section-category-special');
                $(this).next().addClass('m-column-first-special');
            });
        };
    });
});




$(function scrollToDiv() {
    "use strict";
    $(".a-descr-name").click(function () {
        $('html,body').animate({
                scrollTop: $(".a-contact").offset().top
            },
            'slow');
    });

    /*if (window.location.hash) {
        $(window.location.hash).animatescroll({
            scrollSpeed: 2000,
            easing: 'easeInOutBack'
        });
    }

    $('a[href*=\\#]').click(function () {
        $(this.hash).animatescroll({
            scrollSpeed: 2000,
            easing: 'easeInOutBack'
        });
    });*/
});

$(window).on("load", function () {
    $(".animated").removeClass('animated fadeInUp');
});

/*
$(document).ready(function() {
   $("#slideshow").swiperight(function() {
      $(this).carousel('prev');
    });
   $("#slideshow").swipeleft(function() {
      $(this).carousel('next');
   });
});*/
/*
$("#slideshow").swipe({

  swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

    if (direction == 'left') $(this).carousel('next');
    if (direction == 'right') $(this).carousel('prev');

  },
  allowPageScroll:"vertical"

});*/



var scrollCb = function () {
    var tiles = $(".m-section-category-wrapper:not(.animated)");
    var $window = $(window);
    var b = $window.scrollTop() + $window.height();

    tiles.each(function (i) {
        var $this = $(this);
        var a = $this.offset().top + $this.height();
        if ($(window).width() >= 1024) {
            if (a < b + 800) {
                $this.addClass("animated").addClass("fadeInUp");
            }
        } else {
            if (a < b + 1500) {
                $this.addClass("animated").addClass("fadeInUp");
            }
        }
    });
};


$(scrollCb);

$(window).scroll(scrollCb);

//HORIZONTAL WORKING SCROLL
//$(document).ready(function () {
//    var $horizontal = $('.m-column-first');
//
//    $(window).scroll(function () {
//        var s = $(this).scrollTop(),
//            d = $(document).height(),
//            c = $(this).height();
//
//        scrollPercent = (s / (d - c));
//
//        var position = (scrollPercent * ($(document).width() - $horizontal.width()));
//
//        $horizontal.css({
//            'left': position
//        });
//    });
//});




$(document).ready(function () {
    "use strict";
    //    $('#m-mask-text-first').animate({
    //        width: "600px"
    //    }, {
    //        duration: 1000,
    //        specialEasing: {
    //            width: 'linear'
    //        }
    //    });

    //    $(".m-random-mask-container").click(function () {
    //        $(this).show("slide", {
    //            direction: "right"
    //        }, 1000);
    //    });

    //
    //    $('#m-mask-text-second').animate({
    //        width: "300px"
    //    }, {
    //        duration: 1000,
    //        specialEasing: {
    //            width: 'linear'
    //        }
    //    });
    //    

});

//
//$(document).ready(function () {
//    $('.m-box').on('click', function (event) {
//        var articleID = this.name;
//        console.log(articleID);
//        //                    $.post('reg.php', serializedData, function(response) {
//        //                        console.log("Response: " + response);
//        //                    }).always(function() {
//        //                        $inputs.prop("disabled", false);
//        //                    });
//
//        //        $.redirect('article.php', {
//        //            'articleID': articleID
//        //        }, "GET");
//
//        //        $.ajax({
//        //            url: "article.php",
//        //            type: "GET",
//        //            data: {
//        //                articleID: articleID
//        //            }
//        //        }).done(function (response, textStatus, jqXHR) {
//        //            console.log(response);
//        //            $.ajaxSetup({
//        //                cache: false
//        //            });
//        //        }).fail(function (response) {
//        //            console.log(response);
//        //        });
//
//    });
//});
