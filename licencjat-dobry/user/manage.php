<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowany'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: index.php');
		exit();
	}
?>

<!doctype html>

<html LANG="pl">
  
  <head>
	<meta charset="UTF-8" />
    <title>New Page</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- MENU -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="../js/script.js"></script>
	<link rel="stylesheet" href="../css/styles.css">
	
	<!-- LOGOWANIE -->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "explode",
        duration: 500
      }
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
  });
  </script>
  </head>
  
  <body>
<!-- Panel logowania -->
<div id="dialog" title="Panel logowania">
		<form action="php/zaloguj.php" method="post">
		Login: <input type="text" name="login" /><br><br>
		Hasło: <input type="password" name="password" /><br><br>
		<input type="submit" value="Zaloguj się"><br>
		Nie masz konta? <a href="rejestracja.php">Zarejestruj się!</a>
		</form>
</div>


    <div class="container">
      <div class="row">
        <div class="col-md-12">      
            <div class="container">
<!-- MENU -->
    <div id='cssmenu' class="navbar-fixed-top">
	<ul>
   <li><a href='../index2.php'><span>Strona główna</span></a></li>
   <li><a href='#'><span>Kontakt</span></a></li>
   <li class='active has-sub'><a><span>Artykuły</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Product 1</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Product 2</span></a>
            <ul>
               <li><a href='#'><span>Sub Product</span></a></li>
               <li class='last'><a href='#'><span>Sub Product</span></a></li>
            </ul>
         </li>
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
   <li><a href='#'><span>Kursy</span></a></li>
   <li class='last active has-sub' ><a><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABJUlEQVQ4jaWSr04DQRCHR1YgKoAgECUYDG+AWEXuz0x3llCPqMABCQkIEhJ4BAQCUX/H7UxCArwAIBAXNALBAyCQiMPQAO1drweT/NTu983sZgBKiq5oFtWek/AjCueo7iJKooWyu2Nlkt4MeudRuBjJbXjdm6sVoLApgQsULkiYawWkbq9KgMLH00xwOkFwVi/I7GblEzLbrxWEwssofFciyCO1q7UCAADybg2F337A75HvBlPBLNymS1oJs43FSHgLfXc7EO4Ewh0WbleCZmBasfDusDOpvSFvD2Nv91FdisIfX2dHZmBaY11R+HnC74/m9ddmktqDBvBwqU4AAGDdu3kUvm8qQG+fKKElILX9xvB3dgDVPvxDkAOqS2Phl78E1aWf25ZmvHtqCpEAAAAASUVORK5CYII="/></span></a>
		<ul>
			<li><a href='../php/logout.php'><span>Wyloguj się</span></a></li>
			<li><a href='manage.php'><span>Przeglądaj</span></a></li>
			<li><a href='#'><span>Edytuj dane</span></a></li>
			<li><a href='#'><span>Usuń konto</span></a></li>
		</ul>
   </li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			
			<div class="container-fluid" style="padding:20px">
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<table class="table table-hover">
					<thead>
					  <tr>
						<th>Rekord</th>
						<th>Dane</th>
						<th>Pole edycji</th>				
					  </tr>
					</thead>
			<form>
					<tbody>
					  <tr>
						<td><strong>Login</strong></td>
						<td>Michael</td>
						<td><input type="text" name="ud_first" value="">&nbsp;<input type="button" name="" value="Edytuj"></td>
					  </tr>
					  <tr>
						<td>Hasło</td>
						<td>Jake</td>
						<td><input type="text" name="ud_first" value=""></td>
					  </tr>
					  <tr>
						<td>E-mail</td>
						<td>Michael</td>
						<td><input type="text" name="ud_first" value=""></td>
					  </tr>
					  <tr>
						<td>Telefon</td>
						<td>Michael</td>
						<td><input type="text" name="ud_first" value=""></td>
					  </tr>
					  <tr>
						<td>Imię</td>
						<td>Michael</td>
						<td><input type="text" name="ud_first" value=""></td>
					  </tr>
					  <tr>
						<td>Nazwisko</td>
						<td>Michael</td>
						<td><input type="text" name="ud_first" value=""></td>
					  </tr>
					</tbody>
			</form>
				</table>
				</div>
				<div class="col-md-3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
    
  </body>

</html>