<?php
include './inc/connect.php';

extract($_REQUEST); //$nombre,$apellidos,$tlfn,$email,$foto,$id

if( (isset($nombre)&&!empty($nombre)) && (isset($tlfn)&&!empty($tlfn))){
    
    //Si no ponen foto al contacto, le ponemos una por defecto
    if($foto==""){
        $foto="http://comuni-k.net/pagina/wp-content/uploads/2013/09/avatar.png";
    }
    
    $sql="select * from contactos where telefono='$tlfn' AND id!=$id";
    $result=mysqli_query($link, $sql);
    $nfilas=mysqli_num_rows($result);
    if($nfilas>0){
        header("location:editar.php?id=$id&c=2");
    }else{
        
        $sql="update contactos set nombre='$nombre',apellidos='$apellidos',telefono='$tlfn',email='$email',foto='$foto' where id=$id";
        $result=mysqli_query($link, $sql);
        if($result){
            $c=7;
        }else{
            $c=8;
        }
        header("location:index.php?c=$c");
        
    }
    
    
    
}else{
    header("location:editar.php?id=$id&c=1");
}



