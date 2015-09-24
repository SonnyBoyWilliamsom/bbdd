<?php
session_start();
if(!isset($_SESSION['id_user_log'])){
    header('location: index.php');
}