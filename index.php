<?php
session_start();



if( empty($_SESSION['username'])){
  header('location:login.php');
}

include 'includes/db_connect.php';

// code for searching
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $output="";
  $email = $_SESSION['email'];
  //before search display everything
  $sql1 = "SELECT *
          FROM overlordtable
          where email = '$email'";


$result1 = mysqli_query($conn,$sql1);
 $output = $result1;
 function showLinks($k){  //gets required images and prints to screen
   while($row = mysqli_fetch_assoc($k)) {
     ?>

     <a href="<?php echo $row['sitelink']; ?> " target='_blank'>
       <div class="link-box">
         <!-- delete button -->
         <form class="" action="delete.php?deleteME='<?php echo $row['id'];?>' " method="post">
           <input type="submit" name="delete" value="X" class="deleteME">
         </form>
         <h3 class="link-title-text"><?php echo $row['sitename'];  ?></h3>

       </div>
     </a>

     <?php
   }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// gets in here if the user submits form
if($_SERVER['REQUEST_METHOD'] =='POST'){

if(isset($_POST['submit'])){
  $linkTitle = $_POST['linkTitle'];
  $link = $_POST['link'];
  $description = $_POST['description'];
  $email = $_SESSION['email'];

  $entry = "INSERT INTO overlordtable (sitename,sitelink,sitedescription,email)
          VALUES ('$linkTitle','$link','$description','$email')";

 mysqli_query($conn,$entry);
  // mysqli_query($conn,$existenceCheck2);

}

include 'search.php';


}





 ?>

<!DOCTYPE html>
<html>

    <?php include 'includes/head.php'; ?>
  <body>

      <?php include 'includes/navbar.php'; ?>


<div class="row">

    <div class="col-md-9 col-sm-7 col-xs-3">
        <!-- title -->
        <a href="logout.php"><button type="button"  class="btn btn-danger" >
          Log Out
        </button>
        </a>
        <?php echo $_SESSION['username']; ?>

    </div>

    <div class="col-md-3 col-sm-5 col-xs-8">
        <!-- search bar -->
        <form class="" action="index.php" method="post">
            <input type="text" name="searchBox" value="" class="mysearchBox"  placeholder="Search..">
            <button class="btn btn-default" type="submit" name="search"><i class="glyphicon glyphicon-search"></i></button>
        </form>
    </div>

</div>


      <div class="title">
        <center>  <h3 > Never Remember Again</h3>
        <!-- for the form modal -->
        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#mymodal">
          add Link
        </button>
        </center>
      </div>



<!-- form modal -->
      <div class="modal fade" id="mymodal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header mymodal-header">
              <h3>ADD YOUR LINK</h3>
            </div>
            <div class="modal-body">

              <form class="link-form" action="index.php" method="POST">

                  <label>link title:<br>
                    <input type="text" name="linkTitle" value="" placeholder="eg Google .."required class="add-link-form-content">
                  </label>


                  <label>link:<br>
                    <input type="text" name="link" value="" placeholder="Must start with https://" required class="add-link-form-content">
                  </label>


                  <label>Description:<br>
                  <input type="text" name="description" value="" placeholder="describe website " required class="add-link-form-content"><br>
                  </label>

                  <input type="submit" class="btn btn-primary" name="submit" value="submit">

              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-close" data-dismiss="modal">close</button>
            </div>

          </div>

        </div>

      </div>


<!-- end of form modal -->



    <div class="container">


      <?php
          showLinks($output);
       ?>


    </div>

    <div>
        <a href="#"  class="backToTop" ><center>&#8686; </center></a>

    </div>


    <?php include 'includes/footer.php'; ?>


  </body>
</html>
