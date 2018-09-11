<?php 
	include 'head.php'; 
	include 'head-html.php'; 
	include 'db-info.php';
	InicioBD();
 $usuario = $_SESSION['userName'];
 $nivelUsuario = 0;
 $nivelUsuario = $_SESSION['nivel'];
 $encuesta = $_SESSION['encuesta'];
 
 # se consulta si el usuario con rol de 'alumno' 
 # ya contesto parcial o totalmente la encuesta y tambien si ya introdujo sus datos personales
 $query = "SELECT * FROM encuesta WHERE numero='$encuesta'";
 $rs = mysql_query($query) or die("Invalid query: " . mysql_error());
 if (mysql_numrows($rs))
 { 
 	$totalPreguntas /*= $sesionA[$i]*/ = mysql_result($rs,0,"preguntas");//se consulta el numero total de preguntas de la encuesta
 }  else {
 	$totalPreguntas = 0;
 }
 $_SESSION['totalPreguntas'] = $totalPreguntas;
 $personalescapturadosQ = 0;
 #se comienza validacion del numero de preguntas que ha respondido el alumno en la encuesta DiMA
 if ($nivelUsuario == 0) //nivel de usuario de rol 'alumno'
 {		
	#se comienza validacion de si el alumno ha ingresado sus datos personales	$query = "SELECT * FROM personales WHERE matricula='$usuario'";
	$rs = mysql_query($query) or die("Invalid query: " . mysql_error());	
	if (mysql_numrows($rs)) 
	{ 
		$personalescapturadosQ = 1; 
	}
    #se termina validacion de si el alumno ha ingresado sus datos personales	$query = "SELECT * FROM personales WHERE matricula='$usuario'";
	$encuestaTerminada = 0;
	for($pregunta = 1 ; $pregunta <= $totalPreguntas; $pregunta++) 
	{
		$sql = "SELECT * FROM resultados WHERE alumno='$usuario' AND idencuesta='$encuesta' AND pregunta='$pregunta'";
		$rs = mysql_query($sql);
		if (!mysql_numrows($rs)) 
		{
			break;
		} 
	}
	$_SESSION['pregunta'] = $pregunta;
	$_SESSION['mensaje']= "Pregunta: $pregunta";
	if ($pregunta>$totalPreguntas) 
	{
		$encuestaTerminada = 1;
	}
 }
 #se termina validacion del numero de preguntas que ha respondido el alumno en la encuesta DiMA

if (strlen($_SESSION['mensaje'])<5) 
{
	$_SESSION['mensaje']= "Inicio de sesion";
}
?>

<!--<?php if($nivelUsuario  >= 0): ?> -->
<?php if ($nivelUsuario == 0): ?>  <!-- caso de usuario con rol de 'alumno'-->
<link rel="stylesheet" type="text/css" href="style.css">
	<!--<div align="center">
    <table width="550" >
	<tr><th align="left" valign="bottom"><h3>Instrucciones</h3> </th> -->
	    <!--<th align="right" valign="top">--><img src="graficos/tec.png" width="400" align="right"><br><!--<br></th>
		</tr>-->
	<!--<tr>--<td--> <font class="foo">
	Bienvenido(a) al TEC de Monterrey<br>
Queremos conocerte mejor por ello se ha estructurado la presente encuesta. &Eacute;sta tiene como objetivo reconocer tus fortalezas y vulnerabilidades. </font> <br> <br>
<h3> <b><u>Instrucciones</u></b>:</h3> <br>

<span class="foo"> Lee detenidamente <font color="red">los siguientes enunciados</font>. Elije s&oacute;lo una respuesta, si te es dif&iacute;cil identificarte con alguna, selecciona aquella que 
m&aacute;s se asemeje a tu forma de pensar; trata de ser honesto.<font color="green"> PROPONGO ALGO DEL TIPO:, SE HONESTO NADIE EN EL TEC PODRA SABER TUS RESPUESTAS MUCHO MENOS TUS COMPAÑEROS</font> <br> <br>
La informaci&oacute;n que proporciones es confidencial y en resguardo del Departamento de Mejoramiento Acad&eacute;mico. 
Al finalizar el inventario podr&aacute;s consultar tus resultados y contactarnos para establecer  estrategias para mejorar en tu vida personal y acad&eacute;mica. <font COLOR="GREEN"> creo que aqui hace falta mas choro para motivar a los muchachos </font> 
<!--</td>		
		</tr>
	</table>
</div>-->
<br><br><br>

<div align="center">
<b align="center"> Servicios disponibles:</b> </p> 
     <UL align="left">
     <LI align="left"><A HREF="datos-personales.php">Capturar/Modificar datos personales</A></LI>
		<?php if($personalescapturadosQ == 1): ?>
			<?php if ($encuestaTerminada > 0): ?> 
				<LI align="left"><A HREF="indicadores.php">Revisar mis indicadores</A></LI>
				<LI align="left"> <a HREF="https://joseramirezcimat.shinyapps.io/Rtec_final/"> NUEVA PROPUESTA DE INDICADORES</A></LI>
            <?php else: ?>		
				<LI align="left"><A HREF="encuesta-pendientes.php">Contestar encuesta</A></LI>
			<?php endif; ?>	 
		<?php endif; ?>
     <LI align="left"><A HREF="cambia-clave.php">Cambiar <i>password</i> de acceso a encuesta</A></LI>
     </UL>
 </div>
<?php endif; ?>
<?php if ($nivelUsuario >= 1): ?>
<div align="center">
<B align="center">Servicios disponibles</B> 
     <UL >
     <LI align="left"><A HREF="alta-alumno.php">Dar de alta a un alumno que no puede ingresar</A></LI>
     <LI align="left"><A HREF="alta-alumnos.php">Dar de alta a VARIOS alumno que no pueden ingresar</A></LI>
     <?php if($nivelUsuario>3):?>
     <LI align="left"><A HREF="alta-orientador-rol3.php">Dar de alta a orientador nivel 3 que no puede ingresar</A></LI>
     <?php endif;?>
   	 <?php if($nivelUsuario>4):?>
         <LI align="left"><A HREF="alta-orientador-rol4.php">Dar de alta a orientador nivel 4 que no puede ingresar</A></LI>
         <LI align="left"><FORM name="test" action="indicadores-alumno.php" method="POST">   
          Revisar los resultados del alumno:<INPUT TYPE="text" NAME="alumno" VALUE="A0" size="12" maxlength="12">
          <INPUT name="submit" type="submit" value="Consultar"></FORM>
          <LI align="left"><A HREF="genera-datos.php">Bajar resultados de la encuesta</A></LI>
   	 <?php endif; ?>
	 <?php if($nivelUsuario>5):?>
	 	<LI align="left"><A HREF="alta-orientador-rol5.php">Dar de alta a orientador nivel 5 que no puede ingresar</A></LI>
     <LI align="left"><A HREF="modifica-indicadores.php">Edita mensajes de indicadores</A></LI>
     <LI align="left"><A HREF="modifica-detonadoras.php">Edita mensajes de preguntas detonadoras</A></LI>
	 <?php endif;?>
	 <LI align="left"><A HREF="cambia-clave-orientador.php">Cambiar <i>password</i> de acceso a encuesta de orientador</A></LI>
     </UL>
     </div>
<?php endif; ?>
  

<?php include 'tail-ok.php'; ?>
<?php else: ?>
<?php include 'tail-fail.php'; ?>
<?php endif;?>
</INPUT>