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


setTimeout( function(){$(".liNum1").fadeIn(700);}, 0);
setTimeout( function(){$(".liNum2").fadeIn(700);}, 500);
setTimeout( function(){$(".liNum3").fadeIn(700);}, 1000);
setTimeout( function(){$(".liNum4").fadeIn(700);}, 1500);
setTimeout( function(){$(".liNum5").fadeIn(700);}, 2000);