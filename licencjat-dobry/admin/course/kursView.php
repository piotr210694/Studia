 <?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../logowanie.php');
		exit();
	}
?>

<?php 
	include('php/connectCourseInf.php');
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
				<table class="table table-hover">
					<thead>
					  <tr>
						<th>Nazwa kursu</th>
						<th>Cena</th>
						<th>Stan</th>
						<th>Opcje</th>
					  </tr>
					</thead>
			
					<tbody>
					  
						<?php
						for($i=0;$i<$maxid1;$i++)
						{
							echo '<form action="php/connectCourseManage.php" method="post">';
							echo '<tr>';
								echo '<td>';
								echo $name[$i];
								echo '</td>';
								echo '<td>';
								echo $price[$i];
								echo 'zł';
								echo '</td>';
								echo '<td>';
								if($stan[$i]==0)
								{
									echo '<span style="color: green">Aktywny</span>';
								}
								elseif($stan[$i]==1)
								{
									echo '<span style="color: red">Nieaktywny</span>';
								}
								else
								{
									echo 'Błąd!';
								}
								echo '</td>';
								echo '<td>';
								echo '<input';
								echo ' name="';
								echo $id[$i];
								echo '" value="Stan" type="submit">';
								echo '<button type="button" name="akcja" data-toggle="modal" data-target="#myModal"  >Usuń</button>';
								// echo '<input';
								// echo ' name="Del';
								// echo $id[$i];
								// echo '" value="Usuń" name="akcja" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger pull-left btn-block">';
								echo '</td>';
							echo '</tr>';
						 // <!-- Usuniecie artykulu - MODAL -->
						echo '<div id="myModal" class="modal fade" role="dialog">';
						echo '<div class="modal-dialog">';

						//<!-- Modal content-->
						echo '<div class="modal-content">';
						echo '<div class="modal-header">';
						echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
						echo '<h4 class="modal-title">Usuwanie kursu</h4>';
						echo '</div>';
						echo '<div class="modal-body">';
						echo '<p>Czy na pewno chcesz usunąć kurs?</p>';
						echo '</div>';
						echo '<div class="modal-footer">';
						echo '<input ';
						echo ' name="Del';
						echo $id[$i];
						echo '" type="submit" name="akcja" value="Usuń" class="btn btn-default" >';
						echo '<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						}
						
						
						
						// <td></td>
						// <td>
							// <span style="color:red">Nie można edytować!</span>
							// <!--
							// <form action="php/edytuj.php" method="post">
							// <input type="text" name="elogin" placeholder="Podaj nowy login..." >
							// <input type="submit" name="" value="Edytuj">
							// </form>			
							// -->
						// </td>
						// <td></td>
						?>
					  
					  </tbody>
		
				</table>

				
				
				</div>
				<div class="col-md-3"></div>
            </div>
      
		  
        </div>
      </div>
	</div>
	</div>
	</div>
     
 
	
    
  </body>

</html>  