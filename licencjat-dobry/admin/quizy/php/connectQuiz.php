<?php
	if(isset($_POST['y']))
	{
		$ile = $_POST['y'];
		for($i = 0; $i < $ile; $i++)
		{
			echo '<input type="text"><br>';
		}

	}
	else
	{
		echo "blad";
	}
?>