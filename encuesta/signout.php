<?php
    session_start();
		$_SESSION = array();
		session_destroy();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <META HTTP-EQUIV="pragma" CONTENT="no-cache">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php">
  <title>DiMA</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  </style>
</head>

<body>
  <table width="756" border="0" align="center">
  <tr>
    <td width="74" height="216">&nbsp;</td>
    <td width="584" height="216">
      <div align="center">
        <span class="style4"><br>
       	<font face="Arial">Sesi&oacute;n Finalizada</font>
        </span>
      </div>
    </td>
    <td width="84" height="216">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" height="144" valign="bottom"><span class="arial12 style1 style2"><img src="graficos/raya2bco.gif" width="750" height="16"></span></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">   
    <p class="arial12 style1 style2">Derechos Reservados &copy; Instituto Tecnol&oacute;gico y de Estudios Superiores de Monterrey </p>
    </div></td>
  </tr>
  </table>
</body>
</html>
<!--
  Script para terminra sesion y redirigir a vistta 'index.php'
-->


