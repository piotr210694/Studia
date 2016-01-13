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
	include('php/connection.php');
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
  $(function() {
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
		<form action="php/zaloguj.php" method="post">
		Login: <input type="text" name="login" /><br><br>
		Hasło: <input type="password" name="password" /><br><br>
		<input type="submit" value="Zaloguj się"><br>
		Nie masz konta? <a href="rejestracja.php">Zarejestruj się!</a>
		</form>
</div>

<!-- Usuniecie konta - MODAL -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie konta</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć konto?</p>
      </div>
      <div class="modal-footer">
		<form action="php/delete.php" >
		<input type="submit" value="Usuń" class="btn btn-default" >
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
   <li><a href='../index2.php'><span>Strona główna</span></a></li>
   <li><a href='../contact/kontaktlog.php'><span>Kontakt</span></a></li>
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
   <li class='last active has-sub' ><a><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABJUlEQVQ4jaWSr04DQRCHR1YgKoAgECUYDG+AWEXuz0x3llCPqMABCQkIEhJ4BAQCUX/H7UxCArwAIBAXNALBAyCQiMPQAO1drweT/NTu983sZgBKiq5oFtWek/AjCueo7iJKooWyu2Nlkt4MeudRuBjJbXjdm6sVoLApgQsULkiYawWkbq9KgMLH00xwOkFwVi/I7GblEzLbrxWEwssofFciyCO1q7UCAADybg2F337A75HvBlPBLNymS1oJs43FSHgLfXc7EO4Ewh0WbleCZmBasfDusDOpvSFvD2Nv91FdisIfX2dHZmBaY11R+HnC74/m9ddmktqDBvBwqU4AAGDdu3kUvm8qQG+fKKElILX9xvB3dgDVPvxDkAOqS2Phl78E1aWf25ZmvHtqCpEAAAAASUVORK5CYII="/></span></a>
		<ul>
			<li><a href='../php/logout.php'><span>Wyloguj się</span></a></li>
			<li><a href='manage.php'><span>Przeglądaj</span></a></li>
			<li><a href='#'  data-toggle="modal" data-target="#myModal"><span>Usuń konto</span></a></li>
		</ul>
   </li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
	

			<div class="container-fluid" style="padding:20px">
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<table class="table table-hover">
					<thead>
					  <tr>
						<th>Rekord</th>
						<th>Dane</th>
						<th>Pole edycji</th>				
					  </tr>
					</thead>
			
					<tbody>
					  <tr>
						<td>Login</td>
						
						<td><?php  echo $_SESSION['login']; ?></td>
					<td>
						<form action="php/edytuj.php" method="post">
						<input type="text" name="elogin" placeholder="Podaj nowy login..." >
						<input type="submit" name="" value="Edytuj">
						</form>			
					</td>
					  </tr>
					  
					  <tr>
						<td>Hasło</td>
						<td>*******</td>
						<td><input type="button" name="" value="Zmień hasło"></td>
					  </tr>
					  
					  <tr>
						<td>E-mail</td>
						<td><?php echo $_SESSION['email']; ?></td>
						<td><input type="text" name="email" value="Podaj nowy login..." onfocus="if(this.value=='' || this.value == 'Podaj nowy login...') this.value=''" onblur="if(this.value == '') {this.value=this.defaultValue}" onkeyup="keyUp();" >&nbsp;<input type="submit" name="bemail" value="Edytuj">
						</td>
						</tr>
						<?php
						// error_reporting(E_ALL ^ E_NOTICE); 
						// include('php/connection.php');
						// $email = $_POST['email'];
						// $id=$_SESSION['id'];
						
						// if($_POST['email'] ){
						// $ins = @mysql_query("UPDATE `sysinf`.`user` SET `email` = '$_POST['email']' WHERE `user`.`id` = $id;");
						// echo $email;
						// echo $id;}
						// }
						// else {}
						// if($ins) echo "Edycja zakończona sukcesem.<br>";
						// else echo "Błąd nie udało się dodać rekordu.<br>";
						
						
						
						// error_reporting(E_ALL ^ E_NOTICE); 
		
		// $id = $_POST['id'];
		// $czas = $_POST['czas'];
		// $zawodnik = $_POST['zawodnik'];

		// if(($id and $czas and $zawodnik) OR ($id and $czas)) 
		// {
		//łączymy się z bazą danych
		// $connection = @mysql_connect('localhost', 'root', 'dlugowlosy')
		// or die('Brak połączenia z serwerem MySQL');
		// $db = @mysql_select_db('bieganie', $connection)
		// or die('Nie mogę połączyć się z bazą danych');
    
		//dodajemy rekord do bazy
		// if($id and $czas and $zawodnik)
		// { $ins = @mysql_query("UPDATE rekordy SET czas='$czas', zawodnik='$zawodnik' WHERE id='$id'");}
		// else
		// {$ins = @mysql_query("UPDATE rekordy SET czas='$czas' WHERE id='$id'");}
    
		// if($ins) echo "Edycja zakończona sukcesem";
		// else echo "Błąd nie udało się edytować rekordu";
		
		// mysql_close($connection);
		// }
						
						?>
					  
					  <tr>
						<td>Telefon</td>
						<td><?php echo $_SESSION['phone']; ?></td>
						<td>
						<form action="php/edytuj.php" method="post">
						<input type="text" name="ephone" value="Podaj nowy login..." onfocus="if(this.value=='' || this.value == 'Podaj nowy login...') this.value=''" onblur="if(this.value == '') {this.value=this.defaultValue}" onkeyup="keyUp();" >
						<input type="submit" name="" value="Edytuj">
						</form>	
						</td>
					  </tr>
					  <tr>
						<td>Imię</td>
						<td><?php echo $_SESSION['name']; ?></td>
						<td><input type="text" name="ud_first" value="Podaj nowy login..." onfocus="if(this.value=='' || this.value == 'Podaj nowy login...') this.value=''" onblur="if(this.value == '') {this.value=this.defaultValue}" onkeyup="keyUp();" >&nbsp;<input type="button" name="" value="Edytuj">
						</td>
					  </tr>
					  <tr>
						<td>Nazwisko</td>
						<td><?php echo $_SESSION['surname']; ?></td>
						<td><input type="text" name="ud_first" value="Podaj nowy login..." onfocus="if(this.value=='' || this.value == 'Podaj nowy login...') this.value=''" onblur="if(this.value == '') {this.value=this.defaultValue}" onkeyup="keyUp();" >&nbsp;<input type="button" name="" value="Edytuj">
						</td>
					  </tr>
					</tbody>
		
				</table>
				</div>
				<div class="col-md-3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
    
  </body>

</html>