<?php
//$MM_redirectLoginSuccess = "servicios.php";
// include 'head.php';
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};

$usuario = $_SESSION['userName'];
$clave = md5($_POST['clave2']);
$sql = "SELECT COUNT(*) as cuenta FROM orientadores WHERE nomina='$usuario'";
$res=$con->prepare($sql);
$res->execute();
$res = $res->fetch();
$rs = $res['cuenta'];
if ($rs>0) {
	$sql = "UPDATE orientadores SET clave='$clave' WHERE nomina='$usuario'";
} else {
$sql = "INSERT INTO orientadores (nomina,clave) VALUES ('$usuario','$clave')";
}
$ress = $con->prepare($sql);
$ress->execute();
header("Location: servicios.php");
?>
<!-- Script para cambiar la clave de un orientador-->

