<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../indexad.php');
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
         <li><a href='#'>Stwórz</a></li>
         <li><a href='#'>Przeglądaj</a></li>
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
         <li><a href='#'>Stwórz</a></li>
         <li><a href='#'>Przeglądaj</a></li>
      </ul>
   </li>
    <li><a href="">Przeglądaj konta</a></li>
    <li><a >Twoje konto</a>
      <ul>
         <li><a href='../../php/logoutadmin.php'>Wyloguj się</a></li>
         <li><a href='manage.php'>Przeglądaj</a></li>
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
						<input type="text" name="elogin" value="Podaj nowy login..." onfocus="if(this.value=='' || this.value == 'Podaj nowy login...') this.value=''" onblur="if(this.value == '') {this.value=this.defaultValue}" onkeyup="keyUp();" >
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
					  </tr>
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