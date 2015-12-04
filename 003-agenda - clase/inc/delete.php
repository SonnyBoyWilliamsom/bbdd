<?php
include '../inc/connect.php';
if(isset($_GET)){
    extract($_GET);
    $sql = "DELETE FROM contactos where id=$deleteContact";
    $result = mysqli_query($link, $sql);
    $result = ($result == 1) ? $c = 5 : $c = 6;
}
header("location: ../index.php?cod=$c");