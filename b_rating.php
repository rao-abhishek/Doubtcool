<?php 
session_start();

include 'b_connect.php';

$r="";
$email=$_SESSION['email'];
if($email=="guest@doubtcool.com")
{
    $email="guest@doubtcool.com";
  
 
    $r=rand();
    
}

if(empty($_POST['p_rating']) && empty($_POST['t_rating']) && empty($_POST['l_rating']) && empty($_POST['m_rating']))
{
    echo "check 0";
    $goback= $_SESSION['cur_file'];
    header("location:$goback"); 
    exit;
    
}

if(empty($_POST['p_rating']))
{
    
   $_POST['p_rating']=0; 
}

if(empty($_POST['t_rating']))
{
    $_POST['t_rating']=0; 
}

if(empty($_POST['l_rating']))
{
  $_POST['l_rating']=0; 
}

if(empty($_POST['m_rating']))
{
   $_POST['m_rating']=0; 
}

$qid=$_SESSION['qid'];

$p_rating=$_POST['p_rating'];
$t_rating=$_POST['t_rating'];
$l_rating=$_POST['l_rating'];
$m_rating=$_POST['m_rating'];



$eq=$qid.$email.$r;
    echo $eq;
    
    


if ($email!="guest@doubtcool.com")
{
$sql= "select count(*) from user_info.user_qna_rating where emailqid='$eq';";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $count=$row["count(*)"];
    
    if($count==0)
    {
        $sql="insert into user_info.user_qna_rating values ('$email','$qid',$p_rating,$t_rating,$l_rating,$m_rating,'$eq') ;";
          $result=$conn->query($sql);
        
        if($result==true)
        {
            echo "check 1";
          $goback= $_SESSION['cur_file'];
           header("location:$goback");
        }
        else
        {
            echo "rating didn't get uploaded";
        }
        
    }
    
    else
    {
        $sql= "update user_info.user_qna_rating set u_popularity = $p_rating , u_thinking = $t_rating , u_lengthy = $l_rating , u_memory_based = $m_rating where emailqid = '$eq' ;";
          $result=$conn->query($sql);
        
      if($result==true)
        {  
          echo "check 2";
           $goback= $_SESSION['cur_file'];
            header("location:$goback");
        }
        else
        {
            echo "rating didn't get updated";
        }  
        
    }
    
}

else if($email=="guest@doubtcool.com")
    
{
 
   $sql="insert into user_info.user_qna_rating values ('$email','$qid',$p_rating,$t_rating,$l_rating,$m_rating,'$eq');";
          $result=$conn->query($sql);
        
        if($result==true)
        {
          echo "check 3";
          $goback= $_SESSION['cur_file'];
          header("location:$goback");
        }
        else
        {
            echo "rating didn't get uploaded";
        }
          
    
}

?>