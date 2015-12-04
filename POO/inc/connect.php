<?php
//Definición de variables
$host = "localhost";
$user = "root";
$password = "";
$db_name = "m108_agenda";

//Establecimiento de conexión con el servidor
$link = mysqli_connect($host, $user, $password) or die("Error de conexión ");

//Selección de la base de datos
$ddbbconn=mysqli_select_db($link, $db_name) or die ("Error en la seleccion de la bbdd $db_name");
if($link && $ddbbconn){echo "<h4>Succesful connection with database $db_name</h4>";}