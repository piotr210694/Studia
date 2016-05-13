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
		<link rel="stylesheet" href="css/bootstrap-3.1.1/dist/css/bootstrap.css">

		
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
	<!-- <script src="js/walidacja.js"></script> --> <!-- Nasz skrypt z walidacją -->
	
	<!-- Walidacja okna modalnego logowania -->
	<script src="js/walidacjaModLog.js"></script>
	
	<!-- galeria lightbox 2 -->
	<link rel="stylesheet" href="lightbox2-master/dist/css/lightbox.min.css">
	
	</head>
  
  <body >
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
		echo '<li><a href="index.php"><span>Strona główna</span></a></li>';
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
   <li><a id="opener" style="cursor:pointer;" id="opener" style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><span>Zaloguj się</span></a></li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			<div class="container-fluid wys" >
            <div class="row">
				<div class="col-md-12">
				<h1>Witaj na naszej stronie!</h1> 
				<p>Cieszymy się, że Nas odwiedziłeś! Mamy nadzieję, że niniejsza <a href="index2.php">witryna</a> pomoże ci w rozwijaniu Twojej pasji, którą jest <i>projektowanie systemów informatycznych</i>. Jeśli jednak trafiłeś tu przypadkowo bądź też nie jesteś fascynatem treści jaką oferuję nasz serwis, nie łam się! Jako administratorzy robimy wszystko co w naszej mocy, aby informacje zawarte na stronie były przejrzyste i zrozumiałem nawet dla laika. Być może wertując naszą stronę wdrożysz się w projektowanie i stanie się ono twoją pasją.</p>
								<br>
				<p><b>Co do zaoferowania ma nasz serwis?</b></p>
				<p>Generalnie strona poświęcona jest <i>projektowaniu systemów informatycznych</i>, czyli motywem przewodnim, który Nas kieruje przy tworzeniu nowych materiałów dydaktycznych będzie właśnie sam początek cyklu życia orpogramowania. Będziemy skupiać się na zagadnieniach związanych z przygotowaniem bazy teoretycznej pod budowę przyszłego systemu. Szczególnie skupimy się na przedstawieniu fazy określenia wymagań i analizy. Dzięki galerii oraz obszernym artykułom będziecie mogli w prosty i przejrzysty sposób nauczyć się budowy diagramów UML - a więc opanujecie sztukę wizualizacji wymagań funkcjonalnych. Komunikację z działem administracyjnym umożliwi wam zakładka <a href="contact/kontaktlog.php">kontakt</a>. Dzięki niej będziecie mieli z nami stałą łączność o każdej porze. Komunikację z innymi użytkownikami umożliwią Wam komentarze, które będzie można zostawić pod każdym artykułem znajdującym się na naszej witrynie. <a href="">Samouczki</a> i <a href="">quizy</a> tworzone przez Naszych fachowców pomogą Wam w prostym przyswojeniu nowo nabytej wiedzy.</p>
				<p>A więc nie zwlekajcie! Jak najszybciej zapoznajcie się z materiałami, które ma do zaoferowania Nasza witryna.</p>
				<br>
				<p style="text-align:right;">Pozdrawiamy! <i>Zarząd <a href="index2.php">PSI - projektuj z pomysłem</a>.</p></i>
				

				</div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
    
  </body><script type="text/javascript">document.getElementsByTagName("div")[0].style.display = "none"; </script>

</html>