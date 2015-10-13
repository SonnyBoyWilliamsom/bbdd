<?php

$caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789?=¿*/";
$num_caracteres=  strlen($caracteres);

$pass_new="";
for($i=0; $i<8 ; $i++){
    $pos_aleatoria = mt_rand(0, $num_caracteres-1);
    $pass_new .= $caracteres[$pos_aleatoria];
}
