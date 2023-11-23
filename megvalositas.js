$(document).ready(function() {
  
    
    $("#gomb").click(function(e) {
      e.preventDefault();
      $.get(
        "views/megvalositas_main.php",
        function(data) {
          $("#telepules").html(data.telepules);
          $("#megnevezes").html(data.nev);
          $("#mertek").html(data.nev2);
          $("#eredmeny").show(1000);
        },
        "json"
      )  
    });
    
    
  });
  