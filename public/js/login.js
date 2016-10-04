Login.submit = function() {
		Utils.startWait();
		$.ajax({ 
			type: 'post',
			cache: false,
			url: 'Signin',
			dataType: 'json',
			data: $('form#LoginForm').serialize(),
			success: function(data) {
				if(data.success == false){
					Utils.stopWait();
					$("#LoginForm :input").each(function(){
						$(this).removeClass('has-error');
					});

					var er = $.parseJSON(data.error);
					var elist = '<strong>Errors:</strong>';
					elist += '<ul><li>Username or Password is invalid.</li>'
					$.map(er, function(value, key){
					elist += '<li>'+value+'</li>';
					$("#"+key).addClass('has-error');
					});
					elist +='</ul>';

					$("#alerts_").html(elist);
					$("#alerts_").show();

					//$(document).scrollTop( $("#alerts_").offset().top - 10);
					$('html, body').animate({'scrollTop': $('#alerts_').offset().top-10}, 500);
				} else{ 
					//location.reload();
					window.location.href="dashboard";
					//alert('location.reload()');
					//location.replace(location.href+'Dashboard');
					//$("#header").load('Header');
					//$("#dashboard_content").html('<br><br><h1>Welcome <strong>'+ data.username +'!</strong></h1>');
				}
			}, //success: function
			error: function(xhr, textStatus, thrownError) {
				Utils.stopWait();
				alert('Something went wrong. Contact you system Admin.');
			}
		});
		return false;
	};//Login.submit