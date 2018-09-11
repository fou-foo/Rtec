<?php
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
$MM_redirectLoginSuccess = "servicios.php";
// include 'head.php';
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
$alumno = $_SESSION['userName'];
$clave = md5($_POST['clave']);
$sql = "SELECT COUNT(*) as cuenta FROM alumnos WHERE matricula='$alumno'";
$res=$con->prepare($sql);
$res->execute();
$res = $res->fetch();
$rs = $res['cuenta'];
if ($rs>0) {
	$sql = "UPDATE alumnos SET clave='$clave' WHERE matricula='$alumno'";
} else {
   $sql = "INSERT INTO alumnos (matricula,clave) VALUES ('$alumno','$clave')";
}
$ress = $con->prepare($sql);
$ress->execute();
header("Location: servicios.php");
?>
