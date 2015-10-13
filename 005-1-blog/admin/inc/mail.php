<?php

$header = "To: $nombre <$email>" . "\r\n";
$header .= "From: Admin <no-reply@miblog.com>" . "\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
if (mail($email, $asunto, $mensaje, $header)) {
    $mng = "Se te ha enviado más info al correo";
    $cssError=1;
} else {
    $mng = "Hemos tenido problemas en el envío del email";
    $cssError=0;
}