$(document).ready(function () {
    $('.slick-banner').slick({
        autoplay: true,
        controls: false,
        dots: false
    });

    $('.slick-review').slick({
        autoplay: true,
        controls: false,
        dots: false,
        slidesToScroll: 1,
        slidesToShow: 2,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('.slick-partner').slick({
        autoplay: true,
        controls: false,
        dots: false,
        slidesToScroll: 1,
        slidesToShow: 3,
        infinite: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});



