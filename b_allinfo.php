<?php
session_start();

$goback=$_SESSION['cur_file'];
$goforward=$_SESSION['forward_file'];
include 'b_connect.php';

$conn=OpenCon();


if($_SERVER["REQUEST_METHOD"]=="POST")    
{
 $fname= test_input($_POST["fname"]);
    $lname= test_input($_POST["lname"]);
    $password1 = test_input($_POST["password1"]);
    $password2 = test_input($_POST["password2"]);
  $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $c_code= test_input($_POST["country_code"]);

}

$check = "select count(email) from all_info where email= '$email';";

 if($check>1)
{
    
    echo "User Already exists";
     
     
}

do{
    
    
$t="u";
$y=date("y");
$m=date("m");
$d=date("d");
$r=rand();


$uid=$t.$y.$m.$d.$r;



$usql="select count(*) from all_info where uid='$uid'";
$uresult=$conn->query($usql);
$urow = $uresult->fetch_assoc();
$size=$urow["count(*)"];

}while($size!=0);

$sql = "INSERT INTO all_info (fname,lname,email,password,country_code,phone,score,date,uid) VALUES ('$fname','$lname','$email','$password2','$c_code','$phone',0,now(),'$uid')";


if($conn->query($sql)===TRUE)
{
    echo "NEW RECORD CREATED SUCCESSFULLY";
}





else
    echo "Error: " . $sql . "<br>" . $conn->error;

$table_name="table"."$email"."followers";

$sql=" CREATE TABLE `user_info`.`$table_name` (
  `f_email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`f_email`));
";


if($conn->query($sql)===TRUE)
{
    echo "NEW table CREATED SUCCESSFULLY";
    
    
    $result = $conn->query("select * from all_info where email='$email' ");
    $user = $result->fetch_assoc();
      $_SESSION['email'] = $user['email'];
      $_SESSION['fname'] = $user['fname'];
      $_SESSION['lname'] = $user['lname'];
      $_SESSION['country_code'] = $user['country_code'];
      $_SESSION['phone'] = $user['phone'];
        
     $_SESSION['logged_in'] = true;
        
        echo $_SESSION['email'];
        
       //include 'b_allinfo.php'; 
    header("location:$goforward") ;

        
}

$table_name="table"."$email"."following";

$sql=" CREATE TABLE `user_info`.`$table_name` (
  `f_email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`f_email`));
";


if($conn->query($sql)===TRUE)
{
    echo "NEW table CREATED SUCCESSFULLY";
}


//echo $fname;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    
    


CloseCon($conn);


?>