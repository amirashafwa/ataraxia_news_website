jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });


    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });
    /* -----------------------------------------
    Rtl Check
    ----------------------------------------- */
    $.RtlCheck = function () {
        if ($('body').hasClass("rtl")) {
            return true;
        } else {
            return false;
        }
    }
    $.RtlSidr = function () {
        if ($('body').hasClass("rtl")) {
            return 'right';
        } else {
            return 'left';
        }
    }
    /* -----------------------------------------
    Search
    ----------------------------------------- */
    var searchWrap = $('.header-search-wrap');
    $(".header-search-icon").click(function(e) {
        e.preventDefault();
        searchWrap.toggleClass("show");
        searchWrap.find('input.search-field').focus();
    });
    $(document).click(function(e) {
        if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
            $(".header-search-wrap").removeClass("show");
        }
    });

    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.banner-slider').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
    });
    /* -----------------------------------------
    banner trending
    ----------------------------------------- */
    $('.banner-trending-carousel ').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        infinite: true,
        loop: true,
        vertical: true,
        verticalSwiping: true,
        dots: false,
        prevArrow: false,
        nextArrow: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 5
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },

            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    });
    /* -----------------------------------------
    post Slider
    ----------------------------------------- */
    $('.post-slider ').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
    });
    /* -----------------------------------------
    post carousel
    ----------------------------------------- */
    $('.wp-block-legacy-widget__edit-preview-iframe .post-carousel ').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 3,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.magazine-frontpage-section .post-carousel ').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 3,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.below-banner-widgets-section .post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 3,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.above-footer-widgets-section .post-carousel ').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 3,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.entry-content .post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 3,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.primary-widgets-section .post-carousel ').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 3,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('#secondary .post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
    });
    $('.secondary-widgets-section .post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
    });
    $('.footer-widget-single .post-carousel').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fas fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fas fa-angle-left slick-prev"></button>',
    });



    /* -----------------------------------------
    Marquee
    ----------------------------------------- */
    $('.marquee').marquee({
        //gap in pixels between the tickers
        gap: 0,
        //time in milliseconds before the marquee will start animating
        delayBeforeStart: 0,
        //'left' or 'right'
        direction: $.RtlSidr(),
        //true or false - should the marquee be duplicated to show an effect of continues flow
        duplicated: true,
        pauseOnHover: true,
        startVisible: true
    });
    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.magazine-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

});