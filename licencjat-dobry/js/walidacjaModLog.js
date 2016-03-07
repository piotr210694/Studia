function post()
		{
			  var login = $('#login').val();
			  var password = $('#password').val();
			
			
			$.post('php/zaloguj.php', {login:login, password:password},
			function(data)
			{
				$('#result').html(data);
			});
		}