<?php
$MM_redirectLoginSuccess = "servicios.php";
// include 'head.php';
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
$alumno = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];
$pregunta = $_SESSION['pregunta'];
$totalPreguntas = $_SESSION['totalPreguntas'];

if ($totalPreguntas < $pregunta) {header("Location: " . $MM_redirectLoginSuccess );} 
$sql = "SELECT * FROM preguntas WHERE idencuesta='$encuesta'  AND numero='$pregunta'";
$rs = mysql_query($sql);
if (mysql_numrows($rs) == 0) {
	header("Location: " . $MM_redirectLoginSuccess );
} 
//	echo "$alumno: $sql";
$descripcion = mysql_result($rs,0,"enunciado");
$numero = mysql_result($rs,0,"numero");
$detonante = mysql_result($rs,0,"detonante");
$valordetonante = mysql_result($rs,0,"valordetonante");
$orden = mysql_result($rs,0,"orden");
$numopciones = mysql_result($rs,0,"numopciones");
$opcionesA = array();
for($i=1 ; $i <= $numopciones ; $i++) {
   $opcionesA[$i] = mysql_result($rs,0,"opcion$i");
}
include 'head-html.php';
?>
<FORM name="elmismo" action="encuesta1.php"  method="POST">
<table border=0 width="400">
<tr><td><font color=red>Pregunta <?php echo $pregunta;?> de <?php echo $totalPreguntas;?>:</font><br><?php echo $descripcion;?></td>
<tr>
	<td align="left">
	    <!--
		<SELECT NAME="valor">
	    <?php for($i=1 ; $i <= $numopciones ; $i++): ?>
		   <OPTION VALUE="<?php echo $i;?>"><?php echo $opcionesA[$i];?></OPTION>
		<?php endfor; ?>
		</SELECT>
		-->
	    <?php for($i=1 ; $i <= $numopciones ; $i++): ?>
		   <input type="radio" name="valor" VALUE="<?php echo $i;?>"> <?php echo $opcionesA[$i];?><br>
		<?php endfor; ?>
	</TD>
</tr>
<TR>
		<TD ALIGN="center" VALIGN="TOP" WIDTH="200"><INPUT name="submit" type="submit" value="Guardar"></TD>
</TR>
</table>
<br>
<?php include 'tail-ok.php'; ?>
