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
				

	<form action="php/connectDelete.php" method="post" role="form">
	<div class="form-group">
      <label for="sel1">Wybierz tytuł artykułu:</label>
      <p><select class="form-control" id="sel1" name="help">
	        <?php 
			for($i = 0; $i < $ileArt; $i++)
			{
				echo '<option value="';
				echo $idActive = $idArt[$i][$i];
				echo '">';
				echo $tytulArt[$i];
				echo '</option>';			
			}
			
			?>  
      </select></p>
			<p><button type="submit" name="akcja" value="Edytuj" class="btn btn-success pull-left btn-block">EDYTUJ</button>
		
			<button type="button" name="akcja" value="Usun" data-toggle="modal" data-target="#myModal" class="btn btn-danger pull-left btn-block"  >USUŃ</button>
			</p>
			</div>
			 <!-- Usuniecie artykulu - MODAL -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie artykułu</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć arykuł?</p>
      </div>
      <div class="modal-footer">
		<input type="submit" name="akcja" value="Usuń" class="btn btn-default" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
      </div>
    </div>

  </div>
</div>

</form>
 
  

				</div>
				<div class="col-md-3"></div>
            </div>
          </div>
		  
        </div>
      </div>
    </div>
 
	
    
  </body>

</html> 