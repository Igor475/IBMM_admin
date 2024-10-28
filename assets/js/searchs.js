$("#busca").keyup(function() {
    
    $.ajax({
        url: 'http://localhost/ibmissaomultiplicar/noticias.php',
        type: 'POST',
        data: {busca:$("#busca").val()},
        success:function(data){
            $("#resultados").html(data);
        }, error:function(data) {
            $("#resultados").html("Erro ao buscar!");
        }
    });

});