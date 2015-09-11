<?php include './inc/connect.php'; ?>
<?php 
    $msg="";
    if($_GET){
        switch($_GET['c']){
            case 1:
                $msg = "Contacto guardado correctamente";
                $cls = $_GET['c'];
                break;
            case 2:
                $msg = "Error al guardar al contacto";
                $cls = $_GET['c'];
                break;
            default: 
            case 3:
                $msg = "Datos ya registrados en contactos";
                $cls = $_GET['c'];
                break;
            default: 
                $msg = "Introduzca todos los valores necesarios";
                $cls = $_GET['c'];
                break;
        }
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda</title>
    </head>
    <body>
    <center>
        <h2>Nuevo Contacto</h2>
        <p class="<?=$cls?>"><?=$msg?></p>
        <form action="inc/insert.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre" required>            
            <input type="text" name="apellidos" placeholder="Apellidos">            
            <input type="text" name="tlfn" placeholder="Teléfono" required>            
            <input type="email" name="email" placeholder="Email">            
            <input type="text" name="foto" placeholder="Foto">     
            <input type="submit" value="Guardar">
        </form>
     
        <hr>
        <h1>Contactos</h1>

        <?php
        //Petición
        $sql = "SELECT * FROM contactos ORDER BY nombre ASC";

        //Resultado
        $result = mysqli_query($link, $sql);
        $nfilas = mysqli_num_rows($result);
        $contactos = array();
        ?>
        <section>
            <?php if ($nfilas != 0) { ?>
                <?php for ($i = 0;$i < $nfilas; $i++) {
                $contactos[$i] = mysqli_fetch_array($result); ?>
            <div class="contacto">
                <img src="<?=$contactos[$i]['foto'];?>" width="50"/>
                <div>
                    <p><?=$contactos[$i]['nombre']?> <span><?=$contactos[$i]['telefono']?> | <?=$contactos[$i]['email']?></span></p>
                </div>
            </div>
            <?php
               } 
            }else{
            ?>
            
    <?php } ?>
        </section>
    </center>
<?php
// put your code here
?>
</body>
</html>