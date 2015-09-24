<?php 
$msg = '';
if($_POST){
    if(isset($_POST['email'])&&!empty($_POST['email'])){
        include './inc/connect.php';
        $emailRec = $_POST['email'];
        $sql = "SELECT * FROM users WHERE email='$emailRec'";
        $result = mysqli_query($link, $sql);//esta query devuelve una tabla, si devolviese T/F (en el caso de hacer un insert) no hace falta hacer un mysqli_num_rows
        $nfilas = mysqli_num_rows($result);
        if($nfilas > 0){
            
            //Extraemos todos los datos del email que nos viene por el formulario de recuperar
            $userRec = mysql_fetch_array($result);
            extract($userRec);
            //Generamos la contraseña para resetear la que viene en la base de datos            
            include './inc/passAleatoria.php';
            $nuevaPass = passRandom();
        }
    }
}
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
            <h1>RECUPERAR</h1>
            <input type="email" name="email" placeholder="user@example.com" required autofocus="">
         
            <input type="submit" value="Recuperar">
            
            <a href="index.php">Volver</a>
        </form>
        <span class="msg"><?=$msg?></span>
    </body>
</html>
