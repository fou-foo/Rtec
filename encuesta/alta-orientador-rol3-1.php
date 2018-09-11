<?php
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
session_start();
if (isset($_SESSION['userName'])) {
  require("db-info.php");
  InicioBD();
} else {header("Location: signout.php");};
$orientador = strtoupper($_POST['nomina']);
$campusC = strtoupper($_POST['campus']);
$clave = md5("dima3");
$sql = "SELECT COUNT(*) as cuenta FROM orientadores WHERE nomina='$orientador'";
$res=$con->prepare($sql);
$res->execute();
$res = $res->fetch();
if ($res['cuenta']) {
  $sql = "UPDATE orientadores SET clave='$clave' WHERE nomina='$orientador'";
} else {
   $sql = "INSERT INTO orientadores (nomina,clave,nivel, campus) VALUES ('$orientador','$clave', '3', '$campusC')";
}
$r = $con->prepare($sql);
$r->execute();
header("Location: servicios.php");
?>
<!-- Script para insertar orientadores nuevos en la tabla 'orientadores' con nivel 3 con una clave fija.--> 

