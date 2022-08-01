 <?php
session_start();

include 'b_connect.php';

/*
$_SESSION['cur_file']=basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['logged_in']))
{
    $_SESSION['sign_up']=true;
    header('location:explore.php');
    
}

*/
$email=$_POST['email'];

$table_name="table".$_SESSION['u_email']."followers";
$sql="DELETE FROM `user_info`.`$table_name` WHERE (`f_email` = '$email');";


$result=$conn->query($sql);
if($result==true)
{
    
    echo "followed successfully";
}

$table_name="table".$email."following";
$u_email=$_SESSION['u_email'];
$sql="DELETE FROM `user_info`.`$table_name` WHERE (`f_email` = '$u_email');";


$result=$conn->query($sql);
if($result==true)
{
    
    echo "unfollowing successfully";
}





?>

