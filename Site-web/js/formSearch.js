$(document).ready(function(){
    $(".checkbox-type1").click(function(){
        $(".checkbox-option1").slideToggle();
    });

    $(".checkbox-type2").click(function(){
        $(".checkbox-option2").slideToggle();
    });

    $(".checkbox-type3").click(function(){
        $(".checkbox-option3").slideToggle();
    });

    $(".slide-down1").click(function(){
        $(".option1").slideToggle();
    });

    $(".slide-down2").click(function(){
        $(".option2").slideToggle();
    });

    $(".slide-down3").click(function(){
        $(".option3").slideToggle();
    });

    $(".slide-down4").click(function(){
        $(".option4").slideToggle();
    });

    $(".slide-down5").click(function(){
        $(".option5").slideToggle();
    });

    $(".slide-down6").click(function(){
        $(".option6").slideToggle();
    });
});

function collision($div1, $div2) {
      var x1 = $div1.offset().left;
      var w1 = 40;
      var r1 = x1 + w1;
      var x2 = $div2.offset().left;
      var w2 = 40;
      var r2 = x2 + w2;
        
      if (r1 < x2 || x1 > r2) return false;
      return true;
      
    }
    
// // slider call

$('#slider').slider({
    range: true,
    min: 11,
    max: 512,
    values: [ 30, 80 ],
    slide: function(event, ui) {
        
        $('.ui-slider-handle:eq(0) .price-range-min').html(ui.values[ 0 ] + '€');
        $('.ui-slider-handle:eq(1) .price-range-max').html(ui.values[ 1 ] + '€');
        $('.price-range-both').html('<i>' + ui.values[ 0 ] + ' - </i>' + ui.values[ 1 ] + '€');
        
        //
        
    if ( ui.values[0] == ui.values[1] ) {
      $('.price-range-both i').css('display', 'none');
    } else {
      $('.price-range-both i').css('display', 'inline');
    }
        
        //
        
        if (collision($('.price-range-min'), $('.price-range-max')) == true) {
            $('.price-range-min, .price-range-max').css('opacity', '0');    
            $('.price-range-both').css('display', 'block');     
        } else {
            $('.price-range-min, .price-range-max').css('opacity', '1');    
            $('.price-range-both').css('display', 'none');      
        }
        
    }
});

$('.ui-slider-range').append('<span class="price-range-both value"><i>' + $('#slider').slider('values', 0 ) + ' - </i>' + $('#slider').slider('values', 1 ) + '</span>');

$('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">' + $('#slider').slider('values', 0 ) + '€</span>');

$('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">' + $('#slider').slider('values', 1 ) + '€</span>');