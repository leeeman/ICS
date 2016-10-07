Login = [];
Login.submit = function() {
		$.ajax({ 
			type: 'post',
			cache: false,
			url: 'Signin',
			dataType: 'json',
			data: $('form#LoginForm').serialize(),
			success: function(data) {
				if(data.success == false){
					Utils.stopWait();
					
					$.Notify({
						    caption: 'Error',
						    content: 'Incorrect Username and Password',
						    keepOpen: true,
						    type:'alert'
					});

					
				} else{ 
					
					window.location.href="dashboard";
					
				}
			}, //success: function
			error: function(xhr, textStatus, thrownError) {
				$.Notify({
						    caption: 'Error',
						    content: 'Some thing wents wrong contact system admin',
						    keepOpen: true,
						    type:'alert'
					});
			}
		});
		return false;
	};//Login.submit