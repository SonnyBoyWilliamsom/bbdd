<?php

//Conectamos
include './inc/connect.php';

//Controlar que los campos que he establecido cómo obligatorios en el html, traigan  datos
extract($_POST);
if (isset($categoria) && !empty($categoria)) {
    $sql = "SELECT * FROM categorias WHERE categoria = '$categoria'";
    $result = mysqli_query($link, $sql);
    $nfilas = mysqli_num_rows($result);
    if($nfilas > 0){
        $c = 11;//Categoria ya existente
    }else{
        $sql = "INSERT INTO categorias (categoria) VALUES ('$categoria')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            $c = 9; //'categoriaOK';
        } else {
            $c = 10; //'categoriaBAD';
        }
    }
} else {
    $c = 12; //'categoriaNoIntroducida';
}

header("location:index.php?c=$c");
