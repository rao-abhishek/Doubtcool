<!doctype HTML>

<?php
session_start();

include 'b_connect.php';

$_SESSION['cur_file']=basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['logged_in']))
{
    $_SESSION['sign_up']=true;
    header('location:askus.php');
    
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="d_locker.css">
    
</head>
<body>
    <div class="header_title" style="background-color:white;" >
         <a href="home.php"><p1 title="Doubtcool"> <i class="fa fa-home"></i> Doubtcool</p1></a>
   
    
        <div class="page_title">
            <p>Locker</p>
         
        </div>
    </div>
<div class="content_body">
    <div class="content_box" id="recommended_box" >
       <div class="content_box_head" style="background-color: white;">
          INBOX
        </div>      
        <div class="recommended_box_body" style="background-color: white;">
            
        <div class="recommended_box_body_item" style="background-color: white">
        
       hi
        </div>
        <div class="recommended_box_body_item" style="background-color: white">
        
         hi 2 2
        </div>
        </div>
        
            
    </div>
      
    <div class="content_box" id="recommended_box" >
       <div class="content_box_head" style="background-color: white;">
           Recommended
        </div>      
        <div class="recommended_box_body" style="background-color: white;">
            
        <div class="recommended_box_body_item" style="background-color: white">
        
       hi
        </div>
        <div class="recommended_box_body_item" style="background-color: white">
        
         hi 2 2
        </div>
        </div>
        
            
    </div>
    
    <div class="content_box" id="request_box">
              <div class="content_box_head" style="background-color: white;">
           Get your Personlised schedules and Study Materials
        </div> 
        <div class="content_box_tag">
        Designed by our Experts
        </div>
        
        
        <div class="request_box_body">
            <form action="b_locker.php" method="get">
        
        <br>
          <label for="date" id="label_input">Enter your Exam Date</label>
            <span style="margin-left: -37px;"><input type="date" required  class="design_input" id="date_text" required name="exam_date" ></span>
            
           <div class="example_text">
            
               <span style="color:#000000; margin-left: -15px;">Type all your subjects and topics you want to make schedule </span><br>
               Example  
               <br>
               Physics : Heat and thermodynamics , Optics , Current Electricity 
               <br>
               Chemistry : chemical kinetics , solid state , p-block elements 
               <br>
               Mathematics : differential equation , integration , relations and functions  
            
           </div> 
            
            <div class="info_text">
            
                Your request will be delivered in this <b>INBOX</b> within 24hrs
            
            
            
            </div>
            
            <div class="request_type_box">
                <textarea type="text" placeholder="Start typing here... " id="d_request_type_box" name="request_text" required></textarea>
              
              
            
            
            </div>
            
            <div class="submit_button">
        
                <button type="submit" id="submit_buttom" >Submit and Continue to Explore </button>
                
            
            
            </div>
            </form>
        </div>
        
        
        
    </div>
           
      
        
</div>
   

</body>

</html>