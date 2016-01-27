 <?php
	session_start(); //start sesji
?>

<?php 
	include('php/connectMenu.php');
?>

<?php 
	include('user/php/connection.php');
?>

<!doctype html>

<html LANG="pl">
  
  <head>
	<meta charset="UTF-8" />
    <title>New Page</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- MENU -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	
	<!-- LOGOWANIE -->


	  
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
		<label class="label"><input class="form-control" type="text" name="login" id="login" placeholder="Podaj login"/>
		</label></p>
		<p><label for="passwordw"><span class="glyphicon glyphicon-eye-open"></span> Hasło</label>		
		<label class="label"><input class="form-control" type="password" name="password" id="password" placeholder="Podaj hasło" />
		<p><div id="result"></div></p> <!-- tu wyswietla bledy-->
		<?php
	if(isset($_SESSION['blad'])){
		echo $_SESSION['blad'];
		// $message = "Błędny login lub hasło.";
// echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>
		</label></p>
		<button id="submit_btn" class="submit_btn btn btn-success btn-block" >Zaloguj</button>
   
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


<!-- Usuniecie konta - MODAL -->
<div id="myModal2" class="modal fade" role="dialog">
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
		<form action="user/php/delete.php" >
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
	<?php 
	$i=0;
	for($i; $i<1; $i++)
	{
		echo '<li><a href="index.php"><span>Strona główna</span></a></li>';
	}?>
   
   <li><a href='contact/kontakt.php'><span>Kontakt</span></a></li>
   <li class='active has-sub'><a><span>Artykuły</span></a>
      <ul>
	  	<?php 
		$ileA=$_SESSION['ileA'];
		for($i=0; $i<$ileA; $i++)
		{
			echo '<li><a href="';
			echo $_SESSION['linkA'][$i];
			echo '"><span>';
			echo $_SESSION["tytulA"][$i];
			echo '</span></a></li>';	
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
   	<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy: 
			{
				echo  '<li class="last active has-sub"><a><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABJUlEQVQ4jaWSr04DQRCHR1YgKoAgECUYDG+AWEXuz0x3llCPqMABCQkIEhJ4BAQCUX/H7UxCArwAIBAXNALBAyCQiMPQAO1drweT/NTu983sZgBKiq5oFtWek/AjCueo7iJKooWyu2Nlkt4MeudRuBjJbXjdm6sVoLApgQsULkiYawWkbq9KgMLH00xwOkFwVi/I7GblEzLbrxWEwssofFciyCO1q7UCAADybg2F337A75HvBlPBLNymS1oJs43FSHgLfXc7EO4Ewh0WbleCZmBasfDusDOpvSFvD2Nv91FdisIfX2dHZmBaY11R+HnC74/m9ddmktqDBvBwqU4AAGDdu3kUvm8qQG+fKKElILX9xvB3dgDVPvxDkAOqS2Phl78E1aWf25ZmvHtqCpEAAAAASUVORK5CYII="/></span></a>';
				echo '<ul>';
					echo '<li><a href="php/logout.php"><span>Wyloguj się</span></a></li>';
					echo '<li><a href="user/manage.php"><span>Przeglądaj</span></a></li>';
					echo '<li><a href="#"  data-toggle="modal" data-target="#myModal2"><span>Usuń konto</span></a></li>';
				echo '</ul>';
			echo '</li>';
			}
			else
			{
				echo '<li><a id="opener" style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><span>Zaloguj się</span></a></li>';
			}
			?>
     
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
<!-- 
			<div class="container-fluid" >
            <div class="row">
				<div class="col-md-12"><h1> Ciekawe czy działa</h1>


<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus eleifend nulla, non accumsan urna varius eget. Fusce sem risus, hendrerit id dolor non, ornare vestibulum libero. In mauris urna, tincidunt non semper sit amet, mattis sit amet metus. Vivamus ac varius sapien. Fusce lobortis eros eros, vitae suscipit leo condimentum sit amet. Sed commodo pulvinar dui sit amet gravida. Nam eu urna quis orci tempus sodales.<p>

<p>Mauris non ante cursus, auctor purus id, condimentum lacus. Mauris bibendum lobortis nunc in ullamcorper. Fusce tempor cursus quam, porttitor varius nisi imperdiet vitae. Vestibulum suscipit ullamcorper metus, a maximus nisi aliquam ut. Suspendisse vel est viverra, pharetra ex et, luctus mauris. Aenean quis arcu turpis. Etiam eget interdum leo, sit amet rutrum ante. Integer eget ipsum vulputate, porttitor purus ut, maximus nisi. Suspendisse sit amet odio arcu. Praesent facilisis pellentesque ultrices.<p>

<p>Cras elementum laoreet arcu, bibendum imperdiet nibh sollicitudin non. Duis hendrerit non enim eu egestas. Nam nec neque lorem. Suspendisse in condimentum elit. Pellentesque luctus ultrices turpis. Nullam sit amet dignissim erat, a eleifend massa. In hac habitasse platea dictumst. Etiam ut erat vel sapien interdum bibendum. Mauris nec eros eget elit cursus venenatis.<p>

<p>Nam tincidunt, ligula eget congue feugiat, lorem sapien tristique purus, non mattis lorem neque et neque. Nunc quis turpis tortor. Ut euismod ultricies varius. Etiam eget purus congue, laoreet metus sit amet, dictum ante. Duis quis rhoncus dolor. Proin eu pretium quam, vel pharetra elit. Nullam nec convallis nisi, tincidunt volutpat metus. Maecenas placerat quis enim non pellentesque. Nulla gravida tincidunt egestas. Phasellus vehicula dolor nibh. Nulla facilisi. Proin accumsan pretium tincidunt. Duis ut tellus euismod, sollicitudin enim in, lobortis lorem.<p>

<p>Nulla posuere ligula sit amet leo imperdiet consectetur. Donec vel efficitur turpis, non tempor libero. Duis id laoreet lectus. Curabitur quis purus bibendum, dapibus lectus quis, ultricies mi. Morbi ac tortor nec erat feugiat blandit ut eget risus. Nullam ut ligula dignissim dui vestibulum blandit sed vitae leo. Curabitur rhoncus libero sit amet turpis faucibus, vel sollicitudin ipsum tristique. Aenean id sem justo. Aliquam auctor vel lorem ut porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec a sodales mauris. Phasellus placerat, erat id gravida commodo, urna enim dictum magna, nec semper ligula magna quis magna.<p> 

<p>Nam tincidunt, ligula eget congue feugiat, lorem sapien tristique purus, non mattis lorem neque et neque. Nunc quis turpis tortor. Ut euismod ultricies varius. Etiam eget purus congue, laoreet metus sit amet, dictum ante. Duis quis rhoncus dolor. Proin eu pretium quam, vel pharetra elit. Nullam nec convallis nisi, tincidunt volutpat metus. Maecenas placerat quis enim non pellentesque. Nulla gravida tincidunt egestas. Phasellus vehicula dolor nibh. Nulla facilisi. Proin accumsan pretium tincidunt. Duis ut tellus euismod, sollicitudin enim in, lobortis lorem.<p>

<p>Nulla posuere ligula sit amet leo imperdiet consectetur. Donec vel efficitur turpis, non tempor libero. Duis id laoreet lectus. Curabitur quis purus bibendum, dapibus lectus quis, ultricies mi. Morbi ac tortor nec erat feugiat blandit ut eget risus. Nullam ut ligula dignissim dui vestibulum blandit sed vitae leo. Curabitur rhoncus libero sit amet turpis faucibus, vel sollicitudin ipsum tristique. Aenean id sem justo. Aliquam auctor vel lorem ut porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec a sodales mauris. Phasellus placerat, erat id gravida commodo, urna enim dictum magna, nec semper ligula magna quis magna.<p> 
			</div> 
            </div>
			<hr>
			</div>
-->
			
			<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy: 
			{
				$_SESSION['url'] = $_SERVER['REQUEST_URI'];//wyciaganie adresu
				include('admin/article/php/comment/showKom.php'); //sciagamy dane komentarzy
				include('php/connectKursy1.php');

				
				//Form do komentarzy
									// echo '<div class="container" >';
				// echo '<div class="row">';

				// echo '<div class="col-md-6" style="padding:20px; clear: left;">';
				// echo '<h3 style="">Komentarze: (';
				// echo $_SESSION['ileKom'];
				// echo ')</h3>';
				// echo '<form action="../php/comment/connectKom.php".php" method="post" role="form">';
				// echo '<div class="form-group"  >';
				// echo		'<p><textarea required type="text" class="form-control" name="komentarz" row="2" placeholder="Napisz komentarz" required></textarea>';
				// echo		'</div>';
				// echo		'<button type="submit" class="btn btn-success pull-left btn-block ">Wyślij</button></p>';
				// echo '</form>';
				// echo '</div>';
				// echo '<div class="col-md-3">';
				// echo '</div>';
				// echo '</div>';
				// echo '</div>';
				
			echo '<div class="container-fluid" >';
            echo '<div class="row">';
			echo '<div class="col-md-3"></div>';
			echo '<div class="col-md-6" style="padding:20px">';
				echo '<form action="php/connectKursy.php" method="post" role="form">';
				
				echo '<label>Wybierz kurs:</label>';
				
				for($i=0;$i<$_SESSION['ileKurs'];$i++)
				{
					echo '<div class="checkbox">';
					echo '<label><input type="checkbox" id="kurs" name="kurs[]" value="';
					echo $_SESSION['tytulKurs'][$i];
					echo '" >';
					echo $_SESSION['tytulKurs'][$i];
					echo '. Cena: ';
					echo $_SESSION['cenaKurs'][$i];
					echo 'zł ';
					echo '</label>';
					echo '</div>';
				}
				
				echo '<div class="form-group"  >';
					echo '<label for="email">Email</label>';
					echo '<input type="email" class="form-control" name="email" value="';
					echo $_SESSION["email"];
					echo '" required>';
				echo '</div>';
				echo '<button type="submit" class="btn btn-primary btn-block">Zamów!</button>';
				echo '</form>';
				if(isset($_SESSION['komunikatKurs']))
				{
					echo $_SESSION['komunikatKurs'];
				}
			echo '</div>';
			echo '<div class="col-md-3"></div>';
			echo '</div>';
			echo '</div>';

				
				/////Wyświetleni komentarzy
					// echo '<div class="container" >';
				// echo '<div class="row">';
				// echo '<div class="col-md-3"></div>';
				// echo '<div class="col-md-6" style="padding:20px; clear: left;">';
				/////Panele z bootstrap
				// echo '<div class="panel-group">';
				
				// for($i=0; $i<$_SESSION['ileKom']; $i++)
				// {
					// echo '<div class="panel panel-primary">';
					// echo '<div class="panel-heading">';
						// echo '<div  class="text-right" >';
						// if(isset($_SESSION['data'])){echo $_SESSION['data'][$i];}
						// echo '</div>';
						// echo '<div  class="text-left" ><strong><span style="text-transform: uppercase;">';
						// echo $_SESSION['loginKom'][$i];
						// echo '</span></strong> napisał:</div>';
					// echo '</div>';
					// echo '<div class="panel-body">';
					// if(isset($_SESSION['tresc'])){echo $_SESSION['tresc'][$i];}
					// echo '</div>';
					// echo '</div>';
				// }
				
				// echo '</div>';
				// echo '</div>';
				// echo '<div class="col-md-3">';
				// echo '</div>';
				// echo '</div>';
				// echo '</div>';
	

			}
			else
			{
				echo '<div class="container-fluid" >';
				echo '<div class="row">';
				echo '<div class="col-md-12" style="padding:20px;">';
				echo '<span style="color: #5CB85C;">Aby przeglądać tą część witryny musisz się <a href="#" data-toggle="modal" data-target="#myModal">zalogować</a>!<span>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			?>

			
			
				
          
        </div>
      </div>
    </div>
	  </body>

</html>