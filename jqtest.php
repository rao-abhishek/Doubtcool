<!doctype html>
<html lang="en">
    <head>
    <?php 
    if(isset($_SESSION['sess_fix'])!=1)
{
    include 'b_fix_sessions.php';
    
}
    
   
    ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
</head>
<body>
 
<div class="ui-widget">
 <!-- <label for="tags">Tags: </label>-->
  <form action="crawler.php" method="get">
        
     <input id="search_bar" type="text" name="s" placeholder=" &#8981;   What's your Question ?"/>
    </form>
</div>
 
 
</body>
</html>