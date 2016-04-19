 <?php
	session_start(); //start sesji
?>

<?php 
	include('../../php/connectMenu.php');
?>

<?php 
	include('php/viewTutorials.php');
?>

<!doctype html>

<html LANG="pl">
  
	<head>
	<meta charset="UTF-8" />
	<title>PSI - Projektuj z pomysłem</title>
	<link rel="icon" href="../../01.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- MENU -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="../../js/script.js"></script>
	<link rel="stylesheet" href="../../css/styles.css">
	
	<!-- LOGOWANIE -->
	
	<script>
	  function post()
		{
			  var login = $('#login').val();
			  var password = $('#password').val();
			
			
			$.post('../../php/zaloguj.php', {login:login, password:password},
			function(data)
			{
				$('#result').html(data);
			});
		}
	</script>
	<script>
	// Sprawdzenie jaka wartosc zawiera dropdown1
	$(document).ready(function()
	{
		var x = "";
		var y = 0;
		$('.dropdown1 .dropdown-menu li a').on('click', function(e) 
		{
			e.preventDefault(); // important - to prevent page refresh
			$('.main-table').remove(); //usuniecie
			x = $(this).text();
			$("#dropdownMenu1:first-child").html($(this).text()+' <span class="caret"></span>'); //zmiana aktywnej nazwy
			
			$.post('php/viewArticle2.php', {x:x, y:y},
			function(data)
			{
				$('#result2').html(data);
			}); 
		});
		
		$('.dropdown2 .dropdown-menu li a').on('click', function(e) 
		{
			e.preventDefault(); // important - to prevent page refresh
			$('.main-table').remove(); //usuniecie
			y = $(this).attr('name');
			$("#dropdownMenu2:first-child").html($(this).text()+' <span class="caret"></span>'); //zmiana aktywnej nazwy
			
			var login = "he";
			$.post('php/viewArticle2.php', {y:y, x:x},
			function(data)
			{
				$('#result2').html(data);
			}); 
			
		});
	});
	

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
	      <p><a href="../remindpass.php">Zapomniałeś hasła? </a></p>
          <p>Nie masz konta? <a href="../registration.php">Dołącz do nas</a></p>
		  <p>Przejdź do <a href="../admin/logowanie.php">panelu administratora</a></p>
      </div>
    </div>

  </div>
  </form>
</div>


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
		<form action="user/php/delete.php" >
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
	<?php 
	$i=0;
	for($i; $i<1; $i++)
	{
		echo '<li><a href="../../index.php"><span>Strona główna</span></a></li>';
	}?>
   
   <li><a href='../../contact/kontakt.php'><span>Kontakt</span></a></li>
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
				if($ileA[$i] < $ile+1)
				{
					for($j=0; $j<$ileA[$i]; $j++)
					{
						echo '<li><a href="../../';
						echo $linki[$i][$j];
						echo '">'.$tytuly[$i][$j].'</a>';
						echo '</li>';
					}
				}
				else
				{
					for($j=0; $j<$ile; $j++)
					{
						echo '<li><a href="../../';
						echo $linki[$i][$j];
						echo '">'.$tytuly[$i][$j].'</a>';
						echo '</li>';
					}
					echo '<li class="last" ><a href="';
					echo "article.php";
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
     <li><a href='../../kursy.php'><span>Kursy</span></a></li>
   	<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy: 
			{
				echo  '<li class="last active has-sub"><a><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABJUlEQVQ4jaWSr04DQRCHR1YgKoAgECUYDG+AWEXuz0x3llCPqMABCQkIEhJ4BAQCUX/H7UxCArwAIBAXNALBAyCQiMPQAO1drweT/NTu983sZgBKiq5oFtWek/AjCueo7iJKooWyu2Nlkt4MeudRuBjJbXjdm6sVoLApgQsULkiYawWkbq9KgMLH00xwOkFwVi/I7GblEzLbrxWEwssofFciyCO1q7UCAADybg2F337A75HvBlPBLNymS1oJs43FSHgLfXc7EO4Ewh0WbleCZmBasfDusDOpvSFvD2Nv91FdisIfX2dHZmBaY11R+HnC74/m9ddmktqDBvBwqU4AAGDdu3kUvm8qQG+fKKElILX9xvB3dgDVPvxDkAOqS2Phl78E1aWf25ZmvHtqCpEAAAAASUVORK5CYII="/></span></a>';
				echo '<ul>';
					echo '<li><a href="../../php/logout.php"><span>Wyloguj się</span></a></li>';
					echo '<li><a href="../../user/manage.php"><span>Przeglądaj</span></a></li>';
					echo '<li><a href="#"  data-toggle="modal" data-target="#myModal3"><span>Usuń konto</span></a></li>';
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
			
			<div class="container-fluid wys" >
            <div class="row">
				<div class="col-md-12">
					<p>
					<div class="dropdown dropdown1">
					  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Wszystkie kategorie
						<span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<?php 
							for($i = 0; $i < $ileKat; $i++)
							{
								echo '<li><a href="">';
								echo  $nazwaKa[$i];
								echo '</a></li>';
							}
						?>
						<li role="separator" class="divider"></li>
						<li><a href="" name="0">Wszystkie kategorie</a></li>
					  </ul>
					</div>
					</p>
					
					<p>
					<div class="dropdown dropdown2">
					  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    <span class="dropdownActive2">Artykuły - od najnowszych</a>
						<span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
						<li><a href="#" name="1">Artykuły - od najnowszych</a></li>
						<li><a href="#" name="2">Artykuły - od najstarszych</a></li>
						<li><a href="#" name="3">Artykuły - A-Z</a></li>
						<li><a href="#" name="4">Artykuły - Z-A</a></li>
					  </ul>
					</div>
					</p>
							<table class="table table-hover main-table">
								<thead>
								  <tr>
									<th>Artykuł</th>
									<th>Kategoria</th>
									<th>Data utworzenia</th>
								  </tr>
								</thead>
								<tbody>
									<?php
										for($i = 0; $i < $ileArt; $i++)
										{
											echo '<tr>';
											echo '	<td>';
											echo '		<a href="../../';
											echo 			$link[$i];
											echo '		">';
											echo 			$tytul[$i];
											echo 		'</a>';
											echo '	</td>';
											echo '	<td>';
											echo 		$nazwaKate[$idK[$i]];
											echo '	</td>';
											echo '	<td>';
											echo 		$data[$i];
											echo '	</td>';
											echo '</tr>';
										}
									?>
								</tbody>
							</table>
				 
				<div id="result2"> </div>
			
			
				

				</div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<?php 
	if(isset($_SESSION['zalogowanyad']))
	{
		echo '<div class="okno">';
		echo	'<a href="../indexad.php">';
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