<?php
include './inc/connect.php';

$mng="";
if(isset($_GET["c"])){
    switch($_GET["c"]){
        case 1:
            $mng="Debes rellenar nombre y teléfono";
            break;
        case 2:
            $mng="Ya existe un contacto con ese teléfono";
            break;
    }
}

$id_contacto=$_GET["id"];

$sql="select * from contactos where id=$id_contacto";
$result=mysqli_query($link, $sql);

//Al pedir un único registro en la sentencia, no me es necesario hacer bucle
$fila=mysqli_fetch_array($result); //datos del contacto en formato de array asociativo
extract($fila); //$id,$nombre,$apellidos,$telefono,$email,$foto,$id_categoria
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
            <select name="id_categoria">
              <?php 
              $sql="select * from categorias order by categoria";
              $result=mysqli_query($link, $sql);
              $nfilas=  mysqli_num_rows($result);
              if($nfilas>0){ ?>
                
                  <!--Pintamos las categorías de la bbdd-->  
                  <?php for($i=0;$i<$nfilas;$i++){ ?>
                     <?php $fila=  mysqli_fetch_array($result) ?>
                            
                            <!--Añado el attr selected, a aquel optión que vaya a mostrar la categoría que originalmente tiene el contacto asiganada-->
                            <?php if($fila['id'] == $id_categoria){ ?>
                                <option value="<?=$fila['id']?>" selected>
                                      <?=$fila['categoria']?>
                                </option>
                            <?php }else{ ?>
                                <option value="<?=$fila['id']?>" >
                                       <?=$fila['categoria']?>
                                </option>
                            <?php } ?> 
                  <?php } ?>  
                      
                  <!--Pintamos el sin categoría que no está en la bbdd-->              
                  <?php $selected="";
                    if($id_categoria==0){
                        $selected="selected";
                  } ?>
                  <option value="0" <?=$selected?> >Sin categoría</option>  
                     
              <?php }else{ ?>
                  <option value="0">No hay categorías</option>
              <?php } ?>  
            </select>
            <br>
            <input type="submit" value="Guardar">
        </form>
        <p><?=$mng?></p>
        
        <br>
        <a href="index.php">< Volver</a>
    </center>
        
        
    </body>
</html>
