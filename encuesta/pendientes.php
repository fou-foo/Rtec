<?php include 'head.php'; ?>
<?php include 'valida.php'; ?>
<? if($continua):?>
<?php
//*****************************************************
if ($continua) {
    $sql = "SELECT * FROM maestros WHERE nomina='$nominaMaestro'";
    $rs = mysql_query($sql);
    $n = mysql_numrows($rs);
    if($n > 0) {
        $letra = mysql_result($rs,0,"letra");
    } else {
        $letra = "a";
	}
	
	$today = date("Y-m-d"); 	

    $sql = "SELECT * FROM pendientes WHERE (nomina='$nominaMaestro') AND (date(fecha) >= now()) order by fecha ASC";
    // echo "$sql";
    $rs = mysql_query($sql);
    $n = mysql_numrows($rs);
    if($n > 0) {	
		$fechaA = array();
		$descripcionA = array();
		for($i=0 ; $i < $n ; $i++) {
			$fechaA[$i] = mysql_result($rs,$i,"fecha"); 
			$descripcionA[$i] = mysql_result($rs,$i,"descripcion"); 
	   }
	}
}
?>	
<H3><?php echo $DescripcionBaseDatos;?></H3><br>
<h5><?php echo "Pendientes al ".$today;?></h5><br>
<table class="agenda" border="1">
  <tr bgcolor="yellow">
    <th width="25px">Fecha</th>
    <th width="390px" align="left">Descripci&oacute;n</th>
  </tr>
  <?php for($i=0 ; $i<$n ; $i++): ?>
  <tr>
    <td valign="top" align="left"><?php echo $fechaA[$i];?></td>
    <td valign="top" align="left"><?php echo $descripcionA[$i];?></td>
	</td>
  </tr>
  <?php endfor; ?>
</table>
</BODY>
<?php endif;?>
</HTML>
