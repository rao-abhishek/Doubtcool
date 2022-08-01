<!doctype html>
<html lang="en">
    <head>
    <?php 
        
        include 'b_connect.php';
        
    if(isset($_SESSION['sess_fix'])!=1)
{
    include 'b_fix_sessions.php';
    
}
    
   
    ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="d_jquery_ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" href="d_home.css">
<link rel="stylesheet" type="text/css" href="d_l_home.css"> 
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
        
        <style>
            .ui-menu-item {
                
                outline: none;
                 margin-left: 0;
                margin-right: 0;
            
                
            }
    
            .ui-menu-item-wrapper{
                
                
                
                 border:none;
               color:black;
               background-color: white;
        
           
            
                
            } 
            .ui-menu-item-wrapper:hover {
/* your rules */
               border:none;
               color:black;
               background-color: gainsboro;
            
               margin-left: 0;
                margin-right: 0;
            
               
}  
    
       

.ui-autocomplete {
    
    background: white;
    border-radius: 20px;
    padding: 0px;
    margin: 0px;
    box-shadow: 1px 1px 2px rgba(112, 112, 112, 0.66);
    line-height: 30px;
}



        </style>
        
</head>
<body>
 
<div class="ui-widget">
  <form action="crawler.php" method="get">
        
     <input id="search_bar" type="text" required name="s" placeholder=" &#8981;   What's your Question ?"/>
    </form>
</div>
 
 
</body>
</html>