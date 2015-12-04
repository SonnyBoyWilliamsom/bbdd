<?php
session_start(); //Start session before any action
$msg = "";
$class = "";
//If user logged (no pass needed) check exchange rates
if (isset($_SESSION["username"])) {
    header("location:exchangeRates.php");
} else {
    //If no user logged
    if (isset($_GET['username']) && !empty($_GET['username'])) {
        $_SESSION['username'] = $_GET['username'];
        header("location:exchangeRates.php");
    }
}
//If user close session end.php send a code to index.php. This code (c) indicates user close session properly
if (isset($_GET["c"]) ) {
    if($_GET["c"]==1){
        $class = 3;
        $msg = "Session Closed";
    }
    
}
?> 
<?php include './structure/header.php'; ?>

<?php include './views/user.php'; ?>


<?php include './structure/footer.php'; ?>
