<?php
include './inc/seguridad.php';

$id_usuario=$_SESSION['id_usuario'];

include './inc/connect.php';
$sql="select * from usuarios where id=$id_usuario";
$result=  mysqli_query($link, $sql);
$fila=  mysqli_fetch_array($result);
extract($fila);
?>


<!--Estructura--->
<?php $title="Mi perfil" ?>
<?php include './col/header.php'; ?>

<div class="datos">
    <div class="col80">
        <p><?=$nombre?> | <?=$email?></p>
    </div>
    <div class="col20">
        <a href="userconfig.php" class="btn edit"></a>
    </div>
</div>

<?php include './col/footer.php'; ?>