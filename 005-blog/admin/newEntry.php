<?php $title = 'Nueva entrada' ?>
<?php include './col/header.php' ?>
<?php include './inc/security.php' ?>
<?php
$mng = "";
if ($_GET) {
    switch ($_GET["c"]) {
        case 0:
            $mng = "Error en el archivo";
            break;
        case 1:
            $mng = "excede tamaño permitido";
            break;
        case 2:
            $mng = "Extensión no permitida";
            break;
        case 3:
            $mng = "Fichero FOTO subido correctamente";
            break;
        case 4:
            $mng = "Foto subido correctamente";
            break;
        case 5:
            $mng = "Fallo en la subida";
            break;
    }
}
?>


<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type = "text" name="title" placeholder="Título"><br>
    <label><b>Selecciona foto:</b></label>
    <br>
    <input type="file" name="foto">
    <br>
    <small>Máximo 1MB</small>
    <br>
    <textarea name="content" style="width:100%; height:300px;"></textarea>
    <input type="submit" value="Guardar">
</form>

<p><?= $mng ?></p>

<?php include './col/footer.php' ?>