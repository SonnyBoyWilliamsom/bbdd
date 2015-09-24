<?php
$msg = "";
if(isset($_POST['login']) && !empty($_POST['login'])){
    if((isset($_POST['email']) && !empty($_POST['email']))&& (isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['nombre']) && !empty($_POST['nombre']))){
        include './inc/connect.php';
        extract($_POST);
        $pass_code = sha1($password);//Codificación de la pass para acceder a su valor de la base de datos
        $sql = "select * from users where nickname='$nombre' and email = '$email' ";
        $result = mysqli_query($link, $sql);
        $nfilas = mysqli_num_rows($result);
        if($nfilas > 0){
            $msg = "Usuario ya registrado, por favor introduzca otro nombre o email ";
        }else{
            $pass_code = sha1($password);
            $sql = "insert into users (nickname, email, pass, dateReg) values('$nombre','$email','$pass_code',NOW())";
            $result = mysqli_query($link, $sql);
            if($result){
                $msg = "Login realizado con éxito";
                $header = "To: $nombre <$email>"."\r\n";
                $header .= "From: $admin <no-reply@blog.com>"."\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $subject = "Alta de Usuario";
                $message = "Ha sido registrado correctamente en nuestro blog con usuario: $nombre y contraseña: $password. Por favor acceda al siguiente link de activación para activar su cuenta: <a href='activar.php?email=$email>Link de Activación</a>' ";
                if(mail($email, $subject, $message, $header)){
                     $msg = "Se te ha enviado más info al correo";
                }else{
                     $msg = "Usuario registrado correctamente pero con problemas en el envío de email";
                }
            }else{
                $msg = "Error en el registro, contacte con el <a href='#'>administrador</a>";
            }
        }
    }else{
        $msg = "Por favor introduzca todos los datos";
        $class = "errorLogin";
    }
}
?>
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="sitemedia/css/styleadmin.css" rel="stylesheet" type="text/css"/>
        <title>Admin - <?='nombre pagina'?></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <!--    FORMULARIO   -->
        
        <form action="<?=$_SERVER['PHP_SELF']?>">
            <h1>New user</h1>
            <input type="text" name="nombre" placeholder="Name" required autofocus="">
            <input type="email" name="email" placeholder="user@example.com" required autofocus="">
            <input type="pass" name="password" placeholder="********" required>
            <input type="submit" value="Create Account">
            
            <a href="index.php">Ya soy usuario</a>
        </form>
        <span class="msg">ERROR</span>
    </body>
</html>
