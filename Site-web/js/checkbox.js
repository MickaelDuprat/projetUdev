
    $('#Citadine').click(function() {
        $.ajax({ 
        url:"SearchController.php",
        type: "get",
        dateType: "json",
        success: function(message){
        	$('#test1').append('<option value="'+ message.id +'">'+ message.id +'</option>');
        	},
        	error: function(message){
        		alert(message.status + ' ' + message.statusText);
               }
            });
        });
      