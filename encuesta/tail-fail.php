<?php
if ($usuario==0) {
	session_start();
	$_SESSION = array();
	session_destroy();
	echo "$mensaje<BR>";
        echo "<A HREF=\"index.php\">Autentificarse</A>";
}
?>
</BODY>
</HTML>
