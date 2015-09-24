<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="sitemedia/css/styleadmin.css" rel="stylesheet" type="text/css"/>
        <title>Admin - <?='nombre pagina'?></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <!--    FORMULARIO   -->
        
        <form action="<?=$_SERVER['PHP_SELF']?>">
            <h1>RECUPERAR</h1>
            <input type="email" name="email" placeholder="user@example.com" required autofocus="">
         
            <input type="submit" value="Recuperar">
            
            <a href="index.php">Volver</a>
        </form>
        <span class="msg">ERROR</span>
    </body>
</html>
