/* SCRIPTS PARA AS ORAÇÕES */
$("#form_prayer").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "http://localhost/IBMM_admin/painel-igreja/oracao/inserir.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

                oracaoSalvar();
                setTimeout(function () {
                    window.location = "oracao.php";
                }, 3500);

            } else {

                $('#mensagem').addClass('message_error')
                $('#mensagem').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});


function oracaoSalvar(mensagem) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "Sua oração foi enviada co sucesso!"
    });
}