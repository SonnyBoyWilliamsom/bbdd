<?php
include './inc/seguridad.php';
include './inc/connect.php';

include './inc/indice.php';

$id_entrada=$_GET['id_entrada'];
$mng="";
$cssError="";


$sql="select * from entradas where id=$id_entrada";
$result=  mysqli_query($link, $sql);
$fila=  mysqli_fetch_array($result);
extract($fila); //$id,$titulo,$imagen,$texto,$fecha,$visible


            



if($_POST){
    //Datos de texto
    extract($_REQUEST); //$id_entrada,$titulo,$texto,$visible_edit(si la marcan)
    if(isset($visible_edit)){
        $visible="no";
        $checked="checked";
    }else{
        $visible="si";
        $checked="";
    }
    //datos del fichero:
    $name=$_FILES['archivo']['name'];
    $size=$_FILES['archivo']['size'];
    $type=$_FILES['archivo']['type'];
    $error=$_FILES['archivo']['error'];
    $tmp_name=$_FILES['archivo']['tmp_name'];
    
    //Sacamos extensión del fichero
    $name_array=explode(".",$name);
    $ext = mb_strtolower(end($name_array),"UTF-8");

    //////Valores permitidos
    ###########################################################################
    //Extensiones permitidas
    $extPermitidas = array("jpg","png","gif","jpeg");
    //Tipos mime permitidos
    $typePermitidos = array("image/jpeg","image/png","image/gif","image/pjpeg");
    //Tam máx
    $sizeMax=70000; //bytes
    
    //Validaciones
    ###########################################################################
    if($name=="" && $size==""){ //si no viene foto -> sobreescribimos todo menos la img
        
        $sql="update entradas set titulo='$titulo',texto='$texto',visible='$visible' where id=$id_entrada ";
        $result=  mysqli_query($link, $sql);
        if($result){
            $mng=MNG_OK_UPDATE;
            $cssError=1;
        }else{
            $mng=MNG_KO_UPDATE;
            $cssError=0;
        }
        
    }else{ //si si viene foto -> validaciones -> preguntar si tiene carpeta -> subir img a carpeta, borrar anterior sino es la de por defecto -> update
    
        //Validaciones
        ////////////////////////////////////////////////////
        if( in_array($ext,$extPermitidas) && in_array($type,$typePermitidos) && $size<=$sizeMax && $error==0 ){
            
            $renameFile=ROOT_USER_FILE."/".time()."_".$name;
            
            if(file_exists(ROOT_USER_FILE)){ //si existe la carpeta
                
                if($imagen!=DEFAULT_IMG){
                    if(file_exists($imagen)){
                        unlink($imagen);
                    }
                }
                
                if(move_uploaded_file($tmp_name, $renameFile)){
                    $sql="update entradas set titulo='$titulo',texto='$texto',visible='$visible',imagen='$renameFile' where id=$id_entrada ";
                    $result=  mysqli_query($link, $sql);
                    if($result){
                        $imagen=$renameFile;
                        $mng=MNG_OK_UPDATE;
                        $cssError=1;
                    }else{
                        $mng=MNG_KO_UPDATE;
                        $cssError=0;
                    }
                }else{
                    $mng="Error en la subida del fichero";
                    $cssError=0;
                }
                
            }else{//no existe la carpeta -> que no tiene entradas con fotos
                
                if(mkdir(ROOT_USER_FILE,0777)){
                    
                    if(move_uploaded_file($tmp_name, $renameFile)){
                        $sql="update entradas set titulo='$titulo',texto='$texto',visible='$visible',imagen='$renameFile' where id=$id_entrada ";
                        $result=  mysqli_query($link, $sql);
                        if($result){
                            $imagen=$renameFile;
                            $mng=MNG_OK_UPDATE;
                            $cssError=1;
                        }else{
                            $mng=MNG_KO_UPDATE;
                            $cssError=0;
                        }
                    }else{
                        $mng="Error en la subida del fichero";
                        $cssError=0;
                    }
                    
                }else{
                    $mng="Error en la creación de la carpeta de user";
                    $cssError=0;
                }
                
            }
            
            
        }else{
            $mng="Fichero no cumple requisitos";
            $cssError=0;
        }
        
        
    }
    
}



$checked="";
if($visible=='no'){
    $checked="checked";
}

?>


<!--Estructra------------------------>
<?php $title="Editar entrada"; ?>
<?php include './col/header.php'; ?>

        <form action="<?=$_SERVER['PHP_SELF']?>?id_entrada=<?=$id_entrada?>" method="post" enctype="multipart/form-data">
            <label>Título</label>
            <input type="text" name="titulo" value="<?=$titulo?>"  required autofocus>
            <label>Imagen</label>
            <img src="<?=$imagen?>" width="150">
            <input type="file" name="archivo"  >
            <label>Texto</label>
            <textarea name="texto"  class="ckeditor"><?=$texto?></textarea>
            
            <input type="checkbox" name="visible_edit" <?=$checked?>> 
            <small>No público</small>
            
            <input type="submit" value="Guardar">
      </form>


      <?php include './col/mng.php'; ?>


<script src="sitemedia/js/ckeditor/ckeditor.js" type="text/javascript"></script>
            
<?php include './col/footer.php'; ?>      