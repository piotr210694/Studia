<?php
	session_start(); //start sesji
?>

<?php 
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];//wyciaganie adresu
	include('../../../php/connectMenu.php');
?>

<?php 
	// zdjecia do galerii
	include('../php/galleryImage.php');
?>



<!doctype html>

<html LANG="pl">
  
  <head>
	<meta charset="UTF-8" />
	<title>PSI - Projektuj z pomysłem</title>
	<link rel="icon" href="../../../01.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- MENU -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="../../../js/script.js"></script>
	<link rel="stylesheet" href="../../../css/styles.css">
	
	<!-- LOGOWANIE -->
	
	<!-- wydarzenia okienka -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	
	<script>
	  function post()
		{
			  var login = $('#login').val();
			  var password = $('#password').val();
			
			
			$.post('../../../php/zaloguj.php', {login:login, password:password},
			function(data)
			{
				$('#result').html(data);
			});
		}
	</script>

	<!-- SKRYPT DO POKAZANIA/UKRYCIA -->
			<script>
			$(document).ready(function()
			{
				$('.ukryte').hide();
				$(function () {
					$('.kliknij').click(function () {
					$('.ukryte').slideToggle();
					var tmp = $("#hoho").text();
					if (tmp === "***POKAŻ WSZYSTKIE KOMENTARZE***")
					{
						$("#hoho").text("***UKRYJ KOMENTARZE***");
					}
					else if(tmp === "***UKRYJ KOMENTARZE***")
					{
						$("#hoho").text("***POKAŻ WSZYSTKIE KOMENTARZE***");
					}
					$('.ukryte').parent().siblings().children().next().slideUp();

						 return false;
					 });
				 });
			});
			</script>

			<!-- Zarządzanie komentarzami - USUWANIE I EDYCJA po ID -->
			<script>
			var del;
			var edit;
			var tresc;
			$(document).ready(function()
			{
				$(".trash-icon").click(function()
				{
					del = $(this).attr('id');
				});
				$(".pencil-icon").click(function()
				{
					edit = $(this).attr('id');
					tresc = $(this).attr('tmp');
					$( "#trescEdit" ).val( tresc );
				});
				
			});
			
			function postDel()
			{		
				$.post('../php/comment/commentManage.php', {del:del},
				function(data)
				{
					$('#result2').html(data);
				});
			}
			
			function postEdit()
			{		
				var trescE = $( "#trescEdit" ).val();
				$.post('../php/comment/commentManage.php', {edit:edit, trescE:trescE},
				function(data)
				{
					$('#result3').html(data);
				});
			}
			</script>
			
			<!-- galeria lightbox 2 -->
			<link rel="stylesheet" href="../../../lightbox2-master/dist/css/lightbox.min.css">
	  
	</head>
  
  <body>
  

<!-- Panel logowania -->
<div id="myModal" class="modal fade" role="dialog">
  <form id="contact_form" action="php/zaloguj.php" method="post" >
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <p><button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" ><span class="glyphicon glyphicon-user">&nbsp;</span>Logowanie</h4>
      </div>
      <div class="modal-body" style="padding:30px 50px;">
		<p><label for="login"><span class="glyphicon glyphicon-user"></span> Login</label>
		<label class="label"><input class="form-control" type="text" name="login" id="login" placeholder="Podaj login" onkeydown = "if (event.keyCode == 13)	post();" />
		</label></p>
		<p><label for="passwordw"><span class="glyphicon glyphicon-eye-open"></span> Hasło</label>		
		<label class="label"><input class="form-control" type="password" name="password" id="password" onkeydown = "if (event.keyCode == 13)	post();"  placeholder="Podaj hasło" />

		</label></p>
		<input id="submit_btn" class="submit_btn btn btn-success btn-block" value="Zaloguj" onclick="post();" onkeydown = "if (event.keyCode == 13)	post();" >
		<p><div id="result"></div></p> <!-- tu wyswietla bledy-->
   
    </label>
      </div>
      <div class="modal-footer">
	      <p><a href="../remindpass.php">Zapomniałeś hasła? </a></p>
          <p>Nie masz konta? <a href="../registration.php">Dołącz do nas</a></p>
		  <p>Przejdź do <a href="../admin/logowanie.php">panelu administratora</a></p>
      </div>
    </div>

  </div>
  </form>
</div>


<!-- Usuniecie konta - MODAL -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header modal-header-danger ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie konta</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć konto?</p>
      </div>
      <div class="modal-footer">
		<form action="user/php/delete.php" >
		<input type="submit" value="Usuń" class="btn btn-danger" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
      </div>
    </div>

  </div>
</div>

<!-- Usuniecie komentarza - MODAL -->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header modal-header-danger ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie komentarza</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć komentarz?</p>
		<div id="result2"></div>
      </div>
      <div class="modal-footer">
		<button  name="akcja" value="Usuń" onclick="postDel()" class="btn btn-danger" >Usuń</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
      </div>
    </div>

  </div>
</div>

<!-- Edycja komentarza - MODAL -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header modal-header-danger ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edycja komentarza</h4>
      </div>
      <div class="modal-body">
					<div class="form-horizontal" >
						<div class="form-group has-feedback">
							<div class="col-sm-12">
							  <input type="text" class="form-control " id="trescEdit"   onkeydown = "if (event.keyCode == 13)	postEdit();">
							</div>
						</div>
						<div id="result3"></div> <!-- Rezultat ECHO  -->
					</div>
      </div>
      <div class="modal-footer">
		<button  name="akcja" value="Usuń" onclick="postEdit()" class="btn btn-primary" >Zapisz zmiany</button>
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
	<?php 
	$i=0;
	for($i; $i<1; $i++)
	{
		echo '<li><a href="../../../index.php"><span>Strona główna</span></a></li>';
	}?>
   
   <li><a href='../../../contact/kontakt.php'><span>Kontakt</span></a></li>
   <li class='active has-sub'><a><span>Artykuły</span></a>
      <ul>
	  	<?php 
		for($i=0; $i<$ileK; $i++)
		{
			if($ileA[$i] == 0){ continue;}
			else
			{
				echo '<li><a href="">'.$kategoria[$i].'</a>';
				echo '<ul>';
				if($ileA[$i]<$ile+1)
				{
					for($j=0; $j<$ileA[$i]; $j++)
					{
						echo '<li><a href="../../../';
						echo $linki[$i][$j];
						echo '">'.$tytuly[$i][$j].'</a>';
						echo '</li>';
					}
				}
				else
				{
					for($j=0; $j<$ile; $j++)
					{
						echo '<li><a href="../../../';
						echo $linki[$i][$j];
						echo '">'.$tytuly[$i][$j].'</a>';
						echo '</li>';
					}
					echo '<li class="last" ><a href="../';
					echo "article.php";
					echo '">'.'***POKAŻ WIĘCEJ***'.'</a>';
					echo '</li>';
				}
				
				echo '</ul>';
				echo '</li>';
			}
		}
		?>
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
     <li><a href='../../../kursy.php'><span>Kursy</span></a></li>
   	<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy: 
			{
				echo  '<li class="last active has-sub"><a><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABJUlEQVQ4jaWSr04DQRCHR1YgKoAgECUYDG+AWEXuz0x3llCPqMABCQkIEhJ4BAQCUX/H7UxCArwAIBAXNALBAyCQiMPQAO1drweT/NTu983sZgBKiq5oFtWek/AjCueo7iJKooWyu2Nlkt4MeudRuBjJbXjdm6sVoLApgQsULkiYawWkbq9KgMLH00xwOkFwVi/I7GblEzLbrxWEwssofFciyCO1q7UCAADybg2F337A75HvBlPBLNymS1oJs43FSHgLfXc7EO4Ewh0WbleCZmBasfDusDOpvSFvD2Nv91FdisIfX2dHZmBaY11R+HnC74/m9ddmktqDBvBwqU4AAGDdu3kUvm8qQG+fKKElILX9xvB3dgDVPvxDkAOqS2Phl78E1aWf25ZmvHtqCpEAAAAASUVORK5CYII="/></span></a>';
				echo '<ul>';
					echo '<li><a href="../../../php/logout.php"><span>Wyloguj się</span></a></li>';
					echo '<li><a href="../../../user/manage.php"><span>Przeglądaj</span></a></li>';
					echo '<li><a href="#"  data-toggle="modal" data-target="#myModal3"><span>Usuń konto</span></a></li>';
				echo '</ul>';
			echo '</li>';
			}
			else
			{
				echo '<li><a id="opener" style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><span>Zaloguj się</span></a></li>';
			}
			?>
     
</ul>

	</div>
<!-- KONIEC MENU-->
			</div>
	

<!-- SLIDER DO ZDJEC -->
    <script type="text/javascript" src="jsSlider/jssor.slider.min.js"></script>
    <script>
        jssor_1_slider_init = function() 
		{
            
            var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:87.50,t:-87.50}},{b:11000,d:500,c:{x:-87.50,t:87.50}}],
              [{b:0,d:600,x:410,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:175.0,t:-175.0}},{b:0,d:800,c:{x:-175.0,t:175.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 2000,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsywnosc - start
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsywnosc KONIEC
        };
    </script>

    <style>
        /* jssor slider bullet navigator skin 01 css */
        /*
        .jssorb01 div           (normal)
        .jssorb01 div:hover     (normal mouseover)
        .jssorb01 .av           (active)
        .jssorb01 .av:hover     (active mouseover)
        .jssorb01 .dn           (mousedown)
        */
        .jssorb01 {
            position: absolute;
        }
        .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
            position: absolute;
            /* size of bullet elment */
            width: 12px;
            height: 12px;
            filter: alpha(opacity=70);
            opacity: .7;
            overflow: hidden;
            cursor: pointer;
            border: #000 1px solid;
        }
        .jssorb01 div { background-color: gray; }
        .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
        .jssorb01 .av { background-color: #fff; }
        .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

        /* jssor slider arrow navigator skin 02 css */
        /*
        .jssora02l                  (normal)
        .jssora02r                  (normal)
        .jssora02l:hover            (normal mouseover)
        .jssora02r:hover            (normal mouseover)
        .jssora02l.jssora02ldn      (mousedown)
        .jssora02r.jssora02rdn      (mousedown)
        */
        .jssora02l, .jssora02r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('img/a02.png') no-repeat;
            overflow: hidden;
        }
        .jssora02l { background-position: -3px -33px; }
        .jssora02r { background-position: -63px -33px; }
        .jssora02l:hover { background-position: -123px -33px; }
        .jssora02r:hover { background-position: -183px -33px; }
        .jssora02l.jssora02ldn { background-position: -3px -33px; }
        .jssora02r.jssora02rdn { background-position: -63px -33px; }
    </style>
<!-- KONIEC SLIDER -->	
			
			<div class="container-fluid wys" >
            <div class="row">
				<div class="col-md-12">
					<h1>Tytul artykulu</h1>
					<p>cos tam cos tam</p>
				<br><hr>
				
				<!-- Galeria START -->
				<div class=" gallery">
				<h3>Galeria zdjęć:</h3>
					<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
						<!-- Ładujemy ekranik -->
						<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
							<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
						</div>
						<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">	 
							<?php
								if($ileZdjec == 0)
								{
									echo "Ten artykuł nie zawiera zdjęć.";
								}
								else
								{
									for($j = 0; $j < $ileZdjec; $j++)
									{
										/*if(($j+1)%4 == 0)
										{
											echo '<div class="row">';
										}
										echo '		<div class="col-lg-3">';
										*/
										echo ' <div data-p="112.50" style="display: none;">';
										echo '			<a href="';
										echo $zdjecie[$j];
										echo '			" data-lightbox="Galeria" >';
										echo '				<img data-u="image" src="';
										echo $zdjecie[$j];
										echo '				"s class="img-thumbnail">';
										echo '			</a>';
										echo '		</div>';
										/*echo '		</div>';
										if(($j+1)%4 == 0)
										{
											echo '</div>';
										}
										*/
									}
								}		
							?>
							<!-- <a data-u="ad" href="http://www.jssor.com" style="display:none">jQuery Slider</a> -->
						</div>
		
						<!-- Nawigacja -->
						<div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
							<div data-u="prototype" style="width:12px;height:12px;"></div>
						</div>
						<!-- Strzałki nawigacji -->
						<span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
						<span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
					</div>
				<script>
					jssor_1_slider_init();
				</script>

				<!-- Galeria END -->
				</div>
				
				<!-- JS do galerii -->
				<script src="../../../lightbox2-master/dist/js/lightbox-plus-jquery.min.js"></script> 
				
				<br>
				<hr>
				</div>
				
			</div>
			</div>
			

			
			<!-- Boczny panel admina -->
			<?php 
				if(isset($_SESSION['zalogowanyad']))
				{
					echo '<div class="okno">';
					echo	'<a href="../../indexad.php">';
					echo		'<div class=text>';
					echo			'<span class="ikona glyphicon glyphicon-chevron-down" aria-hidden="true"></span>';
					echo			'Panel administratora';
					echo		'</div>';
					echo	'</a>';
					echo '</div>';
				}
			?>
			
			<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy: 
			{
				
				include('../php/comment/showKom.php'); //sciagamy dane komentarzy
		
				//Form do komentarzy
									echo '<div class="container" >';
				echo '<div class="row">';

				echo '<div class="col-md-6" style="padding:20px; clear: left;">';
				echo '<h3 style="">Komentarze: (';
				echo $ileK;
				echo ')</h3>';
				echo '<form action="../php/comment/connectKom.php".php" method="post" role="form">';
				echo '<div class="form-group"  >';
				echo		'<p><textarea required type="text" class="form-control" name="komentarz" row="2" placeholder="Napisz komentarz" required></textarea>';
				echo		'</div>';
				echo		'<button type="submit" class="btn btn-success pull-left btn-block ">Wyślij</button></p>';
				echo '</form>';
				echo '</div>';
				echo '<div class="col-md-3">';
				echo '</div>';
				echo '</div>';
				echo '</div>';

				
				//Wyświetleni komentarzy
					echo '<div class="container" >';
				echo '<div class="row">';
				echo '<div class="col-md-3"></div>';
				echo '<div class="col-md-6" style="padding:20px; clear: left;">';
				//Panele z bootstrap
				echo '<div class="panel-group">';
				if($ileK <= $ogranicz)
				{
					for($i=0; $i<$ileK; $i++)
					{
						echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">';
							echo '<div class="col-md-5 align-div">';
							if($_SESSION['login'] == 'admin' AND $login[$i] != $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4" ></span>';
							}
							if($login[$i] == $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-pencil pencil-icon" aria-hidden="true" tmp="';
								echo $tresc[$i];
								echo '" data-toggle="modal" data-target="#myModal2"></span>&thinsp;
								<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4"></span>';
							}
							echo '</div>';
							echo '<div  class="col-md-7 text-right align-div" >';
							if(isset($data) AND $dataEdit[$i] != NULL){echo $data[$i].' <span class="commentEdit">(Edytowany)</span>';}
							else if(isset($data)){echo $data[$i];}
							echo '</div>';
							echo '<div  class="text-left" ><strong><span style="text-transform: uppercase;">';
							echo $login[$i];
							echo '</span></strong> napisał:</div>';
						echo '</div>';
						echo '<div class="panel-body">';
						if(isset($tresc)){echo $tresc[$i];}
						echo '</div>';
						echo '</div>';
					}
					
					echo '</div>';
				
				
				
				
				echo '</div>';
				echo '<div class="col-md-3">';
				echo '</div>';
				echo '</div>';
				echo '</div>';
	
				}
				else
				{
					for($i=0; $i<$ogranicz; $i++)
					{
						echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">';
							echo '<div class="col-md-5 align-div">';
							if($_SESSION['login'] == 'admin' AND $login[$i] != $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4" ></span>';
							}
							if($login[$i] == $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-pencil pencil-icon" aria-hidden="true" tmp="';
								echo $tresc[$i];
								echo '" data-toggle="modal" data-target="#myModal2"></span>&thinsp;
								<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4"></span>';
							}
							echo '</div>';
							echo '<div  class="col-md-7 text-right align-div" >';
							if(isset($data) AND $dataEdit[$i] != NULL){echo $data[$i].' <span class="commentEdit">(Edytowany)</span>';}
							else if(isset($data)){echo $data[$i];}
							echo '</div>';
							echo '<div  class="text-left" ><strong><span style="text-transform: uppercase;">';
							echo $login[$i];
							echo '</span></strong> napisał:</div>';
						echo '</div>';
						echo '<div class="panel-body">';
						if(isset($tresc)){echo $tresc[$i];}
						echo '</div>';
						echo '</div>';
					}
					
					
					
					
					
					/////////////UKRYTE
					echo '<div class="ukryte"  style="  margin-top: 5px;">';
					for($ogranicz; $i<$ileK; $i++)
					{
						echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">';
							echo '<div class="col-md-5 align-div">';
							if($_SESSION['login'] == 'admin' AND $login[$i] != $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4" ></span>';
							}
							if($login[$i] == $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-pencil pencil-icon" aria-hidden="true" tmp="';
								echo $tresc[$i];
								echo '" data-toggle="modal" data-target="#myModal2"></span>&thinsp;
								<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4"></span>';
							}
							echo '</div>';
							echo '<div  class="col-md-7 text-right align-div" >';
							if(isset($data) AND $dataEdit[$i] != NULL){echo $data[$i].' <span class="commentEdit">(Edytowany)</span>';}
							else if(isset($data)){echo $data[$i];}
							echo '</div>';
							echo '<div  class="text-left" ><strong><span style="text-transform: uppercase;">';
							echo $login[$i];
							echo '</span></strong> napisał:</div>';
						echo '</div>';
						echo '<div class="panel-body">';
						if(isset($tresc)){echo $tresc[$i];}
						echo '</div>';
						echo '</div>';
					}
					echo '</div>';
					/////////////////////////
					echo '</div>';
				
				
					echo '<div class="panel panel-primary kliknij " style="  margin-bottom: 10px;">';
					echo '<div class="panel-heading text-center " id="hoho" style="cursor: pointer;">';
					echo '***POKAŻ WSZYSTKIE KOMENTARZE***';
					echo '</div>';
					echo '</div>';
				
				echo '</div>';
				echo '<div class="col-md-3">';
				echo '</div>';
				echo '</div>';
				echo '</div>';
					
				}

				
				

			}
			else
			{
				echo '<div class="container-fluid" >';
				echo '<div class="row">';
				echo '<div class="col-md-12" style="padding:20px;">';
				echo '<span style="color: #5CB85C;">Aby móc oglądać i dodawać komentarze musisz się <a href="#" data-toggle="modal" data-target="#myModal">zalogować</a>!<span>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			?>

			

			
			
				
          
        </div>
      </div>
    </div>
	  </body>

</html>