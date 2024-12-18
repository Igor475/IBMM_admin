<?php
require_once('../../conexao.php');
$pagina = 'doacoes';
@session_start();
$id_usuario = $_SESSION['id_usuario'];

$valor = $_POST['valor'];
$membro = $_POST['membro'];
$data = $_POST['data'];
$igreja = $_POST['igreja'];
$id = @$_POST['id'];


$query_con = $pdo->query("SELECT * FROM membros where id = '$membro'");
$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
if (count($res_con) > 0) {
    $nome_membro = $res_con[0]['nome'];
} else {
    $nome_membro = 'Membro Não Informado!';
}


if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET membro = '$membro', valor = :valor, data = '$data',
    usuario = '$id_usuario', igreja = '$igreja'");

    $query->bindValue(":valor", "$valor");
    $query->execute();
    $ult_id = $pdo->lastInsertId();

    //INSERINDO NAS MOVIMENTAÇÕES
    $pdo->query("INSERT INTO movimentacoes SET tipo = 'Entrada', movimento = 'Doação', 
        descricao = '$nome_membro', valor = '$valor', data = '$data', usuario = '$id_usuario',
        id_mov = '$ult_id', igreja = '$igreja'");

} else {
    require_once("../verificar-tesoureiro.php");
    $query = $pdo->prepare("UPDATE $pagina SET membro = '$membro', valor = :valor, data = '$data',
    usuario = '$id_usuario', igreja = '$igreja' WHERE id = '$id'");

    //INSERINDO NAS MOVIMENTAÇÕES
    $pdo->query("UPDATE movimentacoes SET descricao = '$nome_membro', valor = '$valor', 
        data = '$data', usuario = '$id_usuario' WHERE id_mov = '$id' and movimento = 'Doação'");

    $query->bindValue(":valor", "$valor");
    $query->execute();

}


echo 'Salvo com Sucesso';



?>