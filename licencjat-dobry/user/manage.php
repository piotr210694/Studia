<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowany'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../index.php');
		exit();
	}
?>

<!-- Łaczymy się i wyciagamy dane-->	
<?php 
	include('../php/viewManage.php');
	include('../php/connectMenu.php');
?>




<!doctype html>

<html LANG="pl">
  
  <head>
	<meta charset="UTF-8" />
	<title>PSI - Projektuj z pomysłem</title>
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="../01.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="../css/style.css">
	
    <!-- 
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
		-->
		<link rel="stylesheet" href="../css/bootstrap-3.1.1/dist/css/bootstrap.css">

		
		<script src="../js/jquery.min.js" type="text/javascript"></script>
		<script src="../js/bootstrap.min.js" type="text/javascript"></script>
		
		<!-- MENU -->
		<!--
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.8/jquery.form-validator.min.js"></script>
		-->
		<script src="../js/jquery-latest.min.js" type="text/javascript"></script>
		<script src="../js/jquery.form-validator.min.js" type="text/javascript"></script>
		<script src="../js/script.js"></script>
		<link rel="stylesheet" href="../css/styles.css">
	
	<!-- WALIDACJA FORMULARZA -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- <script src="js/walidacja.js"></script> --> <!-- Nasz skrypt z walidacją -->
	
	
	<script>
$(document).ready(function() {
 
 //Walidacja loginu
 $('#elogin').on('blur', function() {
 var input = $(this);
 var name_length = input.val().length;
 var login = input.val();
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
	
	
	var twojLogin = '<?php echo $login;?>'; //login obecnego uzytkownika
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

 if((name_length >= 5 && name_length <= 15) && (loginWBazie==0 || (loginWBazie==1 && login==twojLogin)))
 {
	input.removeClass("invalid").addClass("valid");
	input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Wprowadzony login jest poprawny!").removeClass("blad").addClass("ok");
 }
 if(loginWBazie==1 && login!=twojLogin)
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
 
 //test
 $('#name').on('blur', function() {
 var input = "siema";

 input.next('.znak').text("ok!");
 

 });
 
 //Walidacja email
 $('#eemail').on('blur', function() {
 var input = $(this);
 var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
 var is_email = pattern.test(input.val());
 var email = input.val();
 
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
				
	var twojEmail = '<?php echo $email;?>'; //login obecnego uzytkownika
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
 
 if(is_email && (emailWBazie==0 || (emailWBazie==1 && email==twojEmail))){
 input.removeClass("invalid").addClass("valid");
 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Wprowadzony e-mail jest poprawny!").removeClass("blad").addClass("ok");
 }
 else if(emailWBazie==1 && email!=twojEmail){
  input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Adres e-mail jest już w bazie! Podaj inny!").removeClass("ok").addClass("blad");
 }
 else{
  input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Adres e-mail jest nieprawidłowy!").removeClass("ok").addClass("blad");
 }
 }); 
 
  //Walidacja phone
 $('#ephone').on('blur', function() {
 var input = $(this);
 var pattern = /^([0-9]{9})$/i;
 var is_email = pattern.test(input.val());
 if(is_email){
 input.removeClass("invalid").addClass("valid");
 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Wprowadzony numer jest poprawny!").removeClass("blad").addClass("ok");
 }
 else{
  input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Zła długość numeru lub wprowadzony znak tekstowy!").removeClass("ok").addClass("blad");
 }
 }); 
 
   //Walidacja name
 $('#ename').on('blur', function() {
 var input = $(this);
 var pattern = /^([A-Za-ząćęłńóśźżĄĘŁŃÓŚŹŻ]{1,})$/i;
 var is_email = pattern.test(input.val());
 if(is_email){
 input.removeClass("invalid").addClass("valid");
 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Wprowadzone imię jest poprawne!").removeClass("blad").addClass("ok");
 }
 else{
  input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Wprowadzono cyfrę lub imię jest za krótkie!").removeClass("ok").addClass("blad");
 }
 }); 
 
 //Walidacja surname
 $('#esurname').on('blur', function() {
 var input = $(this);
 var pattern = /^([A-Za-ząćęłńóśźżĄĘŁŃÓŚŹŻ]{1,})$/i;
 var is_email = pattern.test(input.val());
 if(is_email){
 input.removeClass("invalid").addClass("valid");
 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Wprowadzone nazwisko jest poprawne!").removeClass("blad").addClass("ok");
 }
 else{
  input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Wprowadzono cyfrę lub nazwisko jest za krótkie!").removeClass("ok").addClass("blad");
 }
 }); 
 
 //Walidacja oldpass
 $('#oldpass').on('blur', function() {
 var input = $(this);
 var oldpass2 = '<?php echo $pass;?>';
 var oldpass = input.val();
 if(oldpass == oldpass2){
 input.removeClass("invalid").addClass("valid");
 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Wprowadzone hasło jest poprawne!").removeClass("blad").addClass("ok");
 }
 else{
  input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Hasło jest nieprawidłowe!").removeClass("ok").addClass("blad");
 }
 }); 
 
	var newpass; //zmienna globalna
	var is_pass;
  //Walidacja newpass
 $('#newpass').on('blur', function() {
 var input = $(this);
 newpass = input.val();
 dl = input.val().length;
 var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[\!\@\#\$\%\^\&\*\(\)\_\+\-\=])(?=.*[A-Z])(?!.*\s).{8,}$/i;
 is_pass = pattern.test(input.val());
 if(is_pass){
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
 
   //Walidacja newpass2
 $('#newpass2').on('blur', function() {
 var input = $(this);
 var newpass2 = input.val();
 if(newpass == newpass2 && is_pass){
 input.removeClass("invalid").addClass("valid");
 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Hasła pokrywają się!").removeClass("blad").addClass("ok");
 }
 else{
  input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Hasła nie są takie same!").removeClass("ok").addClass("blad");
 }
 }); 

 
 //Po próbie wysłania formularza ZMIANA HASŁA
 $('#submit2 input').click(function(event){
 var checkPass = $('#oldpass');
 var checkPass1 = $('#newpass');
 var checkPass2 = $('#newpass2');

 if(checkPass.hasClass('valid') && checkPass1.hasClass('valid') && checkPass2.hasClass('valid'))
 {
	post(); 
 }
 else
 {
	event.preventDefault();
	alert("Uzupełnij poprawnie wszystkie wymagane pola!"); 
 }
 });
 
 //Po próbie wysłania formularza EDYCJA DANYCH
 $('#submit input').click(function(event){
 var checkLogin = $('#elogin');
 var checkEmail = $('#eemail');
 var checkPhone = $('#ephone');
 var checkName = $('#ename');
 var checkSurname = $('#esurname');

 
 if(checkLogin.hasClass('invalid') || checkEmail.hasClass('invalid') || checkPhone.hasClass('invalid') || checkName.hasClass('invalid') || checkSurname.hasClass('invalid'))
 {
	event.preventDefault();
	alert("BŁĄD! Prawidłowo uzupełnij edytowane pola!"); 
 }
 else if((checkLogin.hasClass('valid') || checkEmail.hasClass('valid') || checkPhone.hasClass('valid') || checkName.hasClass('valid') || checkSurname.hasClass('valid')))
 {
	post2();
 }
 else
 {
	alert("Uwaga! Nie edytujesz żadnego z pól!"); 
 }

 });
 
});

		//funkcja zmiany hasła
		function post()
		{
			var oldpass = $('#oldpass').val();
			var newpass = $('#newpass').val();
			var newpass2 = $('#newpass2').val();
			
			$.post('php/edytujHaslo.php', {oldpass:oldpass, newpass:newpass, newpass2:newpass2},
			function(data)
			{
				$('#result').html(data);
			});
		}
		
		//funkcja edycji danych
		function post2()
		{
			var elogin = $('#elogin').val();
			var eemail = $('#eemail').val();
			var ephone = $('#ephone').val();
			var ename = $('#ename').val();
			var esurname = $('#esurname').val();
			
			$.post('php/edytujDane.php', {elogin:elogin, eemail:eemail, ephone:ephone, ename:ename, esurname:esurname},
			function(data)
			{
				$('#result2').html(data);
			});
		}
		
		
</script>

  
  
  </head>
  
  <body>

<!-- Usuniecie konta - MODAL -->
<div id="myModal3" class="modal fade alert-primary" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie konta</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć konto?</p>
      </div>
      <div class="modal-footer">
		<form action="php/delete.php" >
		<input type="submit" value="Usuń" class="btn btn-danger" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
      </div>
    </div>

  </div>
</div>



<!-- Zmiana hasła - MODAL -->
<div id="myModal2" class="modal fade bgColorWhite"" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Zmiana hasła</h4>
      </div>
      <div class="modal-body">
	 <form class="form-horizontal" role="form">
				<div class="form-group has-feedback">
					<div class="col-sm-12">
					  <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Podaj obecne hasło...">
					  <span class="znak"></span>
					  <span class="komunikat"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<div class="col-sm-12">
					  <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Podaj nowe hasło...">
					  <span class="znak"></span>
					  <span class="komunikat"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<div class="col-sm-12">
					  <input type="password" class="form-control" id="newpass2" name="newpass2" placeholder="Powtórz hasło...">
					  <span class="znak"></span>
					  <span class="komunikat"></span>
					</div>
				</div>
				 <div id="result"></div> <!-- Rezultat ECHO z edit.php -->
		</form>
	  
      </div>
      <div class="modal-footer" id="submit2"> 
		<input type="submit" value="Zmień hasło" class="btn btn-primary" >		 
        <button type="button" class="btn btn-default" data-dismiss="modal" >Anuluj</button>
      </div>
    </div>

  </div>
</div>



    <div class="container">
      <div class="row">
        <div class="col-md-12">      
            <div class="container">
<!-- MENU -->
    <div id='cssmenu' class="navbar-fixed-top">
	<ul>
   <li><a href='../index2.php'><span>Strona główna</span></a></li>
  <li><a href='../contact/kontakt.php'><span>Kontakt</span></a></li>
   <li class='active has-sub'><a><span>Artykuły</span></a>
      <ul>
	  	<?php 
		for($i=0; $i<$ileK; $i++)
		{
			echo '<li><a href="">'.$kategoria[$i].'</a>';
			echo '<ul>';
			if($ileA[$i]<$ile+1)
			{
				for($j=0; $j<$ileA[$i]; $j++)
				{
					echo '<li><a href="../';
					echo $linki[$i][$j];
					echo '">'.$tytuly[$i][$j].'</a>';
					echo '</li>';
				}
			}
			else
			{
				for($j=0; $j<$ile; $j++)
				{
					echo '<li><a href="../';
					echo $linki[$i][$j];
					echo '">'.$tytuly[$i][$j].'</a>';
					echo '</li>';
				}
				echo '<li class="last" ><a href="';
				echo "";
				echo '">'.'***POKAŻ WIĘCEJ***'.'</a>';
				echo '</li>';
			}
			
			echo '</ul>';
			echo '</li>';
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
   <li><a href='../kursy.php'><span>Kursy</span></a></li>
   <li class='last active has-sub' ><a><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABJUlEQVQ4jaWSr04DQRCHR1YgKoAgECUYDG+AWEXuz0x3llCPqMABCQkIEhJ4BAQCUX/H7UxCArwAIBAXNALBAyCQiMPQAO1drweT/NTu983sZgBKiq5oFtWek/AjCueo7iJKooWyu2Nlkt4MeudRuBjJbXjdm6sVoLApgQsULkiYawWkbq9KgMLH00xwOkFwVi/I7GblEzLbrxWEwssofFciyCO1q7UCAADybg2F337A75HvBlPBLNymS1oJs43FSHgLfXc7EO4Ewh0WbleCZmBasfDusDOpvSFvD2Nv91FdisIfX2dHZmBaY11R+HnC74/m9ddmktqDBvBwqU4AAGDdu3kUvm8qQG+fKKElILX9xvB3dgDVPvxDkAOqS2Phl78E1aWf25ZmvHtqCpEAAAAASUVORK5CYII="/></span></a>
		<ul>
			<li><a href='../php/logout.php'><span>Wyloguj się</span></a></li>
			<li><a href='manage.php'><span>Przeglądaj</span></a></li>
			<li><a href='#'  data-toggle="modal" data-target="#myModal3"><span>Usuń konto</span></a></li>
		</ul>
   </li>
</ul>

	</div>
<!-- KONIEC MENU-->

<!-- WALIDACJA --> 
	</div>

			<div class="container-fluid wys" style="padding:20px">
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 ">
							
				<form class="form-horizontal" role="form"  >
				<div class="form-group has-feedback">
					<label class="col-md-3 control-label glyphicon glyphicon-user" for="elogin">&ensp;Login:</label>
					<div class="col-md-9">
					  <input type="text" class="form-control" id="elogin" name="elogin" value=<?php echo $login; ?>>
					  <span class="znak"></span>
					  <span class="komunikat"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="col-md-3 control-label glyphicon glyphicon-eye-open" for="pass">&ensp;Hasło:</label>
					<div class="col-md-9">
					 <input data-toggle="modal" data-target="#myModal2" class="btn btn-primary btn-block" value="Zmień hasło"> 
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="col-md-3 control-label glyphicon glyphicon-envelope" for="eemail">&ensp;Email:</label>
					<div class="col-md-9">
					  <input type="text" class="form-control" id="eemail" name="eemail" value=<?php echo $email; ?>>
					  <span class="znak"></span>
					  <span class="komunikat"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="col-md-3 control-label glyphicon glyphicon-phone" for="ephone">&ensp;Telefon:</label>
					<div class="col-md-9">
					  <input type="text" class="form-control" id="ephone" name="ephone" value=<?php echo $phone; ?>>
					  <span class="znak"></span>
					  <span class="komunikat"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="col-md-3 control-label glyphicon glyphicon-pencil" for="ename">&ensp;Imię:</label>
					<div class="col-md-9">
					  <input type="text" class="form-control" id="ename" name="ename" value=<?php echo $name; ?>>
					  <span class="znak"></span>
					  <span class="komunikat"></span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="col-md-3 control-label glyphicon glyphicon-pencil" for="esurname">&ensp;Nazwisko:</label>
					<div class="col-md-9">
					  <input type="text" class="form-control" id="esurname" name="esurname" value=<?php echo $surname; ?>>
					  <span class="znak"></span>
					  <span class="komunikat"></span>
					</div>
				</div>
				
				<div  class="form-group has-feedback">
				<div  class="col-md-3" > </div>
				<div  class="col-md-9" >    
				<div id="submit"> 
				<input class="btn btn-success btn-block" value="Zapisz zmiany">
				</div>
				<br>
				<div id="result2"></div> <!-- Rezultat z PHP-->
				</div>
				</div>
				
				</form>
 
					 
					
				
						
						
				
				</div>
				<div class="col-md-3"></div>

				
				
            </div>
          </div>
        </div>
      </div>
	  
    </div>
	
	</div>
	
	<footer >
		<div class = "linia"><hr style=" height: 5px; border: 0;  box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);"></div>
		 <div class="container" >
		 <div class="row">
				<div class="col-md-12 ">
				<p class="text-center" style=" color:black;">************************** ...Tu będzie stopka...**************************</p>
				</div>
		</div>
		</div>
	</footer>

	
	<?php 
	if(isset($_SESSION['zalogowanyad']))
	{
		echo '<div class="okno">';
		echo	'<a href="../admin/indexad.php">';
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