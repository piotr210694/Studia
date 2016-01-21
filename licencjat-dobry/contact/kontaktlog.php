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
	include('../user/php/connection.php');
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

<!-- Usuniecie konta - MODAL -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header modal-header-danger ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie konta</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć konto?</p>
      </div>
      <div class="modal-footer">
		<form action="../user/php/delete.php" >
		<input type="submit" value="Usuń" class="btn btn-default" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
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
   <li><a href='kontaktlog.php'><span>Kontakt</span></a></li>
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
			<li><a href='../user/manage.php'><span>Przeglądaj</span></a></li>
			<li><a href='#'  data-toggle="modal" data-target="#myModal"><span>Usuń konto</span></a></li>
		</ul>
   </li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			
						<div class="container-fluid" >
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" style="padding:20px">
				
				<form action="php/connectKontaktlog.php" method="post" role="form">
				<div class="form-group"  >
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" required>
				</div>
				<div class="form-group"  >
						<label for="message">Treść</label>
						<textarea type="text" class="form-control" rows="4" name="message" required></textarea>
				</div>
						<button type="submit" class="btn btn-default">Wyślij!</button>
						</form>			
						<?php 
							if(isset($_SESSION['komunikatKONlog']))
							echo $_SESSION['komunikatKONlog'];		
						?>
				</div>                
				<div class="col-md-3"></div>
				

				
			</div>
			</div>
		</div>
	</div>
	</div>
	
    
  </body>

</html>