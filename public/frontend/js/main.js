(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow');
            } else {
                $('.fixed-top').removeClass('shadow');
            }
        } else {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow').css('top', -55);
            } else {
                $('.fixed-top').removeClass('shadow').css('top', 0);
            }
        }
    });
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });
    // vegetable carousel
    $(".vegetable-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });
    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });
    $(document).ready(function () {
        $(window).on('load', function () {
            slideOne();
            slideTwo();
        });
        let sliderOne = $('#slider-1');
        let sliderTwo = $('#slider-2');
        let displayValOne = $('.rangefrom');
        let displayValTwo = $('.rangeto');
        let minGap = 100;
        let sliderTrack = $('.slider-track');
        let sliderMaxValue = $('#slider-1').prop('max');
        sliderOne.on('input', function () {
            slideOne();
        });
        sliderTwo.on('input', function () {
            slideTwo();
        });
        function slideOne() {
            if (parseInt(sliderTwo.val()) - parseInt(sliderOne.val()) <= minGap) {
                sliderOne.val(parseInt(sliderTwo.val()) - minGap);
            }
            displayValOne.text(sliderOne.val());
            fillColor();
        };
        function slideTwo() {
            if (parseInt(sliderTwo.val()) - parseInt(sliderOne.val()) <= minGap) {
                sliderTwo.val(parseInt(sliderOne.val()) + minGap);
            }
            displayValTwo.text(sliderTwo.val());
            fillColor();
        };
        function fillColor() {
            let percent1 = (sliderOne.val() / sliderMaxValue) * 100;
            let percent2 = (sliderTwo.val() / sliderMaxValue) * 100;
            sliderTrack.css('background', `linear-gradient(to right, rgb(129, 196, 8) ${percent1}% , rgb(255, 205, 57) ${percent1}% , rgb(255, 205, 57) ${percent2}%, rgb(129, 196, 8) ${percent2}%)`);
        }
    });
})(jQuery);

