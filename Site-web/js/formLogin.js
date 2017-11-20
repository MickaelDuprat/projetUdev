$('.date').dateDropper();

$('.box').click(function() {
$(this).toggleClass('selected');
});

$('input[type="submit"]').mousedown(function(){
  $(this).css('background', '#2ecc71');
});
$('input[type="submit"]').mouseup(function(){
  $(this).css('background', '#1abc9c');
});

$('#loginform').click(function(){
  $('.login').fadeToggle('slow');
});

$('#compteform').click(function(){
  $('.compte').fadeToggle('slow');
});

window.setTimeout(function alert() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);