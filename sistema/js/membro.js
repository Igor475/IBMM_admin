/* SCRIPTS PARA AS ORAÇÕES */
$("#form_signup").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "http://localhost/ibmissaomultiplicar/sistema/painel-igreja/membros/inserir.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

                signupSalvar();
                setTimeout(function () {
                    window.location = "cadastro";
                }, 5000);
                

            } else {

                $('#mensagem').addClass('mensagem_signup')
                $('#mensagem').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});

function signupSalvar(mensagem) {
    Swal.fire({
        icon: 'success',
        title: 'Seu cadastro foi realizado com sucesso!',
        confirmButtonColor: '#28a745',
        allowOutsideClick: true,
        willClose: () => {
            window.location.href= "cadastro";
        }
    });
}

// Limpando o campo da igreja para não embolar a label com o nome da igreja
$("#igreja_ch").val('').change();