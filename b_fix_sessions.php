<?php 

//include "b_connect.php";

$_SESSION['sess_fix'] =1;

//$_SESSION['']

$_SESSION['exam']="other";
$_SESSION['e_id']="other";
$_SESSION['e_value']="other";


$_SESSION['subject']="other";
$_SESSION['s_id']="other";
$_SESSION['s_value']="other";


$_SESSION['topic']="other";
$_SESSION['t_id']="other";
$_SESSION['t_value']="other";

$_SESSION['forward_file']="https://www.doubtcool.com";
$_SESSION['upload_message']="off";

$_SESSION['search_q']="";
$_SESSION['u_email']="";
$_SESSION['linked']="";
$sql="SELECT query_text FROM user_info.all_query union (SELECT q_text FROM user_info.q_bank);";

$result=$conn->query($sql);
$row=0;
$html_option_text="[";

do{
   //do it here 
    
    $query_text=$row['query_text'];
   // $query_text=$row['query_text'];
    $html_option_text=$html_option_text."'".addslashes($query_text)."'".",";
    
    
}while($row=$result->fetch_assoc());

 $html_option_text=rtrim($html_option_text,",");
$html_option_text=$html_option_text."]";
    
   $html_option_text = str_replace(array("\r", "\n"), '', $html_option_text );


$_SESSION['all_query']=$html_option_text;
//echo $_SESSION['all_query'];

//closeCon($conn);





?>