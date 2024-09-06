<?php
require_once ('../../conexao.php');

$celula = @$_POST['celula'];
$igreja = @$_POST['igreja'];

echo '<label>Lista de Membros</label>';
echo '<select class="sel22" name="membro">';

$query = $pdo->query("SELECT * FROM membros WHERE igreja = '$igreja' and ativo = 'Sim' order by nome asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
if ($total_reg > 0) {
    for ($i = 0; $i < $total_reg; $i++) {
        foreach ($res[$i] as $key => $value) {
        }

        $nome_reg = $res[$i]['nome'];
        $id_reg = $res[$i]['id'];

        $query2 = $pdo->query("SELECT * FROM celulas_membros WHERE igreja = '$igreja' and membro = '$id_reg' and 
                celula = '$celula'");
        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
        if (@count($res2) == 0) {
            echo '<option value="'.$id_reg.'">'.$nome_reg.'</option>';
        }
    }
}

echo '</select>';

?>

<script>
    $(document).ready(function () {
        $('.sel22').select2({
            placeholder: 'Selecione um Membro',
            dropdownParent: $('#modalAddMembros'),
        });
    });
</script>