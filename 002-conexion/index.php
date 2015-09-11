<?php
include './connect.php'; //Conexión
$sql = "SELECT * FROM productos";
$result = mysqli_query($link, $sql);
var_dump($result);

//Si no se devuelve registro alguno quiere decir que no hay valores devueltos por la query. Hay que asegurarse que tenemos valores para tratar
$nfilas = mysqli_num_rows($result);
echo 'Productos '.$nfilas;
$tabla = array();
if ($nfilas > 0) {
   $productos = array();
    //Tratamiento de datos: el resultado de una query sql viene en forma de objeto, para obtener un array de ese objeto: mysqli_fetch_array($reslut) por cada uno de los elementos
    for ($i = 0; $i < $nfilas; $i++) {
        $productos[$i] = mysqli_fetch_array($result);
        
    } //convertir en array
    var_dump($productos);
}
//    
//}
/*
  1-Conectar con el servidor (T/F)
 * 
 * $connection = mysqli_connet("host","server","pass") or die ("Error en la conexion con el servidor");

  2-Seleccionar base de datos (T/F)
 *
 * mysqli_select_db($connection, db_name) or die ("Error en la seleccion de la bbdd");

  3-Hacemos la petición SQL
 * 
 * $resultado = mysqli_query($conexion, "instruccion sql"); 

 */
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo 'INDEX';
        ?>
    </body>
</html>
