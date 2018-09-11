<?php
	session_start();
	$continua=1;
	include "db-info.php";
?>
<HTML>
<head>
<META HTTP-EQUIV="pragma" content="text/html; charset=iso-8859-1">
	<title>DiMA/title>
   <link rel="stylesheet" href="../style.css">
   </style>
</head>
<body>
<table width="50%" border="0">
  <tr> 
    <td width="47%" height="226"> 
      <center>
	      <h2><a name="cabeza"></a>Departamento de Matemáticas</h2>
	      <H3><?=$DescripcionBaseDatos;?></H3> 
      </center>
      <center>
        <p><font size="4">ITESM</font></p>
        <p><font size="4">Campus Monterrey</font></p>
      </center>
    </td>
    <td width="53%" height="200" background="s"> 
      <center>
        <h2 align="center">
		<A HREF="http://www.mty.itesm.mx" TARGET="_blank"><IMG SRC="graficos/logo.gif" WIDTH="150" HEIGHT="120"	ALT="ITESM, Campus Monterrey">
</A>
		</h2>
      </center>
      <p align="center">&nbsp;</p>
      <p align="center"><img src="graficos/palomas.jpg" alt="Palomas, MC Escher" width="200" height="150" border="0" name="Image1"> 
      </p>
      </td>
  </tr>
  <TR><TD COLSPAN="2" ALIGN="center">
<?php
    $matricula=$_SESSION['matricula'];
	$clave=$_SESSION['clave'];
	$tiempoprevio=$_SESSION['loggedin'];
	$tiempolog=$tiempoprevio;
	$tiemponuevo=time();
	$restatiempos=$tiemponuevo-$tiempolog;
	if($restatiempos>=$tiempomaxsesion) {
		$continua=0;
	} else {
		$tiempolog=$tiempolog+$tiempomaxsesion;
		$_SESSION['loggedin']=$tiempolog;
		$continua=1;
	}

//se acaba lo de usuario inactivo
    $continua=1;
    InicioAlumno($matricula,$clave);
    // echo "InicioAlumno($matricula,$clave):$continua\n";
    if ($continua == 0) {$matricula=0;}
    if (strlen($matricula) < 2) {
		echo "<A HREF=\"login.php\"><H2>LOGIN</H2></A>";
    } else {
		echo "<A HREF=\"logout.php\"><H2>LOGOUT</H2></A>";
    }
?></TD>
</TR>
</table>

<?php if($continua==1): ?>
<B>Hola <B><FONT COLOR="blue"><?php echo $nombreAlumno;?></FONT></B>, éstos son los servicios ofrecidos:</B> 
        <UL>
         <LI><A HREF="encuesta.php" target="_BLANK">Contestar Encuesta</A></LI>
         <LI><A HREF="preguntas.php" target="_BLANK">Quien aplica la encuesta</A></LI>		 
         <LI><A HREF="disclaimer.php" target="_BLANK">Confidenciabilidad</A></LI>		 
		</ul>
<hr>
<?php endif; ?>
</BODY>
</HTML>
