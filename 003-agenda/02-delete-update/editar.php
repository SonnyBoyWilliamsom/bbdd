<?php
include './inc/connect.php';

$mng="";
if(isset($_GET["c"])){
    switch($_GET["c"]){
        case 1:
            $mng="Debes rellenar nombre y teléfono";
            break;
    }
}

$id_contacto=$_GET["id"];

$sql="select * from contactos where id=$id_contacto";
$result=mysqli_query($link, $sql);

//Al pedir un único registro en la sentencia, no me es necesario hacer bucle
$fila=mysqli_fetch_array($result); //datos del contacto en formato de array asociativo
extract($fila); //$id,$nombre,$apellidos,$telefono,$email,$foto
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    <center>
        <h2>Editar contacto</h2>
        <form action="update.php?id=<?=$id_contacto?>" method="post">
            <input type="text" name="nombre" value="<?=$nombre?>" placeholder="Nombre" required>
            <br>
            <input type="text" name="apellidos" value="<?=$apellidos?>" placeholder="Apellidos">
            <br>
            <input type="text" name="tlfn" value="<?=$telefono?>" placeholder="Teléfono" required>
            <br>
            <input type="email" name="email" value="<?=$email?>" placeholder="Email">
            <br>
            <input type="text" name="foto" value="<?=$foto?>" placeholder="Foto">
            <br>
            <input type="submit" value="Guardar">
        </form>
        <p><?=$mng?></p>
        
        <br>
        <a href="index.php">< Volver</a>
    </center>
        
        
    </body>
</html>
