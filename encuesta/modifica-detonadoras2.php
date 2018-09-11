<!-- Script para alterar el mensaje de las preguntas detonadoras
	 >> Vista solo para administradores de nivel 6
-->
<?php
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
$MM_redirectLoginSuccess = "encuesta.php";
// include 'head.php';
$alumno = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];
$pregunta = $_SESSION['pregunta'];
$mensaje = $_POST['mensaje'];
$sql = "SELECT * FROM mensajedetonadoras WHERE encuesta='$encuesta' AND pregunta='$pregunta'";
$rs = mysql_query($sql);
if (mysql_numrows($rs)) {
	$sql = "UPDATE mensajedetonadoras SET mensaje='$mensaje' WHERE encuesta='$encuesta' AND pregunta='$pregunta'";
} else {
   $sql = "INSERT INTO mensajedetonadoras (encuesta,pregunta,mensaje) VALUES ('$encuesta','$pregunta','$mensaje')";
}
   $rs = mysql_query($sql);
$_SESSION['mensaje'] = $sql;
header("Location: modifica-detonadoras.php");
?>
