<?php
	session_start(); //start sesji
	if ((isset($_SESSION['zalogowanyad'])) && ($_SESSION['zalogowanyad']==true)) //jesli jest zmienna zalogowany to wtedy:
	{
		header('Location: indexad.php');
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
	


	  
  </head>
  
  <body>







    <div class="container">
      <div class="row">
        <div class="col-md-12">      
			
			  <form id="contact_form" action="../php/zalogujadmin.php" method="post" >
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
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
	if(isset($_SESSION['bladad'])){
		echo $_SESSION['bladad'];
		// $message = "Błędny login lub hasło.";
// echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>
		</label></p>
		<button id="submit_btn" class="submit_btn btn btn-success btn-block" >Zaloguj</button>
   
    </label>
      </div>
	  
	  <div class="modal-footer">
		  <p>Powróć na <a href="../index.php">stronę główną</a></p>
      </div>
    </div>

  </div>
  </form>
			
			
			<div class="container-fluid" >
            <div class="row">
				<div class="col-md-12">

				</div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
    
  </body>

</html>