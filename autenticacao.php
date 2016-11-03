<?php
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION['usuario_id']) || !is_numeric($_SESSION['usuario_id']) || $_SESSION['usuario_id'] == 0){
	header('location: logout.php');
}