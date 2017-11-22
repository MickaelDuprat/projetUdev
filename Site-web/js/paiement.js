jQuery(document).ready(function() {
   jQuery("#myform").validate({
      rules: {
         "car_number":{
         	"numbers": true,
            "required": true,
            "minlength": 12,
            "maxlength": 12
         },
         "car_code": {
         	"required": true,
            "numbers": true,
            "minlength": 3,
            "maxlength": 3
         }    
  }
})
});
