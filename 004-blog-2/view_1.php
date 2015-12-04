<?php
include './admin/inc/connect.php';
include 'inc/indice.php';

$id_entrada = $_GET['id'];
$mng="";

//VOTOS
$sql = "select * from votos where id_entrada=$id_entrada";
$result = mysqli_query($link, $sql);
$nfilas = mysqli_num_rows($result);
if ($nfilas > 0) {
    $fila=  mysqli_fetch_array($result);
    extract($fila);//$positivos,$negativos
    
} else {
    $positivos = 0;
    $negativos = 0;
}

//Si votan
/////////////////////////////////////
if(isset($_GET['v'])){
    
    if ($_GET['v'] == "pos") {
        $campoVoto = "positivos";
        $valorCampo=++$positivos;
    } else {
        $campoVoto = "negativos";
        $valorCampo=++$negativos;
    }
    
    if($nfilas>0){ //ya tenía votos
        $sql="update votos set $campoVoto=$valorCampo where id_entrada=$id_entrada";
        mysqli_query($link, $sql);
    }else{ //no tiene votos
        $sql="insert into votos ($campoVoto,id_entrada) values (1,$id_entrada)";
        mysqli_query($link, $sql);
    }
}

//COMENTARIOS
if(isset($_POST['formcomentarios'])){
    extract($_POST); //$email,$comentario
    $sql="insert into comentarios (email,comentario,id_entrada,fecha) values ('$email','$comentario',$id_entrada,NOW())";
    $result=  mysqli_query($link, $sql);
    if($result){
        $mng=COMENTS_INSERT_OK;
    }else{
        $mng=COMENTS_INSERT_KO;
    }
}



$sql = "select entradas.id, entradas.titulo, entradas.texto, entradas.imagen, DATE_FORMAT(entradas.fecha, '%d-%m-%Y') as fechaMod, usuarios.nombre from entradas inner join usuarios on entradas.id_usuario=usuarios.id where entradas.id=$id_entrada";
$result = mysqli_query($link, $sql);
$fila = mysqli_fetch_array($result);
extract($fila); //$titulo,$id,$texto,$fechaMod,$nombre,$imagen 

if(mysqli_num_rows($result) == 0){
    header("location:index.php");
}

?>


<!--Estructura------------------------------------------------------->
<?php include './col/header.php'; ?>

<div id="main-content" class="col-2-3">
    <div class="row">
        <div class="col-full">
            <div class="wrap-col">
                <article>
                    <div class="heading">
                        <h1 class="title">
                            <?= $titulo ?>
                        </h1>
                    </div>
                    <img src="admin/<?= $imagen ?>"/>
                    <div class="content">
                        <?= $texto ?>
                    </div>
                    <div class="extra">
                        <div class="info">
                            Por <?= $nombre ?> en <?= $fechaMod ?> - 
                            <?php
                            $sql_com = "select count(*) as total_comentarios from comentarios where id_entrada=$id and visible='si' ";
                            $result_com = mysqli_query($link, $sql_com);
                            $fila_com = mysqli_fetch_array($result_com);
                            ?>
                            <?= $fila_com['total_comentarios'] ?> Commnets -
                            <span style="text-align: right">
                                <a href="<?=$_SERVER['PHP_SELF']?>?id=<?=$id_entrada?>&v=pos"><?=$positivos?> Me gusta</a>
                                <a href="<?=$_SERVER['PHP_SELF']?>?id=<?=$id_entrada?>&v=neg"><?=$negativos?> No me gusta</a>
                                
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div id="comment">
                        <h3>Leave a Comment</h3>

                        <form action="<?= $_SERVER["PHP_SELF"] ?>?id=<?= $id_entrada ?>" id="contact-form" method="post">
                            <fieldset>
                                <input type="email" name="email" placeholder="Email" required>
                                <textarea name="comentario" placeholder="Mensaje"></textarea>
                                <input type="submit" name="formcomentarios" value="Comentar">
                            </fieldset>           
                        </form>
                        <p><?=$mng?></p>
                        
                        <!--comentarios--->
                        <?php 
                        $sql="select comentario,email,DATEDIFF(fecha,NOW()) as dias, DATE_FORMAT(fecha,'%h:%i min') as horas from comentarios where id_entrada=$id_entrada and visible='si' order by fecha DESC";
                        $result=  mysqli_query($link, $sql);
                        $nfilas=  mysqli_num_rows($result);
                        if($nfilas>0){
                            for($i=0;$i<$nfilas;$i++){
                                $fila=  mysqli_fetch_array($result);
                                extract($fila);?>
                                <div class="comentario">
                                    <p>
                                    <?=$comentario?>
                                    <?php
                                    $posAt=strpos($email,"@");
                                    $nombreAutor=  substr($email, 0, $posAt);
                                    if($dias==0){
                                        $fecha="Hoy - $horas";
                                    }else{
                                        $fecha="Hace $dias días";
                                    }
                                    ?>
                                    <br><?= $nombreAutor?> | <?=$fecha?> </p>
                                    <hr>
                                </div>
                            <?php }
                        }                        
                        ?>
                        
                        
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>

<?php include './col/sidebar.php'; ?>
<?php include './col/footer.php'; ?>