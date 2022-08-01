 <?php
session_start();



include 'b_connect.php';
$email=$_SESSION['email'];




$date_text=date("jS F Y h:i A");



$q_text=$_POST['q_text'];

$notext = 0;

if("" == trim($_POST['q_text'])){
  
    $notext = 1;
    
}  


do{
$t="f";
$y=date("y");
$m=date("m");
$d=date("d");
$r=rand();


$qid=$t.$y.$m.$d.$r;


$_SESSION["qid"]=$qid;

$sql="select count(*) from user_info.feedback where fid='$qid'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$size=$row["count(*)"];

}while($size!=0);


$sql = "insert into user_info.feedback values ('$qid','$q_text',now(),'$date_text','$email');";


echo $sql;


if($notext!=1)
{
    $result=$conn->query($sql);
    
    if($result==true)
    {
    echo "Feedback uploaded successfully";
    
    $to="abhishekrao3011@gmail.com";
    $subject="feedback from Doubtcool ";
    $msg=$q_text;
    $header=" From: admin@doubtcool.com";
    mail($to,$subject,$msg,$header);
        
        
    header("location:explore.php");
/*  $sql="select q_text from user_info.q_bank;";
    $result=$conn->query($sql);

    $row=$result->fetch_assoc();
    $sample=$row['q_text'];
  
    $sam=str_replace("\n","<br>",$sample);
    echo $sam;*/
    }
    
    else
    {
    echo "something is wrong. could'nt upload your question, try again";
    
    
    }

    
}

else if($notext==1){
    
    header('location:Questions.php');
}






?>
