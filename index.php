<?php
	if(isset(isset($_SESSION['usuario_id'])) && is_numeric($_SESSION['usuario_id']))
		header('location: buscar.php');
	else
		header('location: logout.php');