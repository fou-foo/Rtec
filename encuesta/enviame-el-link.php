<?php
$MM_redirectLoginSuccess = "encuesta.php";
 include 'head.php';
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {};

$alumno = $_SESSION['userName'];
include "init-mail.php";
$correoA = "euresti@itesm.mx";
$correoA = "karlaurriola@itesm.mx";
$correoA = "$alumno@itesm.mx";
$nombreB = "Alumna(o) con matricula $alumno";
$textomensaje = "Resultados de la encuesta: <a href=\"http://cb.mty.itesm.mx/encuesta/\">http://cb.mty.itesm.mx/encuesta/</a>";
EnviaMensaje($correoA,$nombreB,"Liga de la encuesta DiMA",$textomensaje); 
//header("Location: " . $MM_redirectLoginSuccess);
?>
<!-- Script para enviar por correo del tec la liga de la encuesta al alumno
-->
