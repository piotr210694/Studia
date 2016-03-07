<?php
					session_start(); //start sesji

	/*if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: ../index.php');
		exit();
	}
*/
	
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		$login = htmlentities($login, ENT_QUOTES, "UTF-8"); //zapobieganie wstrzykiwaniu sql
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	
	
	
		if ($rezultat = @$polaczenie->query( //jesli poprawnie wykonane zapytanie
		sprintf("SELECT * FROM uzytkownik WHERE login='%s' AND password='%s'", //zapobiegniecie wstrzykiwaniu sql
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$password))))
			{
				$ile_userow = $rezultat->num_rows;
				if($ile_userow>0){	
					// $ids = $wiersz['id'];
					// session_id($ids);
					if($login=="admin")
					{
						$_SESSION['zalogowanyad'] = true;
					}
					
					$_SESSION['zalogowany'] = true; //uzytkownik jest zalogowany
					
					$wiersz = $rezultat->fetch_assoc(); //tablica asocjacyjna by moc wyciagnac z sql
					//utworzenie globalnych zmiennych sesyjnych
					$_SESSION['login'] = $wiersz['login'];
					$_SESSION['id']= $wiersz['id'];
					// $kom = '<span style="color:green">Operacja logowania przebiegła pomyślnie!</span>'.'<br>'.'<a href="index.php">Przejdź do witryny...</a>';
					// echo $kom;
					//echo '<meta http-equiv="refresh" content="1" url="index2.php" />';
					echo '<script type="text/javascript">window.setInterval(location.reload(true), 1);</script>';

					
					// $_SESSION['email']=$wiersz['email'];
					// $_SESSION['phone']=$wiersz['telefon'];
					// $_SESSION['name']=$wiersz['imie'];
					// $_SESSION['surname']=$wiersz['nazwisko'];					
					//$user=$wiersz['login']; //wyciagniecie danego rekordu z tabeli
					// unset($_SESSION['blad']); //usuwa zmienna po poprawnym wykonaniu
					// $rezultat->close();
					//header('Location: ' . $_SERVER['HTTP_REFERER']);
					
					
				}
				else
				{
					
					$blad = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					echo $blad;
					
				}
			}
		$polaczenie->close();
	}
	


			

				
					
?>

