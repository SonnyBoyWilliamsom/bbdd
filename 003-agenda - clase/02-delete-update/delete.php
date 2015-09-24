<?php
include './inc/connect.php';

$id_contacto=$_GET["id"];
$sql="delete from contactos where id=$id_contacto";
$result=mysqli_query($link, $sql);

if($result){
    $c=5;
}else{
    $c=6;
}
header("location:index.php?c=$c");

