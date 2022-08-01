<?php

session_start();
//$_SESSION['message']='';
//$_SESSION['error']=0;
$_SESSION['forward_file']=basename($_SERVER['PHP_SELF']);
$_SESSION['cur_file']=basename($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html lang="en">
     <head>
         
         <link rel = "icon" href="icon.png" type="image/x-icon">
         
         <?php 
        
        include 'b_connect.php';
        
    if(isset($_SESSION['sess_fix'])!=1)
{
    include 'b_fix_sessions.php';
    
}
         
         
         
    
if(isset($_SESSION['logged_in'])) 
{
    
 header('location:l_home.php'); 
      
}
    

    $_SESSION['upload_message']="off";
   
    $_SESSION['search_q']=null;
   
    ?>
    <meta charset="utf-8" />
           
         
<title>Doubtcool</title>
    
         
    <meta name="keywords" content="CBSE Study Material, ICSE, NCERT Solutions, CBSE Sample Papers, Live Quesitions, SSC, HSC, CBSE Question Papers, CBSE Solutions, Tutorials, Guess question paper, sample papers, Model question Paper, PSA, Board paper solutions, Revision Notes, Meritnation, Meritnation.com, CPT, IITJEE, AIPMT, NDA, BBA,Previous year questions,JEE mains, JEE advanced ,jee adv, NEET , aims, nda, CAT exam , exam , gate exam ,GATE, question bank, doubtcool , UPSC question , GMAT, entrance exam, important questions, full">
         
    <meta name="description" content="get all you doubts cleared , Get expert certified answer for free, get all textbook solution here for free , important questions for entrance exam(JEE Mains, JEE Advanced , NEET ,AIMS, UPSC )">
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="w3.css">

<link rel="stylesheet" type="text/css" href="d_home.css">
<link rel="stylesheet" type="text/css" href="d_l_home.css">
    
    
  <link rel="stylesheet" href="d_jquery_ui.css">
  <link rel="stylesheet" href="d_ui_custom.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
     <script>
  $( function() {
    var availableTags = <?php echo $_SESSION['all_query']?>; 
    $( "#search_bar" ).autocomplete({
      source: function(request, response) {
        var results = $.ui.autocomplete.filter(availableTags, request.term);
        
        response(results.slice(0, 10));
      }
    });
  } );
  </script>
        
    </head>
        
    
    
<body>
    

   
   
    
    <div class="home_main">
     <!-- <p1 title="Doubtcool">Doubtcool</p1>-->
        <p1 title="Doubtcool"><span style="color:#FF9933; text-shadow:3px 3px 3px rgba(255, 150, 28, 0.33)">Made</span> <span style="color:white; text-shadow:3px 3px 3px rgba(0, 0, 0, 0.33)" >in</span> <span style=" color:#138808; text-shadow:3px 3px 3px rgba(0, 255, 78, 0.37)">INDIA</span></p1>
        <br>
        <p1 title="Doubtcool" style="font-size:20px;">Doubtcool</p1>
        <div class="ui-widget">
  <form action="crawler.php" method="get">
        
     <input id="search_bar" type="text" required name="s" placeholder=" &#8981;   What's your Question ?"/>
    </form>
</div>
        
        
      
     </div>
        
    <div class="home_clicks">
        
        
        <a href="crawler.php"><button id="explore" title="Explore">Explore</button></a>
        <a href="locker.php"><button id="challenge" title="Explore">Locker</button></a>
        <a href="askus.php"><button id="ask_doubt" title="Explore">Ask us</button></a>
      
               
     </div>
  
    
  

    
    
 
    
      
       
    <div class="log_clicks">
    <a href="register.html">
    <button id="sign_up" title="Sign up">Sign Up</button> 
    </a>
<br>
    <form action="calluser.php" method="post">
     <button id="login" onclick="document.getElementById('id01').style.display='block'"  title="Login">Login</button> 
        <br><br><br><br><br>
              
  
        
        <div id="id01" class="w3-modal"> 
      <div class="w3-modal-content w3-card-4 w3-animate-zoom">
    
         <div class="w3-container">
       
        <header class="w3-teal">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        </header> 
            
          <label class="w3_label" for="email" ><b>Username</b></label>
      <input   type="text" placeholder="Email id" name="email" autocomplete="off" required><br>

      <label class="w3_label" for="password"><b>Password</b></label>
      <input type="password"  placeholder="Password" name="password" autocomplete="off" required><br>
             
      
             
        <p id="error"><?php
            
   
            
            if(isset($_SESSION['error']))
            {        
                
                unset($_SESSION['error']);
                
               echo" <script>
               var button=document.getElementById('login');
                button.click();
                </script>"; 
                
            echo $_SESSION['message'];
                
                 
         
                
            }
            
            
         
            ?></p>     
        
      <button id="w3_login_button" type="submit">Login</button>
      <label id="checkbox" >
          <br>
          <br>
          <div id="error2">
          don't have a account ? <a href=signpage.html>Sign up</a>
              
              
          </div>
          
          <br>
          <br>
         <input type="checkbox" checked="checked" name="remember">
          Remember me
      </label>   
             
           
       
        </div>
        </div>
        </div>
       
        </form>
        </div>
    
        
    <div class="bottom_content">
 
    <div class="b_title">
        
        <p> <a style="color:black;" href="about.html" target="_blank">About and Contact</a>     © 2020 DOUBTCOOL </p>
        
    </div>
    </div>
        
        
    
    
    
</body>

</html>