<?php 
$msg = "";
if(isset($_POST['login']) && !empty($_POST['login'])){
    if((isset($_POST['email']) && !empty($_POST['email']))&& (isset($_POST['password']) && !empty($_POST['password']))){
        include './inc/connect.php';
        extract($_POST);
        $pass_code = sha1($password);//Codificación de la pass para acceder a su valor de la base de datos
        $sql = "select * from users where email = '$email' and pass='$pass_code'";
        $result = mysqli_query($link, $sql);
        $nfilas = mysqli_num_rows($result);
        if($nfilas > 0){
            header('location:perfil.php');
        }else{
            $msg = "Email o contraseña incorrecta";
        }
    }else{
        $msg = "Por favor introduzca todos los datos";
        $class = "errorLogin";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="sitemedia/css/styleadmin.css" rel="stylesheet" type="text/css"/>
        <title>Admin - <?= 'nombre pagina' ?></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <!--    FORMULARIO   -->
        <div class="login">
            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                <h1>LOGIN</h1>
                <input type="email" name="email" placeholder="user@example.com" required autofocus="">
                <input type="password" name="password" placeholder="********" required>
                <input type="submit" name="login" value="Entrar">

                <a href="registrar.php">Nuevo usuario</a>
                <a href="recuperar.php">Recuperar contraseña</a>
            </form>
        </div>
        <span class="msg_<?=$class?>"><?=$msg?></span>
    </body>
</html>
