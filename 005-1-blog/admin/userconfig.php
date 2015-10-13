<?php 
include './inc/seguridad.php';  
include './inc/connect.php'; 

$mng="";
$cssError="";
$id_usuario=$_SESSION['id_usuario'];


//Modificación de los datos tras recibir el form
////////////////////////////////////////////////////////////
if(isset($_POST['formDatos'])){
    extract($_POST);
    
    //Antes de permitir que cambie sus datos, debemos comprobar que no existe otro usuario con estos
    $sql="select * from usuarios where (nombre='$nombre' or email='$email')  ";
    $result=mysqli_query($link, $sql);
    $nfilas=  mysqli_num_rows($result);
    if($nfilas>0){
        $mng="Este nombre o email ya estan en uso.";
        $cssError=0;
    }else{
        
        $sql="update usuarios set nombre='$nombre', email='$email' where id=$id_usuario";
        $result=mysqli_query($link, $sql);
        if($result){
            $mng="Datos modificados";
            $cssError=1;
        }else{
            $mng="Error en la modificación de los datos";
            $cssError=0;
        }
        
    }
    
}

//Modificar Pass
////////////////////////////////////////////////////////////
if(isset($_POST['formPass'])){
    extract($_POST); //$password, $passwordnew
    
    //comprobar pass actual
    $sql="select password from usuarios where id=$id_usuario";
    $result=mysqli_query($link, $sql);
    $fila=  mysqli_fetch_array($result); //pass de la bbdd está encriptada
    //extract($fila);//$password -> no hacemos extract porque estaríamos machacando el dato que viene del formulario bajo la variable $password
    
    if(sha1($password)==$fila['password']){
        
        $pass_code=sha1($passwordnew);
        $sql="update usuarios set password='$pass_code' where id=$id_usuario ";
        $result=mysqli_query($link, $sql);
        if($result){
            $mng="Contraseña modificada";
            $cssError=1;
        }else{
            $mng="Error en la modificación de la contraseña";
            $cssError=0;
        }
        
    }else{
        $mng="No coincide la contraseña actual. Inténtalo de nuevo.";
        $cssError=0;
    }
    
    
}


//Petición de los datos del usuario que se ha logueado
////////////////////////////////////////////////////////////
$sql="select * from usuarios where id=$id_usuario";
$result=mysqli_query($link, $sql);
$fila=  mysqli_fetch_array($result);

?>


<!--Estructura--------------------->
<?php $title="Configuración de cuenta"; ?>
<?php include './col/header.php'; ?>

      <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?=$fila['nombre']?>" required autofocus>
            <label>Email</label>
            <input type="email" name="email" value="<?=$fila['email']?>" required >
            
            <input type="submit" value="Guardar cambios" name="formDatos">
      </form>

      <h2>Cambiar contraseña</h2>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label>Contraseña actual</label>
            <input type="password" name="password"  required >
            <label>Contraseña nueva</label>
            <input type="password" name="passwordnew"  required >
            
            <input type="submit" value="Guardar cambios" name="formPass">
      </form>
      
      <?php include './col/mng.php'; ?>
      
<?php include './col/footer.php'; ?>      