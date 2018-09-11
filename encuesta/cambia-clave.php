<?php
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	$MM_redirectLoginSuccess = "servicios.php";
	include 'head.php';
	InicioBD();
	$usuario = $_SESSION['userName'];
} else {header("Location: signout.php");} 
include 'datos-personales5.php';
include 'head-html.php';
?>
<h4>Cambiando clave de acceso a la encuesta</h4><br>
<FORM name="elmismo" action="cambia-clave1.php"  method="POST">
<table border=0 width="100%">
<tr>
	<td align="left">Nueva Clave: <input type="text" name="clave" value="" size="15" maxlength="30"> </td>
</tr>
<tr>
</tr>
<TR>
		<TD ALIGN="left" VALIGN="TOP" WIDTH="200"><INPUT name="submit" type="submit" value="Cambia clave"></TD>
</TR>
</table>
<br>
<?php include 'tail-ok.php'; ?>
<!-- Script con el form para cambiar la clave de un alumno
-->
