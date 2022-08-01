<?php
session_start();

if(!isset($_SESSION['logged_in']))
{
  
    header('location:home.php');
    
}

include 'b_connect.php';
$email=$_SESSION['email'];

$subject=$_SESSION['subject'];
$topic=$_SESSION['topic'];
$exam=$_SESSION['exam'];
$q_aid=NULL;



$date_text=date("jS F Y h:i A");



$q_text=$_POST['q_text'];

$notext = 0;

if("" == trim($_POST['q_text'])){
  
    $notext = 1;
    
}  


do{
$t="q";
$y=date("y");
$m=date("m");
$d=date("d");
$r=rand();


$qid=$t.$y.$m.$d.$r;


$_SESSION["qid"]=$qid;

$sql="select count(*) from user_info.q_bank where qid='$qid'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$size=$row["count(*)"];

}while($size!=0);

$q_text=addslashes($q_text);
$sql = "insert into user_info.q_bank values ('$qid','$email','$date_text','$subject','$topic','$exam','$q_text','$q_aid',now(),0);";





if($notext!=1)
{
    $result=$conn->query($sql);
    
    if($result==true)
    {
    
        
    //include 'b_share_to_users.php';  
        
    echo "Question uploaded successfully";
        
        $source = 'main_answer.php';
        $destination = 'answers/'.$qid.'.php';
        if(!copy($source,$destination))
{
    echo $qid." Update failed (file cannot be copied) \n";
             header("location:answers.php?qid=$qid");
}
else {
    echo $qid." Update successfull (filecopied) \n";
   
  $filename="xmltest.xml" ;
  $datetime=date("Y-m-d h:i:sa");
  $dati=explode(' ',$datetime);
$xml_link="
<url>
<loc>https://www.doubtcool.com/answers/$qid.php</loc>
<lastmod>$dati[0]T$dati[1]+00:00</lastmod>
<priority>0.80</priority>
</url>
";
  $file = fopen($filename, "c");
  fseek($file, 385);
  fwrite($file, $xml_link);
  fclose($file);
    
     //header("location:answers/$qid.php");
}
        
  // header("location:answers.php?=$qid");
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
