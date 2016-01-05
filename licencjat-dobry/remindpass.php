<?php
	session_start(); //start sesji
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy:
	{
		header('Location: index2.php');
		exit(); //dajemy exit by od razu przekierowalo i nie wykonywalo tego co pod spodem
	}
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
		<label for="login"><span class="glyphicon glyphicon-user"></span> Login</label>
		<p><label><input class="form-control" type="text" name="login" id="login" placeholder="Podaj login"/>
		</label></p>
		<label for="passwordw"><span class="glyphicon glyphicon-eye-open"></span> Hasło</label>		
		<p><label><input class="form-control" type="password" name="password" id="password" placeholder="Podaj hasło" />
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






    <div class="container">
      <div class="row">
        <div class="col-md-12">      
            <div class="container">
<!-- MENU -->
    <div id='cssmenu' class="navbar-fixed-top">
	<ul>
   <li><a href='index.php'><span>Strona główna</span></a></li>
   <li><a href='contact/kontakt.php'><span>Kontakt</span></a></li>
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
   <li><a id="opener" style="cursor:pointer;" id="opener" style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><span>Zaloguj się</span></a></li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			<div class="container-fluid" >
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" style="padding:20px">
				
				<form action="php/connectionremind.php" method="post" role="form">
				<label >Formularz odzyskiwania hasła</label>
				<div class="form-group"  >
						<input type="email" class="form-control" name="email" placeholder="Podaj email">
				</div>
						<button type="submit" class="btn btn-default">OK</button>
						<div class="form-group"  ></div>
						<div class="form-group"  >
						<?php 
							if(isset($_SESSION['bladremind']))
							{
								echo $_SESSION['bladremind'];
							}
							if(isset($_SESSION['komunikatremind']))
							{
								echo $_SESSION['komunikatremind'];
							}
						?>
						</div>
				</form>			
								



				</div>                
				<div class="col-md-3"></div>
				

				
			</div>
			</div>
      </div>
    </div>
	
    
  </body>

</html>