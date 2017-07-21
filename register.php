<?php
include 'includes/db_connect.php';
if($_SERVER['REQUEST_METHOD'] =='POST'){

if(isset($_POST['register'])){


  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $confirmPassword = md5($_POST['ConfirmPassword']);



          $existenceCheck = "SELECT * FROM users WHERE email = '$email'";
         $existenceCheck2 = mysqli_query($conn,$existenceCheck);

         //if passwords match
         if($password != $confirmPassword){
           echo "pleaseenter macthing password ";
         }
         elseif($existenceCheck2->num_rows > 0){
            echo " user exists";
         }
         else{


         $entry = "INSERT INTO users (email,username,password)
                 VALUES ('$email','$username','$password')";
         mysqli_query($conn,$entry);
         header('location:login.php');

         }





}
}



 ?>

            <div class="title">
              <center>  <h3 > Never Remember Again</h3>
              <!-- for the form modal -->
              <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#registermodal">
                Register
              </button>
              </center>
            </div>



    <!-- form modal -->
          <div class="modal fade" id="registermodal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header mymodal-header">
                  <h3>Register</h3>
                </div>
                <div class="modal-body">

                  <form class="link-form" action="register.php" method="POST">

                      <label>Email:<br>
                        <input type="email" name="email" value="" placeholder="Email"required class="add-link-form-content">
                      </label>


                      <label>Username:<br>
                        <input type="text" name="username" value="" placeholder="username" required class="add-link-form-content">
                      </label>


                      <label>Password:<br>
                      <input type="password" name="password" value="" placeholder="password " required class="add-link-form-content"><br>
                      </label>

                      <label>Confirm Password:<br>
                      <input type="Password" name="ConfirmPassword" value="" placeholder="Confirm Password " required class="add-link-form-content"><br>
                      </label>

                      <input type="submit" class="btn btn-primary" name="register" value="Register">

                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-close" data-dismiss="modal">close</button>
                </div>

              </div>

            </div>

          </div>


    <!-- end of form modal -->
