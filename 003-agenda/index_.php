<?php include './inc/connect.php'; ?>
<?php
$msg = "";
echo $_GET['cod'];
if ($_GET) {
    switch ($_GET['cod']) {
        case 1:
            $msg = "Contacto guardado correctamente";
            $cls = $_GET['cod'];
            break;
        case 2:
            $msg = "Error al guardar al contacto";
            $cls = $_GET['cod'];
            break;
        case 3:
            $msg = "Datos ya registrados en contactos";
            $cls = $_GET['cod'];
            break;
        case 4:
            $msg = "Introduzca todos los valores necesarios";
            $cls = $_GET['cod'];
            break;

        default:
            $msg = "Error al editar el contacto";
            $cls = $_GET['cod'];
            break;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda</title>
    </head>
    <body>
    <center>
        <h2>Nuevo Contacto</h2>
        <p class="<?= $cls ?>"><?= $msg ?></p>
        <form action="inc/insert.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre" required>            
            <input type="text" name="apellidos" placeholder="Apellidos">            
            <input type="text" name="tlfn" placeholder="Teléfono" required>            
            <input type="email" name="email" placeholder="Email">            
            <input type="text" name="foto" placeholder="Foto">     
            <input type="submit" value="Guardar">
            <select name="idCategoria">
                <option value="0">Sin categoria</option>
                <?php
                $sql = "select * from categorias";
                $result = mysqli_query($link, $sql);
                $nfilas = mysqli_num_rows($result);
                if($nfilas > 0){
                for ($i = 0; $i < $nfilas; $i++) {
                    $categorias[$i] = mysqli_fetch_array($result);?>
                <option value="<?=$categorias[$i]['id']?>"><?= $categorias[$i]['categoria'] ?></option>

                <?php }
                }else{ ?>
                    <option value="0">No hay categorias</option>
                <?php }
                ?>


            </select> 
        </form>

        <hr>
        <h1>Contactos</h1>

        <?php
        //Petición
        echo $_GET['c'];
        $sql = "select contactos.*, categorias.categoria from contactos left join categorias on contactos.id_categoria = categorias.id ORDER BY nombre ASC";
        //Con esta sentencia podemos obtener todos los contactos que tienen o no categoria, así como la categoria y su id
        //Resultado
        $result = mysqli_query($link, $sql);
        $nfilas = mysqli_num_rows($result);
        $contactos = array();
        ?>
        <section>
            <?php if ($nfilas != 0) { ?>
                <?php for ($i = 0; $i < $nfilas; $i++) {
                    $contactos[$i] = mysqli_fetch_array($result);
                    ?>
                    <div class="contacto">
                        <img src="<?= $contactos[$i]['foto']; ?>" width="50"/>
                        <div>
                            <p><?= $contactos[$i]['nombre'] ?> 
                                <span><?= $contactos[$i]['telefono'] ?> | <?= $contactos[$i]['email'] ?></span>
                                 <?php if($contactos[$i]['id_categoria'] == 0){ ?>
                                    <span>Sin categoria</span>
                                 <?php }else{ ?>
                                    <span><?= $contactos[$i]['categoria']?></span>
                                 <?php } ?> </p>
                        </div>
                        <a onclick="if (!confirm('¿Seguro que desea eliminar <?= $contactos[$i]['nombre'] ?> de sus contactos?') return false)" href="editar.php?editContact=<?= $contactos[$i]['id'] ?>">Editar</a> | 
                        <a onclick="if (!confirm('¿Seguro que desea eliminar <?= $contactos[$i]['nombre'] ?> de sus contactos?') return false)" href="inc/delete.php?deleteContact=<?= $contactos[$i]['id'] ?>">Eliminar</a>
                    </div>
                    <?php
                }
            } else {
                ?>

<?php } ?>
        </section>
    </center>
    <?php
// put your code here
    ?>
</body>
</html>