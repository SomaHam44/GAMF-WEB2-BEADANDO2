

function utszamok(){
    $.post("lekerdezo_ajax.php", {"op": "utszam"}, 
    function (data){
        $("<option>").val("0").text("Válasszon ...").appendTo("#utszamselect");
    var lista=data.lista;
    for(i=0; i<lista.length; i++){
        $("#utszamselect").append('<option value="'+lista[i].utszam+'">'+'</option>');
    }}, "json");
}

function telepulesek() {
    $("#telepulesselect").html("");
    $("#megnevezesselect").html("");       
    var utszam = $("#utszamselect").val();
    if (utszam != 0) { // "Válasszon… => 0"
    $.post("lekerdezo_ajax.php", {"op" : "telepules", "utszam" : utszam},    
    function(data) {
    $("#telepulesselect").html('<option value="0">Válasszon ...</option>');
    var lista = data.lista;
    for(i=0; i<lista.length; i++)
    $("#telepulesselect").append('<option value="'+lista[i].telepules+'">'+'</option>');
    },
    "json"
    );
    }
}

function megnevezesek() {        
    $("#megnevezesselect").html("");        
    var telepules = $("#telepulesselect").val();
    if (telepules != 0) { // "Válasszon… => 0"
        $.post("lekerdezo_ajax.php", {"op" : "megnevezes", "telepules" : telepules},
        function(data) {
            $("#megnevezesselect").html('<option value="0">Válasszon ...</option>');
            var lista = data.lista;
            for(i=0; i<lista.length; i++)
            $("#megnevezesselect").append('<option value="'+lista[i].megnevid+'">'+lista[i].nev+'</option>');
        },"json"
        );
    }
}



    

