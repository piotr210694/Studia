<?php
	session_start(); //start sesji

	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: ../index.php');
		exit();
	}

	
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
		
		//kodowanie md5
		$password = md5($password);
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8"); //zapobieganie wstrzykiwaniu sql
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query( //jesli poprawnie wykonane zapytanie
		sprintf("SELECT * FROM uzytkownik WHERE login='%s' AND password='%s'", //zapobiegniecie wstrzykiwaniu sql
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$password))))
			{
				$ile_userow = $rezultat->num_rows;
				if($ile_userow>0){	
					
					
					$wiersz = $rezultat->fetch_assoc(); //tablica asocjacyjna by moc wyciagnac z sql
					//utworzenie globalnych zmiennych sesyjnych

					
					$rola=$wiersz['rola']; //wyciagniecie danego rekordu z tabeli
					
					if($rola=="root")
					{
						$_SESSION['zalogowany'] = true; //uzytkownik jest zalogowany
						$_SESSION['zalogowanyad'] = true; //uzytkownik jest zalogowany
						$_SESSION['login'] = $wiersz['login'];
						$_SESSION['id']= $wiersz['id'];
						$_SESSION['rola'] = $wiersz['rola'];
						
						$rezultat->close();
						header('Location: ../admin/indexad.php');
						unset($_SESSION['bladad']); //usuwa zmienna po poprawnym wykonaniu
					}
					else
					{
						unset($_SESSION['zalogowanyad'] );
						$_SESSION['bladad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
						header('Location: ../admin/logowanie.php');
					}
					
				}
				else{
					$_SESSION['bladad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../admin/logowanie.php');
				}
			}
		$polaczenie->close();
	}
	


			

				
					
?>

