<?php
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
$MM_redirectLoginSuccess = "servicios.php";
// include 'head.php';
session_start();
if (isset($_SESSION['userName']) && ($_SESSION['nivel']>=1)) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
$encuesta = $_SESSION['encuesta'];
$alumno = $_POST['alumno'];
include 'head-html.php';

/***************INDICADORES ************************/
$sql1 = "SELECT COUNT(*) as cuenta FROM indicadores WHERE idencuesta='$encuesta' ORDER BY numero";
$resultado =$con->prepare($sql1);
$resultado->execute();
$rs1 = $resultado->fetch();
$numI = $rs1['cuenta'];
$indA = array();
$alumnoIA = array();
$alumnoNIA = array();
$indicadorDA = array();
$fortalezaA = array();
$numeroFortalezas = 0;
$numeroVulnerabilidades = 0;
/*actualizacion 21/agosto/2018*/
$numeroEnDesarrollo = 0;
/*se termina actualizacion */
$sql1 = "SELECT * FROM indicadores WHERE idencuesta='$encuesta' ORDER BY numero";
$resultado =$con->query($sql1);
$i = 1;
foreach ($resultado as $fila) {
    $indicador = $fila['numero'];
    $indicadorDA[$i] = $fila['descripcion'];
	$minimo = $fila['minimo'];
	$valorinferior = $fila['valorinferior'];
	$valormayor = $fila['valormayor'];
	$sql2 = "SELECT COUNT(*) as cuenta FROM preguntas WHERE idencuesta='$encuesta' AND indicador='$indicador' ORDER BY numero";
	$r2 = $con->prepare($sql2);
	$r2->execute();
	$rs2 = $r2->fetch();
	$numPI = $rs2['cuenta'];
	$acumuladoAlumno = 0;
	$nocontestadas = 0;
	if($numPI>0)
	{
		$sql3 = "SELECT * FROM preguntas WHERE idencuesta='$encuesta' AND indicador='$indicador' ORDER BY numero";
		$rfoo = $con->query($sql3);
		foreach($rfoo as $fila2) {
	    $pregunta = $fila2['numero'];
		$positiva = $fila2['orden'];
		$sql4 = "SELECT COUNT(*) as cuenta  FROM resultados WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
		$rs3_foo = $con->prepare($sql4);
		$rs3_foo->execute();
		$rss1 = $rs3_foo->fetch();
		$k = $rss1['cuenta'];
		if ( $k > 0) {
			$sql5 = "SELECT *  FROM resultados WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
		$rs5 = $con->prepare($sql5);
		$rs5->execute();
		$rss2 = $rs5->fetch();
		$valor = $rss2['respuesta'];
		   if ($valor == 6) {
		       $nocontestadas = $nocontestadas+1;
		   } else {
		      if ($positiva > 0)  {
		         $acumuladoAlumno = $acumuladoAlumno + $valor;
			  } else {
			     $acumuladoAlumno = $acumuladoAlumno + (6-$valor);
              }			  
		   }
		}
	}
}
	$alumnoIA[$i] = $acumuladoAlumno;
	$alumnoNIA[$i] = $nocontestadas;
	if ($acumuladoAlumno >= $valormayor) {
	   $fortalezaA[$i] = 1;
	   $numeroFortalezas = $numeroFortalezas+1;
	   $discursoA[$i] = $fila['mensajefortaleza'];
	} else {
	   if (($acumuladoAlumno <= $valorinferior) && ( $minimo <= $acumuladoAlumno)) {
	      $fortalezaA[$i] = -1;
		  $numeroVulnerabilidades = $numeroVulnerabilidades + 1;
		  $discursoA[$i] = $fila['debilidaddiscurso'];
       } else {
	      $fortalezaA[$i] = 0;
		  $discursoA[$i] = "Ni fortaleza ni vulnerabilidad: indicador por desarrollar.";
		  $numeroEnDesarrollo = $numeroEnDesarrollo+1;
       }	   
	}
	$i = $i+1;
}

$sql1 = "SELECT COUNT(*) as cuenta FROM preguntas WHERE idencuesta='$encuesta' AND detonante='1' ORDER BY numero";
$respuesta = $con->prepare($sql1);
$respuesta->execute();
$rs1 = $respuesta->fetch();;
$numPD = $rs1['cuenta'];
$respADA = array();
$preguntaDA = array();
$alarmaA = array();
$alarmaMA = array();
$existeAlarmasQ = 0;
$sql1_foo = "SELECT * FROM preguntas WHERE idencuesta='$encuesta' AND detonante='1' ORDER BY numero";
$respuesta = $con->prepare($sql1_foo);
$respuesta->execute();
$rs1 = $respuesta->fetch();;
for($i=1 ; $i <= $numPD ; $i++) {
    $alarmaA[$i] = "No se reconoce como alarma";
    $pregunta = $rs1['numero'];
    $indicador = $rs1['indicador'];
	$orden = $rs1['orden'];
	$valordetonante = $rs1['valordetonante'];
	$preguntaDA[$i] = $pregunta;
	$sql2 = "SELECT COUNT(*) as cuenta FROM  resultados WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
	$rr = $con->prepare($sql2);
	$rr->execute();
	$rs2 = $rr->fetch();
	if ($rs2['cuenta'] > 0) {
	   $sql22 = "SELECT * FROM  resultados WHERE alumno='$alumno' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
		$rrr = $con->prepare($sql22);
		$rrr->execute();
		$rs22 = $rrr->fetch();
		$valor = $rs22['respuesta'];
       $respADA [$i] = $valor;
	   $alarmaMA[$i] = "";
	   if ($orden > 0) {
	       if($valor <= $valordetonante) {
		       $alarmaA[$i] = "<font color=\"red\">Alarma:".$indicadorDA[$indicador]."</font>";
			   $sql2_foo2 = "SELECT * FROM mensajedetonadoras WHERE encuesta='$encuesta' AND pregunta='$pregunta'";
			   $nop = $con->prepare($sql2_foo2);
			   $nop->execute();
			   $rss2 = $nop->fetch();
			   $alarmaMA[$i] = $rss2['mensaje'];
			   $existeAlarmasQ = 1;
		   }
	   } else {
	       if($valor >= $valordetonante) {
		       $alarmaA[$i] = "<font color=\"red\">Alarma:".$indicadorDA[$indicador]."</font>";
			   $sql2 = "SELECT * FROM mensajedetonadoras WHERE encuesta='$encuesta' AND pregunta='$pregunta'";
			   $nop =$con->prepare($sql2);
			   $nop->execute();
			   $rss2 = $nop->fetch();
			   $alarmaMA[$i] = $rss2['mensaje'];
			   $existeAlarmasQ = 1;
		   }	      
	   }
	}
}
/***************************************/
?>
<!-- termina calculo de indicadores-->

<!--
	Comienza cuerpo de vista 'indicadores.php'
-->

<div>
<table width="100%" cellspacing="20%" class="foo">
	<tr>
		<td align="left" valign="top"> 
		<img src="graficos/the-sun-smoji.png" width="25"> 
		<font class="foo" color="#3fad08"> Fortalezas son: </font>
		<br>
		Las habilidades o capacidades de resistir una situaci&oacute;n y 
		sobrellevarla de tal manera que se pueda modificar con el comportamiento presente o en base a modificaciones por medio del aprendizaje. 
		</td>
		<td width="5%"></td>
		<td align="left" valign="top"><img src="graficos/sun-behind-cloud-emoji.png" width="25"><font class="foo" color="#3fad08"> Vulnerabilidades son: </font><br>		
		Las capacidades disminuidas de una persona para anticiparse, hacer frente y resistir a los efectos de un peligro (ambiente), 
		la actividad humana, y dificultad  para recuperarse de los mismos.
		</td>
	</tr>
</table>
	<br></br><br></br> 
	<font  class="foo">Las fortalezas  y vulnerabilidades se pueden modificar a lo largo de tu vida personal y formaci&oacute;n acad&eacute;mica 
	por ello te recomendamos leer cuidadosamente los resultados de tu prueba y buscar ayuda en caso de requerirlo. </font>
	</td>
	</tr>
</div>


<br></br>
<hr class="style4">

<h1 align="center">Tu percepci&oacute;n al llegar al TEC es:</h1>
<?php if ($numeroVulnerabilidades> 0):?>
	<hr align="left" width="100%"> 
	<div >
	<table border="0" width="100%" class ="foo2">
	<tr>
		<td align="center">
		<img src="graficos/thinking-face-emoji.png" width="50">
		<font size="100%" color="#3fad08"" align="center">Vulnerabilidades</font>
		</td>
	</tr>
<?php for($i=1 ; $i <= $numI; $i++): ?>
<?php if ($fortalezaA[$i]<0):?>
	<tr>
		<td class ="foo2">
		<img src="graficos/sun-behind-cloud-emoji.png" width="20">
		<font class ="foo2"><b><?php echo $i;?>: <?php echo $indicadorDA[$i];?></b></font> <br>
		<?php echo $discursoA[$i];?><a href="info-indicadores.php?indicador=<?php echo $i;?>&alumno=<?php echo $alumno?>" target="_BLANK">+Info</a>
		</td>
	</tr>
<?php endif; ?>
<?php endfor; ?>
</table>
</div>
<?php endif;?>
<br>
</h1>
<br></br>
<?php if($numeroFortalezas> 0): ?>
	 
	<div>
	<!--<table border="1" align="left" >
		<col width="45%">
  		<col width="45%">-->
  	<table border="0" width="100%" class ="foo2">

	<tr>
		<td align="center" class ="foo2">
		<img src="graficos/slightly-smiling-face-emoji.png" width="50">
		<font size="+4" color="#3fad08">Fortalezas</font></td></tr>
		<?php for($i=1 ; $i <= $numI; $i++): ?>
		<?php if ($fortalezaA[$i]>0):?>
	<tr>
		<td class ="foo2">
		<img src="graficos/the-sun-smoji.png" width="20">
		<font class ="foo2"><b><?php echo $i;?>: <?php echo $indicadorDA[$i];?></b></font> <br>
		<?php echo $discursoA[$i];?>
		</td>
	</tr>
<?php endif; ?>
<?php endfor; ?>
</table>
</div>
<?php endif; ?>
<!------------------------->
<?php if($numeroEnDesarrollo> 0): ?>
<br></br>	 
	<div>
	<!--<table border="1" align="left" >
		<col width="45%">
  		<col width="45%">-->
  	<table border="0" width="100%" class ="foo2">

	<tr>
		<td align="center" class ="foo2">
		<img src="graficos/pencil-emoji.png" width="50">
		<font size="+4" color="#3fad08">En Desarrollo</font></td></tr>
		<?php for($i=1 ; $i <= $numI; $i++): ?>
		<?php if ($fortalezaA[$i]==0):?>
	<tr>
		<td class ="foo2">
		<img src="graficos/the-sun-smoji.png" width="20">
		<font class ="foo2"><b><?php echo $i;?>: <?php echo $indicadorDA[$i];?></b></font> <br>
		<?php echo $discursoA[$i];?>
		</td>
	</tr>
<?php endif; ?>
<?php endfor; ?>
</table>
</div>
<?php endif; ?>
<!------------------------->
<?php if(($numPD>0) && ($existeAlarmasQ>0) ): ?>
<hr class="style4">
<font size="+1" color="#0404B4">
<?php for($i=1 ; $i <= $numPD; $i++): ?>
  <th align="left"><font size="-1">
  	<?php echo $alarmaA [$i];?></font><br>
  <?php echo $alarmaMA[$i];?>

<?php endfor; ?>
</font>
<?php endif;?>


<hr class="style4">
<H3>Gracias por tu tiempo, disfruta tu vida universitaria.</H3><br>
<h5>
<?php include 'tail-ok.php'; ?>

<!--
	Script para consultar y calcular indicadores por alumno
-->
