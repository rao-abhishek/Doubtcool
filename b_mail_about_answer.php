 <?php 

$sql="select * from q_bank where qid='$a_qid';";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$forward_mail=$row['q_uploader'];

$linksql="select * from all_info where email='$forward_mail';";
$linkresult=$conn->query($linksql);
$linkrow=$linkresult->fetch_assoc();



$fname=$linkrow['fname'];
$lname=$linkrow['lname'];

$linksql="select * from all_info where email='$email';";
$linkresult=$conn->query($linksql);
$linkrow=$linkresult->fetch_assoc();

$ufname=$linkrow['fname'];
$ulname=$linkrow['lname'];


$to = $forward_mail;
$subject = 'You got an Answer';
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
    <p><span style="font-family: "Segoe UI"; color: rgb(12, 181, 102);"><strong>Doubtcool</strong></span></p>
    <p>Hi '.$fname.' '.$lname.'  ,</p>
    <p>You got an answer for your question.</p>
    <p>'.$ufname.' '.$ulname.' uploaded a answer for you question.</p>
    <p><span style="color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; font-size: small; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">All Doubtcool users have the access of uploading their answers.</span>&nbsp;</p>
    <p><a href="https://www.doubtcool.com/answer.php?qid='.$a_qid.'" rel="noopener noreferrer" target="_blank">Click here</a> to proceed&nbsp;</p>
    <p><a data-fr-linked="true" href="https://www.doubtcool.com/answers"></a><a href="https://www.doubtcool.com/answers.php?qid='.$a_qid.'" rel="noopener noreferrer" target="_blank">https://www.doubtcool.com/answers.php?qid='.$a_qid.'</a></p>
    <p>Keep using <a href="https://www.doubtcool.com" rel="noopener noreferrer" target="_blank"><span style="font-family: "Segoe UI"; color: rgb(12, 181, 102);"><strong>Doubtcool</strong></span></a></p>
    <p><br></p>
    <p><br></p>
    <p><br></p>
</body>

</html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}




?>