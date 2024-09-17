$(function () {
    $(".showing-now-slider").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: $("#prevBtn"),
        nextArrow: $("#nextBtn"),
    });
});
