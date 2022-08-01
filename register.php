 <!doctype html>
<?php















RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule !.*\.php$ %{REQUEST_FILENAME}.php [QSA,L]

?>
<html>
<head>
      <link rel = "icon" href="icon.png" type="image/x-icon">
   <link rel="stylesheet" type="text/css" href="d_register.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
  
        $(document).ready(function(){
    $('#password1, #password2').on('keyup', function () {
  if ($('#password1').val() == $('#password2').val()) {
    $('#message').html('Matching').css('color', 'green');
       $('#submit').css('display','inline-block');
  } else {
    $('#message').html('Not Matching').css('color', 'red');
        $('#submit').css('display','none');
  }
});
     
    $('#email').keyup(function(){
        
        var email = $(this).val();
        $.post("b_check_email.php",{
            email:email
        },function(data,status){
           if(data==1 && email!="")
               {
                   $('#e_message').html('User already exists').css('color', 'red'); 
                   $('#submit').css('display','none');
               }
            
            else{
                 $('#e_message').html('').css('color', 'red'); 
                $('#submit').css('display','inline-block');
            }
            
        });
        
        
    });
            
            
            
    });    
        
    </script>
    
    
    
</head>
    
<body>

    <div class="top_line"><p>Register for free and get edge to edge benefits</p></div>
    
    <div class="create_account">Create new <p1 style="color:#0CB566;">Doubtcool</p1> account</div>
     <div id="border_line"></div>
<form method="post" action="b_allinfo.php">
    <div class="input_field">
        
          <div class="child_input_field"><span>First name <input name="fname" required/></span></div>
          <div class="child_input_field"><span>Last name <input name="lname" required/></span></div>
          <div class="child_input_field"><span> Email <input id="email" type="email" required name="email" /></span><span id="e_message"></span></div>
          <div class="child_input_field"><span>Password   <input id="password1" type=password required name="password1"/></span></div>
          <div class="child_input_field"><span>Re-type password  <input id="password2" type=password name="password2"/></span><span id="message"></span></div>
        <div class="child_input_field"><span>country code  <input required name="country_code"></span></div>
        <div class="child_input_field"><span>Mobile number <input required name="phone"></span></div>

    
    
            <button id="submit" >Submit</button>
    </div>
    </form>
</body>
</html>