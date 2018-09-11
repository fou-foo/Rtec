<?php
//$ServidorCorreo              = "10.2.18.239";
$ServidorCorreo              = "servicios.itesm.mx";
$CuentaSalida                = "algebra.mty";
$ClaveCorreoSalida           = "arbeglaxy";
$CorreoResponsable           = "algebra.mty@servicios.itesm.mx";
$NombreResponsable           = "DiMA: Expediente electrónico";

require("class.phpmailer.php");

function EnviaMensaje($correoReceptor,$nombreReceptor,$titulo,$cuerpo)
{
   global $ServidorCorreo;
   global $CuentaSalida;
   global $ClaveCorreoSalida;
   global $CorreoResponsable;
   global $NombreResponsable;

   $mail = new PHPMailer();
   $mail->IsSMTP();                                      // set mailer to use SMTP
   $mail->Host = $ServidorCorreo;                       // specify main and backup server
   $mail->SMTPAuth = true;                               // turn on SMTP authentication
   $mail->Username = $CuentaSalida;                      // SMTP username
   $mail->Password = $ClaveCorreoSalida;                 // SMTP password

   $mail->Mailer = "smtp";

   $mail->From = $CorreoResponsable;
   $mail->FromName =$NombreResponsable;
      

   $mail->AddAddress($correoReceptor, $nombreReceptor);

   $mail->WordWrap = 50;                                 // set word wrap to 50 characters
   $mail->IsHTML(true);                                  // set email format to HTML

   $mail->Subject = $titulo;
   $mail->Body    = $cuerpo;
   $mail->AltBody = "Correo alternativo no HTML";

   if(!$mail->Send())
   {
      echo "El mensaje no pudo ser enviado. <p>";
      echo "Mailer Error: " . $mail->ErrorInfo;
      return (0);
   }
   else
   {
    // echo "OK";
   }
   return 1;  
}
?>
