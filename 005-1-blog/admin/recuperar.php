<?php
$cssError="";
$mng="";
if($_POST){
    
    if((isset($_POST['email']) && !empty($_POST['email']))){
        
        include './inc/connect.php';
        $email=$_POST["email"];
        
        $sql="select * from usuarios where email='$email' ";
        $result=mysqli_query($link, $sql);
        $nfilas=  mysqli_num_rows($result);
        
        if($nfilas>0){
            
            //no hacemos bucle porque esa petición sólo trae un dato
            $fila=  mysqli_fetch_array($result); //id,nombre,email,password -> $fila['id']
            extract($fila); //$id
            
            //Si el usuario existe le reseteamos la pass y se la enviamos
            include './inc/passAleatoria.php'; //$pass_new
            $pass_code=sha1($pass_new);
            
            $sql="update usuarios set password='$pass_code' where id=$id  ";
            $result=mysqli_query($link, $sql);
            if($result){
                
                //Enviamos email con los nuevos datos
                $asunto="Recuperar cuenta";
                $mensaje="Para poder acceder a tu cuenta debes introducir tu nueva contraseña: $pass_new";
                include './inc/mail.php';
                
            }else{
                $mng="Hemos tenido problemas en la recuperación de la pass.Contacte con el administrador";
                $cssError=0;
            }
            
            
        }else{
           $mng="No existe usuario con ese email";
           $cssError=0;
        }
        
        
    }else{
        $mng="Debes rellenar datos";
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
                <h1>Recuperar cuenta</h1>
                <input type="email" name="email" placeholder="user@email.com" autofocus required>
                <input type="submit" value="Recuperar">
                
                <!--Ocultar este enlace si no queremos que nadie se registre-->
                <a href="index.php">Ya soy usuario</a> 
                
            </form>
        </div>
        
        <!--Mensaje---------------------------------->
        <?php include './col/mng.php'; ?>
       
    </body>
</html>
