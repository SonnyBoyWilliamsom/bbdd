<?php include './inc/security.php'; ?>
<?php 
include './inc/connection.php';
include './functions/update_function.php'; ?>
<?php
$msg='';
if (isset($_POST['update']) && !empty($_POST['update'])) { //If click update button update_rates() function is called
    update_rates($link);
    $msg='Rates Updated';
}
/*To set up order of table rows: */
$field=1;//Default values for field
$order=1;//Default values for order
$search='';
if(isset($_SESSION['field']) && !empty($_SESSION['field'])){ //If these values are in $_SESSION they are rewritten
    $field = $_SESSION['field'];
}
if(isset($_SESSION['order']) && !empty($_SESSION['order'])){
    $order = $_SESSION['order'];
}
//Field and order values are used when calling showComRatesXML()
?>
<?php include './structure/header.php'; ?>
<header>
    <h1><a href="index.php">Upolski</a></h1>
    <div class="exit"> 
        <form action="./end.php" method="post">
        <input type="submit" name="exit" value="Exit">
    </form>
    
</div> 
   
    <div class="update">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            
            <input type="submit" name="update" value="Update Rates" onclick="showComRatesXML(<?=$field?>,<?=$order?>,<?=$search?>)">
           
        </form>
    </div>   
    <div class="update">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input id="search" type="text" name="search" placeholder="Search" onkeyup="searchComp(<?=$field?>,<?=$order?>,this)">
        </form>
    </div>   
</header>

<div class="tableWrap">
    <p class="<?=$msg?>"><?=$msg; ?></p><!--This message appears just when rates are updated-->
    <table class="infoUpdate"></table>
</div>
<?php include './structure/footer.php'; ?>
