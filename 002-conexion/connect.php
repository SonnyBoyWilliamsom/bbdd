<?php
//Definición de variables
$host = "localhost";
$user = "root";
$password = "";
$db_name = "m108_productos";

//Establecimiento de conexión con el servidor
$link = mysqli_connect($host, $user, $password) or die("Error de conexión");
if($link){
echo 'Succesful connection';}

//Selección de la base de datos
mysqli_select_db($link, $db_name) or die ("Error en la seleccion de la bbdd");