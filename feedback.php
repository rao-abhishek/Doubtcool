 <?php
session_start();

include 'b_connect.php';

$_SESSION['cur_file']=basename($_SERVER['PHP_SELF']);


?>


<!doctype html>
<html>
    <head>
          <link rel = "icon" href="icon.png" type="image/x-icon">
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give your feedback to help us Grow</title>
    <link rel="stylesheet" type="text/css" href="d_question.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    
    
        
    
    
    </head>

<body>
    


    <a href="home.php"><p1 title="Doubtcool"> <i class="fa fa-home"></i> Doubtcool</p1></a>
    <div class="page_content">
    <p id="heading">Upload your FEEDBACK</p>
    <p id="tag_line">Help us grow <br>(no need to login or sign up)</p>

    
   
<div class="text_box"  style="display:block;">
<form method="post" action="b_upload_feedback.php">
    <textarea wrap="hard" required id="text_place" placeholder="Start typing here... " name="q_text"></textarea>  

    <br>
    <br>
    <button id="submit" type=submit>Submit</button>
</form>
    
</div>
    
    
</div>
   
    
    
</body>


</html>