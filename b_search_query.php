<?php 

include "b_connect.php";


session_start();

if(isset($_SESSION['sess_fix'])!=1)
{
    include 'b_fix_sessions.php';
    
}



$s = $_GET['s'];
  $_SESSION['search_q']=$s;
  $sl=strlen($s);

if($sl!=0)
{
    
    
  
  // logic 1 safe UNLOCK ALPHA
  
  $s = $_GET['s'];
    
    $sl=strlen($s);
    
    $_SESSION['search_q']=$s;
    $s=explode(" ",$s);
    $and_sqc="q_text like '%%'";
    
 //  logic 1 END */
    
    
    /* logic 2 unsafe LOCK REFRAME//
    
    $s=$_GET['s'];
    $_SESSION['search_q']=$s;
    $split1=explode(" ",$s);
    
    $split2=str_replace($split1[0]," ",$s);
   
    
    $s=$split2;
    
    
    
     $and_sqc="q_text like '%$split1[0]%'";
    //logic 2 END */
    foreach($s as $s_text)
    {
       
        $and_sqc=$and_sqc." and "."q_text like '%$s_text%'";
    }
    
 $or_sqc="q_text like '% %'";
    
    foreach($s as $s_text)
    {
       
        $or_sqc=$or_sqc." or "."q_text like '%$s_text%'";
    }
    
     $sql_q="select * from user_info.q_bank where $and_sqc   union (select * from user_info.q_bank where $or_sqc  ) ;";
    
   
    
}

else
{
   $sql_q="select * from user_info.q_bank order by q_visit desc ;"; 
    
}





$sql=$sql_q;

$result=$conn->query($sql);
$row=0;
$html_option_text="[";

do{
   //do it here 
    
    $q_text=$row['q_text'];
    $html_option_text=$html_option_text.'"'.$q_text.'"'.",";
    
    
}while($row=$result->fetch_assoc());

 $html_option_text=rtrim($html_option_text,",");
$html_option_text=$html_option_text."]";
    
   


$_SESSION['all_query']=$html_option_text;


?>