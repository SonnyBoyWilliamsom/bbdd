
<form action="<?= $_SERVER['PHP_SELF'] ?>?a=corregir" method="post">
    <?php 
    var_dump($questions);
    echo '<br><br>';
    var_dump($answers);
    echo '<br>'.$questions[0]['pregunta'];
   
    for ($i = 0; $i < count($questions); $i++) {
        echo  '<br>id_p'.$questions[$i]['id_pregunta'].'id_u'.$questions[$i]['id_unidad'].'id_c'.$unis[0]['id_curso'];
        $id_pregunta = $questions[$i]['id_pregunta'];
        $cuestionario=false;
        ?>
        <p><span> <?= $questions[$i]['numero']; ?> </span><?= $questions[$i]['pregunta']; ?></p>
        <?php
    
        for ($a = 0; $a < count($answers); $a++) {
            if ($answers[$a]['id_pregunta'] == $id_pregunta) {
                $id_respuesta = $answers[$a]['id_pregunta'].$answers[$a]['opcion'];
                $name_respuesta="u".$questions[$i]['id_unidad']."_q".$questions[$i]['numero']."_idq".$answers[$a]['id_pregunta'];
                ?>
                    <input type="radio" name="<?=$name_respuesta?>" id="<?=$id_respuesta?>">
                    <label for="<?=$id_respuesta?>"><?=$answers[$a]['descripcion']?></label><br>
                <?php
                $cuestionario=true;
            }
        }
    }
    if($cuestionario == true){ ?>
            <input type="submit" name="test" value="Submit">
        <?php }
    
    ?>
</form>

