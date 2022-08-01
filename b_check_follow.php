<?php



$email=$_SESSION['email'];
$u_email=$_SESSION['u_email'];


$table_name="table".$email."following";

$sql="select count(*) from `$table_name` where f_email='$u_email';";
//echo $sql;
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$count=$row['count(*)'];

if($count==0)
{
    $_SESSION['linked']=0;
    
}

else
{
    $_SESSION['linked']=1;
    
}

?>