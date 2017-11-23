$(document).ready(function(){


	/* var */
	var $agence = $('#agence'),
	var $erreurAgence = $('#erreurAgence');

	$agence.on('change', function(){
		if($(this).prop(("checked") !== true)){
			$erreurAgence.css('display', 'block');
		}
	});
});