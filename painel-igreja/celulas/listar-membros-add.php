<?php
require_once ('../../conexao.php');

$celula = @$_POST['celula'];
$igreja = @$_POST['igreja'];

$query = $pdo->query("SELECT * FROM celulas_membros WHERE igreja = '$igreja' and celula = '$celula'
    order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
if ($total_reg > 0) {
    for ($i = 0; $i < $total_reg; $i++) {
        foreach ($res[$i] as $key => $value) {}

        $id = $res[$i]['id'];
        $membro = $res[$i]['membro'];
        $data = $res[$i]['data'];
        $dataF = implode('/', array_reverse(explode('-', $data)));
        $query_con = $pdo->query("SELECT * FROM membros where id = '$membro'");
        $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
        if (count($res_con) > 0) {
            $nome_membro = $res_con[0]['nome'];
        }

        echo '<ul class="members_cel">';
            echo '<li>'
                    .$nome_membro.' - Membro Desde: '.$dataF.
                    '<a href="#" onclick="excluirMembro('.$id.')" title="Excluir Membro">
                        <i class="bi bi-x ex_member_cell"></i>
                    </a>
                  </li>';
        echo '</ul>';

    }
}

?>