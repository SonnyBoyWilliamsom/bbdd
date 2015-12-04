<?php 
include './inc/seguridad.php'; 
include './inc/connect.php';

include './inc/indice.php';

$id_usuario=$_SESSION['id_usuario'];

//PARÁMETROS DE ORDEN
///////////////////////////////////////////////////////////////////////////
$campo="fecha";
$orden="DESC";
if(isset($_GET['o'])){
    $c=$_GET['c'];
    $o=$_GET['o'];
    switch($c){
        case "t":
            $campo="titulo";
            break;
        case 'f':
            $campo="fecha";
            break;
    }
    switch($o){
        case 'a':
            $orden="ASC";
            break;
        case 'd':
            $orden="DESC";
            break;
    }
}

//PARÁMETROS DE ELIMINACIÓN
///////////////////////////////////////////////////////////////////////////
$mng="";
$cssError="";
if(isset($_GET['a'])){
    switch($_GET['a']){
        case 'd':
            $id_entrada=$_GET['id_entrada'];
            $sql="delete from entradas where id=$id_entrada";
            $result=  mysqli_query($link, $sql);
            if($result){
                $mng=MNG_OK_DELETE;
                $cssError=1;
            }else{
                $mng=MNG_KO_DELETE;
                $cssError=0;
            }
            break;
    }
}


//PETICIÓN DE POST
///////////////////////////////////////////////////////////////////////////
$sql="select rol from usuarios where id=$id_usuario";
$result=  mysqli_query($link, $sql);
$fila=  mysqli_fetch_array($result);

$rol=$fila['rol'];

$condicion="where entradas.id_usuario=$id_usuario";
if($rol=="admin"){
    $condicion="";
}

//PARÁMETROS DE PAGINACIÓN -> en f() de las entradas que ve cada usuario (x rol)
////////////////////////////////////////////////////////////////////////
// simula al campo post_per_page de wp, si lo tuvieramos deberíamos de hacer un select para obtener el num
$num_entradas_xpag=5; 
$page=1;
if(isset($_GET['p'])){
    $page=$_GET['p'];
}
$start_limit= ($page-1)*$num_entradas_xpag;

$sql="select count(*) as total from entradas $condicion";
$result=  mysqli_query($link, $sql);
$fila=  mysqli_fetch_array($result); // $fila['total']
$total_entradas=$fila['total'];

//Num de paginas a mostrar dependiendo del número de entradas que tenga y quiera mostrar por pag
if( $total_entradas%$num_entradas_xpag == 0 ){
    $num_paginas=$total_entradas/$num_entradas_xpag;
}else{
    $num_paginas= intval($total_entradas/$num_entradas_xpag)+1;
}


$sql="select entradas.id,entradas.titulo, entradas.texto, DATE_FORMAT(entradas.fecha, '%d-%m-%Y') as fechaMod, entradas.visible, usuarios.nombre from entradas inner join usuarios on entradas.id_usuario=usuarios.id $condicion order by entradas.$campo $orden LIMIT $start_limit, $num_entradas_xpag";
$result=  mysqli_query($link, $sql);
$nfilas=  mysqli_num_rows($result);
?>

<!--Estructura web----------->
<?php $title="Entradas" ?>
<?php include './col/header.php'; ?>


<div class="orden">
    Título
    <a href="<?=$_SERVER['PHP_SELF']?>?c=t&o=a">ASC</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=t&o=d">DESC</a>
    Fecha
    <a href="<?=$_SERVER['PHP_SELF']?>?c=f&o=a">ASC</a>
    <a href="<?=$_SERVER['PHP_SELF']?>?c=f&o=d">DESC</a>
</div>

<section id="entradas">
    
    <?php if($nfilas>0){ ?>
        <?php for($i=0; $i<$nfilas; $i++){ ?>
            <?php $fila=  mysqli_fetch_array($result) ?>
            <article class="datos">
                <div class="col80">
                    <h3><?=$fila['titulo']?></h3>
                    <?php
                        //strip_tags() = eliminar las etiquetas html y php de un string
                        $resumen=substr(strip_tags($fila['texto']), 0,150);
                        //Si el texto cortado llega a 150 caracteres le quito el sobrante 
                        //para no generar cortes y dejar palabras a mitad
                        if(mb_strlen($resumen)==150){
                            $posUltEsp=strrpos($resumen, " ");
                            $resumen=substr($resumen, 0,$posUltEsp);
                        }
                        //Si el texto original tiene + de 150 caracteres
                        if(mb_strlen(strip_tags($fila['texto']),"UTF-8") > 150){
                            $resumen.="...";
                        }
                        ?>
                    <p><?= $resumen ?></p>
                    <span><?=$fila['nombre']?> / <?=$fila['fechaMod']?></span> / 
                    <?php
                    if($fila['visible']=='si'){
                        $visible="Público";
                    }else{
                        $visible="No público";
                    }
                    ?>
                    <span><?=$visible?></span>
                </div>
                <div class="col20">
                    
                    <a href="<?=ROOT_EDITAR?>?id_entrada=<?=$fila['id']?>" class="btn edit"></a>
                    <a href="<?=$_SERVER['PHP_SELF']?>?a=d&id_entrada=<?=$fila['id']?>" onclick="if(!confirm('¿Estás seguro que deseas eliminar el post?'))return false" class="btn delete"></a>
                    
                </div>
            </article>
        <?php } ?><!--Fin del bucle que pinta post-->
        
        <!--Paginación-->
        <div class="paginacion">
            <?php
            for($i=0;$i<$num_paginas;$i++){
                if($page == ($i+1)){
                    $classActive="active";
                }else{
                    $classActive="";
                }
                ?>
                <a class="<?=$classActive?>" href="<?=$_SERVER['PHP_SELF']?>?p=<?=($i+1)?>"><?=($i+1)?></a> | 
            <?php } ?>
        </div>
        <!--Mensaje-->
        <?php  include './col/mng.php';?>
    
    <?php }else{ ?>
        <p>No hay entradas</p>
    <?php } ?>
        
</section>


<?php include './col/footer.php'; ?>