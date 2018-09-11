<?php
session_start();
if (isset($_SESSION['userName'])) 
{
  require("db-info.php");
  $MM_redirectLoginSuccess = "servicios.php";
  $con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
  include 'head.php';
  InicioBD();
  $usuario = $_SESSION['userName'];
} else {header("Location: signout.php");} 
include 'datos-personales5.php';//consulta de datos personales en la base de datos
include 'head-html.php';
$sqlCampus = "SELECT descripcion FROM campus ";
$resultado  = $con->prepare($sqlCampus);
$resultado->execute();
$rsCampus = $resultado->fetch();
$sqlnCampus = "SELECT count(*) as n FROM campus ";
$resultado = $con->prepare($sqlnCampus);
$resultado->execute();
$rsCampus = $resultado->fetch();
$n = $rsCampus['n'];
if (!$n) {
  echo "Campus no registrado";
  header("Location: " . "servicios.php" );
  //break;
} 
?>


<FORM name="elmismo" action="datos-personales1.php"  method="POST" class="foo" align="center">
<table border="1" align="center" class="foo">
  <col width="240">
  <col width="200">
  <!--<col width="110">
  <col width="100">-->
<tr bgcolor="lightblue">
<th colspan="2">Llena Tus Datos Personales</th>
</tr>
<tr>
<th align="right">Procedencia:</th>
<td align="left">
<select name="procedencia">
  <?php for($i=0; $i< $procedenciaN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$procedencia):?>selected<?php endif;?> >
      <?php echo $procedenciaA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
</tr>
<tr>
<th align="right">Estado:</th>
<td align="left">
<select name="estado">
  <?php for($i=0;$i< $estadoN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$estado):?>selected<?php endif;?>>
      <?php echo $estadoA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
</tr>
<tr>
<th align="right">D&oacute;nde vives?</th>
<td align="left">
<select name="vivesen">
  <?php for($i=0;$i< $vivesenN ; $i++): ?>
    <option value="<?php echo $i;?>" <?php if($i==$vivesen):?>selected<?php endif;?>>
      <?php echo $vivesenA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
<tr>
<th align="right">Estado Civil:</th>
<td align="left">
<select name="estadocivil">
  <?php for($i=0;$i< $estadocivilN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$estadocivil):?>selected<?php endif;?> >
      <?php echo $estadocivilA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
</tr>
<tr>
<th align="right">Sexo:</th>
<td align="left">
<select name="sexo">
  <?php for($i=0;$i< $sexoN ; $i++): ?>
    <option value="<?php echo $i;?>" <?php if($i==$sexo):?>selected<?php endif;?>>
      <?php echo $sexoA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
</tr>
<tr>
<th align="right">G&eacute;nero:</th>
<td align="left">
<select name="genero">
  <?php for($i=0;$i< $generoN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$genero):?>selected<?php endif;?>>
      <?php echo $generoA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
</tr>
<tr>
<th align="right">Estudios:</th>
<td align="left">
<select name="estudios">
  <?php for($i=0;$i< $estudiosN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$estudios):?>selected<?php endif;?>>
      <?php echo $estudiosA[$i];?>
    </option>
  <?php endfor;?>
</select>
</th></tr>
<tr>
<th align="right">Preparatoria?</th>
<td align="left">
<select name="preparatoriaorigen">
  <?php for($i=0;$i< $preparatoriaorigenN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$preparatoriaorigen):?>selected<?php endif;?>>
      <?php echo $preparatoriaorigenA[$i];?>
    </option>
  <?php endfor;?>
</select>
</th>
</tr>
<tr>
<th align="right">Carrera:</th>
<td align="left" >
<select name="carrera">
  <?php for($i=0;$i< $carreraN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$carrera):?>selected<?php endif;?>>
      <?php echo $carreraA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td> </tr>
<tr>

<th align="right">Campus:</th>
<td align="left" >
<select name="campus">
  <?php for($i=0;$i< $campusN; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$campus):?>selected<?php endif;?>>
      <?php echo $campusA[$i];?>
    </option>
  <?php endfor;?>
</select>

</td>
</tr>

<tr>
<th align="right">Edad:</th>
<td align="left" >
<select name="edad">
  <?php for($i=0;$i< $edadN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$edad):?>selected<?php endif;?>>
      <?php echo $edadA[$i];?>
    </option>
  <?php endfor;?>
</select>
</tr>

</td>
</tr>
<tr>
<th align="right">Tienes beca?</th>
<td align="left">
<select name="tienesbeca">
  <?php for($i=0;$i< $tienesbecaN ; $i++): ?> 
    <option value="<?php echo $i;?>" <?php if($i==$tienesbeca):?>selected<?php endif;?>>
      <?php echo $tienesbecaA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
<tr>
<th align="right">Tipo beca?</th>
<td align="left">
<select name="tipobeca">
  <?php for($i=0;$i< $tipobecaN ; $i++): ?>
    <option value="<?php echo $i;?>" <?php if($i==$tipobeca):?>selected<?php endif;?>>
      <?php echo $tipobecaA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
</tr>
<tr>
<th align="right">Trabajas?</th>
<td align="left">
<select name="trabaja">
  <?php for($i=0; $i< $trabajaN ; $i++): ?>
    <option value="<?php echo $i;?>" <?php if($i==$trabaja):?>selected<?php endif;?>>
      <?php echo $trabajaA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
<tr>
<th align="right">En qu&eacute;?</th>
<td align="left">
<input type="text" name="enquetrabaja" value="<?php echo $enquetrabaja;?>"  size="45" maxlength="100">
</td>
</tr>

<tr>
<th align="right">Actividad Extra acad&eacute;mica?</th>
<td align="left">
<select name="tieneactividadextraacademica">
  <?php for($i=0; $i< $tieneactividadextraacademicaN ; $i++): ?>
    <option value="<?php echo $i;?>" <?php if($i==$tieneactividadextraacademica):?>selected<?php endif;?>>
    <?php echo $tieneactividadextraacademicaA[$i];?></option><?php endfor;?>
</select>
</td>
</tr>
<tr>
<th align="right">Cu&aacute;l?</th>
<td align="left">
<input type="text" name="cualextraacademica" value="<?php echo $cualextraacademica;?>" size="45" maxlength="100">
</td>
</tr>

<th align="right">Religi&oacute;n?</th>
<td align="left">
<select name="religion">
  <?php for($i=0; $i< $religionN ; $i++): ?>
    <option value="<?php echo $i;?>" <?php if($i==$religion):?>selected<?php endif;?>>
      <?php echo $religionA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td> </tr>
<tr>
<th align="right">Cu&aacute;l?</th>
<td align="left">
<input type="text" name="cualreligion" value="<?php echo $cualreligion;?>" size="45" maxlength="100">
</td>
</tr>

<tr>
<th align="right">Actividad espiritual?</th>
<td align="left">
<select name="actividadespiritual">
  <?php for($i=0;$i< $actividadespiritualN ; $i++): ?>
    <option value="<?php echo $i;?>" <?php if($i==$actividadespiritual):?>selected<?php endif;?>>
      <?php echo $actividadespiritualA[$i];?>
    </option>
  <?php endfor;?>
</select>
</td>
<tr>
<th align="right">Cu&aacute;l?</th>
<td align="left">
<input type="text" name="cualactividadespiritual" value="<?php echo $cualactividadespiritual;?>" size="45" maxlength="90">
</td>
</tr>


<TR bgcolor="lightblue">
<TD colspan="4" ALIGN="center" VALIGN="TOP" WIDTH="200"><INPUT name="submit" type="submit" value="Ingresar/Actualizar datos"></TD>
</INPUT>
</TR>
</table>



<?php include 'tail-ok.php'; ?>
<!-- 
  Script para desplegar opciones de datos personales
-->