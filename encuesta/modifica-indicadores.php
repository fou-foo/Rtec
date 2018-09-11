<?php
$MM_redirectLoginSuccess = "servicios.php";
// include 'head.php';
session_start();
if (isset($_SESSION['userName'])) {
  require("db-info.php");
  InicioBD();
} else {header("Location: signout.php");};
$usuario = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];

if ($encuesta == 0) {header("Location: servicios.php");} 
$sql = "SELECT * FROM indicadores WHERE idencuesta='$encuesta' ORDER BY numero";
$rs = mysql_query($sql);
$numI = mysql_numrows($rs);


$sql2 = "SELECT * FROM campus   order by campus";
$rs2 = mysql_query($sql2);
$numC = mysql_numrows($rs2);






if ( $numI == 0) {header("Location: servicios.php");} 
$indicadorA = array();
$indicadorDA = array();
$indicadorDA[0] = "-------------";
$indicadorA[0] = 0;
$campusA = array();
$campusDA = array();
$campusDA[0] = "-------------";
$campusA[0] = 0;
for($i = 0 ; $i < $numI ; $i++) {
   $indicadorDA[$i+1] = mysql_result($rs,$i,"descripcion");
   $indicadorA[$i+1] = mysql_result($rs,$i,"numero");
}
for($i = 0 ; $i < $numC ; $i++) {
   $campusDA[$i+1] = mysql_result($rs2,$i,"descripcion");
   $campusA[$i+1] = mysql_result($rs2,$i,"campus");
}
include 'head-html.php';
?>
<h4>Edici&oacute;n de los mensajes de los indicadores</h4><br>
<FORM name="elmismo" action="modifica-indicadores1.php"  method="POST">
<table border=0 width="400">
<tr><th align="left">Escoje un indicador:</th></tr>
<tr>
  <td align="left"><SELECT NAME="indicador">
      <?php for($i=0 ; $i <= $numI ; $i++): ?>
       <OPTION VALUE="<?php echo $indicadorA[$i];?>"><?php echo $indicadorA[$i];?>:<?php echo $indicadorDA[$i];?></OPTION>
    <?php endfor; ?>
    </SELECT>
  </TD>
</tr>
<tr><th align="left">Escoje un campus:</th></tr>
<tr>
  <td align="left"><SELECT NAME="campus">
      <?php for($i=0 ; $i <= $numC ; $i++): ?>
       <OPTION VALUE="<?php echo $campusA[$i];?>"><?php echo $campusA[$i];?>:<?php echo $campusDA[$i];?></OPTION>
    <?php endfor; ?>
    </SELECT>
  </TD>
</tr>
<TR>
    <TD ALIGN="left" VALIGN="TOP" WIDTH="200"><INPUT name="submit" type="submit" value="Pasar a editar"></TD>
</TR>
</table>
<?php include 'tail-ok.php'; ?>
<!-- Script con la form para alterar mensaje de indicadores
   >> Vista solo para administradores, util para cambiar acentos 
-->