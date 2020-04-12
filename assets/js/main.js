(function($) {

    "use strict";

    $(".slider-carousel").owlCarousel({
        items: 1,
        loop: true
    });

    $(".slider-carousel-2").owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>']
    });

    $(".services-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {

            0: {

                items: 1
            },

            480: {

                items: 2
            },

            768: {

                items: 3
            },
            992: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $(".history-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {

            0: {

                items: 1
            },

            480: {

                items: 1
            },

            768: {

                items: 2
            },
            992: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
    $(".our-team-carousel").owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {

            0: {

                items: 1
            },

            480: {

                items: 1
            },

            768: {

                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });

    $('.image-link').magnificPopup({
        type: 'iframe'
    });
    $('.video-link').magnificPopup({
        type: 'iframe'
    });

    AOS.init({
        useClassNames: true,
        initClassName: false,
        animatedClassName: 'animated',
        once: true
    });

    $('.counter').counterUp({
        delay: 100,
        time: 5000
    });

    function scrolltop() {


        var wind = $(window);

        wind.on("scroll", function() {

            var scrollTop = wind.scrollTop();
            if (scrollTop >= 500) {
                $(".scroll-top").fadeIn("slow");
            } else {
                $(".scroll-top").fadeOut("slow");
            }
        });

        $(".scroll-top").on("click", function() {
            var bodyTop = $("html, body");
            bodyTop.animate({
                scrollTop: 0
            }, 800, "easeOutCubic");
        });

    }

    scrolltop();

    $(".filter-button").on("click", function() {
        var value = $(this).attr('data-filter');

        if (value == "all") {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        } else {
            $('.filter[filter-item="' + value + '"]').removeClass('hidden');
            $(".filter").not('.filter[filter-item="' + value + '"]').addClass('hidden');
            $(".filter").not('.' + value).hide('3000');
            $('.filter').filter('.' + value).show('3000');

        }
    });

    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
    $(this).addClass("active");


})(jQuery);