<?php
 $con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
$MM_redirectLoginSuccess = "encuesta-pendientes.php";
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
$sql = "SELECT COUNT(*) as cuenta FROM resultados WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
$respuesta = $con->prepare($sql);
$respuesta->execute();
$r = $respuesta->fetch();
$rs = $r['cuenta'];
if ($valor==6) {$valor = 0;}

if ($rs) {
	$sql = "UPDATE resultados SET respuesta='$valor' WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
} else {
   $sql = "INSERT INTO resultados (alumno,idencuesta,pregunta,respuesta) VALUES ('$alumno','$encuesta','$pregunta','$valor')";
}
$respuesta = $con->prepare($sql);
$respuesta->execute();
$_SESSION['mensaje'] = $sql;
$sql = "SELECT COUNT(*) as cuenta FROM  preguntas WHERE idencuesta='$encuesta' AND numero='$pregunta' AND detonante='1'";
$respuesta = $con->prepare($sql);
$respuesta->execute();
$r = $respuesta->fetch();
$rs = $r['cuenta'];
if ($rs) {
   /*$sql = "SELECT * FROM  preguntas WHERE idencuesta='$encuesta' AND numero='$pregunta' AND detonante='1'";
	$respuesta = $con->prepare($sql);
	$respuesta->execute();
	$r = $respuesta->fetch();
	$orden = $r['orden'];
    $valordetonante = $r['valordetonante'];
    if ((($orden > 0) && ($valor <= $valordetonante)) || 
       (($orden < 0) && ($valor >= $valordetonante))) {
		include "init-mail.php";
		$correoReceptor = "karlaurriola@itesm.mx";
		$nombreReceptor = "Karla Urriola";
		$textomensaje = "Alumna(o) con matricula $alumno contesto ($valor) a pregunta ($pregunta). Despues de revision de codigo el 14 de Agosto";
		EnviaMensaje($correoReceptor,$nombreReceptor,"Alumna(o) con Alarma",$textomensaje); 
		$correoReceptor = "euresti@itesm.mx";#cambiar por el de Eduardo
		$nombreReceptor = "Eduardo Uresti";
		EnviaMensaje($correoReceptor,$nombreReceptor,"Alumna(o) con Alarma",$textomensaje); 
   }*/
}
header("Location: " . $MM_redirectLoginSuccess);
?>
<!-- Script para guardar los resultados de la encuesta por alumno
	 Las respuestas se guardan en la tabla 'resultados'
	 Tambien se checa si las respuestas del alumno a las preguntas detonantes (las marcadas como '1' en la tabla 'preguntas' en el campo 'detonante') son de riesgo y en caso afirmativo se avisa por correo a Karla
-->
