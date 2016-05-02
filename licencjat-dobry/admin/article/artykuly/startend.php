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