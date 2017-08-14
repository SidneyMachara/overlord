<?php
$_SESSION['logged_in'] = False;
session_destroy();
header('location:login.php');
 ?>
