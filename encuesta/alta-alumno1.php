<?php
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};

$alumno = $_POST['matricula'];
$campusC = $_POST['campus'];
$clave = md5('dima');
$sql = "SELECT COUNT(*) as cuenta FROM alumnos WHERE matricula='$alumno'";
$r = $con->prepare($sql);
$r->execute();
$rs = $r->fetch();
if ($rs['cuenta'] > 0) {
	$sql = "UPDATE alumnos SET clave='$clave' WHERE matricula='$alumno'";
} else {
   $sql = "INSERT INTO alumnos (matricula,clave, campus) VALUES ('$alumno','$clave', '$campusC')";
}
$a = $con->prepare($sql);
$a->execute();
header("Location: servicios.php");
?>
<!-- Script para insertar alumnos nuevos en la tabla 'alumnos' con una clasve fija. Procedimiento de uno en uno--> 

