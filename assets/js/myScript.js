(function($){
    $(document).ready(function () {
        "use strict";

        $('header .searchBtn').click(function () {
            $('header .searchBox').stop().slideToggle(200);
        });

        $('main, footer').click(function () {
            $('header .searchBox').stop().slideUp(0);
        });

        $("main .slide, main .khachhang .dskhachhang").slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            centerMode: true,
            variableWidth: false,
            centerPadding: 0,
            rows: 1,
            arrows: true,
            focusOnSelect: true,
        });
    });
})(jQuery);