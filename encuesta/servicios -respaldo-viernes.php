<?php 
	include 'head.php'; 
	include 'head-html.php'; 
	include 'db-info.php';
	InicioBD();
 $usuario = $_SESSION['userName'];
 $nivelUsuario = 0;
 $nivelUsuario = $_SESSION['nivel'];
 $encuesta = $_SESSION['encuesta'];
 
 $personalescapturadosQ = 0;
 if ($nivelUsuario == 0) {		
	$query = "SELECT * FROM personales WHERE matricula='$usuario'";
	$rs = mysql_query($query) or die("Invalid query: " . mysql_error());	
	if (mysql_numrows($rs)) { $personalescapturadosQ = 1; }
 }
  
 $query = "SELECT * FROM encuesta WHERE numero='$encuesta'";
 $rs = mysql_query($query) or die("Invalid query: " . mysql_error());
 if (mysql_numrows($rs)) { $totalPreguntas = $sesionA[$i] = mysql_result($rs,0,"preguntas"); } 
 else {$totalPreguntas = 0;}
 $_SESSION['totalPreguntas'] = $totalPreguntas;

 $query = "SELECT * FROM resultados WHERE alumno='$usuario' AND idencuesta='$encuesta' ORDER BY pregunta DESC";
 $rs = mysql_query($query) or die("Invalid query: " . mysql_error());
 $encuestaTerminada = 0;
 $pregunta = 0;
 if (mysql_numrows($rs)) {
  $pregunta = mysql_numrows($rs); 
  $pregunta = mysql_result($rs,0,"pregunta");
  if ($pregunta >= $totalPreguntas) $encuestaTerminada = 1;
 }
 $_SESSION['totalPreguntas'] = $totalPreguntas;
 $_SESSION['pregunta'] = $pregunta+1;
 $_SESSION['tamanoletra'] = 2;
 if (strlen($_SESSION['mensaje'])<5) {$_SESSION['mensaje']= "Inicio de sesion";}
?>
<?php if($nivelUsuario  >= 0): ?>
<?php if ($nivelUsuario == 0): ?>
	<div align="center">
    <table width="550">
	<tr><th align="left" valign="bottom"><h3>Instrucciones</h3></th>
	    <th align="right" valign="top"><img src="graficos/tec.png" width="200"><br><br></th>
		</tr>
	<tr><td colspan="2">
	Bienvenido(a) al TEC de Monterrey<br>
Queremos conocerte mejor por ello se ha estructurado la presente encuesta. &Eacute;sta tiene como objetivo reconocer tus fortalezas y vulnerabilidades.
Lee detenidamente las siguientes afirmaciones. Elije s&oacute;lo una respuesta, si te es dif&iacute;cil identificarte con alguna selecciona aquella que 
m&aacute;s se asemeje a tu forma de pensar; trata de ser honesto.<br>
La informaci&oacute;n que proporciones es confidencial y en resguardo del Departamento de Mejoramiento Acad&eacute;mico. 
Al finalizar el inventario podr&aacute;s consultar tus resultados y contactarnos para establecer  estrategias para la mejorar en tu vida personal y acad&eacute;mica.
</td>		
		</tr>
	</table>
</div>
<br>
<B>Servicios disponibles:</B> 
     <UL>
     <LI><A HREF="datos-personales.php">Capturar/Modificar datos personales</A></LI>
		<?php if($personalescapturadosQ == 1): ?>
			<?php if ($encuestaTerminada > 0): ?> 
				<LI><A HREF="indicadores.php">Revisar mis indicadores</A></LI>
            <?php else: ?>		
				<LI><A HREF="encuestaN.php">Encuesta</A></LI>
			<?php endif; ?>	 
		<?php endif; ?>
     <LI><A HREF="cambia-clave.php">Cambia <i>password</i> de acceso a encuesta</A></LI>
     <LI><A HREF="encuesta-pendientes.php">Revisando preguntas pendientes</A></LI>
     </UL>
<?php endif; ?>
<?php if ($nivelUsuario >= 1): ?>
<B>Servicios disponibles</B> 
     <UL>
     <LI><A HREF="alta-alumno.php">Dar de alta a un alumno que no puede ingresar</A></LI>
     <LI><A HREF="alta-alumnos.php">Dar de alta a VARIOS alumno que no puede ingresar</A></LI>
	 <?php if($nivelUsuario>3):?>
     <LI><A HREF="modifica-indicadores.php">Edita mensajes de indicadores</A></LI>
     <LI><A HREF="modifica-detonadoras.php">Edita mensajes de preguntas detonadoras</A></LI>
     <LI><FORM name="test" action="indicadores-alumno.php" method="POST">   
          Revisar lo que ve el alumno:<INPUT TYPE="text" NAME="alumno" VALUE="A0" size="10" maxlength="10">
          <INPUT name="submit" type="submit" value="Consultar"></FORM>
          </LI>
     <LI><A HREF="genera-datos.php">Bajar resultados de la encuesta</A></LI>
	 <?php endif;?>
     </UL>
<?php endif; ?>
<?php include 'tail-ok.php'; ?>
<?php else: ?>
<?php include 'tail-fail.php'; ?>
<?php endif;?>
