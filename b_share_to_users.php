<?php 
$email=$_SESSION['email'];
$sql="select * from all_info where email='$email';";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
//echo $row['email'];
$score=$row['score'];
$qid=$_SESSION['qid'];

$hsql="select * from all_info where score>$score";

$result=$conn->query($hsql);

while($row=$result->fetch_assoc())
{
    $forward_mail=$row['email']; 
    
    $linksql="select * from all_info where email='$forward_mail';";
    $linkresult=$conn->query($linksql);
    $linkrow=$linkresult->fetch_assoc();
    $fname=$linkrow['fname'];
    $lname=$linkrow['lname'];
    
    
     
$to = $forward_mail;
$subject = 'You got a Question';
$from = 'Doubtcool <admin@doubtcool.com>';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <p><span style="color: rgb(12, 181, 102);"><span style="font-family: "Segoe UI";"><strong>Doubtcool</strong></span></span></p>
    <p><br></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">Hi '.$fname.'  '.$lname.',</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">A Doubtcool user has uploaded a question , You can contribute your answers to the user, on the uploaded question.</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">Contribute your answers to Doubtcool questions.&nbsp;</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">Click the below link to proceed&nbsp;</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;"><a data-fr-linked="true" href="https://www.doubtcool.com/answers.php?qid='.$qid.'">https://www.doubtcool.com/answers.php?qid='.$qid.'</a></span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">All Doubtcool users have the access of uploading their questions.</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">Keep using</span> <a href="https://www.doubtcool.com" rel="noopener noreferrer" target="_blank"><span style="color: rgb(12, 181, 102); font-family:"Segoe UI";"><strong>Doubtcool</strong></span></a></p>
    <p><br></p>
</body>

</html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
    
    
};

$lsql="select * from all_info where score<$score";

$result=$conn->query($lsql);

while($row=$result->fetch_assoc())
{
    $forward_mail=$row['email']; 
    
    $linksql="select * from all_info where email=$forward_mail;";
    $linkresult=$conn->query($sql);
    $linkrow=$linkresult->fetch_assoc();
    $fname=$linkrow['fname'];
    $lname=$linkrow['lname'];
    
    
     
$to = $forward_mail;
$subject = 'You got a Question';
$from = 'admin@doubtcool.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <p><span style="color: rgb(12, 181, 102);"><span style="font-family: "Segoe UI";"><strong>Doubtcool</strong></span></span></p>
    <p><br></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">Hi '.$fname.'  '.$lname.',</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">A Doubtcool user has uploaded a question , You can contribute your answers to the user, on the uploaded question.</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">Contribute your answers to Doubtcool questions.&nbsp;</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">Click the below link to proceed&nbsp;</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;"><a data-fr-linked="true" href="https://www.doubtcool.com/answers.php?qid='.$qid.'">https://www.doubtcool.com/answers.php?qid='.$qid.'</a></span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">All Doubtcool users have the access of uploading their questions.</span></p>
    <p><span style="font-family: "Trebuchet MS", Helvetica, sans-serif;">Keep using</span> <a href="https://www.doubtcool.com" rel="noopener noreferrer" target="_blank"><span style="color: rgb(12, 181, 102); font-family:"Segoe UI";"><strong>Doubtcool</strong></span></a></p>
    <p><br></p>
</body>

</html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
    
    
};





?>