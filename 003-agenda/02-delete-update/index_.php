<?php 
//1-2-Conectamos
include './inc/connect.php';

//Validación de mensaje devuelto por insert
$mng="";
if(isset($_GET["c"])){
    switch($_GET["c"]){
        case 1:
            $mng="Contacto creado correctamente";
            break;
        case 2:
            $mng="Error al guardar";
            break;
        case 3:
            $mng="Debes rellenar nombre y teléfono";
            break;
        case 4:
            $mng="Ya existe un contacto con ese número";
            break;
        case 5:
            $mng="Contacto eliminado";
            break;
        case 6:
            $mng="Error al eliminar";
            break;
        case 7:
            $mng="Contacto modificado";
            break;
        case 8:
            $mng="Error al modificar contacto";
            break;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    <center>
        
        <h2>Nuevo contacto</h2>
        <form action="insert.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellidos" placeholder="Apellidos">
            <input type="text" name="tlfn" placeholder="Teléfono" required>
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="foto" placeholder="Foto">
            
            <input type="submit" value="Guardar">
        </form>
        <span><?=$mng?></span>
        
        <hr>
        
        <h1>Contactos</h1>
        <?php
        //3-Petición Contactos
        $sql="select * from contactos order by nombre asc";
        $result = mysqli_query($link, $sql);
        //4-Obtener y procesar resultados
        $nfilas = mysqli_num_rows($result);
        ?>        
        <section>
            
            <?php if($nfilas>0){ ?>
            
                <?php for($i=0;$i<$nfilas;$i++){ ?>
                    <!--Nos ayudamos del bucle para convertui cada registro de la tabla almacenada en $result en un array asociativo-->
                    <?php $fila=mysqli_fetch_array($result) ?>
                    <article>
                        <img src="<?=$fila["foto"]?>" width="50">
                        <p>
                            <?=$fila["nombre"]?> <?=$fila["apellidos"]?>  
                            <br>
                            <?=$fila["telefono"]?> | <?=$fila["email"]?>
                            <br>
                            <a href="editar.php?id=<?=$fila['id']?>">Editar</a> | 
                            <a onclick="if(!confirm('¿?'))return false" href="delete.php?id=<?=$fila['id']?>">Eliminar</a>
                        </p>      
                    </article>
                <?php } ?>
            
            <?php }else{ ?>
                <p>No hay contactos</p>
            <?php } ?>
            
        </section>        
        
        
    </center>
        
        
    </body>
</html>
