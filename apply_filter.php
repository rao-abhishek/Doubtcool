<?php 

session_start();


//$_SESSION['message']='';
//$_SESSION['error']=0;

include 'b_connect.php';


$exam=$_POST['exam'];
$subject=$_POST['subject'];
$topic=$_POST['topic'];



echo $exam;
echo $subject;
echo $topic;


$get_exam="select * from user_info.filter_exam where e_value='$exam';";
$get_subject="select * from user_info.filter_subject where s_value='$subject';";
$get_topic="select * from user_info.filter_topic where t_value='$topic'; ";

$result=$conn->query($get_exam);
$row = $result->fetch_assoc();
$t_exam = $row['e_text'];
$_SESSION['exam']=$t_exam;

$result=$conn->query($get_subject);
$row = $result->fetch_assoc();
$t_subject = $row['s_text'];
$_SESSION['subject']=$t_subject;

$result=$conn->query($get_topic);
$row = $result->fetch_assoc();
$t_topic = $row['t_text'];
$_SESSION['topic']=$t_topic;





$fil_sql="select * from user_info.q_bank where q_subject='$subject' or q_exam='$exam' or q_topic='$topic' order by q_date desc; ";
$_SESSION['new_filter']=$fil_sql;

$goback=$_SESSION['cur_file'];

if($exam=="other"||$exam=="")
{
    $_SESSION['exam']="other";
}
if($subject=="other"||$subject=="")
{
    $_SESSION['subject']="other";
}
if($topic=="other"||$topic=="")
{
    $_SESSION['topic']="other";
    
}

$fil_done = 1;
$sq_text=$_SESSION['squ_text'];
header("location:$goback?sq_text=$sq_text");
    


?>