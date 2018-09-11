CAMBIAR en el inicio del archivo "db-info.php"

define("NOMBRE_BASE_DE_DATOS","encuestas"); // NOMBRE DE LA BASE DE DATOS
define("NOMBRE_USUARIO_BD","euresti");      // CAMBIAR POR PROPIETARIO DE LA BASE DE DATOS "encuestas"
define("CLAVE_USUARIO_BD","xxxxx");         // CAMBIAR POR SU PASSWORD

========================================================
1) CREAR LA BASE DE DATOS "encuestas"
2) IMPORTAR sobre la base de datos el archivo "encuestas-base-de-datos-casi-limpia.sql"
3) La tabla "orientadores" contiene los usuarios administrativos.
   Se pueden insertar mas. La clave se encripta con MD5.

========================================================
La linea 20 de "index.php"

		if  ( $pop3->validate()) { ///////////OJO ///////////////
		
Contiene la pregunta si tiene un correo del Tec vigente, si no busca si es un
alumno con ID en la tabla "alumnos" y con "clave" confirmada
Cambiar "$pop3->validate()" por 0 para que ingrese directo a la autentificación
 con la clave definida en usuarios. 		
		
   
