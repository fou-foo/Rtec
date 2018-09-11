<?php 
	require("db-info.php");
	$continuaSesion= 1;
	InicioBD();
	require("authinc/popauth.inc.php");	
	$loginFormAction = $_SERVER['PHP_SELF'];
//	$loginStrGroup = $_POST['tipo'];
if (isset($_POST['usuario'])) {
	$loginUserName=strtoupper(trim($_POST['usuario']));
	//echo $_POST['usuario'];
  $password = $_POST['contrasena'];
	$MM_fldUserAuthorization = "";
	$MM_redirectLoginSuccess = "servicios.php";
	$MM_redirecttoReferrer = false;
	$claseUsuario = DeterminaUsuario($loginUserName); 
  echo "tes ";
  echo $claseUsuario[3];
	$server="itesm.mx";
	$emailUser = $claseUsuario[2]; 
	if (strlen($emailUser) < 2) $emailUser=$loginUserName;
	if (($claseUsuario[1] == 1) || ($claseUsuario[1] == 2)) 
  { #checa los dos casos posibles 
		$pop3 = new POPAuth($emailUser,$password,$server); 
    #--autenticacion de correro TEC
		if  ( $pop3->validate()) 
    {
			session_start();
			$_SESSION['loginUserName'] = $loginUserName;
			$_SESSION['userName'] = $loginUserName;
			$_SESSION['nivel']   = $claseUsuario[5];
			$_SESSION['encuesta']   = 1;
			$_SESSION['ultimoAcceso']= date("Y-n-j H:i:s");
			$_SESSION['validacion']= "Por correo";
			$query = "insert into pistas (fecha, usuario, mensaje) values (now(),'{$_SESSION['loginUserName']}', 'Logeo con exito de usuario: {$_SESSION['userName']} via correo)')";
      $con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');   
      $rs = $con->prepare($query);
      $rs->execute();
      header("Location: " . $MM_redirectLoginSuccess );
		} else {
		  if (MD5($password) == $claseUsuario[6])
      {
			   	session_start();
				  $_SESSION['loginUserName'] = $loginUserName;
				  $_SESSION['userName'] = $loginUserName;
				  $_SESSION['nivel']   = $claseUsuario[5];
				  $_SESSION['nombre']  = $claseUsuario[4];
				  $_SESSION['correo']  = $emailUser;			
				  $_SESSION['encuesta']   = 1;
				  $_SESSION['validacion']= "Por tabla";
				  $_SESSION['ultimoAcceso']= date("Y-n-j H:i:s");

				  $query = "insert into pistas (fecha, usuario, mensaje) values (now(),'{$_SESSION['loginUserName']}', 'Logeo con exito de usuario: {$_SESSION['userName']} via tabla' )";
          $con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
          $rs = $con->prepare($query);
          $rs->execute();
          header("Location: " . $MM_redirectLoginSuccess );
			} else {	
               $mensajeSalida="Usuario registrado pero la clave es invalida";
               $query = "insert into pistas (fecha, usuario, mensaje) values (now(),'$loginUserName', 'Usuario registrado pero la clave es invalida')";   
               $con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
               $rs = $con->prepare($query);
               $rs->execute();
               header("Location: ". $MM_redirectLoginFailed."?mensajeSalida=".$mensajeSalida);
            }	
    
    }
	} else {
            $mensajeSalida="Usuario [$loginUserName] con correo de itesm [$emailUser] no registrado";
            header("Location: ". $MM_redirectLoginFailed."?mensajeSalida=".$mensajeSalida);
	       }
}		
?>

<!-- se termina autentificacion del usuario -->

<html>
<head>
<META HTTP-EQUIV=pragma CONTENT=no-cache>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Proyecto DiMA: Encuesta No 1</title>
<script language="JavaScript" type="text/JavaScript">
setInterval ("window.status = ''",10); 

<!--
/*function MM_findObj(n, d) 
//{ //v4.01

  var p,i,x;  
  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) 
  {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
  }
  if(!(x=d[n])&&d.all) x=d.all[n];
  for (i=0;!x&&i<d.forms.length;i++) 
    x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) 
    x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) 
    x=d.getElementById(n); 
  return x;
}*/
-->


function MM_validateForm() 
{ //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) 
    { 
      test=args[i+2]; 
      val=MM_findObj(args[i]);
    if (val) 
      { 
        nm=val.name; 
        if ((val=val.value)!="") 
        {
          if (test.indexOf('isEmail')!=-1) 
            { 
              p=val.indexOf('@');
              if (p<1 || p==(val.length-1)) 
                errors+='- '+nm+' must contain an e-mail address.\n';
            } else if (test!='R') 
            { 
              num = parseFloat(val);
              if (isNaN(val)) 
                errors+='- '+nm+' must contain a number.\n';
              if (test.indexOf('inRange') != -1) 
              { 
                p=test.indexOf(':');
                min=test.substring(8,p);
                max=test.substring(p+1);
                if (num<min || max<num) 
                  errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
              }
            } 
        } else if (test.charAt(0) == 'R') errors += '- '+nm+' es un campo obligatorio.\n'; 
      }
    } if (errors) alert('Los siguientes errores han ocurrido:\n\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_preloadImages() 
{ //v3.0
  var d=document; 
  if(d.images)
    { 
      if(!d.MM_p) d.MM_p=new Array();
      var i,j=d.MM_p.length,a=MM_preloadImages.arguments;
      for(i=0; i<a.length; i++)
        if (a[i].indexOf("#")!=0)
          { 
            d.MM_p[j]=new Image; 
            d.MM_p[j++].src=a[i];
          }
    }
}


function clear() 
{
  //funcion para limpiar los campos de la form
  document.form1.usuario.value="";
  document.form1.contrasena.value="";
  document.form1.usuario.focus();
}

</script>
<link href="style.css" rel="stylesheet" type="text/css">
</style>
</head>


<!-- inicia contenido de la vista 'index.php'-->
<body onload="clear();">
  
<h1 style="text-align:center">Inventario de Fortalezas y Vulnerabilidades</h1>
<?php 
  $pagina =""; ?>
  <form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="form1" onSubmit="MM_validateForm('usuario','','R','contrasena','','R');return document.MM_returnValue"   >
    <table width="756" border="0" align="center">
    <tr>
      <td width="74" height="216">&nbsp;</td>
      <td width="584" height="216">
          <div align="center">
            <table width="300" border="0" align="center" cellpadding="0" cellspacing="0" id="table1">
              <tr>
                <td >
                <table width="300" border="0" align="center" cellpadding="1" cellspacing="1" id="table2">
                <tr>
                  <td height="22" colspan="2" >
                    <div align="center" class="style2">
                    <a href="https://tec.mx/es" target="_BLANK"><img src="graficos/tec.png" width="300" ></a>
                    </div>
                    <br>
                  </td>
                </tr>
                <tr>
                  <td >
                  <div align="right" class="style9">Usuario:
                  <br>
                  </div>
                  </td>
                  <td >
                  <div align="center">
                    <input name="usuario" type="text" id="usuario" maxlength="15" style="text-transform: uppercase;">
                    <br>
                  </div>
                  </td> 
                </tr>
                <tr>
                <td>
                <div align="right" class="style9">Contrase&ntilde;a:</div>
                </td>
                <td>
                <div align="center">
                  <input name="contrasena" type="password" id="contrasena">
                  <br>
                </div>
                </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td>
                    <td>
                    <div align="center">
                    <input type="submit" name="Submit" value=" Entrar ">
                    </div>
                    </td>
                </tr>
              </table>
              </td>
            </tr>
            </table>
            <br>
          <span class="style4"><br>Instrucciones de acceso:</span>
          <!--<ul><li class="style7">-->
          Matr&iacute;cula o N&oacute;mina y contrase&ntilde;a de correo del ITESM.<br> Ejemplo: 
          A00123456 &oacute; L00123456. 
          <!--</li></ul>-->
          </div>
        </td>
        <td width="84" height="216">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" height="42" valign="bottom"><span class="arial12 style1 style2"><img src="graficos/raya2bco.gif" width="750" height="16"></span></td>
      </tr>
      <tr>
        <td colspan="3"><div align="center">   
        <p class="arial12 style1 style2">Derechos Reservados &copy; Instituto Tecnol&oacute;gico y de Estudios Superiores de Monterrey </p>
        <a href="http://dma.mty.itesm.mx/" target="_BLANK">Mejoramiento Acad&eacute;mico</a>, 
        <a href="http://www.itesm.mx/wps/wcm/connect/SIM/Monterrey+ES/Nosotros/Campus+Monterrey/" target="_BLANK">Campus Monterrey</a><br>
        Si deseas informaci&oacute;n del instrumento enviar correo a: <a href="mailto:karlaurriola@itesm.mx">karlaurriola@itesm.mx</a>  <!--<font color="red"> solo a Karla ? </font>-->  </div> 
        </td>
      </tr>
    </table>
</body>
</html>
