/* $("#busca").keyup(function() {
    
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

}); */

$(document).ready(function() {
    // Quando o formulário for enviado
    $("#searchForm").on("submit", function(event) {
        event.preventDefault(); // Previne o envio tradicional e recarregamento da página
        listarNome(); // Chama a função AJAX para enviar o formulário
    });
});

function listarNome() {
    var busca = $("#buscar").val(); // Obtém o valor do campo de busca
    $("#preloader").show(); // Exibe o preloader enquanto aguarda a resposta

    $("#resultList").empty().removeClass("has-results");

    $.ajax({
        url: 'http://localhost/ibmissaomultiplicar/noticias.php',
        method: 'POST',
        data: { busca: busca }, // Envia o valor de busca como dados
        dataType: "html",

        success: function(result) {
            $("#resultList").html(result).addClass("has-results"); // Atualiza a div com os resultados retornados pelo servidor
        },
        complete: function() {
            $("#preloader").hide(); // Oculta o preloader ao final da requisição
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Erro na requisição: ", textStatus, errorThrown); // Tratamento de erro
            alert("Ocorreu um erro ao processar a requisição.");
        }
    });
}