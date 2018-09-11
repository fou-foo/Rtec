<?php
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
session_start();

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

$usuario = 'FOO';
$encuesta = 0;
// include 'head.php';
  # Se genera archivo de salida de todas las respuestas de todos los alumnos
  $sql = "SELECT * FROM encuesta WHERE numero='1'";
  $res=$con->prepare($sql);
  $res->execute();
  $res = $res->fetch();
  //$numPreguntas = $res['numero'];
 
  $numPreguntas = $res['preguntas'];
    echo $numPreguntas;

  include 'head-html.php';
  $sql = "SELECT COUNT(*) AS CUENTA FROM (SELECT DISTINCT alumno FROM resultados WHERE idencuesta='1') AS A";
  $res=$con->prepare($sql);
  $res->execute();
  $r = $res->fetch();
  $numA = $r['CUENTA'];
  $sql = "SELECT DISTINCT alumno FROM resultados WHERE idencuesta='1' ORDER BY alumno";
  $alumni = $con->query($sql);
  $i = 0;
  $alumnoA = array();
  foreach ($alumni as $fila ) {
    $alumnoA[$i]=$fila['alumno'];
     echo $alumnoA[$i];
     $i=$i+1;
  }
  $respuestasA = array();
  $nombreArchivo = "salida/Encuesta"."Foo".".csv";
  $file  = fopen($nombreArchivo , 'w+');
  for($i=0; $i< $numA ; $i++) 
  {
    $matricula = $alumnoA[$i];
    for($j=1;$j<=$numPreguntas; $j++) 
      {
        $alumnoRA[$j]=0;
      }
    $sql = "SELECT * FROM resultados WHERE idencuesta='1' and alumno='$matricula' ORDER BY pregunta";
    $resultados_por_alumno =  $con->query($sql);
    foreach($resultados_por_alumno as $resultado_individual){
        $pregunta = $resultado_individual['pregunta'];
        $valor = $resultado_individual['respuesta'];
        $alumnoRA[$pregunta]=$valor;
    }
    fprintf($file,"%s",$matricula);
    for($pregunta=1;$pregunta<=$numPreguntas; $pregunta++) {
      fprintf($file,",%d",$alumnoRA[$pregunta]);} 
      fprintf($file,"<br>\n");
  }
  fclose($file);
  # se descarga 'obligatoriamente' sin previsualizacion
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename='.basename($nombreArchivo));
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($nombreArchivo));
  readfile($nombreArchivo);
  exit;
  # Se borra del servidor el archivo 
  $files = glob("salida/"); // se obtienen todas las descargas generadas
  foreach($files as $file)
  { 
      if(is_file($file))
      { 
        #se inserta en la tabla 'pistas' quien descargo resultados 
        $sql = "insert into pistas (fecha, usuario, mensaje) values (now(),'$usuario', 'El usuario descargo resultados' )"; //en este punto el usuario esta validado
        $rs = $con->prepare($sql);
        $rs->execute();
        unlink($file); // se borra archivo
      }
    }
    exit;*/
?>
<!-- Script para descargar los resultados
-->