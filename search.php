<?php



include 'includes/db_connect.php';


  $output="";
  $email = $_SESSION['email'];





if(isset($_POST['search'])){
  $search_Query= $_POST['searchBox'];

  $search_Query = preg_replace("#[^0-9a-z]#i","",$search_Query);
  $sql1 = "SELECT * FROM overlordtable WHERE email='$email' AND (sitename LIKE '%$search_Query%' OR sitedescription LIKE '%$search_Query%')";

  $result1 = mysqli_query($conn,$sql1);
//  $count = mysql_num_rows($result1);

  if($result1->num_rows== 0){
    //if it does not find record bring back everythin
    $sql1 = "SELECT *
            FROM overlordtable
            where email = '$email'";
    $result1 = mysqli_query($conn,$sql1);
    $output= $result1;
  }else{
      $output=$result1; //else bring back results
  }

}
else {
  {
    //before search display everything
    $sql1 = "SELECT *
            FROM overlordtable
            where email = '$email'";
  $result1 = mysqli_query($conn,$sql1);
   $output = $result1;
  }
}



?>
