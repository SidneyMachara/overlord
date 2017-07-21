<?php
session_start();
include 'includes/db_connect.php';

$_SESSION['email'] = "";
$_SESSION['username'] = "";
$_SESSION['logged_in'] = false;

// gets in here if the user submits form
if($_SERVER['REQUEST_METHOD'] =='POST'){

  if(isset($_POST['login'])){

  $username = $_POST['username'];
  $pass = md5($_POST['pass']);


 $sql= "SELECT * FROM users WHERE email = '$username' OR username = '$username'";
 $query = mysqli_query($conn,$sql);

 //check if that email is in database
 if($query->num_rows == 0){
    echo "user does not exist";
 }else{
   $user = mysqli_fetch_row($query);

   if( $pass == $user[2]){

        $_SESSION['email'] = $user[0];
        $_SESSION['username'] = $user[1];
        $_SESSION['logged_in'] = True;

        header('location:index.php');

   }else{
     echo 'wrong pass';
   }

 }
 }
 }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery library -->

      <link rel="stylesheet"  href="css/myStyle.css">
  </head>
  <body class="my-login-body" >

<div class="container ">

 <?php include 'register.php'; ?>

  <center><h1 id="login-title-overlord">OverLord</h1></center>

  <form class="login-form" action="login.php" method="post">
    <div class="login-title">
      <center><h3>LOGIN</h3></center>
    </div>

      <input type="text" name="username" required placeholder="Username or Email" class="form-content">


      <input type="password" name="pass" required placeholder="Password" class="form-content">

    <div >

      <center><input type="submit" name="login" value="LOGIN"></center>

    </div>
  </form>

</div>

  </body>
</html>
