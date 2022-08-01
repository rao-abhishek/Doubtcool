<?php 

//session_start();


do{
$t="sq";
$y=date("y");
$m=date("m");
$d=date("d");
$r=rand();


$sqid=$t.$y.$m.$d.$r;


$_SESSION["sqid"]=$sqid;

$sql="select count(*) from user_info.all_query where sqid='$sqid'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$size=$row["count(*)"];

}while($size!=0);

$query_text=$_SESSION['search_q'];
$email=$_SESSION['email'];




$sql="INSERT INTO `user_info`.`all_query` (`sqid`, `query_text`, `query_uploader`, `query_time`) VALUES ('$sqid', '$query_text', '$email', now());";


  $result=$conn->query($sql);
    
    if($result==true)
    {
    echo "search query uploaded successfully";
   // header("location:answers.php?qid=$qid");
/*  $sql="select q_text from user_info.q_bank;";
    $result=$conn->query($sql);

    $row=$result->fetch_assoc();
    $sample=$row['q_text'];
  
    $sam=str_replace("\n","<br>",$sample);
    echo $sam;*/
    }
    
    else
    {
    echo "something is wrong. could'nt upload your query, try again";
    
    
    }



?>
