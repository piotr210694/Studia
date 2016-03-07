<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowany'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: kontakt.php');
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
		<title>PSI - Projektuj z pomysłem</title>
		<meta charset="UTF-8" />
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
	
	</head>
  
  <body>
<!-- Usuniecie konta - MODAL -->
<div id="myModal3" class="modal fade" role="dialog">
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
		<input type="submit" value="Usuń" class="btn btn-danger" >
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
 <li><a href='kontakt.php'><span>Kontakt</span></a></li>
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
			<li><a href='../user/manage.php'><span>Przeglądaj</span></a></li>
			<li><a href='#'  data-toggle="modal" data-target="#myModal3"><span>Usuń konto</span></a></li>
		</ul>
   </li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			
						<div class="container-fluid wys" >
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" style="padding:20px">
				
				<form action="php/connectKontaktlog.php" method="post" role="form">
				<div class="form-group"  >
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="form-group"  >
						<label for="message">Treść</label>
						<textarea type="text" class="form-control" rows="4" name="message" required></textarea>
				</div>
						<button type="submit" class="btn btn-primary btn-block">Wyślij!</button>
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