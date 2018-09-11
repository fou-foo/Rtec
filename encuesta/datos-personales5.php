<?php
	include 'info-datos-personales.php';
	$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
	$sql = "SELECT count(*) as cuenta FROM personales WHERE matricula='$usuario'";
	$resultado = $con->prepare($sql);
	$resultado->execute();
	$r = $resultado->fetch();
	$rs = $r['cuenta'];
	if ( $rs > 0) {
		$sql = "SELECT * FROM personales WHERE matricula='$usuario'";
		$resultado = $con->prepare($sql);
		$resultado->execute();
		$fila = $resultado->fetch();
		$procedencia = $fila['procedencia'];
		$estadocivil = $fila['estadocivil'];
		$sexo = $fila['sexo'];
		$genero = $fila['genero'];
		$estudios = $fila['estudios'];
		$estado = $fila['estado'];
		$carrera = $fila['carrera'];
		$campus = $fila['campus'];
		$vivesen = $fila['vivesen'];
		$tienesbeca = $fila['tienesbeca'];
		$tipobeca = $fila['tipobeca'];
		$trabaja = $fila['trabaja'];
		$tieneactividadextraacademica = $fila['tieneactividadextraacademica'];
		$religion = $fila['religion'];
		$actividadespiritual = $fila['actividadespiritual'];
		$cualextraacademica = $fila['cualextraacademica'];
		$cualreligion = $fila['cualreligion'];
		$enquetrabaja = $fila['enquetrabaja'];
		$cualactividadespiritual = $fila['cualactividadespiritual'];
		$edad = $fila['edad'];
		$preparatoriaorigen = $fila['preparatoriaorigen'];
	} else {
	$sql = "SELECT COUNT(*) as cuenta FROM alumnos WHERE matricula='$usuario'";
	$resultado = $con->prepare($sql);
	$resultado->execute();
	$r = $resultado->fetch();
	$rs = $r['cuenta'];
	if ($rs > 0 ) {
		$sql = "SELECT * FROM alumnos WHERE matricula='$usuario'";
		$resultado = $con->prepare($sql);
		$resultado->execute();
		$r = $resultado->fetch();
		$campus = $r['campus'];
	}
	}	
   $_SESSION['mensaje']=$sql;	
?>
<!--
	En caso de que se disponga de informacion del usuario esta se muestra y se actualiza
	en la tabla 'personales'
-->
