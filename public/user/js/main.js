$(document).ready(function () {

    var count = document.querySelectorAll('.testimonials .slider ._item')?.length || 0
    var testimonials = $('.testimonials .slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        infinite: false
    })
    $('.testimonials .slick-dots')
        .addClass('controls')
        .prepend(
            '<button class="prev disabled control"><img src="user/images/icons/chevron-left.svg" alt="" ></button>' +
            '<span class="number">01</span>'
        )
        .append(
            '<span class="number">0' + count + '</span>' +
            '<button class="next control"><img src="user/images/icons/chevron-right.svg" alt="" ></button>'
        );
    $('.testimonials .next').on('click', function () {
        testimonials.slick('slickNext')
    })
    $('.testimonials .prev').on('click', function () {
        testimonials.slick('slickPrev');
    })

    testimonials.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        if (nextSlide < 1) {
            $('.testimonials .prev').addClass('disabled')
        } else {
            $('.testimonials .prev').removeClass('disabled')
        }
        if (nextSlide > count - 2) {
            $('.testimonials .next').addClass('disabled')
        } else {
            $('.testimonials .next').removeClass('disabled')
        }
    });
})

$(window).on('load', function () {

})
$(window).on('resize', function () {

})
