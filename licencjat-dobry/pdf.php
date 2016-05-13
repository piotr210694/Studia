<?php
echo '<?xml version="1.0" encoding="iso-8859-2"?>';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Upload</title>
</head>
<body>

<div>
<form enctype="multipart/form-data" action="pdf.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="50000" />
<input name="plik" type="file" />
<input type="submit" value="Wyślij plik" />
</form>
</div>

<?php
$plik_tmp = $_FILES['plik']['tmp_name'];
$plik_nazwa = $_FILES['plik']['name'];
$plik_rozmiar = $_FILES['plik']['size'];

if(is_uploaded_file($plik_tmp)) {
     move_uploaded_file($plik_tmp, "upload/$plik_nazwa");
    echo "Plik: <strong>$plik_nazwa</strong> o rozmiarze 
    <strong>$plik_rozmiar bajtów</strong> został przesłany na serwer!";
}

// foreach(new DirectoryIterator('upload') as $file)
  // if(!$file->isDot())
    // echo $file->getFilename() . '<br />';

// $dir = dir('upload');
// while($file = $dir->read())
  // if($file != '.' && $file != '..') 
    // echo $file . '<br />';
// $dir->close();

// foreach(scandir('upload') as $file)
  // if($file != '.' && $file != '..')
    // echo $file . '<br />';

foreach(glob('upload/*', GLOB_BRACE) as $file)
  if($file != '.' && $file != '..') 
    echo $file . '<br />';

// $filePath = "upload"; // np: pliki/
// $fileName = "plan2016.xlsx"; // np. program.exe

// $fd = fopen($filePath.$fileName,"r");
// $size = filesize($filePath.$fileName);
// $contents = fread($fd, filesize($filePath.$fileName));

// fclose($fd);

// header("Content-Type: application/octet-stream");
// header("Content-Length: $size;");
// header("Content-Disposition: attachment; filename=$fileName");

// echo $contents;

/*
$dane = file_get_contents('F:/xampp/htdocs/licencjat-dobry/upload/plan2016.xlsx');
header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename=plan2016.xlsx');
header('Content-length: '.strlen($dane));
header("Content-Transfer-Encoding: binary");
echo $dane;
*/
 
 
 function dl_file($file){

   //Plik istnieje
   if (!is_file($file)) { die("<b>404 File not found!</b>"); }

   //Jakieś tam info
   $len = filesize($file);
   $filename = basename($file);
   $file_extension = strtolower(substr(strrchr($filename,"."),1));

   //Content-Type
   switch( $file_extension ) {
         case "pdf": $ctype="application/pdf"; break;
     case "exe": $ctype="application/octet-stream"; break;
     case "zip": $ctype="application/zip"; break;
     case "doc": $ctype="application/msword"; break;
     case "xls": $ctype="application/vnd.ms-excel"; break;
     case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
     case "gif": $ctype="image/gif"; break;
     case "png": $ctype="image/png"; break;
     case "jpeg":
     case "jpg": $ctype="image/jpg"; break;
     case "mp3": $ctype="audio/mpeg"; break;
     case "wav": $ctype="audio/x-wav"; break;
     case "mpeg":
     case "mpg":
     case "mpe": $ctype="video/mpeg"; break;
     case "mov": $ctype="video/quicktime"; break;
     case "avi": $ctype="video/x-msvideo"; break;

     //Wg. mnie nie powinny być ściągane ale jak chcesz
     case "php":
     case "htm":
     case "html":
     case "txt": die("Zakazane uzycie dla ". $file_extension ." </b>"); break;

     default: $ctype="application/force-download";
   }

   //początek nagłówków
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public");
   header("Content-Description: File Transfer");
   
   //Content znaleziony
   header("Content-Type: $ctype");

   // I ściągamy plik
   $header="Content-Disposition: attachment; filename=".$filename.";";
   header($header );
   header("Content-Transfer-Encoding: binary");
   header("Content-Length: ".$len);
   @readfile($file);//funkcja ktora czyta plik i  go wypisuje
   exit;
}
 //dl_file("upload/wynik.jpg");

 
 if(isset($_POST['download']))
{
  $nazwa = $_POST['nazwa'];  
    
    if (!file_exists("upload/".$nazwa))
    { 
    echo("Na serwerze nie ma pliku o nazwie $nazwa");
    }
    else
    {
    echo("Plik o nazwie $nazwa został odnaleziony.<br><br>W ciągu kilku sekund powinno rozpocząć się pobieranie pliku.
Jeśli pobieranie nie rozpoczęło się automatycznie, proszę kliknąć na ten <a href=$nazwa>link</a>
<META HTTP-EQUIV='Refresh' CONTENT='2; URL=upload/$nazwa'>");
    }
 
}
 echo'<form action="pdf.php" method="post">
    wpisz nazwe pliku <br>
    <input type="text" name="nazwa" id="nazwa" value="">
    
    <br><input type="submit" name="download" value="znajdz">
    <input type="reset" value="wyczyść">
    </form>';
?>


</body>
</html>