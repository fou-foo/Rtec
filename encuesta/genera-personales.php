<?php
$MM_redirectLoginSuccess = "servicios.php";
session_start();
if (isset($_SESSION['userName']) && ($_SESSION['nivel'] >= 1)) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};

/* Funciones de impresion */
if (!function_exists('fprintf')) {
   if (function_exists('vsprintf')) { // >= 4.1.0
       function fprintf() {
           $args = func_get_args();
           $fp = array_shift($args);
           $format = array_shift($args);
           return fwrite($fp, vsprintf($format, $args));
       }
   } else { // < 4.1.0
       function fprintf() {
           $args = func_get_args();
           $fp = array_shift($args);
           $format = array_shift($args);
           $code = '';
           for ($i = 0; $i < count($args); ++$i) {
               if ($code) {
                   $code .= ',';
               }
               $code .= '$args[' . $i . ']';
           }
           $code = 'return sprintf($format, ' . $code . ');';
           $rv = eval($code);
           return $rv ? fwrite($fp, $rv) : false;
       }
   }
}

if (!function_exists('my_stripslashes')) {
	function my_stripslashes($vals) {
           if (is_array($vals)) {
               foreach ($vals as $key=>$val) {
                  $vals[$key]=my_stripslashes($val);
               }
           } else {
              $vals = stripslashes($vals);
           }
           return $vals;
        }
}

$usuario = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];
// include 'head.php';


	$sql = "SELECT * FROM personales ORDER by matricula";
	$rs = mysql_query($sql);
	$numAlumnos = mysql_numrows($rs);
	if ( $numAlumnos  == 0) {$_SESSION['mensaje']='Cero alumnos';header("Location: servicios.php");} 
	
	include 'head-html.php';
	
	$nombreArchivo = "salida/$usuario-".rand().".csv";
	$file  = fopen($nombreArchivo , 'w');
	fprintf($file,"%s","\"matricula\",\"edad\",\"sexo\",\"genero\",\"estadocivil\",\"estudios\",");
	fprintf($file,"%s","\"procedencia\",\"estado\",\"preparatoriaorigen\",\"carrera\",");
	fprintf($file,"%s","\"vivesen\",\"tienesbeca\",\"tipobeca\",");
	fprintf($file,"%s","\"trabaja\",\"enquetrabaja\",");
	fprintf($file,"%s","\"tieneactividadextraacademica\",\"cualextraacademica\",");
	fprintf($file,"%s","\"religion\",\"cualreligion\",");
	fprintf($file,"%s\n","\"actividadespiritual\",\"cualactividadespiritual\"");
	for($i=0; $i< $numAlumnos ; $i++) {
		$matricula = mysql_result($rs,$i,"matricula");
		$edad = mysql_result($rs,$i,"edad");
		$sexo = mysql_result($rs,$i,"sexo");
		$genero = mysql_result($rs,$i,"genero");
		$estadocivil = mysql_result($rs,$i,"estadocivil");
		$estudios = mysql_result($rs,$i,"estudios");
		$procedencia = mysql_result($rs,$i,"procedencia");
		$estado = mysql_result($rs,$i,"estado");
		$preparatoriaorigen = mysql_result($rs,$i,"preparatoriaorigen");
		$carrera = mysql_result($rs,$i,"carrera");
		$vivesen = mysql_result($rs,$i,"vivesen");
		$tienesbeca = mysql_result($rs,$i,"tienesbeca");
		$tipobeca = mysql_result($rs,$i,"tipobeca");
		$trabaja = mysql_result($rs,$i,"trabaja");
		$tieneactividadextraacademica = mysql_result($rs,$i,"tieneactividadextraacademica");
		$cualextraacademica = mysql_result($rs,$i,"cualextraacademica");
		$religion = mysql_result($rs,$i,"religion");
		$cualreligion = mysql_result($rs,$i,"cualreligion");
		$enquetrabaja = mysql_result($rs,$i,"enquetrabaja");
		$actividadespiritual = mysql_result($rs,$i,"actividadespiritual");
		$cualactividadespiritual = mysql_result($rs,$i,"cualactividadespiritual");

		fprintf($file,"\"%s\",",$matricula);
		fprintf($file,"%d,",$edad);
		fprintf($file,"%d,",$sexo);
		fprintf($file,"%d,",$genero);
		fprintf($file,"%d,",$estadocivil);
		fprintf($file,"%d,",$estudios);
		fprintf($file,"%d,",$procedencia); 
		fprintf($file,"%d,",$estado);
		fprintf($file,"%d,",$preparatoriaorigen);
		fprintf($file,"%d,",$carrera);
		fprintf($file,"%d,",$vivesen);
		fprintf($file,"%d,",$tienesbeca);
		fprintf($file,"%d,",$tipobeca);
		fprintf($file,"%d,",$trabaja);
		fprintf($file,"\"%s\",",$enquetrabaja);
		fprintf($file,"%d,",$tieneactividadextraacademica);
		fprintf($file,"\"%s\",",$cualextraacademica);
		fprintf($file,"%d,",$religion);
		fprintf($file,"\"%s\",",$cualreligion);
		fprintf($file,"%d,",$actividadespiritual);	
		fprintf($file,"\"%s\"",$cualactividadespiritual);		
	
		fprintf($file,"\n");
	}
	
	fclose($file);
?>
<ul>
<li><a href="<?php echo $nombreArchivo;?>" target="_BLANK"> Archivo con los personales en CSV</a></li>
<li><a href="claves-datos.txt" target="_BLANK"> Archivo con la descripci&oacute;n de las claves num&eacute;ricas</a></li>
<li>N&uacute;mero  de alumnos con datos datos personales: <?php echo $numAlumnos;?></li>
</ul>
<?php include 'tail-ok.php'; ?>
