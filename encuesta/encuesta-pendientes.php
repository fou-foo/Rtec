<?php
 $con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
$MM_redirectLoginSuccess = "servicios.php";
// include 'head.php';
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
$alumno = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];
$tamanoletra = $_SESSION['tamanoletra'];
$totalPreguntas = $_SESSION['totalPreguntas'];
//$tamanosLetra = 10;

# Se identifica cual es la ultima pregunta que contesto el alumno
$faltan = 0;
/*for($pregunta = 1 ; $pregunta <= $totalPreguntas; $pregunta++) 
{
   $sql = "SELECT COUNT(*) as cuenta FROM resultados WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
   $resultado = $con->prepare($sql);
   $resultado->execute();
   $r = $resultado->fetch();;
   if ($r) {break;} 
}*/
$sql = "SELECT COUNT(*) as cuenta FROM resultados WHERE alumno='$alumno' AND idencuesta='$encuesta'";
$resultado = $con->prepare($sql);
$resultado->execute();
$r = $resultado->fetch();;
$pregunta = $r['cuenta']+1;
if ($totalPreguntas < $pregunta) 
{
	header("Location: " . $MM_redirectLoginSuccess );
} 
$_SESSION['pregunta'] = $pregunta;
$sql = "SELECT COUNT(*) as cuenta FROM preguntas WHERE idencuesta='$encuesta'  AND numero='$pregunta'";
$resultado = $con->prepare($sql);
$resultado->execute();
$r = $resultado->fetch();
$rs = $r['cuenta'];
if ($rs == 0) {
	header("Location: " . $MM_redirectLoginSuccess );
} 
//	echo "$alumno: $sql";
$sql = "SELECT *  FROM preguntas WHERE idencuesta='$encuesta'  AND numero='$pregunta'";
$resultado = $con->prepare($sql);
$resultado->execute();
$r = $resultado->fetch();

$descripcion = $r['enunciado'];
$numero = $r['numero'];
$detonante = $r['detonante'];
$valordetonante = $r['valordetonante'];
$orden = $r['orden'];
$numopciones = $r['numopciones'];
$opcionesA = array();
for($i=1 ; $i <= $numopciones ; $i++) {
	$opcionesA[$i] = $r["opcion".$i];
}
include 'head-html.php';
?>
<!--se incluye clase para ajustar el tanio de la letra dinamicamente>-->
<!-- Se despliegan las opciones de respuesta de las preguntas con tamanio ajustado a la clase 'foo' del archivo style.css-->
<!--
<font color=red class="foo3">Pregunta <?php echo $pregunta;?> de <?php echo $totalPreguntas;?>:</font>
<br>
<font color=green class="foo3"> sugiero quitar este contador, para que el usuario no presente tedio </font>
-->
<br></br>
<font class="foo4">Pregunta: <u> <?php echo $descripcion;?></font> </u>

<FORM name="elmismo" action="encuesta-pendientes1.php"  method="POST" class='foo' align="center">
<br> </br>
<table width="100%" class='foo'>
<tr> <td align="left">
     <?php for($i=1 ; $i <= $numopciones ; $i++): ?>
	<!-- se actualiza codigo para mostrar pregunta con tamanio de letra dinamico -->
	<font class='foo' align="left"><input type="radio" name="valor"  VALUE="<?php echo $i;?>" style="height:40px; width:40px; vertical-align: middle; " required> <?php echo $opcionesA[$i];?>
	</font>
<br>
<?php endfor; ?>
</TD>
</tr>
<TR>
 <TD ALIGN="center" VALIGN="TOP" WIDTH="100"><font><INPUT name="submit" type="submit" value="Guardar"></font></TD>
</TR>
</table>

<br>
<?php include 'tail-ok.php'; ?>
<!-- Script para identificar la pregunta siguiente de la encuesta que falta por responder a los usuarios con rol 'aloumno' -->
