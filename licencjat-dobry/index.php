<?php
	session_start(); //start sesji
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy:
	{
		header('Location: index2.php');
		exit(); //dajemy exit by od razu przekierowalo i nie wykonywalo tego co pod spodem
	}
?>

<!doctype html>

<html LANG="pl">
  
  <head>
	<meta charset="UTF-8" />
    <title>New Page</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- MENU -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	
	<!-- LOGOWANIE -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <script>
	  $(function dial() {
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
<!-- Usuniecie konta - MODAL -->
 <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 20px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
<div id="myModal" class="modal fade" role="dialog">
  <fieldset id="contact_form" >
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <p><button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" ><span class="glyphicon glyphicon-user">&nbsp;</span>Logowanie</h4>
      </div>
      <div class="modal-body" style="padding:30px 50px;">
		<label for="login"><span class="glyphicon glyphicon-user"></span> Login</label>
		<p><label><input class="form-control" type="text" name="login" id="login" placeholder="Podaj login"/>
		</label></p>
		<label for="passwordw"><span class="glyphicon glyphicon-eye-open"></span> Hasło</label>		
		<p><label><input class="form-control" type="password" name="password" id="password" placeholder="Podaj hasło" />
		<p><div id="result"></div></p> <!-- tu wyswietla bledy-->
		</label></p>
		<button id="submit_btn" class="submit_btn btn btn-success btn-block" >Zaloguj</button>
   
    </label>
      </div>
      <div class="modal-footer">
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
      </div>
    </div>

  </div>
  </fieldset>
</div>




<fieldset id="contact_form">
    <div id="result"></div> <!-- tu wyswietla bledy-->
    <label for="login"><span>Imię</span>
    <input type="text" name="login" id="login" placeholder="Podaj swoje imię" />
    </label>
    
    <label for="password"><span>Email</span>
    <input type="password" name="password" id="password" placeholder="Twój adres email" />
    </label>
    
    <button class="submit_btn" id="submit_btn">Wyślij</button>
    </label>
</fieldset>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#submit_btn").click(function() { 
        //Pobieramy dane
        var user_login      = $('input[name=login]').val(); 
        var user_password      = $('input[name=password]').val();

        
       //Prosta walidacja (kolorujemy na czerwono pole jeśli jest puste
        var proceed = true;
        if(user_login ==""){ 
            $('input[name=name]').css('border-color','red'); 
            proceed = false;
        }
        if(user_password==""){ 
            $('input[name=email]').css('border-color','red'); 
            proceed = false;
        }


        //wszystko w porządku idziemy dalej
        if(proceed) 
        {
            //Dane do wysłania
            post_data = {'userLogin':user_login , 'userPassword':user_password};
            
            //Przesłanie danych poprzez AJAX
            $.post('contact_me2.php', post_data, function(response){  

                //wczytanie danych zwrotnych JSON
				if(response.type == 'error')
				{
					output = '<div class="error">'+response.text+'</div>';
				}else{
				    output = '<div class="success">'+response.text+'</div>';
					
					//resetujemy wszystkie wartości
					$('#contact_form input').val(''); 
				}
				
				$("#result").hide().html(output).slideDown();
            }, 'json');
			
        }
		<?php  ?>
    });
    
    //resetujemy kolorowanie po zaczęciu pisania
    $("#contact_form input, #contact_form textarea").keyup(function() { 
        $("#contact_form input, #contact_form textarea").css('border-color',''); 
        $("#result").slideUp();
    });
	
    
});
</script>

    <div class="container">
      <div class="row">
        <div class="col-md-12">      
            <div class="container">
<!-- MENU -->
    <div id='cssmenu' class="navbar-fixed-top">
	<ul>
   <li><a href='index.php'><span>Strona główna</span></a></li>
   <li><a href='contact/kontakt.php'><span>Kontakt</span></a></li>
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
   <li><a id="opener" style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><span>Zaloguj się</span></a></li>
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
			
			
			<div class="container-fluid" >
            <div class="row">
				<div class="col-md-12">
				<h1>Tekst naglowka</h1> 
				<p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget rhoncus mi, in vestibulum lorem. Nulla urna mauris, egestas nec erat vel, tempus ullamcorper dolor. Maecenas eu mattis arcu. Aliquam dapibus quis risus eget consequat. Curabitur eu convallis urna, vitae scelerisque est. Nunc eget posuere urna. Nulla facilisi. Phasellus blandit eleifend aliquet. Curabitur porttitor pharetra pretium. Nam ac eros laoreet, consequat felis at, auctor metus.</p>
			
				<p>Etiam condimentum sed lectus at laoreet. Fusce pellentesque porta purus a venenatis. Quisque erat augue, malesuada nec ultrices vitae, consequat sed metus. Donec at ipsum viverra mauris feugiat euismod. Morbi ultrices tellus libero, et gravida tortor laoreet eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi auctor interdum ornare. Praesent vel urna volutpat, accumsan erat at, pharetra urna. Pellentesque egestas sodales nibh vitae sodales. Suspendisse laoreet risus neque, viverra dictum leo condimentum vitae. Sed sem diam, blandit eu vestibulum in, tempor nec lacus. Nullam lacinia commodo elit, sed euismod leo. Suspendisse porttitor sem mi, fringilla viverra diam tincidunt ut.</p>
			
				<p>In dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum.</p>
			
				<p>Fusce quis vehicula purus, ut fermentum quam. Suspendisse cursus dui ac est convallis, sit amet egestas lorem sodales. Praesent nec nunc mattis, hendrerit mauris quis, dignissim nisi. Pellentesque semper faucibus urna vel tempus. Suspendisse egestas lacus ornare ligula mattis, et pulvinar urna sodales. Suspendisse tristique eget lacus sit amet dapibus. Nam quis imperdiet velit. Vestibulum consectetur rutrum tortor, sit amet fringilla nisi rhoncus id. Aenean sit amet odio elit. Nulla orci quam, eleifend quis sapien sed, vestibulum elementum urna. Sed dapibus ligula vitae turpis bibendum, in tempus magna bibendum. Aenean ut purus diam. Praesent porta velit ut dui fringilla egestas. Donec dignissim non sapien at imperdiet. Quisque bibendum massa ligula, vel elementum eros iaculis quis. Maecenas velit nisl, imperdiet vitae dui sed, convallis placerat enim.</p>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget rhoncus mi, in vestibulum lorem. Nulla urna mauris, egestas nec erat vel, tempus ullamcorper dolor. Maecenas eu mattis arcu. Aliquam dapibus quis risus eget consequat. Curabitur eu convallis urna, vitae scelerisque est. Nunc eget posuere urna. Nulla facilisi. Phasellus blandit eleifend aliquet. Curabitur porttitor pharetra pretium. Nam ac eros laoreet, consequat felis at, auctor metus.</p>
			
				<p>Etiam condimentum sed lectus at laoreet. Fusce pellentesque porta purus a venenatis. Quisque erat augue, malesuada nec ultrices vitae, consequat sed metus. Donec at ipsum viverra mauris feugiat euismod. Morbi ultrices tellus libero, et gravida tortor laoreet eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi auctor interdum ornare. Praesent vel urna volutpat, accumsan erat at, pharetra urna. Pellentesque egestas sodales nibh vitae sodales. Suspendisse laoreet risus neque, viverra dictum leo condimentum vitae. Sed sem diam, blandit eu vestibulum in, tempor nec lacus. Nullam lacinia commodo elit, sed euismod leo. Suspendisse porttitor sem mi, fringilla viverra diam tincidunt ut.</p>
			
				<p>In dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum.</p>
			
				<p>Fusce quis vehicula purus, ut fermentum quam. Suspendisse cursus dui ac est convallis, sit amet egestas lorem sodales. Praesent nec nunc mattis, hendrerit mauris quis, dignissim nisi. Pellentesque semper faucibus urna vel tempus. Suspendisse egestas lacus ornare ligula mattis, et pulvinar urna sodales. Suspendisse tristique eget lacus sit amet dapibus. Nam quis imperdiet velit. Vestibulum consectetur rutrum tortor, sit amet fringilla nisi rhoncus id. Aenean sit amet odio elit. Nulla orci quam, eleifend quis sapien sed, vestibulum elementum urna. Sed dapibus ligula vitae turpis bibendum, in tempus magna bibendum. Aenean ut purus diam. Praesent porta velit ut dui fringilla egestas. Donec dignissim non sapien at imperdiet. Quisque bibendum massa ligula, vel elementum eros iaculis quis. Maecenas velit nisl, imperdiet vitae dui sed, convallis placerat enim.</p>
				
				<div>
<form enctype="multipart/form-data" action="index.php" method="POST">
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
     move_uploaded_file($plik_tmp, "$plik_nazwa");
    echo "Plik: <strong>$plik_nazwa</strong> o rozmiarze 
    <strong>$plik_rozmiar bajtów</strong> został przesłany na serwer!";
}
?> 
				</div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
    
  </body>

</html>