<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowany'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: index.php');
		exit();
	}
?>

<!-- Łaczymy się i wyciagamy dane-->	
<?php 
	include('php/connectMenu.php');
?>

<!doctype html>

<html LANG="pl">
  
	<head>
		<meta charset="UTF-8" />
		<title>PSI - Projektuj z pomysłem</title>
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
		-->
		<script src="js/jquery-latest.min.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<link rel="stylesheet" href="css/styles.css">
	
		<!-- LOGOWANIE -->
		<!--
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		-->
		<link rel="stylesheet" href="css/jquery-ui.css">
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery-ui.js"></script>

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
   <li><a href='index2.php'><span>Strona główna</span></a></li>
   <li><a href='contact/kontaktlog.php'><span>Kontakt</span></a></li>
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
            <!-- <li><a href='admin/tutorial/samouczki/samouczekTest.php'><span>Test</span></a></li> -->
            <?php
				if($ileS < $doIluS + 1)
				{
					for($j = 0; $j < $ileS; $j++)
					{
						echo '<li><a href="';
						echo $linkiS[$j];
						echo '">'.$tytulyS[$j].'</a>';
						echo '</li>';
					}
				}
				else
				{
					for($j = 0; $j < $doIluS; $j++)
					{
						echo '<li><a href="';
						echo $linkiS[$j];
						echo '">'.$tytulyS[$j].'</a>';
						echo '</li>';
					}
					echo '<li class="last" ><a href="admin/tutorial/tutorials.php';
					echo "";
					echo '">'.'***POKAŻ WIĘCEJ***'.'</a>';
					echo '</li>';
				}
			?>
        </ul>
   </li>
   <li class='active has-sub'><a><span>Quizy</span></a>
		<ul>
            <li><a href='#'><span>Sub Product</span></a></li>
            <li class='last'><a href='#'><span>Sub Product</span></a></li>
        </ul>
   </li>
   <li class='last active has-sub' ><a><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABJUlEQVQ4jaWSr04DQRCHR1YgKoAgECUYDG+AWEXuz0x3llCPqMABCQkIEhJ4BAQCUX/H7UxCArwAIBAXNALBAyCQiMPQAO1drweT/NTu983sZgBKiq5oFtWek/AjCueo7iJKooWyu2Nlkt4MeudRuBjJbXjdm6sVoLApgQsULkiYawWkbq9KgMLH00xwOkFwVi/I7GblEzLbrxWEwssofFciyCO1q7UCAADybg2F337A75HvBlPBLNymS1oJs43FSHgLfXc7EO4Ewh0WbleCZmBasfDusDOpvSFvD2Nv91FdisIfX2dHZmBaY11R+HnC74/m9ddmktqDBvBwqU4AAGDdu3kUvm8qQG+fKKElILX9xvB3dgDVPvxDkAOqS2Phl78E1aWf25ZmvHtqCpEAAAAASUVORK5CYII="/></span></a>
		<ul>
			<li><a href='php/logout.php'><span>Wyloguj się</span></a></li>
			<li><a href='user/manage.php'><span>Przeglądaj</span></a></li>
			<li><a href='user/accountRole.php'><span>Typ konta</span></a></li>
			<li><a href='#'  data-toggle="modal" data-target="#myModal3"><span>Usuń konto</span></a></li>
		</ul>
   </li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			
			<div class="container-fluid wys" >
            <div class="row">
				<div class="col-md-12 ">
				<h1><span style="color: green;"><?php if(isset($_SESSION['login'])){echo $_SESSION['login'];} ?></span>, witaj na naszej stronie!</h1> 
				<?php
					if($_SESSION['rola'] == 'root')
					{
						echo '<p>';
						echo 'Twoje uprawnienia to: <b style="text-transform: uppercase;">';
						echo "Administrator";
						echo '</b>';
						echo '</p>';
						echo '<p>';
						echo 'Jako administrator posiadasz takie same uprawnienia jak aktorzy o niższej randze. Dodatkowo dysponujesz opcją przejścia do panelu administratora, gdzie możesz zarządzać stroną. Możesz sprawować kontrolę nad:
						<ul style="margin-left: -27px;">
							<li > artykułami,</li>
							<li> komentarzami, </li> 
							<li> quizami, </li>
							<li> samouczkami, </li>
							<li> galerią zdjęć, </li>
							<li> plikami do pobrania, </li> 
							<li> użytkownikami.</li>
						</ul>';
						
						echo '</p>';
					}
				?>
				<?php
					if($_SESSION['rola'] == 'student')
					{
						echo '<p>';
						echo 'Twoje uprawnienia to: <b style="text-transform: uppercase;">';
						echo "Student";
						echo '</b></p>';
						echo '<p>';
						echo 'Jako student poza funkcjonalnościami dostępnymi dla zwykłego użytkownika masz możliwość:
						<ul style="margin-left: -27px;">
							<li > pobierania pdfów, które służą do rozszerzenia wiedzy z danej dziedziny naukowej.</li>
						</ul>';
						
						echo '</p>';
					}
				?>
				<?php
					if($_SESSION['rola'] == 'user')
					{
						echo '<p>';
						echo 'Twoje uprawnienia to: <b style="text-transform: uppercase;">';
						echo "Zwykły użytkownik";
						echo '</b></p>';
						echo '<p>';
						echo 'Jako zwykły użytkownik posiadasz większe uprawnienia niż gość. Masz dostęp do wszelkich materiałów zawartych na stronie. Poza tym jakże ważnym aspektem możesz także:
						<ul style="margin-left: -27px;">
							<li > dodawać komentarze do artykułów ,</li>
							<li> przeglądać samouczki, </li> 
							<li> przeglądać quizy, </li>
							<li> zarządzać swoim kontem. </li>
						</ul>';
						echo '</p>';
					}
				?>
				
				</div>

            </div>
          </div>
        </div>
	
      </div>
	  
	 
	  
	  
    </div>
				
	<footer id="foot" >
		<!-- <hr style=" height: 5px; border: 0;  box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);"> -->
		 <div class="container" >
		 <div class="row">
				<div class="col-md-12 ">
				<p class="" style=" color:gray; opacity: 0.7;">&copy; 2015/2016 Piotr Aleksandrowicz <i>Serwis internetowy poświęcony projektowaniu systemów informatycznych</i></p>
				</div>
		</div>
		</div>
	</footer>
   
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