<?php
$matricula = 0;  
$sMensaje = "No ha iniciado una sesion";
$nombreProyecto = "Encuesta DiMA";
$webPage = "http://cb.mty.itesm.mx/ma1010/home.htm";
session_start();
if (//!session_is_registered("nomina")) {
	!isset($_SESSION['userName']))
	{
		$matricula = 0 + $_SESSION["matricula"];
		$clave = $_SESSION["clave"];
		$fechaGuardada = $_SESSION["ultimoAcceso"];
		$ahora = date("Y-n-j H:i:s");
		if ($fechaGuardada) 
		{
			$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));	
		}
	if($tiempo_transcurrido > 540) //se cambia tiempo max de sesion a 9 minutos
	{
		$nomina = 0;
		$sMensaje = "Su sesion ha finalizado"; 
	}
	else {
		$_SESSION["ultimoAcceso"] = $ahora;
	}
	}
if (!isset($_SESSION['userName'])) 
{
	header("Location: signout.php");
}
?>
