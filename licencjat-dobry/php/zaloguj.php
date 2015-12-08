<?php
	session_start(); //start sesji

	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: ../index.php');
		exit();
	}
if($_POST)
{
	//Sprawdzamy czy jest to rządanie Ajax, jeśli nie..
 if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
 
 //Kończymy skrypt wysyłając dane JSON
 $output = json_encode(
 array(
 'type'=>'error', 
 'text' => 'Rządanie musi przejść przez AJAX'
 ));
 
 die($output);
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
		$login = htmlentities($login, ENT_QUOTES, "UTF-8"); //zapobieganie wstrzykiwaniu sql
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query( //jesli poprawnie wykonane zapytanie
		sprintf("SELECT * FROM user WHERE login='%s' AND password='%s'", //zapobiegniecie wstrzykiwaniu sql
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$password))))
			{
				$ile_userow = $rezultat->num_rows;
				if($ile_userow>0){	
					$_SESSION['zalogowany'] = true; //uzytkownik jest zalogowany
					
					$wiersz = $rezultat->fetch_assoc(); //tablica asocjacyjna by moc wyciagnac z sql
					//utworzenie globalnych zmiennych sesyjnych
					$_SESSION['login'] = $wiersz['login'];
					$_SESSION['id']= $wiersz['id'];
					
					//$user=$wiersz['login']; //wyciagniecie danego rekordu z tabeli
					unset($_SESSION['blad']); //usuwa zmienna po poprawnym wykonaniu
					$rezultat->close();
					header('Location: ../index2.php');
					
				}
				else{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../index.php');
				}
			}
		$polaczenie->close();
	}
	
}

			

				
					
?>

