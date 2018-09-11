<?php // Script 9.5 - login.php (third version after Scripts 8.8 and 8.13)
if ( isset ($_POST['submit']))  {
    if ( (!empty ($_POST['matricula'])) && (!empty ($_POST['clave'])) )  {	
	//	if ( ($_POST['nomina'] == '253005') && ($_POST['clave'] == 'yono') ) {
			session_start();
			$_SESSION['matricula'] = $_POST['matricula'];
			$_SESSION['clave'] = $_POST['clave'];
			$_SESSION['loggedin'] = time();
			header ('Location: home.php');
			exit();
     } else {
			header ('Location: login.html');
			exit();		
     }

} else { 
   header ('Location: login.html');
   exit();		
}
?>
