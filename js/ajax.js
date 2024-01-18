$(document).ready(function() {
    $('.sel2').select2({
        placeholder: 'Selecione uma igreja',
        dropdownParent: $('#modalForm'),
    });
});

function inserir(){
	$('#mensagem').text('');
	$('#tituloModal').text('Inserir Registro');
	var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {
		backdrop: 'fixed',
	});
	myModal.show();
    //limparCampos();
}





function excluir(id, nome){
    $('#id-excluir').val(id);
    $('#nome-excluido').text(nome);
    var myModal = new bootstrap.Modal(document.getElementById('modalExcluir'), {       });
    myModal.show();
    $('#mensagem-excluir').text('');
}






$("#form").submit(function () {
	event.preventDefault();
	var formData = new FormData(this);

	$.ajax({
		url: pag + "/inserir.php",
		type: 'POST',
		data: formData,

		success: function (mensagem) {
			$('#mensagem').text('');
			$('#mensagem').removeClass()
			if (mensagem.trim() == "Salvo com Sucesso") {
                    $('#nome').val('');
                    $('#cpf').val('');
                    $('#email').val('');
                    $('#telefone').val('');
                    $('#endereco').val('');

                    $('#btn-fechar').click();
                     window.location="index.php?pag=" + pag;
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






$("#form-excluir").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);
    
    $.ajax({
        url: pag + "/excluir.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem-excluir').text('');
            $('#mensagem-excluir').removeClass()
            if (mensagem.trim() == "Excluído com Sucesso") {
                $('#btn-fechar-excluir').click();
                window.location="index.php?pag=" + pag;
               		
            } else {

                $('#mensagem-excluir').addClass('message_error');
                $('#mensagem-excluir').text(mensagem);
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});




$(document).ready(function() {
	$('#example').DataTable({
		"ordering": false
	});
} );





function carregarImg() {
    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var arquivo = file['name'];
    resultado = arquivo.split(".", 2);

    //console.log(resultado[1]);
    if(resultado[1] === 'pdf'){
        $('#target').attr('src', "../img/pdf.png");
        return;
    }

    var reader = new FileReader();

    reader.onloadend = function () {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);

    } else {
        target.src = "";
    }
}






function carregarImg2() {
    var target = document.getElementById('target-usu');
    var file = document.querySelector("#imagem-usu").files[0];
    var arquivo = file['name'];
    resultado = arquivo.split(".", 2);
        //console.log(resultado[1]);
        if(resultado[1] === 'pdf'){
            $('#target-usu').attr('src', "../img/pdf.png");
            return;
        }

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
}







$("#form-obs").submit(function () {
	event.preventDefault();
	var formData = new FormData(this);

	$.ajax({
		url: pag + "/obs.php",
		type: 'POST',
		data: formData,

		success: function (mensagem) {
			$('#mensagem-obs').text('');
			$('#mensagem-obs').removeClass()
			if (mensagem.trim() == "Salvo com Sucesso") {
                
                    $('#btn-fechar-obs').click();
                     window.location="index.php?pag=" + pag;
                } else {

                	$('#mensagem-obs').addClass('message_error')
                	$('#mensagem-obs').text(mensagem)
                }


            },

            cache: false,
            contentType: false,
            processData: false,
            
        });

});



    