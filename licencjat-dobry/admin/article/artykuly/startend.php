</div> 
            </div>
			<hr>
			</div>
			
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
			<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy: 
			{
				$_SESSION['url'] = $_SERVER['REQUEST_URI'];//wyciaganie adresu
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
							echo '<div  class="text-right" >';
							if(isset($data)){echo $data[$i];}
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
							echo '<div  class="text-right" >';
							if(isset($data)){echo $data[$i];}
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
							echo '<div  class="text-right" >';
							if(isset($data)){echo $data[$i];}
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