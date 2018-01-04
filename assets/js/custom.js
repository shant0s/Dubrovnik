$(document).ready(function () {
    $('.service-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: "<img class='a-left control-c prev slick-prev' src='assets/images/button-left.png'>",
        nextArrow: "<img class='a-right control-c next slick-next' src='assets/images/button-right.png'>",
    });
    $('.fleet-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: "<img class='a-left control-c prev slick-prev' src='assets/images/button-left.png'>",
        nextArrow: "<img class='a-right control-c next slick-next' src='assets/images/button-right.png'>",
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 485,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.testimonial-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        prevArrow: "<img class='a-left control-c prev slick-prev' src='assets/images/button-left.png'>",
        nextArrow: "<img class='a-right control-c next slick-next' src='assets/images/button-right.png'>",
    });
});
$(window).scroll(function () {
    $(this).scrollTop() > 1 ? $(window).width() < 640 ? $("header").removeClass("sticky") : $("header").addClass("sticky") : $("header").removeClass("sticky")
});