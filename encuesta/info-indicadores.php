<?php
#Script para desplegar links externos e internos de la institucion a los alumnos con debilidades en alguno de los 18 indicadores
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
$MM_redirectLoginSuccess = "servicios.php";
session_start();
$indicador = $_GET['indicador'];
$alumno = $_GET['alumno'];
	require("db-info.php");
	InicioBD();
# consulta del campus del alumno 
$sqlconsulta ="SELECT campus FROM alumnos WHERE matricula='$alumno'";
$respuesta = $con->prepare($sqlconsulta);
$respuesta->execute();
$rs2 = $respuesta->fetch();
$campusC = $rs2['campus'];
# termina consulta de campus
/*se reescribe campus en espera de actualizacion de datos 21/agosto/2018*/
$campusC = 1;
if (isset($_SESSION['encuesta'])) {$encuesta = $_SESSION['encuesta'];} else {$encuesta = $encuestaAbierta;}

if ($indicador > 0) {
	$sql1 = "SELECT COUNT(*) as cuenta FROM referenciasDebilidadesIndicador WHERE idencuesta='$encuesta' AND numero='$indicador' and campus='$campusC' ORDER BY numero";
} else {
	$sql1 = "SELECT COUNT(*) as cuenta FROM referenciasDebilidadesIndicador WHERE idencuesta='$encuesta' and campus='$campusC' ORDER BY numero";
}
$resultado = $con->prepare($sql1);
$resultado->execute();
$rs1= $resultado->fetch();
$numI = $rs1['cuenta'];
if ($numI <= 0) {$_SESSION['mensaje']="$sql1"; header("Location: servicios.php");}
if ($indicador > 0) {
	$sql1 = "SELECT * FROM referenciasDebilidadesIndicador WHERE idencuesta='$encuesta' AND numero='$indicador' and campus='$campusC' ORDER BY numero";
} else {
	$sql1 = "SELECT * FROM referenciasDebilidadesIndicador WHERE idencuesta='$encuesta' and campus='$campusC' ORDER BY numero";
}
$rs1 = $con->query($sql1);
$indA = array();
$indicadorDA = array();
$debilidadlinkinternoA = array();
$debilidadlinkextrernoA = array();
$debilidadarticulosinteresA = array();
$i = 1;
foreach($rs1 as $fila) {
    $indicador = $fila['numero'];
    $indicadorDA[$i] = $fila['descripcion'];
	$debilidadlinkinternoA[$i] = $fila['debilidadlinkinterno'];
	$debilidadlinkextrernoA[$i] = $fila['debilidadlinkextrerno'];
	$debilidadarticulosinteresA[$i] = $fila['debilidadarticulosinteres'];
	$i = $i+1;
}
include 'head-html.php';
?>
<div>
<table width="100%" cellspacing="20">
<tr><td align="left" valign="top"><font size="+1">Informaci&oacute;n sobre los Indicadores</font></td></tr>
<!--
<br> <font color="green"> Me gustaria cambiar esta vista, considero que tienen poca informacion y que esta poco estructurada </font>
-->
<?php for($i=1 ; $i <= $numI; $i++): ?>
<tr>
<td><img src="graficos/pencil-emoji.png" width="20"> <font size="+1"><b><?php echo $indicadorDA[$i];?></b></font>
	<h4>En el TEC:</h4>
	<?php echo $debilidadlinkinternoA[$i];?>
	<h4>Links externos</h4>
	<!--<font color=green> O bien fuera de la instituci&oacute;n puedes consultar lo siguiente </font>-->
	<?php echo $debilidadlinkextrernoA[$i];?>
	<!--
	<h4>Art&iacute;culos adicionales</h4> <font color=green> Tambi&eacute;n podr&iacute;a interesarte: </font>
		<br>
    -->
	<?php echo $debilidadarticulosinteresA[$i];?><br>
</td>
</tr>
<?php endfor; ?>
</table>
</div>
</BODY>
</HTML>
