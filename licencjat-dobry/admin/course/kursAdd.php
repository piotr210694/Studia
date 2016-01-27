 <?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../logowanie.php');
		exit();
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
         <li><a href='../article/articleCreate.php'>Stwórz</a></li>
         <li><a href='../article/articleManageKat.php'>Przeglądaj</a></li>
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
         <li><a href='kursAdd.php'>Stwórz</a></li>
         <li><a href='kursView.php'>Przeglądaj</a></li>
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
				

	<form action="php/connectCourseAdd.php" method="post" role="form">
	<div class="form-group">
	  
	  <br>
	  <div class="form-group"  >
		<label for="sel1">Nazwa kursu:</label>
		<input  type="text" class="form-control" name="name" value="" placeholder="Podaj nazwę kursu" required>
		</div>
		
		<div class="form-group"  >
						<label for="tresc">Cena:</label>
						<input  type="text" class="form-control" name="price" value="" placeholder="Podaj cenę kursu" required>
		</div>
		
		<div class="form-group"  >
		     <label for="sel1">Wybierz stan kursu:</label>
      <select class="form-control" id="stan" name="stan">
<option value="0">Aktywny</option>
<option value="1">Nieaktywny</option>
      </select>
		</div>
		
		<button type="submit" class="btn btn-success pull-left btn-block">Stwórz</button>
	</form>	
	
	
	<?php 
		if(isset($_SESSION['komAdd']))
		{
			echo $_SESSION['komAdd'];
		}
	?>
		
		
		
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