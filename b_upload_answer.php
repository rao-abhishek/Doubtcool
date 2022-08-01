<?php
session_start();



include 'b_connect.php';
$email=$_SESSION['email'];
if($email==NULL)
{
    $email="guest@doubtcool.com";
    
}
$subject=$_SESSION['t_subject'];
$topic=$_SESSION['t_topic'];
$exam=$_SESSION['t_exam'];
$a_qid=$_SESSION['qid'];
$a_cert='0';





$date_text=date("jS F Y h:i A");

$a_text=$_POST['a_text'];
$c_text=$_POST['c_text'];
$a_text=addslashes($a_text);
$c_text=addslashes($c_text);


do{
$t="a";
$y=date("y");
$m=date("m");
$d=date("d");
$r=rand();


$aid=$t.$y.$m.$d.$r;


$_SESSION["aid"]=$aid;

$sql="select count(*) from user_info.a_bank where aid='$aid'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$size=$row["count(*)"];

}while($size!=0);


include 'upload.php';


$a_img=$img;

if(strlen($a_text)!=0 || $noimg==1 || strlen($c_text)!=0) 
{
   

$sql = "insert into user_info.a_bank values ('$aid','$email','$date_text','$subject','$topic','$exam','$a_text','$a_qid',now(),'$a_cert','$a_img','$img_type','$c_text');";



$result=$conn->query($sql);
}

else 
{
    $goback=$_SESSION['cur_file'];
     header("location:$goback"); 
    
}

if($result==TRUE)
{
    include 'b_mail_about_answer.php';
    echo "Answer uploaded successfully";
    $goback=$_SESSION['cur_file'];
    header("location:$goback");
    //echo $_SESSION['cur_file'];
    
  // echo $goback;
/*  $sql="select q_text from user_info.q_bank;";
    $result=$conn->query($sql);

    $row=$result->fetch_assoc();
    $sample=$row['q_text'];
  
    $sam=str_replace("\n","<br>",$sample);
    echo $sam;*/
    
}

else
{
    
    echo "something is wrong. could'nt upload your answer try again";
    
    
}





?>
