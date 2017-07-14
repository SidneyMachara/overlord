<?php
include 'db_connect.php';



// gets in here if the user submits form
if($_SERVER['REQUEST_METHOD'] =='POST'){

  $linkTitle = $_POST['linkTitle'];
  $link = $_POST['link'];

  $entry = "INSERT INTO overlordtable (sitename,sitelink)
          VALUES ('$linkTitle','$link')";

  $existenceCheck2 = mysqli_query($conn,$entry);
  mysqli_query($conn,$existenceCheck2);

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
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- logo -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar" name="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>


          <a href="#" class="navbar-brand">Over-Lord</a>
        </div>
        <!-- menu items -->
        <div class="collapse navbar-collapse" id="mainNavBar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">home</a></li>
            <li ><a href="#">gallery</a></li>
            <li ><a href="#footer">contact</a></li>
          </ul>

        </div>

      </div>

    </nav>

    <!-- title -->

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
            <div class="modal-header">
              <h3>ADD YOUR LINK</h3>
            </div>
            <div class="modal-body">

              <form class="link-form" action="index.php" method="POST">
                <div class="">
                  <label>link title:<br>
                    <input type="text" name="linkTitle" value="" placeholder="eg ..Google .."required>
                  </label>
                </div>
                <div class="">
                  <label>link:<br>
                    <input type="text" name="link" value="" placeholder="Must start with https://" required>
                  </label>
                </div>
                <div class="">
                  <input type="submit" class="btn btn-primary" name="submit" value="submit">

              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
            </div>

          </div>

        </div>

      </div>
    </div>

<!-- end of form modal -->



    <div class="container">


      <?php
      $sql = "SELECT * FROM overlordtable";
      $result = mysqli_query($conn, $sql);
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            ?>

            <a href="<?php echo $row['sitelink']; ?>">
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
       ?>


    </div>

    <footer class="footer">
      <center>copy&copy right sidney</center>
    </footer>

  </body>
</html>
