 <html>
 <head>
 </head>
 <body>
 
 
 <script>
 

 
 </script>
 
 <?php 

// Wiadomość
$message = "Linia 1\nLinia 2\nLinia 3";

// W przypadku każdej linii dłuższej niż 70 znaków powinniśmy użyć funkcji wordwrap()
$message = wordwrap($message, 70);

// Wyślij
mail('piotr210694@wp.pl', 'Temat wiadomości', $message);

 ?>
 </body>
 </html>
 