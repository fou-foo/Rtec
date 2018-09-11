<?php
$MM_redirectLoginSuccess = "servicios.php";
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
$usuario = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];

if ($encuesta == 0) {header("Location: servicios.php");} 
$sql1 = "SELECT * FROM preguntas WHERE idencuesta='$encuesta' AND detonante='1' ORDER BY numero";
$rs1 = mysql_query($sql1);
$numI = mysql_numrows($rs1);
if ( $numI == 0) {header("Location: servicios.php");} 
$preguntaA = array();
$mensajeA = array();
$preguntaDA = array();
$indicadorDA = array();
for($i = 0 ; $i < $numI ; $i++) {
	$pregunta = mysql_result($rs1,$i,"numero");
	$indicador = mysql_result($rs1,$i,"indicador");
	$preguntaA[$i+1] = $pregunta;
    $preguntaDA[$i+1] = substr(mysql_result($rs1,$i,"enunciado"),0,25)."....";
	
	$sql2 = "SELECT * FROM indicadores WHERE idencuesta='$encuesta' AND numero='$indicador'";
	$rs2 = mysql_query($sql2);	
    $indicadorDA[$i+1] = mysql_result($rs2,0,"descripcion");	
}
include 'head-html.php';
?>
<h4>Edici&oacute;n de los mensajes de las preguntas dotanadoras</h4><br>
<FORM name="elmismo" action="modifica-detonadoras1.php"  method="POST">
<table border=0 width="400">
<tr><th align="left">Escoje una pregunta:</th></tr>
<tr>
	<td align="left"><SELECT NAME="pregunta">
	    <?php for($i=1 ; $i <= $numI ; $i++): ?>
		   <OPTION VALUE="<?php echo $preguntaA[$i];?>"><?php echo $preguntaA[$i];?> [<?php echo $indicadorDA[$i];?>: <?php echo $preguntaDA[$i];?>]</OPTION>
		<?php endfor; ?>
		</SELECT>
	</TD>
</tr>
<TR>
		<TD ALIGN="left" VALIGN="TOP" WIDTH="200"><INPUT name="submit" type="submit" value="Pasar a editar"></TD>
</TR>
</table>
<br>
<?php include 'tail-ok.php'; ?>
<!-- Script con el form para alterar el contenido de las preguntas detonadoras
	>> vista solo para administradores con nivel 6
-->
