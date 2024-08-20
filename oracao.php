<?php
require_once("conexao.php");

$data_atual = date('Y-m-d');
$hora_atual = date('H:i:s');

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Oração</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <form method="POST" id="form_prayer">
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome"><br>
        <label for="">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="">Telefone</label>
        <input type="text" name="telefone" id="telefone"><br>
        <label for="">Motivo Oração</label>
        <input type="text" name="motivo_oracao" id="motivo_oracao"><br>
        <label for="">Descrição</label>
        <input type="text" name="descricao" id="descricao">

        <div id="mensagem"></div>

        <input type="hidden" name="id" id="id">
        <input type="hidden" name="igreja" id="igreja" value="<?php echo $id_igreja ?>">
        <input type="hidden" name="data" value="<?php echo $data_atual ?>">
        <input type="hidden" name="hora" value="<?php echo $hora_atual ?>">

        <input type="submit">

    </form>

    <script type="text/javascript">
        document.getElementById('form_prayer').addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio padrão do formulário

            const formData = new FormData(this);

            fetch('http://localhost/IBMM_admin/painel-igreja/oracao/inserir.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('mensagem').innerText = data;
            })
            .catch(error => {
                document.getElementById('mensagem').innerText = 'Erro ao enviar dados.';
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>

