<!doctype html>
<html>
    <?php 
    include 'b_connect.php';
    session_start();
    
    if(!isset($_SESSION['lock_email']))
    {
        ?> 
    <div class="main_box">
    <div class="main_box_title">
        This link is invalid or Broken to you !!!
    </div>
    </div>
    
    
    <?php
    }
    
    else
    {
    
   $email = $_SESSION['lock_email'];
    $sql="select * from all_info where email='$email'; ";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $currpwd = $row['password'];
    ?>
<head>
 <link rel = "icon" href="icon.png" type="image/x-icon">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../b_passwordupdate.css">
     <link type="text/css" rel="stylesheet" href="b_passwordupdate.css">
</head>
<body>
    
    <script>
        $(document).ready(function(){
    $('#pwd1, #pwd2').on('keyup', function () {
  if ($('#pwd1').val() == $('#pwd2').val()) {
       $('#nomatch').css('display','none');
      $('.submit_button').css('display','block');
  
      
  
      if($('#pwd1').val()=='<?php echo $currpwd;?>')
         {
         $('#curpwd').css('display','block');
         $('.submit_button').css('display','none');

         }
      
        else{
         $('#curpwd').css('display','none');
         $('.submit_button').css('display','block');
  
        }
  } else {
  
        $('#nomatch').css('display','block');
       $('.submit_button').css('display','none');

  }
});
        });
    </script>       
            
    
    <div class="top_head">
    <a style="text-decoration: none;color:#0cb566" href="home.php">
    Doubtcool
    </a>
        <div class="email_id">
     <?php echo $_SESSION['lock_email']; ?>
        </div>
    </div>
    <div class="all_content">
    <div class="main_box">
    <div class="main_box_title">
        <b>Set new password</b>
        </div>
        <br>
        
        
<form method="post" action="../b_changepassword.php">
     
        <input class="input_field" minlength="6" required type="password" name=pwd1 id="pwd1" placeholder="Enter new password">
            <br>
          <input class="input_field" minlength="6" required type="password" id="pwd2" name=pwd2 placeholder="Confirm password">
        <div class="error_msg">
            <div id="nomatch" style="display:none;">*password doesn't match </div>
            <br>
            <div id="curpwd" style="display:none;">
        *create new password that isn't your current password
            </div>
        </div>
            <br>
        <div class="all_set" style="display:none;">
        All set
        </div>
        <button class="submit_button" type="submit" style="display:block;"><b>Submit</b></button>
        </form>
    
    </div>
  
    </div>
    <?php
    }
    ?>
</body>

</html>