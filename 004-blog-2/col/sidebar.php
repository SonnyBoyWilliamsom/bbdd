<div id="sidebar" class="col-1-3">
    <div class="wrap-col">
        <div class="box">
            <div class="heading"><h4 class="title"><?=TITULO_SIDEBAR_SOCIAL?></h4></div>
            <div class="content">
                <div class="connect">
                    <a href="#"><img src="images/socials/facebook-icon.png" title="facebook"/></a><a href="#"><img src="images/socials/google-plus-icon.png" title="google plus"/></a><a href="#"><img src="images/socials/twitter-icon.png" title="twitter" /></a><a href="#"><img src="images/socials/pinterest-icon.png" title="pin"/></a><a href="#"><img src="images/socials/rss-icon.png" title="rss"/></a>
                </div>
            </div>
        </div>
        <?php 
        $sql = "select entradas.titulo,entradas.id,entradas.imagen from entradas inner join votos on entradas.id=votos.id_entrada order by votos.positivos DESC, entradas.titulo,entradas.fecha DESC limit 2";
        $result = mysqli_query($link, $sql);
        $nfilas = mysqli_num_rows($result);
        ?>
        <?php if($nfilas>0){ ?>
            <div class="box">
                <div class="heading"><h4 class="title"><?=TITULO_SIDEBAR_POST_POPULARES?></h4></div>
                <div class="content">
                    <?php for($i=0;$i<$nfilas;$i++){ ?>
                        <?php $fila=  mysqli_fetch_array($result) ?>
                        <div class="post">
                            <img src="admin/<?=$fila['imagen']?>"/>
                            <h5 class="title">
                                <a href="view.php?id=<?=$fila['id']?>">
                                    <?=$fila['titulo']?>
                                </a>
                            </h5>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        
        <div class="box">
            <div class="heading"><h4 class="title"><?=TITULO_SIDEBAR_POST_ULTIMOS?></h4></div>
            <div class="content">
                <div class="post">
                    <img src="images/img1[thumb].jpg"/>
                    <h5 class="title"><a href="#">Lorem ipsum dolor sit amet</a></h5>
                    <p>November 11 ,2012</p>
                </div>
                <div class="post">
                    <img src="images/img3[thumb].jpg"/>
                    <h5 class="title"><a href="#">Lorem ipsum dolor sit amet</a></h5>
                    <p>November 11 ,2012</p>
                </div>
                <div class="post last">
                    <img src="images/img5[thumb].jpg"/>
                    <h5 class="title"><a href="#">Lorem ipsum dolor sit amet</a></h5>
                    <p>November 11 ,2012</p>
                </div>
            </div>
        </div>
    </div>
</div>