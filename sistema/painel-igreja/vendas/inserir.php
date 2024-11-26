<?php
require_once('../../conexao.php');
$pagina = 'vendas';
@session_start();
$id_usuario = $_SESSION['id_usuario'];

$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$igreja = $_POST['igreja'];
$id = @$_POST['id'];


if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET descricao = '$descricao', valor = :valor, data = '$data',
    usuario = '$id_usuario', igreja = '$igreja'");

    $query->bindValue(":valor", "$valor");
    $query->execute();
    $ult_id = $pdo->lastInsertId();

    //INSERINDO NAS MOVIMENTAÇÕES
    $pdo->query("INSERT INTO movimentacoes SET tipo = 'Entrada', movimento = 'Venda', 
        descricao = '$descricao', valor = '$valor', data = '$data', usuario = '$id_usuario',
        id_mov = '$ult_id', igreja = '$igreja'");

} else {
    require_once("../verificar-tesoureiro.php");
    $query = $pdo->prepare("UPDATE $pagina SET descricao = '$descricao', valor = :valor, data = '$data',
    usuario = '$id_usuario', igreja = '$igreja' WHERE id = '$id'");

    //INSERINDO NAS MOVIMENTAÇÕES
    $pdo->query("UPDATE movimentacoes SET descricao = '$descricao', valor = '$valor', 
        data = '$data', usuario = '$id_usuario' WHERE id_mov = '$id' and movimento = 'Venda'");

    $query->bindValue(":valor", "$valor");
    $query->execute();

}

//EXECUTAR NO LOG
$tabela = $pagina;

if ($id == "" || $id == 0) {
    $acao = 'Inserção';
    $id_reg = $ult_id;
} else {
    $acao = 'Edição';
    $id_reg = $id;
}
$descricao_conta = $descricao;
$painel = 'Painel Igreja';
$igreja = $res[0]['igreja'];
require_once("../../logs.php");

echo 'Salvo com Sucesso';



?>