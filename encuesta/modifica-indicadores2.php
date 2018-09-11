<?php
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
extract($_REQUEST);
$orientador = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];
$indicador = $_POST['indicador'];
$campusC = $_POST['campus'];

$debilidaddiscurso = $_POST['debilidaddiscurso'];
$debilidadlinkinterno = $_POST['debilidadlinkinterno'];
$debilidadlinkextrerno = $_POST['debilidadlinkextrerno'];
$debilidadarticulosinteres = $_POST['debilidadarticulosinteres'];

	$sql = "UPDATE referenciasDebilidadesIndicador SET ".
	"debilidaddiscurso='$debilidaddiscurso', ".
	"debilidadlinkinterno='$debilidadlinkinterno', ".
	"debilidadlinkextrerno='$debilidadlinkextrerno', ".
	"debilidadarticulosinteres='$debilidadarticulosinteres' ".
	"WHERE idencuesta='$encuesta' AND numero='$indicador' AND campus='$campusC'" ;
    $rs = mysql_query($sql)  or die("Invalid query 1: " . mysql_error());
	$_SESSION['mensaje'] = $sql;
header("Location: modifica-indicadores.php");
?>
