<?php
//Conectamos
include './inc/connect.php';

//Controlar que los campos que he establecido cómo obligatorios en el html, traigan  datos
extract($_POST); //$nombre, $apellidos,$tlfn,$email,$foto
if( (isset($nombre)&&!empty($nombre)) && (isset($tlfn)&&!empty($tlfn)) ){
    
    //Si no ponen foto al contacto, le ponemos una por defecto
    if($foto==""){
        $foto="http://comuni-k.net/pagina/wp-content/uploads/2013/09/avatar.png";
    }
    
    //Antes de insertar, vamos a comprobar si ya existe un contacto con el mismo tlfn, para evitar así duplicidad de registros
    $sql="select * from contactos where telefono='$tlfn'";
    $result=mysqli_query($link, $sql);
    //vamos a contar el número de registros de la tabla devuelta, ya que si son >0 quiere decir que efectivamente ya existe un contacto con ese teléfono
    $nfilas=mysqli_num_rows($result);
    if($nfilas>0){
        $c=4;
    }else{
        //Insertar contacto
        $sql="INSERT INTO contactos (nombre,apellidos,telefono,email,foto) VALUES ('$nombre','$apellidos','$tlfn','$email','$foto')";
        $result = mysqli_query($link, $sql);
        if($result){
            $c=1;
        }else{
            $c=2;
        }
    }
}else{
    $c=3;
}

header("location:index.php?c=$c");





