<?php $title = 'Perfil' ?>
<?php include './col/header.php'; ?>
<?php include './inc/security.php'; 
    include './inc/connect.php';
    $id_user_log = $_SESSION['id_user_log'];
    $sql = "select * from users where id_user = '$id_user_log'";
    $result = mysqli_query($link, $sql);
    $usuarioLogged = mysqli_fetch_array($result); 
?>

        <form action="" method="post">
            <input type="text" name="nombre" value="<?= $usuarioLogged['nickname'] ?>" placeholder="Nombre" required><br>   
            <input type="email" name="email" value="<?= $usuarioLogged['email'] ?>" placeholder="Email"><br>   
            <input type="submit" value="Update"><br>
        </form>
        <a href="index.php">GO BACK</a>

<?php include './col/footer.php' ?>
        
       