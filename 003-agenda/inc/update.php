<?php include './connect.php'; //Establecemos la conexión ya que se trabajrá con la bbdd  ?>
<?php

if ((isset($_POST['nombre']) && !empty($_POST['nombre'])) && (isset($_POST['tlfn']) && !empty($_POST['tlfn']))) {
    //Si los campor de nombre y teléfono vienen con un valor podemos introducir ese nuevo contacto en la base de datos
    extract($_POST);
    $sql_nomb_tlf = "SELECT * FROM contactos WHERE nombre = '$nombre' AND telefono = '$tlfn' AND id!=$id";
    $result_nomb_tlf = mysqli_query($link, $sql_nomb_tlf);
    
    if(empty($foto)){
        $foto = 'http://findicons.com/files/icons/1072/face_avatars/300/i05.png';
    }
    $a =  $result_nomb_tlf;
    if(!$result_nomb_tlf){
        //Editamos el contacto con una sentencia SQL
        
        $sql = "UPDATE contactos SET nombre='$nombre', apellidos='$apellidos', telefono='$tlfn', email='$email', foto='$foto' where id=$id";
        $result = mysqli_query($link, $sql); //Con esta sentencia 
        if ($result) {
            $c = 7;
        } else {
            $c = 8;
        }
        header("location: ../editar.php?editContact=$id&cod=$c&prueba=$a");
    }else{
        $c = 9;
        header("location: ../editar.php?editContact=$id&cod=$c");
    }
} else {
    $c = 10;
    $id = $_POST['id'];
    header("location: ../editar.php?editContact=$id&cod=$c");
}

