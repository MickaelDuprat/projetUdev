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