<?php
define("NOMBRE_USUARIO_BD","root"); // CAMBIAR POR PROPIETARIO DE LA BASE DE DATOS ENCUESTA
define("CLAVE_USUARIO_BD","");    // CAMBIAR POR SU PASSWORD
define("NOMBRE_SERVIDOR_BD","localhost"); //con php 5 asi jala bien, con 7 habria que intentar con las direccion default 127.0.0.1 y el puerto donde escucha 127.0.0.1:3307
define("NOMBRE_BASE_DE_DATOS","encuestas"); // NOMBRE DE LA BASE DE DATOS
define("DESCRIPCION_BASE_DATOS","Sistema_de_Entrevistas_DiMA_Monterrey");
define("NOMBRE_PROYECTO", "Sistema_de_Entrevistas");
$ServidorCorreo              = "itesm.mx";
$mensajeSalida = "No ha iniciado una sesion";
$nombreProyecto = "DiMA: Encuesta Evaluacion";

$encuestaAbierta  = 1;
$colorprimerrenglon  = "lightyellow";
$colorsegundorenglon = "lightgreen";

function InicioBD() 
{
  # Conexion a base de datos: 
  #          Checar: ip de conexion
	#                : usuario de la BD
  # si hay error regresa un mensaje en la url 
  global $con;
	global $continuaSesion;
	global $mensajeSalida;
   $continuaSesion=1;
   try {
    $con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
} catch (PDOException $e) {
  $mensajeSalida ="La_base_de_datos_de_".DESCRIPCION_BASE_DATOS."_no_esta_disponible";
      header("Location: ". $MM_redirectLoginFailed."?mensajeSalida_foo=".$mensajeSalida);

    die('Error ce consulta');
}
   return($continuaSesion);
}


function DeterminaUsuario($usuario)  
{
  # Despues de conectarse a la BD se consulta si el usuario 
  # esta registrado y el conjunto de permisos que tiene
  # primero se consulta si tiene permisos altos - con el rol de 'orientadores', sino se consulta con el rol de 'alumnos'
  $con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
  $sql = "SELECT COUNT(*) as conteo FROM orientadores WHERE nomina='$usuario'";
  $resultado = $con->prepare($sql);
  $resultado->execute();
  $row = $resultado->fetch();
  /* Comprobar el número de filas que coinciden con la sentencia SELECT */
  if ($row['conteo']>0) 
  {
    /* Ejecutar la sentencia SELECT real y trabajar con los resultados */
    $query = "SELECT * FROM orientadores WHERE nomina='$usuario'";
    $resultado = $con->prepare($query);
    $resultado->execute();
    $fila = $resultado->fetch(); 
    $salida = array( 
        1 => 2,
        2 => $fila['correo'],
        3 => $fila['nomina'], 
        4 => $fila['orientador'],
        5 => $fila['nivel'],
        6 => $fila['clave'],
        7 => $fila['campus']      );
    return($salida);
    }  else {
        $query = "SELECT COUNT(*) as conteo FROM alumnos WHERE matricula='$usuario'";
        $resultado = $con->prepare($query);
        $resultado->execute();
        $row = $resultado->fetch();
        /* Comprobar el número de filas que coinciden con la sentencia SELECT */
          if($row['conteo']>0)
        {
            $query = "SELECT * FROM alumnos WHERE matricula='$usuario'";
            $resultado = $con->prepare($query);
            $resultado->execute();
            $fila = $resultado->fetch(); 
            $salida = array( 
            1 => 2,
            2 => $fila['correotec'],
            3 => $fila['matricula'], 
            4 => $fila['nombre']." ".$fila['apellido1']." ".$fila['apellido2'],
            5 => 0,
            6 => $fila['clave'],
            7 => $fila['campus']      );
            return($salida);
         }    else {
        $correotec = $usuario."@itesm.mx";
        $salida = array(       
        1 => 0,//TENIA 1
        2 => $correotec,
        3 => $usuario, 
        4 => $usuario,
        5 => 0);
        return($salida);      
    }
}
}




function InicioAlumno($matricula,$clave) 
{
	global $NombreServidor;
	global $NombreUsuario;
	global $ClaveUsuario;
	global $NombreBaseDatos;
	global $con;
	global $db;
	global $continua;
	global $nombreAlumno;
	global $correoAlumno;
	global $tipoTarea;
	global $nominaMaestro;
	global $grupoControl;
   $continua = Inicio();
   if ( $continua && $matricula ) 
   {
     $sql = "SELECT * FROM alumnos WHERE matricula='$matricula'";
     $rs = mysql_query($sql) or die("Invalid Query:".mysql_error());
     $n = mysql_numrows($rs);
     if($n > 0) 
     {
          $claveI = mysql_result($rs,0,"clave");
          if ($clave != $claveI)
          {
             $continua=0;
             echo "<H2>Alumno registrado pero la clave no coincide</H2><BR>";
          }
          else
          {
             $nombreAlumno  = mysql_result($rs,0,"nombre")." ".mysql_result($rs,0,"apellido");
             $correoAlumno  = mysql_result($rs,0,"mail");
             $tipoTarea     = mysql_result($rs,0,"tipo");
             $nominaMaestro = mysql_result($rs,0,"nomina");
             $grupoControl  = mysql_result($rs,0,"control");
          }
     }       
     else 
     {
         $continua=0;
         echo "<H1>Alumno no registrado</H1><BR>";
     }
   }
   else
     $continua=0;
  return($continua);
}


function InicioMaestro($nomina,$clave) {
	global $NombreServidor;
	global $NombreUsuario;
	global $ClaveUsuario;
	global $NombreBaseDatos;
	global $con;
	global $db;
	global $continua;
	global $campusMaestro;
	global $nombreMaestro;

   $continua = Inicio();	
   if ($continua && $nomina ) 
   {
       $sql = "SELECT * FROM maestros WHERE nomina='$nomina'";
       $rs = mysql_query($sql);
       $n = mysql_numrows($rs);
       if($n > 0) 
       {
          $claveInterna = mysql_result($rs,0,"clave");
          if (MD5($clave) !== $claveInterna)
          {
             $continua=0;
             echo "<H2>Clave inaceptable</H2><BR>";
          }
          else
          {
             $nombreMaestro = mysql_result($rs,0,"nombre");
             $campusMaestro = mysql_result($rs,0,"campus");     
          }          
       }       
       else 
      {
         $continua=0;
         echo "<H1>Maestro inaceptable</H1><BR>";
      }
  }
  return($continua);
}
?>
