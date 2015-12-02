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
	  $(function dial() {
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
		<form action="../php/zaloguj.php" method="post">
		Login: <input type="text" name="login" /><br><br>
		Hasło: <input type="password" name="password" /><br><br>
		<input type="submit" value="Zaloguj się"><br>
<?php
	if(isset($_SESSION['blad'])){
		echo $_SESSION['blad'];
		// $message = "Błędny login lub hasło.";
// echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>
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
   <li><a href='../index.php'><span>Strona główna</span></a></li>
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
   <li><a id="opener" style="cursor:pointer;"><span>Zaloguj się</span></a></li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			
			<div class="container-fluid" >
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" style="padding:20px">
				<!-- FORMULARZ KONTAKTOWY -->
				<form role="form">
				<div class="form-group" action="kontakt.php" method="post">
					<label for="exampleInputEmail1">Email</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Podaj adres Email">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Hasło</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Twoje tajne hasło">
				  </div>
				  <button type="submit" class="btn btn-default">Wyślij!</button>
				</form>
				</div>
				<div class="col-md-3"></div>
				<!-- KONIEC -->
				
				<!--
						<input type="hidden" name="aktywne" value="true">
                        <input placeholder="Imię i nazwisko" type="text" value="" name="temat" required>
                        <input placeholder="Adres Email" name="email" type="email" onblur="this.setAttribute('value', this.value);" value="" required>
                        <span class="validation-text">Proszę wpisać odpowiedni adres.</span>
                        <div class="flex">
                            <textarea placeholder="Opis problemu" rows="1" name="tresc" required></textarea>
						
                        </div>
						<input class="button" type="submit" value="wyślij" />
				-->
<?php
	
	// $adres = 'piotr210694@wp.pl';
	// $temat='WIADOMOSC ze strony';
	// @$email = $_POST['email'];
	// @$tresc = $_POST['tresc'];
    // @$temat = $_POST['temat'];
	// $header = 	"From: $email";

	// if($_POST["aktywne"]=="true")
	// {
		// if($_POST['email'] AND $_POST['temat'] AND $_POST['tresc'])
		// {
			// mail($adres, $temat, $tresc, $header);
		// }
	// }	

?>
						
                    </form>
				
            </div>
          </div>
        </div>
      </div>
    </div>
	
    
  </body>

</html>


