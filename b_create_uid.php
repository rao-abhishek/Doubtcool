<?php 

include 'b_connect.php';

$get_mail_sql="select * from `all_info`;";


$m_result=$conn->query($get_mail_sql);
$row=$m_result->fetch_assoc();
while($row!=NULL)
{
   
do{
    
    
$t="u";
$y=date("y");
$m=date("m");
$d=date("d");
$r=rand();


$uid=$t.$y.$m.$d.$r;



$sql="select count(*) from all_info where uid='$uid'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$size=$row["count(*)"];

}while($size!=0);
    
$row=$m_result->fetch_assoc();
$email=$row['email'];
$sql="UPDATE `all_info` SET `uid` = '$uid' WHERE (`email` = '$email');";
$uid_result=$conn->query($sql);
echo $uid."\n";
}






?>