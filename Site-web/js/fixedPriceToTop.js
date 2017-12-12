var scrollTrigger = 300, // px

fixedPriceToTop = function () {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > scrollTrigger) {
        $('#totalFixed').slideDown(300);
    } else {
        $('#totalFixed').slideUp(0);
    }
};

fixedPriceToTop();
$(window).on('scroll', function () {
    fixedPriceToTop();
});
