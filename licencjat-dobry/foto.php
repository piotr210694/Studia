<?php
    //ini_set('mysql.connect_timeout',300);
    //ini_set('default_socket_timeout',300);
?>
<html>
	<head>
		
	</head>
	<body>
		
		<!-- 
		<form method="post" action="php/imageAdd.php" enctype="multipart/form-data">
        <br/>
            <input type="file" name="image" />
            <br/><br/>
            <input type="submit" name="sumit" value="Upload" />
        </form>
		-->
		
		<!--
		<h2>Please Choose a File and click Submit</h2>
  <form enctype="multipart/form-data" action="php/imageAdd.php" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
  <div><input name="userfile" type="file" /></div>
  <div><input type="submit" value="Submit" /></div>
  </form>
  -->
  
  <FORM ACTION="upload.php" METHOD="POST" ENCTYPE="multipart/form-data">
Zdjęcie: </td><td><INPUT type="file" name="zdjecie">
<input type="submit" name="ok" value="Wyślij zdjęcie do bazy"/>
</FORM>
       
	</body>
</html>