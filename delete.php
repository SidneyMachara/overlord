<?php
include 'includes/db_connect.php';
$deleteME = $_GET['deleteME'];

if($_SERVER['REQUEST_METHOD'] =='POST'){
  $sql="DELETE FROM overlordtable WHERE id=$deleteME";
  mysqli_query($conn,$sql);
}

header('location:index.php');
 ?>
