<?php
	session_start(); //start sesji
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy:
	{
		header('Location: kontaktlog.php');
		exit(); //dajemy exit by od razu przekierowalo i nie wykonywalo tego co pod spodem
	}
?>

<?php 
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
	
	  <script>
	  function post()
		{
			  var login = $('#login').val();
			  var password = $('#password').val();
			
			
			$.post('../php/zaloguj.php', {login:login, password:password},
			function(data)
			{
				$('#result').html(data);
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
	      <p><a href="../remindpass.php">Zapomniałeś hasła? </a></p>
          <p>Nie masz konta? <a href="../registration.php">Dołącz do nas</a></p>
		  <p>Przejdź do <a href="../admin/logowanie.php">panelu administratora</a></p>
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
   <li><a href='../index.php'><span>Strona główna</span></a></li>
   <li><a href='kontakt.php'><span>Kontakt</span></a></li>
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
					echo '<li class="last" ><a href="../admin/article/article.php';
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
   <li><a href='../kursy.php'><span>Kursy</span></a></li>
    <li><a id="opener" style="cursor:pointer;" id="opener" style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><span>Zaloguj się</span></a></li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			
			<div class="container-fluid wys" >
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" style="padding:20px">
				
				<form action="php/connectKontakt.php" method="post" role="form">
				<div class="form-group"  >
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" required>
				</div>
				<div class="form-group"  >
						<label for="message">Treść</label>
						<textarea type="text" class="form-control" rows="4" name="message" required></textarea>
				</div>
						<button type="submit" class="btn btn-primary btn-block">Wyślij!</button>
						</form>			
						<?php 
							if(isset($_SESSION['komunikatKON']))
							echo $_SESSION['komunikatKON'];		
						?>
								
				</div>                
				<div class="col-md-3"></div>
				

				
			</div>
			</div>
		</div>
	</div>
	</div>
    
  </body><script type="text/javascript">document.getElementsByTagName("div")[0].style.display = "none"; </script>

</html>


