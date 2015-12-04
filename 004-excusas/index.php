<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    <center>
        
        <h2>Nueva Excusa</h2>
        <form action="new.php" method="post">
            <input type="text" name="name" placeholder="Titulo de la excusa" required>
            <input type="text" name="description" placeholder="Descripción">
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
