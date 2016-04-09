<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: logowanie.php');
		exit();
	}
?>

<!doctype html>

<html LANG="pl">
  
	<head>
		<?php 
			include('head.php');
		?> 
		
		
	</head>
  
	<body>


 <div class="okno">
	<a href="../index.php">
		<div class=text>
			<span class="ikona glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
			Strona główna
		</div>
	</a>
 </div>


 <div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span>Artykuły</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="article/articleCreate.php">Stwórz</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-info"></span><a href="article/articleManage.php">Przeglądaj</a>
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                        <span class="glyphicon glyphicon-list-alt text-info"></span><a href="article/articleCategory.php">Kategorie</a>
                                    </td>
                                </tr>
                           </table>
                        </div>
                    </div>
                </div>
				<!-- Quizy -->
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th-list">
                            </span>Quizy</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="quizy/quizyCreate.php">Stwórz</a>
                                    </td>
                                </tr>
                           </table>
                        </div>
                    </div>
                </div>
				<!-- Samouczki -->
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-book">
                            </span>Samouczki</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="tutorial/tutorialCreate.php">Stwórz</a>
                                    </td>
                                </tr>
                           </table>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a  href="../php/logoutadmin.php"><span class="glyphicon glyphicon-off text-danger">
                            </span>Wyloguj</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>


<div class="col-sm-9 col-md-9 panel-primary" >
            <div class="well">
                <h1> Witaj w panelu administratora!</h1>
            </div>
        </div>
    </div>
</div>
 

    
  </body>

</html>