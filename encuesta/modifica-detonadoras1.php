<!-- Script con otro form para alterar el mensaje de las preguntas detonadoras
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
	$pregunta = $_POST['pregunta'];
	$_SESSION['pregunta']=$pregunta;
	$sql = "SELECT * FROM preguntas WHERE idencuesta='$encuesta' AND numero='$pregunta'";
	$rs = mysql_query($sql);
	if (mysql_numrows($rs)) {
		$descripcion = mysql_result($rs,0,"enunciado");
	} else {header("Location: servicios.php");}
	$sql = "SELECT * FROM mensajedetonadoras WHERE encuesta='$encuesta' AND pregunta='$pregunta'";
	$rs = mysql_query($sql);
	if (mysql_numrows($rs)) {
		$mensaje = mysql_result($rs,0,"mensaje");
	} else {
		$mensaje = "";
	}
	include 'head-html.php';	
?>
<h4>Edici&oacute;n del mensaje de una pregunta detonadora: </h4><br>
<FORM name="elmismo" action="modifica-detonadoras2.php"  method="POST">
		<TABLE cellpadding="2" cellspacing="2" border="1" width="600">
		<TBODY>
		<TR BGCOLOR="yellow">
			<TH align="right">Pregunta No <?php echo $pregunta;?></th><td> <?php echo $descripcion;?></td></TR>
		<TR BGCOLOR="lightblue"> 
			<TH ALIGN="right" VALIGN="top">Mensaje</TH>
			<TD ALIGN="left" VALIGN="top"><TEXTAREA NAME="mensaje" COLS="50" ROWS="12"><?php echo $mensaje;?></textarea></TD></TR> 
		<TR BGCOLOR="yellow">
		<TD ALIGN="center" VALIGN="TOP" COLSPAN="2"><INPUT name="submit" type="submit" value="Guardar y salir"></TD>
		</TR>
		</tbody> 
		</table>
		</FORM>
<br>
<?php include 'tail-ok.php'; ?>


