<?php
session_start();
if (isset($_SESSION['userName'])) 
{
	require("db-info.php");
	InicioBD();
	$usuario = $_SESSION['userName'];
	extract($_POST);
	include 'datos-personales6.php';
	header("Location: servicios.php?mensaje"."{$_SESSION['mensaje']}");
} else {
	header("Location: signout.php");	
}
?>
