<?php
$cssError="";
$mng="";
if($_POST){
    if( (isset($_POST['email']) && !empty($_POST['email'])) &&  (isset($_POST['password']) && !empty($_POST['password'])) &&  (isset($_POST['nombre']) && !empty($_POST['nombre'])) ){
        
        include './inc/connect.php';
        extract($_POST);
        
        $sql="select * from usuarios where nombre='$nombre' or email='$email' ";
        $result=mysqli_query($link, $sql);
        $nfilas=  mysqli_num_rows($result);
        if($nfilas>0){
            $mng="Ya existe usuario. Inténtalo de nuevo";
            $cssError=0;
        }else{
            //logaritmo de reducción criptográfica. La codificación "md5()" da 128bits mientras que "sha1()" da 160bits, por lo que es más dificil de corromper
            $pass_code=sha1($password);
            $sql="insert into usuarios (nombre,email,password,fecha) values ('$nombre','$email','$pass_code',NOW())";
            $result=mysqli_query($link, $sql);
            if($result){
                
                //si se registra el usuario le enviamos un email
                $asunto="Alta de usuario";
                $mensaje="Ha sido registrado correctamente en el blog M108 con el email $email y la contraseña $password. Y tu link de activación es <a href='activar.php?email=$email'>Activar</a>";
                include './inc/mail.php';
                
                
            }else{
                $mng="Error en el registro. Contacte con el <a href='mailto:..'>administrador</a>.";
                $cssError=0;
            }
        }
        
        
    }else{
        $mng="Debes rellenar todos los datos";
        $cssError=0;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="sitemedia/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <!--Formulario--------------------------->
        <div class="login">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <h1>Nuevo Usuario</h1>
                <input type="text" name="nombre" placeholder="Nombre" required autofocus>
                <input type="email" name="email" placeholder="user@email.com" required>
                <input type="password" name="password" placeholder="****" required>
                <input type="submit" value="Crear cuenta">
                
                <!--Ocultar este enlace si no queremos que nadie se registre-->
                <a href="index.php">Ya soy usuario</a> 
                
            </form>
        </div>
        
        <!--Mensaje---------------------------------->
        <?php include './col/mng.php'; ?>
       
    </body>
</html>
