$(document).ready(function() {

    var mySwiper = new Swiper ('.swiper-container', {
        loop: false,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 6,
        //spaceBetween: 50,
        breakpoints: {
            480: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            1080: {
                slidesPerView: 3
            },
            1280: {
                slidesPerView: 4
            },
            1600: {
                slidesPerView: 5
            }
        }
    });
});