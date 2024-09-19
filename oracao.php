<?php
require_once("cabecalho.php");

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
    <style>
        #form_prayer {
            margin-top: 20%;
        }
    </style>
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

        <input type="hidden" value="<?php echo $id_igreja ?>" name="igreja">

        <div id="mensagem"></div>

        <input type="submit">

    </form>

</body>

</html>