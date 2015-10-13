<?php
include './inc/seguridad.php';
include './inc/connect.php';
include './inc/indice.php';




if(isset($_GET['a'])){
    switch($_GET['a']){
        case 'e':
            if($_GET['v']=="si"){
               $visible="no"; 
            }else{
                $visible="si";
            }
            $sql="update comentarios set visible='$visible' where id=".$_GET['id'];
            mysqli_query($link, $sql);
            break;
        case 'd':
            $sql="delete from comentarios where id=".$_GET['id'];
            mysqli_query($link, $sql);
            break;
    }
}



$sql="select count(*) as total_aprobados from comentarios where visible='si' ";
$result=  mysqli_query($link, $sql);
$fila=  mysqli_fetch_array($result);
$total_aprobados=$fila['total_aprobados'];

$sql="select count(*) as total_pendientes from comentarios where visible='no' ";
$result=  mysqli_query($link, $sql);
$fila=  mysqli_fetch_array($result);
$total_pendientes=$fila['total_pendientes'];


$visible="si";
$titleVisible="aprobados";
if(isset($_GET['v'])){
    $visible=$_GET['v'];
    switch($visible){
        case "si":
            $titleVisible="aprobados";
            break;
        case "no":
            $titleVisible="pendientes";
            break;
    }
}


$sql="select entradas.titulo,comentarios.id, comentarios.comentario, comentarios.email, comentarios.id_entrada, DATE_FORMAT(comentarios.fecha,'%d-%m-%Y') AS fechaMod from comentarios inner join entradas on entradas.id=comentarios.id_entrada where comentarios.visible='$visible' order by comentarios.fecha DESC";
$result=  mysqli_query($link, $sql);
$nfilas=  mysqli_num_rows($result);
?>

<!--estructura----------->
<?php $title="Comentarios $titleVisible" ?>
<?php include './col/header.php'; ?>

<div class="orden">
    <a href="<?=$_SERVER['PHP_SELF']?>?v=si">Aprobados <?=$total_aprobados?></a> |
    <a href="<?=$_SERVER['PHP_SELF']?>?v=no">Pendientes <?=$total_pendientes?></a>  
        
</div>

<?php if($nfilas>0){ ?>
    <?php for($i=0; $i<$nfilas; $i++){ ?>
        <?php $fila=  mysqli_fetch_array($result) ?>
        <div class="datos">
            <div class="col80">
                <p><?=$fila['comentario']?> / <?=$fila['email']?> / <?=$fila['fechaMod']?></p>
                <a target="_blank" href="../view.php?id=<?=$fila['id_entrada']?>">Ver entrada: <?=$fila['titulo']?></a>
            </div>
            <div class="col20">
                <a href="<?=$_SERVER['PHP_SELF']?>?a=e&id=<?=$fila['id']?>&v=<?=$visible?>" class="btn edit"></a>
                <a href="<?=$_SERVER['PHP_SELF']?>?a=d&id=<?=$fila['id']?>&v=<?=$visible?>" class="btn delete"></a>
            </div>
        </div>
    <?php } ?>
<?php }else{ ?>
    <p><?=MNG_EMPTY_COMMENTS?></p>
<?php } ?>

<?php include './col/footer.php'; ?>