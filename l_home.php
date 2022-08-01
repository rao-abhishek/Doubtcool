<?php

session_start();

if(!isset($_SESSION['logged_in']))
{
  
    header('location:home.php');
    
}
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
     
              <p1 title="Doubtcool">Doubtcool</p1>
         <div class="ui-widget">
  <form action="crawler.php" method="get">
        
     <input id="search_bar" type="text" required name="s" placeholder=" &#8981;   What's your Question ?"/>
    </form>
</div>
        
     </div>
        
    <div class="home_clicks">
        
        
        <a href="explore.php"><button id="explore" title="Explore">Explore</button></a>
        
     <a href="locker.php"><button id="challenge" title="Explore">Locker</button></a>
               
     </div>
  
    
   
 
  <div class="log_clicks">
    
      <a href="logout.php"><button id="log_out" title="log out"><i class="fa fa-sign-out"> </i> log out</button></a> 
  <p></p>
    </div>  
       
   
  
        
    
    
    
</body>

</html>