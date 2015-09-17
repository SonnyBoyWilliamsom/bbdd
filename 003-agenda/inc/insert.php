<?php include './connect.php'; //Establecemos la conexión ya que se trabajrá con la bbdd  ?>
<?php

if ((isset($_POST['nombre']) && !empty($_POST['nombre'])) && (isset($_POST['tlfn']) && !empty($_POST['tlfn']))) {
    //Si los campor de nombre y teléfono vienen con un valor podemos introducir ese nuevo contacto en la base de datos
    extract($_POST);
    $sql_nomb_tlf = "SELECT * FROM contactos WHERE nombre = '$nombre' AND telefono = '$tlfn'";
    $result_nomb_tlf = mysqli_query($link, $sql_nomb_tlf);
    if(empty($foto)){
        $foto = 'http://findicons.com/files/icons/1072/face_avatars/300/i05.png';
    }
    if(mysqli_num_rows( $result_nomb_tlf) == 0){
        //Insertamos el contacto con una sentencia SQL
       
        $sql = "INSERT INTO contactos (nombre, apellidos, telefono, email, foto, id_categoria) VALUES ('$nombre','$apellidos','$tlfn','$email','$foto','$idCategoria')";
        $result = mysqli_query($link, $sql); //Con esta sentencia 
        if ($result) {
            $c = 1;
        } else {
            $c = 2;
        }
        header("location: ../index.php?cod=$c");
    }else{
        $c = 3;
        header("location: ../index.php?cod=$c");
    }
} else {
    $c = 4;
    header("location: ../index.php?cod=$c");
}
