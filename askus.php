

<!doctype HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="d_askus.css">
      <link rel = "icon" href="icon.png" type="image/x-icon">
</head>
<body>
    <div class="header_title" style="background-color:white;" >
         <a href="home.php"><p1 title="Doubtcool"> <i class="fa fa-home"></i> Doubtcool</p1></a>
   
    
        <div class="page_title">
            <p>Ask us</p>
         
        </div>
    </div>
<div class="content_body">
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
            <form action="b_request.php" method="get">
        <label for="email_text" id="label_input">Enter your Email  </label>
    <input type="email" class="design_input" id="email_text" required name="email" placeholder="  E-mail">
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
            Your request will be delivered to Your E-mail within 24 hours
                <br>
            You will receive E-mail from <b>admin@doubtcool.com</b>
            
            
            
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