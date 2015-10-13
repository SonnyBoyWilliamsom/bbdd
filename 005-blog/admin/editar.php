<?php $title = 'Perfil' ?>
<?php   include './inc/security.php'; 
        include './col/header.php'; 
        $id_user_log = $_SESSION['id_user_log'];
        ?>
<?php

/*Sentencias para actualizar los nuevos datos introducidos por el usuario. No se puede repetir nombre o email. Primero se modifica y después se hace la consulta para enseñar los datos que se hayan modificado. Si hiciesemos la petición de datos antes de modificar (update) los datos que se mostrarán serán los anteriores al cambio*/

if(isset($_POST['userDataForm']) && !empty($_POST['userDataForm'])){
    extract($_POST);
    include './inc/connect.php';
    $sql = "select * from users where id_user != $id_user_log AND (nickname = '$newName'  OR email = '$newEmail')";
    $result = mysqli_query($link, $sql);
    $numFilas = mysqli_num_rows($result);
    if($numFilas > 0){
         header("location:editar.php?id=$id&c=ya_existe_contacto");
    }else{
        $sql="update users set nickname='$newName', email='$newEmail' where id_user=$id_user_log";
        $result=mysqli_query($link, $sql);
        if($result){
            $c = 'EditarOk';
        }else{
            $c = 'Error_editar';
        }
        header("location:editar.php?c=$c");
    }
}
?>
<?php /*Cambio de contraseña*/
    if(isset($_POST['newPassForm']) && !empty($_POST['newPassForm'])){
    extract($_POST);//Comprobacion que la contraseña actual es correcta
    include './inc/connect.php';
    $sql = "select pass from users where id_user = '$id_user_log'";
    $result = mysqli_query($link, $sql);
    $fila = mysqli_num_rows($result);
    if(sha1($pass) == $fila['pass']){ /*Si la contraseña actual intruducida es correcta: actualizamos con la nueva*/
        $newPassQ = sha1($newPass); 
        $sql = "update users set pass = '$newPassQ'";
        $resultNewPass = mysqli_query($link, $sql);
        $c = ($resultNewPass) ? 'pass_ok' : 'problem_pass';
         header("location:editar.php?c=$c");
    }else{
        header("location:editar.php?c=pass_incorrect");
    }
}
?>

<?php /*Sentencias para poder acceder a los datos del usuario que quiere editar sus datos*/
    include './inc/connect.php';
    $sql = "select * from users where id_user = '$id_user_log'";
    $result = mysqli_query($link, $sql);
    $usuarioLogged = mysqli_fetch_array($result); 
?>
<h2>Datos de Usuario</h2>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="text" name="newName" value="<?= $usuarioLogged['nickname'] ?>" placeholder="Nombre" required><br>   
            <input type="email" name="newEmail" value="<?= $usuarioLogged['email'] ?>" placeholder="Email"><br>   
            <input type="submit" value="Update" name="userDataForm"><br>
        </form>

<h2>Cambio de contraseña</h2>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="password" name="pass"  placeholder="Current Password"required><br>   
            <input type="password" name="newPass" placeholder="New Password" required><br>   
            <input type="submit" value="UpdatePass" name="newPassForm"><br>
        </form>


        <a href="index.php">GO BACK</a>

<?php include './col/footer.php' ?>
        
      