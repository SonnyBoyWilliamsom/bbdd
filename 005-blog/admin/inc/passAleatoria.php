<?php

function passRandom() {
    $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789-_.%()?¿¡!@";
    $passRandom = '';
    for ($i = 0; $i < 7; $i++) {
        $passRandom .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $passRandom;
}
