<?php
for ($i = 0; $i < count($cursos); $i++) {
    $units = 0;
    ?>
    <h2>Curso <?= $cursos[$i]['nombre'] ?></h2>
    <ul>
        <?php
        for ($a = 0; $a < count($unidades); $a++) {
            if ($unidades[$a]['id_curso'] == $cursos[$i]['id_curso']) {
                $units++;
                ?>
        <li><a href="./controllers/ctest.php?c=<?= $cursos[$i]['nombre'] . $unidades[$a]['nombre'] ?>&idc=<?= $cursos[$i]['id_curso'] ?>&idu=<?= $unidades[$a]['id_unidad'] ?>"><?= $unidades[$a]['nombre'] ?></a></li>

                <?php
            }
        }
        if ($units == 0) {
            ?>
            <p>No units yet</p>
            <a href="">Add units to this Course </a>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>
