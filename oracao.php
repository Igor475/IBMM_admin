<?php
require_once("conexao.php");
session_start();

$id_igreja = @$_SESSION['id_igreja'];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Oração</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <form method="POST" id="form_prayer">
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome"><br>
        <label for="">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="">Telefone</label>
        <input type="text" name="telefone" id="telefone"><br>
        <label for="">Motivo de Oração</label>
        <select class="sel2" id="motivo_oracao" name="motivo_oracao">
            <?php
            $query = $pdo->query("SELECT * FROM categoria_oracao order by id asc");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $total_reg = count($res);
            if ($total_reg > 0) {
                for ($i = 0; $i < $total_reg; $i++) {
                    foreach ($res[$i] as $key => $value) {
                    }

                    $nome_reg = $res[$i]['nome'];
                    $id_reg = $res[$i]['id'];
                    ?>
                    <option value="<?php echo $id_reg ?>">
                        <?php echo $nome_reg ?>
                    </option>
                <?php }
            } ?>
        </select><br>
        <label for="">Descrição</label>
        <input type="text" name="descricao" id="descricao">

        <div id="mensagem"></div>

        <input type="hidden" name="id" id="id">
        <input type="hidden" name="igreja" id="igreja" value="<?php echo $id_igreja ?>">

        <input type="submit">

    </form>

    <script type="text/javascript">
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
                        }, 2500);

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
                timer: 3000,
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
    </script>
</body>

</html>