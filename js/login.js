$().ready(function() {
	
	$("#formLogin").validate({					 
			
		rules: {
			username : "required",
			password	: "required",
		},
	
		messages: {
			username: "",
			password: "",
		},

	});	

	
});	
$.validator.setDefaults({
	submitHandler: function() { 
		$('#messageBox').removeClass().addClass('MessageBoxWarningAll').html("Validating...");
		
			$.post("_controller/student-controller.php",{action:'studentLogin',username:$('#username').val(),password:$('#password').val()},function(data)
		{
			//alert(data);
			if(data!='no')
				$('#LoginWrap').html(data);
			else
			{
				$('#messageBox').removeClass().addClass('MessageBoxErrorAll').html("Invalid Login Details!");
			}
			//

		});
	
	}
});	