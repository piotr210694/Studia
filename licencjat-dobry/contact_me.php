﻿<?php
if($_POST)
{
 $to_Email = "piotr210694@wp.pl"; //Podaj tu email docelowyw
 $subject = 'Ah!! My email from Somebody out there...'; //Tutaj temat wiadomości - możesz też wykorzystać pole formularza i pobrać tą wartość od klienta :)
 
 
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
 
 //Sprawdzamy czy wszystkie pola zostały wysłane. kończymy skrypt jeśli nie (tutaj dodawaj więcej pól, które są wymagane)
 if(!isset($_POST["userLogin"]) || !isset($_POST["userPassword"]))
 {
 $output = json_encode(array('type'=>'error', 'text' => 'POLA SĄ PUSTE!'));
 die($output);
 }

 //Pobieramy dane z formularza
 $user_Name = filter_var($_POST["userLogin"], FILTER_SANITIZE_STRING);
 $user_Email = filter_var($_POST["userPassword"], FILTER_SANITIZE_EMAIL);
 
 //Dodatkowa validacja PHP (tylko dla pól wymaganych)
 if(strlen($user_Name)<4) // Wywala błąd jeśli imię ma mniej niż 4 znaki
 {
 $output = json_encode(array('type'=>'error', 'text' => 'Imię jest za krótkie!'));
 die($output);
 }
 if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //sprawdzamy email
 {
 $output = json_encode(array('type'=>'error', 'text' => 'Proszę podać poprawny email!'));
 die($output);
 }

 
 //Nagłówki do Maila
 $headers = 'From: '.$user_Email.'' . "\r\n" .
 'Reply-To: '.$user_Email.'' . "\r\n" .
 'X-Mailer: PHP/' . phpversion();
  $user_Message = "fdsfsdfs";
 
 $sentMail = @mail($to_Email, $subject, $user_Message .' -'.$user_Name, $headers);
 
 if(!$sentMail)
 {
 $output = json_encode(array('type'=>'error', 'text' => 'Nie można wysłać wiadomości. Sprawdź konfigurację PHP Mail'));
 die($output);
 }else{
 $output = json_encode(array('type'=>'message', 'text' => 'Witaj '.$user_Name .' Dziękuję za wiadomość!'));
 die($output);
 }
}
?>