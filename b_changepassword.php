<?php 

include 'b_connect.php';

session_start();

  $goforward=$_SESSION['forward_file'];
  $goback=$_SESSION['cur_file'];

$email = $_SESSION['lock_email'];
$pwd = $_POST['pwd1'];


$sql="UPDATE `all_info` SET `password` = '$pwd' WHERE (`email` = '$email');";
$result=$conn->query($sql);

$sql="select * from all_info where email='$email';";
$result=$conn->query($sql);
$user=$result->fetch_assoc();


      $_SESSION['email'] = $user['email'];
      $_SESSION['fname'] = $user['fname'];
      $_SESSION['lname'] = $user['lname'];
      $_SESSION['country_code'] = $user['country_code'];
      $_SESSION['phone'] = $user['phone'];
        
     $_SESSION['logged_in'] = true;

header("location:$goback");

?>