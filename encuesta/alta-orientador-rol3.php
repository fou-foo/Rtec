<?php
$con = new PDO('mysql:host=localhost;dbname=encuestas', 'root', 'zsqhYbri2V9U');
$MM_redirectLoginSuccess = "servicios.php";
session_start();
if (isset($_SESSION['userName'])) {
  require("db-info.php");
  InicioBD();
} else {header("Location: signout.php");};
$usuario = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];
include 'info-datos-personales.php';
$sql = "SELECT COUNT(*) AS CUENTA FROM orientadores WHERE nomina='$usuario'";
$r = $con->prepare($sql);
$r->execute();
$r = $r->fetch();
$rs = $r['CUENTA']; 
$sql = "SELECT campus, nivel FROM orientadores WHERE nomina='$usuario'";
$nivelUsuarioCoordinador =1;
if ($rs > 0 ) 
{
  $r = $con->prepare($sql);
  $r->execute();
  $r = $r->fetch();
  $campusCoordinador = $r['campus'];
  $nivelUsuarioCoordinador = $r['nivel'];   
}

if ($encuesta == 0) {header("Location: servicios.php");} 
include 'head-html.php';
?>
<h4>Adicionando Orientador</h4><br>
<FORM name="elmismo" action="alta-orientador-rol3-1.php"  method="POST">
<table border=0 width="400">
<tr><td align="left">Nomina:
     <input type="text" name="nomina" value="L00" size="13" maxlength="15"></tr></tr>
     
<?php if($nivelUsuarioCoordinador<5):?>
  <tr><td align="left">Campus:
     <input type="text" name="campus" value="<?php echo $campusCoordinador;?>" size="13" maxlength="15" disabled="disabled"></tr></tr>
<?php endif; ?>

<?php if($nivelUsuarioCoordinador>=5):?>
<td align="left" >Campus:
<select name="campus">
  <?php for($i=0;$i< $campusN ; $i++): ?> 
    <option align="left" value="<?php echo $i;?>" <?php if($i==$campusCoordinador):?>selected<?php endif;?>>
      <?php echo $campusA[$i];?>
    </option>
  <?php endfor;?>
</select>

<?php endif; ?>
<tr><td align="left">Clave gen&eacute;rica:
     <input type="text" name="clave" value="dima3" size="13" maxlength="15" disabled="disabled"></tr></tr>
<TR>
    <TD ALIGN="left" VALIGN="TOP" WIDTH="200"><INPUT name="submit" type="submit" value="Ingresar orientador"></TD>
</TR>
</table>
<br>
<?php include 'tail-ok.php'; ?>
<!-- Script con el form para dar de alta a un orientador nivel 3 por un orientador de nivel mayor a 3
-->

