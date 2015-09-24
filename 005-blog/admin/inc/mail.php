<?php

function emailRec($name,$email,$pass,$subject,$message){

    $header = "To: $nombre <$email>" . "\r\n";
    $header .= "From: Admin <no-reply@blog.com>" . "\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $subject = "Alta de Usuario";
    $message = "Se ha recuperado su contraseña correctamente $nombre. Su contraseña nueva es $pass. Por favor acceda su perfil para activar su nueva contraseña: <a href='activar.php?email=$email>Link de Activación</a>' ";
    if (mail($email, $subject, $message, $header)) {
        $msg = "Se te ha enviado más info al correo";
    } else {
        $msg = "Problemas en el envío del correo";
    }
}
