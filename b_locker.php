<?php 

include 'b_connect.php';

session_start();


if(isset($_GET['exam_date']) && isset($_GET['request_text']))
{
    
    $email=$_SESSION['email'];
    $exam_date=$_GET['exam_date'];
    $request_text= $_GET['request_text'];
    
do
{
$t="r";
$y=date("y");
$m=date("m");
$d=date("d");
$r=rand();


$rid=$t.$y.$m.$d.$r;


$_SESSION["rid"]=$rid;

$sql="select count(*) from user_info.r_bank where rid='$rid'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$size=$row["count(*)"];

}while($size!=0);

    
    // STore all the data in DATABaSE 
    
    $sql="INSERT INTO `user_info`.`r_bank` (`rid`, `r_sender`, `exam_date`, `r_upload_datetime`, `r_text`) VALUES ('$rid', '$email', '$exam_date', now(), '$request_text');";
 
    echo $sql;
    
    $result=$conn->query($sql);
    
    
$to = "admin@doubtcool.com";
$subject = "$exam_date";
$txt = "$request_text";
$headers = "From: noreply_askus@doubtcool.com" ;

//mail($to,$subject,$txt,$headers);
    
//header('location:explore.php');
    
    
}
?>