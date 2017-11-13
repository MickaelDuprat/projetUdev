$(".sign-up").each( function(){
	var signUp = $(this),
			stepList = signUp.find(".step-list"),
			steps = signUp.find(".steps");
	steps.each( function(){
		var step = $(this).find(".step"),
				stepCount = step.length;
		if ( $(this).find(".active").length == 0 ){
			step.first().addClass("active")
		}
		
		function nextStep(){
			var activeStepIndex = steps.find(".active").index(),
					stepCount = steps.find(".step").length,
					nextStepEq = 0
		
		var activeStep = steps.find(".active");
			
			if (activeStepIndex + 1 > stepCount - 1){
				nextStepEq = stepCount - 1
			}else{
				nextStepEq = activeStepIndex + 1
			}

		activeStep.fadeOut(150, function(){
			stepList.find(".step.current").addClass("done")
			stepList.find(".step.current").removeClass("current")
			stepList.find(".step").eq(nextStepEq).addClass("current")
			steps.find(".step").eq(nextStepEq).hide().fadeIn(150)
			steps.find(".step").eq(nextStepEq).addClass("active")
			$(this).removeClass("active")
		});	
			
		}
		
		step.each( function(){
			var $this = $(this),
					nextBtn = $this.find(".next").find("button"),
					fields = $this.find(".field").not(".field.next"),
					inputPass1 = $(this).find("input[type='password']#pass1"),
					inputPass2 =  $(this).find("input[type='password']#pass2"),
					firPassVal = inputPass1.val(),
					secPassVal = inputPass2.val(),
					nextField = $this.find(".field.next");
					
				function FieldCorrect(){
					if ($this.find(".correctF").length >= fields.length){
						nextField.find("button").removeAttr("disabled")
					}else if ($this.find(".correctF").length < fields.length){
						nextField.find("button").attr("disabled", "true")
					}
				}
			
				fields.each( function(){
					var inputTexts = $(this).find("input:text"),
							inputEmails = $(this).find("input[type='email']"),
							inputPass = $(this).find("input[type='password']"),
							correctFieldCount = 0,
							$this = $(this);
					
					function CheckFields(){
						
						inputTexts.each( function(){
							var charLength = $(this).length,
									minlength = $(this).attr("data-minCharLength"),
									maxlength = $(this).attr("data-maxCharLength"),
									labelText = $("label[for="+ $(this).attr("id") +"]").text(),
									minlengthError = ''+labelText+' must be more than '+(Number(minlength) - 1)+' characters',
									maxlengtherror = ''+labelText+' must be less than '+(Number(maxlength) + 1)+' characters',
									errorCount = 0,
									inputted = $(this).val(),
									correct = 0;
							
							if (minlength == undefined){
								minlength = 0
							}
							
							if (inputted.length >= minlength){
								if (maxlength == undefined){
									$(this).parent(".field").find(".error-label").remove();
									correct = 1
								}else if(inputted.length <= maxlength){
									$(this).parent(".field").find(".error-label").remove();
									correct = 1
								}else if (inputted.length > maxlength){
									correct = 0
									if ($(this).parent(".field").find(".error-label").length > 0){
										if ($(this).parent(".field").find(".error-label").find(".max-len-error") == 0){
											$(this).parent(".field").find(".error-label").find(".error-list").append('<li class="max-len-error">'+maxlengtherror+'</li>')
										}
									}else{
										$(this).parent(".field").append('<div class="error-label"><ul class="error-list"><li>'+maxlengtherror+'</li></ul></div>')
									}
								}
							}else if(inputted.length < minlength) {
									correct = 0
								if ($(this).parent(".field").find(".error-label").length > 0){
										if ($(this).parent(".field").find(".error-label").find(".min-len-error") == 0){
											$(this).parent(".field").find(".error-label").find(".error-list").append('<li class="min-len-error">'+minlengthError+'</li>');
										}
								}else{
									$(this).parent(".field").append('<div class="error-label"><ul class="error-list"><li>'+minlengthError+'</li></ul></div>')
								}
							}
							
							if (correct == 1){
							 	$(this).addClass("correct")
							}else if(correct == 0){
							 	$(this).removeClass("correct")
							}
							
							
						});
						
						inputPass.each( function(){
							var charLength = $(this).length,
									minlength = $(this).attr("data-minCharLength"),
									maxlength = $(this).attr("data-maxCharLength"),
									labelText = $("label[for="+ $(this).attr("id") +"]").text(),
									minlengthError = ''+labelText+' must be more than '+(Number(minlength) - 1)+' characters',
									maxlengtherror = ''+labelText+' must be less than '+(Number(maxlength) + 1)+' characters',
									errorCount = 0,
									inputted = $(this).val(),
									correct = 0;
						
							if (minlength == undefined){
								minlength = 0
							}
							
							if (maxlength == undefined){
								maxlength = 100000000000000000000000000000000000000000000000
							}
							
							if (inputted.length >= minlength && inputPass1.val() === inputPass2.val() && inputted.length <= maxlength){
								correct = 1
							}else{
								correct = 0
								if ($(this).parent('.field').find(".error-label").length == 0){
									$(this).parent('.field').append('<div class="error-label"><ul class="error-list"></ul></div>')
								}
								if (inputPass1.val() !== inputPass2.val()){
									if ($(inputPass1).parent('.field').find(".error-label").find("li.passError").length == 0){
										$(inputPass1).parent('.field').find(".error-label").find("ul").prepend('<li class="passError">Passwords do not match</li>')
									}
									if ($(inputPass2).parent('.field').find(".error-label").find("li.passError").length == 0){
										$(inputPass2).parent('.field').find(".error-label").find("ul").prepend('<li class="passError">Passwords do not match</li>')
									}									
								}else if(inputPass1.val() === inputPass2.val()){
									$(inputPass1).parent('.field').find(".error-label").find(".passError").remove();
									$(inputPass2).parent('.field').find(".error-label").find(".passError").remove();
								}
								if (inputted.length < minlength){
									if ($(this).parent('.field').find(".error-label").find("li.minLenError").length == 0){
										$(this).parent('.field').find(".error-label").find("ul").append('<li class="minLenError">'+minlengthError+'</li>')
									}
								}else if(inputted.length >= minlength){
										$(this).parent('.field').find(".error-label").find(".minLenError").remove();
								}
							}
							
							
							
							if (correct == 1){
							 	$(this).addClass("correct")
							}else if(correct == 0){
							 	$(this).removeClass("correct")
							}
							
							
						});
						
						
						inputEmails.each( function(){
							var inputted = $(this).val(),
									regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
									correct = 0;
									
								if ( regex.test(inputted) ){
									$(this).parent(".field").find(".error-label").remove();
									correct = 1
								}else{
									correct = 0
									$(this).parent(".field").find(".error-label").remove();
									$(this).parent(".field").append('<div class="error-label"><ul class="error-list"><li>Invalid Email Address</li></ul></div>')
								}
							
						if (correct == 1){
							$(this).addClass("correct")
						}else if(correct == 0){
							$(this).removeClass("correct")
						}
							
						});
					
						
						correctFieldCount = $this.find(".correct").length
						
						if ($this.find("input").length <= correctFieldCount){
							$this.find(".error-label").remove();
							$this.addClass("correctF")
						}else if ($this.find("input").length > correctFieldCount){
							$this.removeClass("correctF")
						}
						
					}
						
					CheckFields();
					
					$(this).on('click change keyup keydown keypress paste mouseover', function(){
						CheckFields();
						FieldCorrect();
					});
					
				});
				
				
			FieldCorrect();
					
			$(this).on('click change keyup keydown keypress mouseover', function(){
				FieldCorrect();
			});
			
			nextField.find("button").on('click', function(e){
				e.preventDefault();
				
				if ($(this).is(":disabled") == false){
					$this.children().each( function(){
						$(this).animate({"opacity": "0"}, 350)
						$(this).css({"pointer-events": "none"});
					});
					setTimeout(function(){
						$this.append("<div class='loader'><div class='dot first'></div><div class='dot second'></div></div>")
					}, 350);
					setTimeout( function(){
						nextStep();
					}, 3000);
				}
				
			});
					
		});
		
	});
	
});