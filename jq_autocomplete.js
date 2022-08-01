 
  $( function() {
    var availableTags = <?php echo $_SESSION['all_query']?>; 
    $( "#search_bar" ).autocomplete({
      source: function(request, response) {
        var results = $.ui.autocomplete.filter(availableTags, request.term);
        
        response(results.slice(0, 10));
      }
    });
  } );
 