<?php 
include 'b_connect.php';

$email=$_POST['email'];
    
    $sql="select count(*) from user_info.all_info where email='$email';";
    
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();

$count=$row['count(*)'];
if($count>0)
{
    echo "1";

    
    
}
else
{
    echo "0";
    
}
?>