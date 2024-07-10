jQuery(function($) {

/*--------------------------------------------------------------
# Banner Slider
--------------------------------------------------------------*/

    $('.main-banner-section.style-1 .banner-slider').slick({
        slidesToShow: 1,
        dots: false,
        infinite: true,
        arrows: true,
        nextArrow: '<button class="adore-arrow slide-next fas fa-angle-double-right"></button>',
        prevArrow: '<button class="adore-arrow slide-prev fas fa-angle-double-left"></button>',
    });

});