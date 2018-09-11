<?php
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
session_start();
if (isset($_SESSION['userName']) && ($_SESSION['nivel']>=3)) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
$matriculas = $_POST['matriculas'];
$campusc = $_POST['campus'];
$claveC = md5('dimaSet');

$local=strtok($matriculas," ,\t\n");
while (($local != NULL)) 
{
  $matricula = strtoupper(trim($local));
  if (strlen($matricula) > 9) 
    {
      $local=strtok("  ,\t\n");
      continue;
    }
    $sql = "SELECT COUNT(*) as cuenta FROM alumnos WHERE matricula='$alumno'";
    $r = $con->prepare($sql);
    $r->execute();
    $rs = $r->fetch();
    $n = $rs['cuenta'];
    if($n > 0) 
    {       } else {
      $sql = "INSERT INTO alumnos(matricula,clave, campus) VALUES('$matricula','$claveC', '$campusc' )";
      $r = $con->prepare($sql);
      $r->execute();
    }
    $local=strtok("  ,\t\n");
}
header("Location: servicios.php");
?>
<!-- Script para validar la longitud de las matriculas e insertar usuarios en la tabla 'alumnos'
-->
