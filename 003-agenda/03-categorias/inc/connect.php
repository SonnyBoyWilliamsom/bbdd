<?php

//Definición de las variables
$host="localhost";
$user="root";
$password="";
$database="m108_agenda";

//1-Establecemos conexión
$link = mysqli_connect($host, $user, $password) or die ("Error en la conexión con el servidor");
//2-Seleccionar bbdd
mysqli_select_db($link, $database) or die ("Error en la selección de la base de datos $database");
