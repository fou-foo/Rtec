<?php
	$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
	$sql = "SELECT COUNT(*) AS CUENTA  FROM personales WHERE matricula='$usuario'";
	$cuenta = $con->prepare($sql);
	$cuenta->execute();
	$r = $cuenta->fetch();
	$rs = $r['CUENTA'];
	if ( $rs ) {
		$sql = "UPDATE personales SET ".
		" sexo = '$sexo', ".
		" genero = '$genero', ".
		" procedencia = '$procedencia', ".
		" estadocivil = '$estadocivil', ".
		" estudios = '$estudios', ".
		" estado = '$estado', ".
		" carrera = '$carrera', ".
		" campus = $campus, ".
		" edad = '$edad',".
		" vivesen = '$vivesen', ".
		" tienesbeca = '$tienesbeca', ".
		" tipobeca = '$tipobeca', ".
		" trabaja = '$trabaja', ".
		" tieneactividadextraacademica = '$tieneactividadextraacademica', ".
		" religion = '$religion', ".
		" actividadespiritual = '$actividadespiritual', ".
		" cualextraacademica = '$cualextraacademica', ".
		" cualreligion = '$cualreligion', ".
		" enquetrabaja = '$enquetrabaja', ".
		" cualactividadespiritual = '$cualactividadespiritual' ,".
		"preparatoriaorigen='$preparatoriaorigen'".
		" WHERE matricula='$usuario'"; 
	} else {
		$sql = "INSERT INTO personales(matricula,edad,sexo,genero,estadocivil,estudios,procedencia,estado,preparatoriaorigen,carrera,vivesen,tienesbeca,tipobeca,trabaja,tieneactividadextraacademica,cualextraacademica,religion,cualreligion,enquetrabaja,actividadespiritual,cualactividadespiritual,codigo,campus) ".
				"VALUES ('$usuario','$edad','$sexo','$genero','$estadocivil','$estudios','$procedencia','$estado','$preparatoriaorigen','$carrera','$vivesen','$tienesbeca','$tipobeca','$trabaja','$tieneactividadextraacademica','$cualextraacademica','$religion','$cualreligion','$enquetrabaja','$actividadespiritual','$cualactividadespiritual','0','$campus')";
	}
    $resultado_d6 = $con->prepare($sql);
	$resultado_d6->execute();
	$query = "insert into pistas (fecha, usuario, mensaje) values (now(),'{$_SESSION['loginUserName']}', 'Actualizacion de datos personales')";   
	$con->prepare($query)->execute();
   $_SESSION['mensaje']=$sql;
?>
<!--
#	Script para insercion o actualizacion de datos personales del rol 'alumno'
-->