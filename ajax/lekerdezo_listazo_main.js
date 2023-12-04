function telepulesek() {
    $.post(
        "listazo.php",
        {"op" : "telepules"},
        function(data) {
            //$("#orszagselect").html('<option value="0">Válasszon ...</option>');
            $("<option>").val("0").text("Válasszon ...").appendTo("#telepulesselect");
            var lista = data.lista;
            for(i=0; i<lista.length; i++)
                //$("#telepulesselect").append('<option value="'+lista[i].id+'">'+lista[i].id+'</option>');
            
                $("<option>").val(lista[i].id).text(lista[i].id).appendTo("#telepulesselect");
        },
        "json"                                                    
    );    
};

  
function mertekek() {
    $("#mertekselect").html("");
    $("#munkaselect").html("");
    $(".adat").html("");
    var telepules = $("#telepulesselect").val();    
    if (telepules != 0) {        
        $.post(
            "listazo.php",
            {"op" : "mertek", "id" : telepules},
            function(data) {                
                $("#mertekselect").html('<option value="0">Válasszon ...</option>');
                var lista = data.lista;
                for(i=0; i<lista.length; i++){                    
                    $("#mertekselect").append('<option value="'+lista[i].id+'">'+lista[i].nev+'</option>');}
            },
            "json"                                                    
        );
    }
}

function munkak() {
    $("#munkaselect").html("");
    $(".adat").html("");    
    var telepules = $("#telepulesselect").val();
    console.log(telepules);    
    if (mertek != 0) {
        $.post(
            "listazo.php",
            {"op" : "munka", "id": telepules},
            function(data) {
                $("#munkaselect").html('<option value="0">Válasszon ...</option>');
                var lista = data.lista;                
                for(i=0; i<lista.length; i++)                    
                    $("#munkaselect").append('<option value="'+lista[i].id+'">'+lista[i].nev+' '+lista[i].kezdes+' - '+lista[i].vegzes+'</option>');
            },
            "json"                                                    
        );
    }
}
function munka() {
    $(".adat").html("");
    var munka = $("#munkaselect").val();
    console.log(munka);
    if (munka != 0) {
        $.post(
            "listazo.php",
            {"op" : "info", "id" : munka},
            function(data) {
                $("#az").text(data.id);                
                $("#mettol").text(data.mettol);
                $("#meddig").text(data.meddig);
                $("#telepules").text(data.telepules);
                $("#utszam").text(data.utszam);
                $("#kezdet").text(data.kezdet);
                $("#veg").text(data.veg);
                $("#megnevezes").text(data.megnevezes);
                $("#mertek").text(data.mertek);
                document.getElementById("az2").value = data.id;             
            },
            "json"                                                    
        );
        
    }
}
function hiv(){    
    $("#az2").html("");    
    var id=$("#az").val();    
    document.getElementById("#az2").value=id;    
}




//document.getElementById('output').innerHTML = "100";

$(document).ready(function() {
   telepulesek();
   
   $("#telepulesselect").change(mertekek);
   $("#mertekselect").change(munkak);
   $("#munkaselect").change(munka);
   $("#az").change(hiv);
   
   $(".adat").hover(function() {
        $(this).css({"color" : "white", "background-color" : "black"});
    }, function() {
        $(this).css({"color" : "black", "background-color" : "white"});
    });
});