<!doctype html>

<html>
    
    <?php

include 'b_connect.php';
session_start();
$count=-1;
    
    function getRandomWord($len = 10) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);

    
}
    $rword=getRandomWord(5);
   $_SESSION['rword']=$rword; 
    

    
?>
<head>

    <title> Reset Password | Doubtcool
    </title>
     <link rel = "icon" href="icon.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="b_resetpassword.css">
</head>
<body>
    
    <div class="top_head">
    <a style="text-decoration: none;color:#0cb566" href="home.php">
    Doubtcool
    </a>
    </div>
    <div class="all_content">
    <div class="main_box">
    <div class="main_box_title">
        <b>Reset Password</b>
        </div>
        <br>
        
        <i class="fa fa-lock" style="font-size:100px;"></i>
        <div class="tag_text">
        Enter your Email address for password reset link<br>
        after submitting check your email for link
        </div>
     <form method="post">
        <input required class="input_field" name="email" type="email" placeholder="Email address">
        
            <br>
        <button class="send_button"  type="submit"><b>Send link</b></button>
        </form>
    
    </div>
      <?php
    
    if(isset(($_POST['email'])))
    {
      $email=$_POST['email'];
      $sql="select count(*) from all_info where email='$email';";
      $result=$conn->query($sql);
      $row=$result->fetch_assoc();
      $count=$row['count(*)'];
      //echo $count;
    
    
    
    ?>
    <?php  
        if($count==0)
        {
    ?>
    <div class="response_msg_neg" style="background-color:red;">
   Email Address doesn't exist in Doubtcool <a style="color:white;" href="register.html"> Register</a>
    </div>
        <?php 
        }
        
        else if($count==1)
        {
            
    /**********************/
            
    $_SESSION['lock_email']=$email;
            $to = $email;
$subject = 'Password Reset from Doubtcool';
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
  <p><span style="font-family: Verdana, Geneva, sans-serif;">Doubtcool</span></p>
<p><span style="font-family: Verdana, Geneva, sans-serif;">Your request for Password reset lfink accepted</span></p>
<p><span style="font-family: Verdana, Geneva, sans-serif;">Click the below link to continue</span></p>
<p><span style="font-family: Verdana, Geneva, sans-serif; font-size: 22px;">Password Reset Link:- <a data-fr-linked="true" href="https://www.doubtcool.com/reset/"'.$rword.'".php">https://www</a></span><span style="font-family: Verdana, Geneva, sans-serif; font-size: 22px;"><a data-fr-linked="true" href="https://www.doubtcool.com/reset/'.$rword.'.php">.doubtcool.com/reset/'.$rword.'.php</a>&nbsp;</span></p>
<p><span style="font-family: Verdana, Geneva, sans-serif;">Dont share this link with anyone</span></p>
</body>

</html>';
 
  $source = "passwordupdate.php";
    $destination = "reset/".$rword.".php";
            
            
            
// Sending email
if(copy($source,$destination) and mail($to, $subject, $message, $headers) ){
   
  
    
    
    ?>
     <div class="response_msg">
    login link sent successfully to <?php echo $email; ?>
    </div>
    <?php
} else{
    ?>
    <div class="response_msg_neg">
    Unable to send mail/or create Reset link , Please try again
    </div>
        <?php
}
    
            
    /**********************/
            
        ?>
        
    
        
        
   
      <?php 
        }
        else
        {
            
        }
    }
        ?>
    </div>
  
</body>

</html>