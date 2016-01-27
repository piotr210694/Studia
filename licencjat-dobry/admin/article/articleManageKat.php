<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../logowanie.php');
		exit();
	}
?>

<?php 
	include('php/connectKategoria.php');
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
	
	<!-- MENU INNE -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="../js/script.js"></script>
	<link rel="stylesheet" href="../css/styles.css">
	


	  
  </head>
  
  <body>


 <div class="container">
      <div class="row">
        <div class="col-md-12">      
            <div class="container">
<!-- MENU -->
    <div id='cssmenu' class="navbar-fixed-top">
<ul>
   <li><a href='../indexad.php'>Strona główna</a></li>
   <li><a >Artykuły</a>
      <ul>
         <li><a href='articleCreate.php'>Stwórz</a></li>
         <li><a href='articleManageKat.php'>Przeglądaj</a></li>
      </ul>
   </li>
    <li><a >Samouczki</a>
      <ul>
         <li><a href='#'>Stwórz</a></li>
         <li><a href='#'>Przeglądaj</a></li>
      </ul>
   </li>
    <li><a >Quizy</a>
      <ul>
         <li><a href='#'>Stwórz</a></li>
         <li><a href='#'>Przeglądaj</a></li>
      </ul>
   </li>
    <li><a >Kursy</a>
      <ul>
         <li><a href='../course/kursAdd.php'>Stwórz</a></li>
         <li><a href='../course/kursView.php'>Przeglądaj</a></li>
      </ul>
   </li>
    <li><a href="">Przeglądaj konta</a></li>
    <li><a >Twoje konto</a>
      <ul>
         <li><a href='../../php/logoutadmin.php'>Wyloguj się</a></li>
         <li><a href='../manage/manage.php'>Przeglądaj</a></li>
      </ul>
   </li>
</ul>
</div>
<!-- KONIEC MENU -->



    <div class="container-fluid" style="padding:20px">
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				

	<form action="php/connectManageKat.php" method="post" role="form">
	<div class="form-group">
      <label for="sel1">Wybierz kategorię:</label>
      <p><select class="form-control" id="sel1" name="idK">
	        <?php 
			$ileK=$_SESSION['ileK'];
			for($i=0; $i<$ileK; $i++)
			{
				echo '<option value="';
				echo $idActive=$_SESSION['idK'][$i];
				echo '">';
				echo $_SESSION['tytulK'][$i];
				echo '</option>';			

			}

			?>  
      </select></p>
		
		<button type="submit" class="btn btn-success pull-left btn-block">OK</button>
	</form>	
	
		
		
		
	 </div>
	 

  

				</div>
				<div class="col-md-3"></div>
            </div>
          </div>
		  
        </div>
      </div>
    </div>
 
	
    
  </body>

</html> 