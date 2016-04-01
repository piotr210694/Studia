<?php
	session_start(); //start sesji
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy:
	{
		header('Location: index2.php');
		exit(); //dajemy exit by od razu przekierowalo i nie wykonywalo tego co pod spodem
	}
?>

<?php 
	include('php/connectMenu.php');
	include('php/registrationViewCheck.php'); 
?>

<?php 
	include('php/viewManageReg.php');
?>

<!doctype html>

<html LANG="pl">
  
<head>
		<title>PSI - Projektuj z pomysłem</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width">
		<link rel="icon" href="01.png" type="image/png" sizes="16x16">
		<link rel="stylesheet" href="css/style.css">
		
		<!-- 
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
		-->
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		
		<!-- MENU -->
		<!--
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
		-->
		<script src="js/jquery-latest.min.js" type="text/javascript"></script>
		<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<link rel="stylesheet" href="css/styles.css">
	
	<!-- WALIDACJA FORMULARZA -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<!-- Walidacja okna modalnego logowania -->
	<script src="js/walidacjaModLog.js"></script>
	
	<script>
		$(document).ready(function() 
		{
			 //Walidacja loginu
			 $('#newLogin').on('blur', function()
			 {
				 var input = $(this);
				 var name_length = input.val().length;
				 var login = input.val();
				 //--------------------------------------
				 //tworzymy tablice z zajetymi loginami
				 var tab = new Array(
					<?php 
					echo "'";
					for($i=0; $i<$ileU; $i++)
					{ 
						echo $loginZBazy[$i]; 
							if($i == ($ileU - 1))
							{
								echo "'";
							}
							else
							{
								echo "','"; 
							}
					}	
					?>);
					//--------------------------------------
					//spr czy podany login jest w bazie
					var loginWBazie = 0;
					var x=0;
					for (x in tab)
					{	
						if(tab[x] == login)
						{
							loginWBazie = 1;
							break;
						}
						else
						{
							//nic sie nei dzieje, loginWBazie = 0
						}
					}

					 if((name_length >= 5 && name_length <= 15) && loginWBazie==0 )
					 {
						input.removeClass("invalid").addClass("valid");
						input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Podany login jest poprawny!").removeClass("blad").addClass("ok");
					 }
					 if(loginWBazie==1)
					 {
						input.removeClass("valid").addClass("invalid");
						input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Podany login jest już w bazie! Zmień go!").removeClass("ok").addClass("blad");
					 }
					 if(name_length < 5 || name_length > 15)
					 {
						input.removeClass("valid").addClass("invalid");
						input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Login musi zawierać więcej niż 4 znaki i mniej niż 16!").removeClass("ok").addClass("blad");
					 }
					 });
//***************************************************************************************************************************************************
			
			//Walidacja email
			 $('#newEmail').on('blur', function() {
			 var input = $(this);
			 var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			 var is_email = pattern.test(input.val());
			 var email = input.val();
			//----------------------------------------
			//tablica z zajetymi mailami
			var tab = new Array(
							<?php 
							echo "'";
							for($i=0; $i<$ileU; $i++)
							{ 
								echo $emailZBazy[$i]; 
									if($i == ($ileU - 1))
									{
										echo "'";
									}
									else
									{
										echo "','"; 
									}
							}
								
							?>);
			//--------------------------------------
			//spr czy podany email jest w bazie	
			var emailWBazie = 0;
			var x=0;
			for (x in tab)
			{	
				if(tab[x] == email)
				{
					emailWBazie = 1;
					break;
				}
				else
				{
					//nic sie nei dzieje, emailWBazie = 0
				}
			}
 
			 if(is_email && emailWBazie==0 )
			 {
				 input.removeClass("invalid").addClass("valid");
				 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Wprowadzony e-mail jest poprawny!").removeClass("blad").addClass("ok");
			 }
			 else if(emailWBazie==1)
			 {
				 input.removeClass("valid").addClass("invalid");
				 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Adres e-mail jest już w bazie! Podaj inny!").removeClass("ok").addClass("blad");
			 }
			 else
			 {
				 input.removeClass("valid").addClass("invalid");
				 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Adres e-mail jest nieprawidłowy!").removeClass("ok").addClass("blad");
			 }
			 });  
//***************************************************************************************************************************************************
			
			//Walidacja hasła
			var newpass; //zmienna globalna
			var is_pass;
			//--------------------------------------
			//Walidacja newpass
			 $('#newPass').on('blur', function() 
			 {
				 var input = $(this);
				 newpass = input.val();
				 var dl = input.val().length;
				 var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[\!\@\#\$\%\^\&\*\(\)\_\+\-\=])(?=.*[A-Z])(?!.*\s).{8,}$/i;
				 is_pass = pattern.test(input.val());
				 if(is_pass)
				 {
					 input.removeClass("invalid").addClass("valid");
					 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Nowe hasło jest poprawne!").removeClass("blad").addClass("ok");
				 }
				 else if(dl < 8)
				 {
					input.removeClass("valid").addClass("invalid");
					input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Hasło jest za krótkie! Musi zawierać minimum 8 znaków!").removeClass("ok").addClass("blad");
				 }
				 else
				 {
					input.removeClass("valid").addClass("invalid");
					input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Hasło musi posiadać znak specjalny, dużą literę i cyfrę! Nie może zawierać spacji!").removeClass("ok").addClass("blad");
				 }
			}); 
			//--------------------------------------
		   //Walidacja newpass2
			 $('#newPass2').on('blur', function() 
			 {
				 var input = $(this);
				 var newpass2 = input.val();
				 if(newpass == newpass2 && is_pass)
				 {
					 input.removeClass("invalid").addClass("valid");
					 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Hasła pokrywają się!").removeClass("blad").addClass("ok");
				}
				else
				{
				  input.removeClass("valid").addClass("invalid");
				 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Hasła nie są takie same!").removeClass("ok").addClass("blad");
				}
			}); 
//*************************************************************************************************************************************************** 

			 //Po próbie wysłania formularza EDYCJA DANYCH
			 $('#submit input').click(function(event){
			 var checkLogin = $('#newLogin');
			 var checkPass = $('#newPass');
			 var checkPass2 = $('#newPass2');
			 var checkEmail = $('#newEmail');
			 
			 if(checkLogin.hasClass('invalid') || checkPass.hasClass('invalid') || checkPass2.hasClass('invalid') || checkEmail.hasClass('invalid'))
			 {
				event.preventDefault();
				alert("BŁĄD! Prawidłowo uzupełnij edytowane pola!"); 
			 }
			 else if(checkLogin.hasClass('valid') || checkPass.hasClass('valid') || checkPass2.hasClass('valid') || checkEmail.hasClass('valid') )
			 {
				post2();
			 }
			 else
			 {
				alert("Uwaga! Nie edytujesz żadnego z pól!"); 
			 }

			 });
 
});
//***************************************************************************************************************************************************
		
		//funkcja edycji danych
		function post2()
		{
			var newLogin = $('#newLogin').val();
			var newPass = $('#newPass').val();
			var newEmail = $('#newEmail').val();
			
			$.post('php/connectionRegistration.php', {newLogin:newLogin, newPass:newPass, newEmail:newEmail},
			function(data)
			{
				$('#result2').html(data);
			});
		}
		
		
</script>
	
	
	</head>
  
  <body>
<!-- Panel logowania -->
<div id="myModal" class="modal fade" role="dialog">
  <form id="contact_form" action="php/zaloguj.php" method="post" >
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <p><button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" ><span class="glyphicon glyphicon-user">&nbsp;</span>Logowanie</h4>
      </div>
      <div class="modal-body" style="padding:30px 50px;">
		<p><label for="login"><span class="glyphicon glyphicon-user"></span> Login</label>
		<label class="label"><input class="form-control" type="text" name="login" id="login" placeholder="Podaj login" onkeydown = "if (event.keyCode == 13)	post();" />
		</label></p>
		<p><label for="passwordw"><span class="glyphicon glyphicon-eye-open"></span> Hasło</label>		
		<label class="label"><input class="form-control" type="password" name="password" id="password" onkeydown = "if (event.keyCode == 13)	post();"  placeholder="Podaj hasło" />

		</label></p>
		<input id="submit_btn" class="submit_btn btn btn-success btn-block" value="Zaloguj" onclick="post();" onkeydown = "if (event.keyCode == 13)	post();" >
		<p><div id="result"></div></p> <!-- tu wyswietla bledy-->
   
    </label>
      </div>
      <div class="modal-footer">
	      <p><a href="remindpass.php">Zapomniałeś hasła? </a></p>
          <p>Nie masz konta? <a href="registration.php">Dołącz do nas</a></p>
		  <p>Przejdź do <a href="admin/logowanie.php">panelu administratora</a></p>
      </div>
    </div>

  </div>
  </form>
</div>






    <div class="container">
      <div class="row">
        <div class="col-md-12">      
            <div class="container">
<!-- MENU -->
       <div id='cssmenu' class="navbar-fixed-top">
	<ul>
	<?php 
	$i=0;
	for($i; $i<1; $i++)
	{
		echo '<li><a href="index2.php"><span>Strona główna</span></a></li>';
	}?>
   
   <li><a href='contact/kontakt.php'><span>Kontakt</span></a></li>
   <li class='active has-sub'><a><span>Artykuły</span></a>
      <ul>
	  	<?php 
		for($i=0; $i<$ileK; $i++)
		{
			if($ileA[$i] == 0){ continue;}
			else
			{
				echo '<li><a href="">'.$kategoria[$i].'</a>';
				echo '<ul>';
				if($ileA[$i]<$ile+1)
				{
					for($j=0; $j<$ileA[$i]; $j++)
					{
						echo '<li><a href="';
						echo $linki[$i][$j];
						echo '">'.$tytuly[$i][$j].'</a>';
						echo '</li>';
					}
				}
				else
				{
					for($j=0; $j<$ile; $j++)
					{
						echo '<li><a href="';
						echo $linki[$i][$j];
						echo '">'.$tytuly[$i][$j].'</a>';
						echo '</li>';
					}
					echo '<li class="last" ><a href="admin/article/article.php';
					echo "";
					echo '">'.'***POKAŻ WIĘCEJ***'.'</a>';
					echo '</li>';
				}
				
				echo '</ul>';
				echo '</li>';
			}
		}
		?>
      </ul>
   </li>
   <li class='active has-sub'><a><span>Samouczki</span></a>
		<ul>
            <li><a href='#'><span>Sub Product</span></a></li>
            <li class='last'><a href='#'><span>Sub Product</span></a></li>
        </ul>
   </li>
   <li class='active has-sub'><a><span>Quizy</span></a>
		<ul>
            <li><a href='#'><span>Sub Product</span></a></li>
            <li class='last'><a href='#'><span>Sub Product</span></a></li>
        </ul>
   </li>
   <li><a href='kursy.php'><span>Kursy</span></a></li>
   <li><a id="opener" style="cursor:pointer;" id="opener" style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><span>Zaloguj się</span></a></li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			<div class="container-fluid wys" >
            <div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4" style="padding:20px">
				
				<h1 style="text-align: center;">Załóż nowe konto</h1>
			<form class="form-horizontal" role="form" >
				<label class=" control-label glyphicon glyphicon-user" for="newLogin">&ensp;</label><span>Login:</span>
				<div class="form-group has-feedback">
					<div class="col-md-12">
						<input type="text" class="form-control" id="newLogin" name="newLogin" placeholder="Podaj swój unikalny login..." >
						<span id="znak" class="znak"></span>
						<span id="komunikat" class="komunikat"></span>
					</div>
				</div>
				<label class=" control-label glyphicon glyphicon-eye-open" for="newPass">&ensp;</label><span>Hasło:</span>
				<div class="form-group has-feedback">
					<div class="col-md-12">
						<input type="password" class="form-control" id="newPass" name="newPass" placeholder="Podaj hasło do swojego konta...">
						<span id="znak" class="znak"></span>
						<span id="komunikat" class="komunikat"></span>
					</div>
				</div>
				<label class=" control-label glyphicon glyphicon-eye-open" for="newPass2">&ensp;</label><span>Powtórz hasło:</span>
				<div class="form-group has-feedback">
					<div class="col-md-12">
						<input type="password" class="form-control" id="newPass2" name="newPass2" placeholder="Powtórnie wprowadź hasło...">
						<span id="znak" class="znak"></span>
						<span id="komunikat" class="komunikat"></span>
					</div>
				</div>
				<label class=" control-label glyphicon glyphicon-envelope" for="newEmail">&ensp;</label><span>Email:</span>
				<div class="form-group has-feedback">
					<div class="col-md-12">
						<input type="text" class="form-control" id="newEmail" name="newEmail" placeholder="Podaj swój e-mail kontaktowy...">
						<span id="znak" class="znak"></span>
						<span id="komunikat" class="komunikat"></span>
					</div>
				</div>
								
				<div  class="form-group has-feedback">
					<div  class="col-md-12" >    
						<div id="submit"> 
							<input class="btn btn-success btn-block" value="Załóż konto">
						</div>
						<div id="result2"></div> <!-- Rezultat z PHP-->
					</div>
				</div>
			</form>
								
				</div>                
				<div class="col-md-4"></div>
				

				
			</div>
			</div>
      </div>
    </div>
	
    
	<?php 
	if(isset($_SESSION['zalogowanyad']))
	{
		echo '<div class="okno">';
		echo	'<a href="admin/indexad.php">';
		echo		'<div class=text>';
		echo			'<span class="ikona glyphicon glyphicon-chevron-down" aria-hidden="true"></span>';
		echo			'Panel administratora';
		echo		'</div>';
		echo	'</a>';
		echo '</div>';
	}
	?>	
	
	</body><script type="text/javascript">document.getElementsByTagName("div")[0].style.display = "none"; </script>

</html>