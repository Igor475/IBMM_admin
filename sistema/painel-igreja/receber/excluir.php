<?php
require_once("../../conexao.php");
$pagina = 'receber';
$id = @$_POST['id-excluir'];

$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$descricao_conta = $res[0]['descricao'];

$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

//EXECUTAR NO LOG
$tabela = $pagina;
$acao = 'Exclusão';
$id_reg = $id;
$descricao = $descricao_conta;
$painel = 'Painel Igreja';
$igreja = $res[0]['igreja'];
require_once("../../logs.php");

echo "Excluído com Sucesso";

?>