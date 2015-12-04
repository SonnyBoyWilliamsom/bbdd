<?php
  $link = mysqli_connect('localhost', 'root', 'root') or die("Error de conexión "); # Insert DB info here.
  mysqli_select_db($link, 'testcheck') or die("Error de conexión database "); # Insert databasename here.
?>
