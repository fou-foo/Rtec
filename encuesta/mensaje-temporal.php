<?php
$MM_redirectLoginSuccess = "servicios.php";
session_start();
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
if (isset($_SESSION['userName'])) {
  require("db-info.php");
  InicioBD();
} else {header("Location: signout.php");};
$matricula = $_SESSION['userName'];
/////////////////////////////////////////////////////////
// Determina el campus de origen....
 $query = "SELECT * FROM alumnos WHERE matricula='$matricula'";
 $resultado = $con->prepare($query);
 $resultado->execute();
 $rs = $resultado->fetch();
 $campus = $rs['campus'];
// Determina el orientador de mas alta jerarquia en el campus
$query = "SELECT COUNT(*) AS CUENTA FROM orientadores WHERE campus='$campus' AND correo <> '' ORDER BY nivel DESC ";
 $resultado = $con->prepare($query);
 $resultado->execute();
 $rs = $resultado->fetch();
 $n = $rs['CUENTA'];
 if( $n > 0)
 {
 	$query = "SELECT * FROM orientadores WHERE campus='$campus' AND correo <> '' ORDER BY nivel DESC limit 1";
 	$resultado = $con->prepare($query);
 	$resultado->execute();
 	$rs = $resultado->fetch();
 	$orientador = $rs['orientador'];
 	$correoO = $rs['correo'];
 } else { // El default:
	  $orientador =" Lic. Minerva Cardona Huerta";
	  $correoO = "mcardona@itesm.mx";
 }
 /////////////////////////////////////////////////////////
include 'head-html.php';
?>
<font class="foo">
Has terminado con &eacute;xito tu aplicaci&oacute;n. <br>
Podr&aacute;s revisar tus resultados la pr&oacute;xima semana.<br>
Recuerda ingresar a este sitio con el password que utilizaste en tu aplicaci&oacute;n.<br>
Mayor informaci&oacute;n: <?php echo $orientador;?>,  <?php echo $correoO;?><br><br>
<center>
<img src="graficos/tqueremos.jpg" width="500" align="center">
</center>
</font>
<?php include 'tail-ok.php'; ?>