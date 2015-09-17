<?php include './inc/connect.php'; ?>
<!DOCTYPE html>

<?php
$msg = "";
echo $_GET['cod'];
if (isset($_GET['editContact'])) {
    extract($_GET);
    $sql = "SELECT * FROM contactos WHERE id=".$_GET['editContact'];
    $result = mysqli_query($link, $sql);
    $contacto = mysqli_fetch_array($result);
    if(isset($_GET['cod'])) {
        switch ($_GET['cod']) {
            case 5:
                $msg = "Contacto rellenado correctamente";
                $cls = $_GET['cod'];
                break;
            case 6:
                $msg = "Error al eliminar el contacto";
                $cls = $_GET['cod'];
                break;
            case 7:
                $msg = "Contacto editado correctamente";
                $cls = $_GET['cod'];
                break;
            case 8:
                $msg = "Error al editar el contacto";
                $cls = $_GET['cod'];
                break;
            case 9:
                $msg = "Datos modificados coinciden con uno existente";
                $cls = $_GET['cod'];
                break;
            case 10:
                $msg = "Rellene los datos obligatorios (Nombre, Teléfono)";
                $cls = $_GET['cod'];
                break;
        }
    }
}else{
    header('location:index.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <h2>Editar Contacto</h2>
        <p class="<?= $cls ?>"><?= $msg ?></p>
        <form action="inc/update.php?id=<?= $contacto['id'] ?>" method="post">
            <input type="text" name="nombre" value="<?= $contacto['nombre'] ?>" placeholder="Nombre" required><br>            
            <input type="text" name="apellidos" value="<?= $contacto['apellidos'] ?>" placeholder="Apellidos"><br>            
            <input type="text" name="tlfn" value="<?= $contacto['telefono'] ?>" placeholder="Teléfono" required><br>            
            <input type="email" name="email" value="<?= $contacto['email'] ?>" placeholder="Email"><br>            
            <input type="text" name="foto" value="<?= $contacto['foto'] ?>" placeholder="Foto"><br>     
            <input type="hidden" name="id" value="<?= $contacto['id'] ?>" ><br>  
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
            <input type="submit" value="Guardar"><br>
        </form>
        <a href="index.php">GO BACK</a>
        <hr>



        </section>
    </center>
</body>
</html>
