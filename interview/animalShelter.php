<?php
include './AnimalClass.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>OOP</title>
    </head>
    <body>
        <h1>Animal Class</h1>
        <?php 
        $perro = new Animal(16,'Marrón'); 
        $gato = new Animal(11,'Gris'); 
        $pez = new Animal(4,'Rojo y Blanco'); 
        $pajaro = new Animal(1,'Amarillo'); 
        
        ?>
        
        <p>Perro: <?= $perro->getColor(); ?> <span><?= $perro->getPeso(); ?></span></p>
      
        <p>Gato: <?= $gato->getColor(); ?> <span><?= $gato->getPeso(); ?></span></p>
        
        <p>Pez:<?= $pez->getColor(); ?> <span><?= $pez->getPeso(); ?></span></p>
        
        <p>Pájaro:<?= $pajaro->getColor(); ?> <span><?= $pajaro->getPeso(); ?></span></p>
        
        <p>El perro se come al pájaro!!!</p>
        
        <?php $perro->cazar($pajaro); ?>
        
        <span>Ahora el perro pesa: <?= $perro->getPeso(); ?></span>
        <p><?= $perro->checkAnimal($pajaro); ?></p>
    </body>
</html>
