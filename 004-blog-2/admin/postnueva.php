<?php
include './inc/seguridad.php';
include './inc/connect.php';

$id_usuario=$_SESSION['id_usuario'];
include './inc/indice.php';


$mng="";
$cssError="";
$titulo="";
$texto="";

if($_POST){
    //datos de texto:
    extract($_POST); //$titulo,$texto, $visible (si es que lo marcan)
    if(isset($visible)){
        $visible="no";
    }else{
        $visible="si";
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
    
    if($name==""){ //NO VIENE FOTO
        
        $sql="insert into entradas (titulo,texto,fecha,imagen,id_usuario,visible) values ('$titulo','$texto',NOW(),".DEFAULT_IMG.",$id_usuario,'$visible')";
        $result=  mysqli_query($link, $sql);
        if($result){
            $mng=MNG_OK_INSERT;
            $cssError=1;
        }else{
            $mng=MNG_KO_INSERT;
            $cssError=0;
        }
        
        
    }else{ //SI VIENE FOTO
        
        if( in_array($ext,$extPermitidas) && in_array($type,$typePermitidos) && $size<=$sizeMax && $error==0 ){
            
            $root=ROOT_USER_FILE;
            $renameFile=$root."/".time()."_".$name;
            
            //existe carpeta user_____
            if(file_exists($root)){ 
                if(move_uploaded_file($tmp_name, $renameFile)){
                    $sql="insert into entradas (titulo,texto,fecha,imagen,id_usuario,visible) values ('$titulo','$texto',NOW(),'$renameFile',$id_usuario,'$visible')";
                    $result=  mysqli_query($link, $sql);
                    if($result){
                        $mng=MNG_OK_INSERT;
                        $cssError=1;
                    }else{
                        $mng=MNG_KO_INSERT;
                        $cssError=0;
                    }
                    
                }else{
                    $mng=MNG_KO_INSERT." debido a la foto";
                    $cssError=0;
                }
            //no existe carpeta user___________    
            }else{ 
                
                if(mkdir($root,0777)){
                    if(move_uploaded_file($tmp_name, $renameFile)){
                    $sql="insert into entradas (titulo,texto,fecha,imagen,id_usuario,visible) values ('$titulo','$texto',NOW(),'$renameFile',$id_usuario,'$visible')";
                        $result=  mysqli_query($link, $sql);
                        if($result){
                            $mng=MNG_OK_INSERT;
                            $cssError=1;
                        }else{
                            $mng=MNG_KO_INSERT;
                            $cssError=0;
                        }

                    }else{
                        $mng=MNG_KO_INSERT." debido a la foto";
                        $cssError=0;
                    }
                }else{
                    $mng="Error en la creación de la carpeta";
                    $cssError=0;
                }
                
            }
            
        }else{
            $mng="La imagen no cumple los requisitos";
            $cssError=0;
        }
        
    }
    
    
}


//control para el texto que aparece en los inputs, si todo es correcto sobreescribo el valor de las variables para dejarlas nuevamente vacías, ya que si hay algun error las variables toman el valor que viene del formulario por el extract($_POST)
if($cssError==1){
    $titulo="";
    $texto="";
}

?>

<!--Estructra------------------------>
<?php $title="Nueva entrada"; ?>
<?php include './col/header.php'; ?>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <label><?=TXT_LABEL_TITULO?></label>
            <input type="text" name="titulo" value="<?=$titulo?>"  required autofocus>
            <label>Imagen</label>
            <input type="file" name="archivo"  >
            <label>Texto</label>
            <textarea name="texto"  class="ckeditor"><?=$texto?></textarea>
            <input type="checkbox" name="visible"> 
            <small>No público</small>
            
            <input type="submit" value="Guardar">
      </form>


      <?php include './col/mng.php'; ?>


<script src="sitemedia/js/ckeditor/ckeditor.js" type="text/javascript"></script>
            
<?php include './col/footer.php'; ?>      