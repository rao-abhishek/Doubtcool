<?php

session_start();

include 'b_connect.php';

  $goforward=$_SESSION['forward_file'];
  $goback=$_SESSION['cur_file'];

$_SESSION['email']="guest@doubtcool.com";
$email = $_POST['email'];
$result = $conn->query("select * from all_info where email='$email' ");

 if($result->num_rows==0)   
 {
   //  echo "user doesn't exist";
     
        $_SESSION['error'] = true;
    $_SESSION['message'] = "User does not exist";
     header("location:$goback");   
 }

else
{
  $user = $result->fetch_assoc();
   
    
    if(!strcmp($_POST['password'],$user['password']))
    
    {
      $_SESSION['email'] = $user['email'];
      $_SESSION['fname'] = $user['fname'];
      $_SESSION['lname'] = $user['lname'];
      $_SESSION['country_code'] = $user['country_code'];
      $_SESSION['phone'] = $user['phone'];
        
     $_SESSION['logged_in'] = true;
        
        echo $_SESSION['email'];
        
        
    header("location:$goforward") ;

        
        
    }
    
    
    else
    {
        $_SESSION['error'] = true;
        $_SESSION['message']="password doesn't match";
      
        
    header("location:$goback");
    }
    
    
}



?>

<!doctype html>

