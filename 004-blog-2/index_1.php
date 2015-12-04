<?php 
include './admin/inc/connect.php';
include 'inc/indice.php';

$sql="select entradas.id, entradas.titulo, entradas.texto, entradas.imagen, DATE_FORMAT(entradas.fecha, '%d-%m-%Y') as fechaMod, usuarios.nombre from entradas inner join usuarios on entradas.id_usuario=usuarios.id where entradas.visible='si' order by entradas.fecha DESC";
$result=  mysqli_query($link, $sql);
$nfilas=  mysqli_num_rows($result);
?>

<!--Estructura--------------------------------------------------------->
<?php include './col/header.php'; ?>
<div id="main-content" class="col-2-3">
    
    <?php if($nfilas>0){ ?>
        <?php for($i=0;$i<$nfilas;$i++){ ?>
            <?php $fila=  mysqli_fetch_array($result) ?>
            <?php extract($fila) //$titulo,$id,$texto,$fechaMod,$nombre,$imagen ?>
    
            <?php
            //NUM COMENTARIOS -> cambiamos el nombre de las variables para que dentro del bucle no se machaque el sql
            $sql_com="select count(*) as total_comentarios from comentarios where id_entrada=$id  and visible='si' ";
            $result_com=  mysqli_query($link, $sql_com);
            $fila_com=  mysqli_fetch_array($result_com);
            //TEXTO
            $resumen = substr(strip_tags($texto), 0, 350);
            if (mb_strlen($resumen) == 350) {
                $posUltEsp = strrpos($resumen, " ");
                $resumen = substr($resumen, 0, $posUltEsp);
            }
            if (mb_strlen(strip_tags($texto), "UTF-8") > 350) {
                $resumen.="...";
            }
            ?>
    
            <?php if($i==0){ ?>
                <div class="row">
                    <div class="col-full">
                        <div class="wrap-col">
                            <article>
                                <div class="heading">
                                    <h2 class="title">
                                        <a href="view.php?id=<?=$id?>"><?=$titulo?></a>
                                    </h2>
                                </div>
                                <img src="admin/<?=$imagen?>"/>
                                <div class="content">
                                    <p><?=$resumen?></p>
                                </div>
                                <div class="extra">
                                    <div class="info">Por <?=$nombre?> el <?=$fechaMod?> - 
                                        <a href="view.php?id=<?=$id?>">
                                            <?=$fila_com['total_comentarios']?> Commnets
                                        </a>
                                    </div>
                                    <div class="more">
                                        <a class="button" href="view.php?id=<?=$id?>">Read more >></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                    
                    <div class="col-1-2">
                        <div class="wrap-col">
                            <article>
                                <div class="heading"><h2 class="title2">
                                        <a href="view.php?id=<?=$id?>"><?=$titulo?></a>
                                    </h2>
                                </div>
                                <img src="admin/<?=$imagen?>"/>
                                <div class="extra">
                                    <div class="info">
                                        <a href="view.php?id=<?=$id?>">
                                            <?=$fila_com['total_comentarios']?> Commnets
                                        </a>
                                    </div>
                                    <div class="more">
                                        <a class="button" href="view.php?id=<?=$id?>">Read more >></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </article>
                        </div>
                    </div>
    
            <?php } ?>
        <?php } ?>
    <?php }else{ ?>
        <div class="row">
            <div class="col-full">
                <p><?=TXT_VACIO?></p>
            </div>
        </div>
    <?php } ?>
        
</div>

<?php include './col/sidebar.php'; ?>

<?php include './col/footer.php'; ?>