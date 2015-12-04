<?php $title = 'Perfil' ?>
<?php include './col/header.php' ?>
<?php include './inc/security.php' ?>
<?php
    include './inc/connect.php';
    $id_user_log = $_SESSION['id_user_log'];
    $sql = "select * from users where id_user = '$id_user_log'";
    $result = mysqli_query($link, $sql);
    $usuarioLogged = mysqli_fetch_array($result); 
   
?>
<!--Contenido de la página-->
<div class="datos">
    <div class="col80 infoUser">
        <p><?=$usuarioLogged['nickname']?> | <?=$usuarioLogged['email']?></p>
    </div>
    <div class="col20 editar">
        <a href="editar.php">editar</a>
    </div>
</div>
<!-------------------------------->

<?php include './col/footer.php' ?>
        
       