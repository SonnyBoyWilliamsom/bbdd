<?php $title = 'Entradas' ?>
<?php   include './inc/security.php'; 
        include './col/header.php'; 
        $id_user_log = $_SESSION['id_user_log'];
        
        $sql = 'SELECT entries.*, users.nombre FROM entries INNER JOIN users ON entries.id_user = users.id_user';
?>
<section id="entradas">
    <article class="datos">
        <div class="">
            <h3>Título</h3>
            <p>Lorem Ipsum</p>
            <span>Autor / 25-08-2015</span>
        </div>
    </article>
    

   
    
</section>
<?php include './col/footer.php' ?>
        
      