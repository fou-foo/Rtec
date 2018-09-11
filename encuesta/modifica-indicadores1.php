<?php
$MM_redirectLoginSuccess = "servicios.php";
// extract($_REQUEST);
session_start();
if (isset($_SESSION['userName'])) {
	require("db-info.php");
	InicioBD();
} else {header("Location: signout.php");};
// include 'head.php';
$usuario = $_SESSION['userName'];
$encuesta = $_SESSION['encuesta'];
$indicador = $_POST['indicador'];
$campusC = $_POST['campus'];

if ($indicador == 0) {$_SESSION['mensaje']="indicador:$indicador"; header("Location: servicios.php");} 
$sql = "SELECT * FROM referenciasDebilidadesIndicador WHERE idencuesta='$encuesta' AND numero='$indicador' AND campus='$campusC'";
$rs = mysql_query($sql);
$numI = mysql_numrows($rs);
if ( $numI == 0) {$_SESSION['mensaje']="$sql"; header("Location: servicios.php");} 
$descripcion = mysql_result($rs,0,"descripcion");
$debilidaddiscurso = mysql_result($rs,0,"debilidaddiscurso");
$debilidadlinkinterno = mysql_result($rs,0,"debilidadlinkinterno");
$debilidadlinkextrerno = mysql_result($rs,0,"debilidadlinkextrerno");
$debilidadarticulosinteres = mysql_result($rs,0,"debilidadarticulosinteres");
//$mensajefortaleza = mysql_result($rs,0,"mensajefortaleza");
//$valorinferior = mysql_result($rs,0,"valorinferior");
//$valormayor = mysql_result($rs,0,"valormayor");
//$minimo = mysql_result($rs,0,"minimo");
$_SESSION['indicador'] = $indicador;
include 'head-html.php';
// echo $sql;
?>
<h4>Edici&oacute;n de los mensajes del indicador: </h4><br>
<FORM name="elmismo" action="modifica-indicadores2.php"  method="POST">
		
		<TABLE cellpadding="2" cellspacing="2" border="1" width="600">
		<TBODY>
		<TR> <td> campus </td> <td> <?php echo $campusC;?> </td> </tr>
		<input  name="campus"  value="<?php echo $campusC; ?>">
		<TR> <td> indicador </td> <td> <?php echo $indicador;?> </td> </tr>
		<input  name="indicador"  value="<?php echo $indicador; ?>">

		<TR BGCOLOR="yellow">
			<TH COLSPAN="2">Descripcion: <INPUT NAME="descripcion" VALUE="<?php echo $descripcion;?>" READONLY SIZE="60"/></th></TR>
		<TR BGCOLOR="lightblue"> 
			<TH ALIGN="right" VALIGN="top">Discurso en Debilidad</TH>
			<TD ALIGN="left" VALIGN="top"><TEXTAREA NAME="debilidaddiscurso" COLS="50" ROWS="12"><?php echo $debilidaddiscurso;?></textarea></TD></TR> 
		<TR BGCOLOR="lightgreen"> 
			<TH ALIGN="right" VALIGN="top">Links Internos</TH>
			<TD ALIGN="left" VALIGN="top"><TEXTAREA NAME="debilidadlinkinterno" COLS="50" ROWS="12"><?php echo $debilidadlinkinterno;?></textarea></TD></TR> 
		<TR BGCOLOR="lightblue"> 
			<TH ALIGN="right" VALIGN="top">Links Externos</TH>
			<TD ALIGN="left" VALIGN="top"><TEXTAREA NAME="debilidadlinkextrerno" COLS="50" ROWS="12"><?php echo $debilidadlinkextrerno;?></textarea></TD></TR> 
		<TR BGCOLOR="lightgreen"> 
			<TH ALIGN="right" VALIGN="top">Articulos de Interes</TH>
			<TD ALIGN="left" VALIGN="top"><TEXTAREA NAME="debilidadarticulosinteres" COLS="50" ROWS="12"><?php echo $debilidadarticulosinteres;?></textarea></TD></TR> 
		
		<TD ALIGN="center" VALIGN="TOP" COLSPAN="2"><INPUT name="submit" type="submit" value="Guardar y salir"></TD>
		</TR>
		</tbody> 
		</table>
		</FORM>
<br>
<?php include 'tail-ok.php'; ?>
<!-- Script para alterar los mensajes de los indicadores
	 >> vista solo para administradores nivel 6, util para cambiar acentos
-->