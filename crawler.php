<html>
<head>
    

    
    
    
    
</head>
</html>
<?php


session_start();
//$_SESSION['message']='';
//$_SESSION['error']=0;
$_SESSION['crawler']=1;

$_SESSION['cur_file']=basename($_SERVER['PHP_SELF']);

include 'b_connect.php';
//include 'crawler.php';
if(isset($_SESSION['sess_fix'])!=1)
{
    include 'b_fix_sessions.php';
    
}

if(!isset($_SESSION['logged_in']))
{
  $_SESSION['fname'] = "log" ;
    $_SESSION['lname'] = "in" ;
    $_SESSION['email']="guest@doubtcool.com";
    
}


/// ALGO ONE - display top clicked/most clicked q_bank(set)..

$_SESSION['new_filter']="select * from user_info.q_bank order by q_visit desc LIMIT 10;";

//ALGO ONE- END

//ALGO TWO - display from requested set as per top top clicked/most clicked q_bank(set) 



 
  $s = $_GET['s'];
  $s=addslashes($s);
  $_SESSION['search_q']=$s;
  $sl=strlen($s);

if(isset($_GET['s'])&& $sl!=0)
{
    
    
  
  // logic 1 safe UNLOCK ALPHA
  
  $s = $_GET['s'];
      $s=addslashes($s);
    $sl=strlen($s);
    echo $sl;
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
    
     $_SESSION['new_filter']="select * from user_info.q_bank where $and_sqc union (select * from user_info.q_bank where $or_sqc ); ";
    
    $_SESSION['upload_message']="on";
    
    include 'update_query.php';
    
}

else
{
   $_SESSION['new_filter']="select * from user_info.q_bank order by q_visit desc LIMIT 20;"; 
    
}

//ALGO TWO - END


header('location:explore.php');


?>