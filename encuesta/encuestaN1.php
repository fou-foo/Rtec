<?php
$MM_redirectLoginSuccess = "encuestaN.php";
// include 'head.php';
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};

$alumno = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];
$pregunta = $_SESSION['pregunta'];
$valor = $_POST['valor'];
$_SESSION['tamanoletra'] = $_POST['tamanoletra'];
$sql = "SELECT * FROM resultados WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
$rs = mysql_query($sql);
if (mysql_numrows($rs)) {
	$sql = "UPDATE resultados SET respuesta='$valor' WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
} else {
   $sql = "INSERT INTO resultados (alumno,idencuesta,pregunta,respuesta) VALUES ('$alumno','$encuesta','$pregunta','$valor')";
}
$rs = mysql_query($sql);
$_SESSION['mensaje'] = $sql;
$_SESSION['pregunta'] = $pregunta+1;

$sql = "SELECT * FROM  preguntas WHERE idencuesta='$encuesta' AND numero='$pregunta' AND detonante='1'";
$rs = mysql_query($sql);
if (mysql_numrows($rs)) {
   $orden = mysql_result($rs,0,"orden");
   $valordetonante = mysql_result($rs,0,"valordetonante");
   if ((($orden > 0) && ($valor <= $valordetonante)) || 
       (($orden < 0) && ($valor >= $valordetonante))) {
		include "init-mail.php";
		$correoA = "euresti@itesm.mx";
		$correoA = "karlaurriola@itesm.mx";
		$nombreB = "Karla Urriola";
		$textomensaje = "Alumna(o) con matricula $alumno contesto $valor a pregunta $pregunta.";
		EnviaMensaje($correoA,$nombreB,"Alumna(o) con Alarma",$textomensaje); 
   }
}
header("Location: " . $MM_redirectLoginSuccess);
?>
