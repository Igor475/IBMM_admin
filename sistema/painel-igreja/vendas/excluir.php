<?php
require_once("../../conexao.php");
$pagina = 'vendas';
$id = @$_POST['id-excluir'];

$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$descricao_conta = $res[0]['descricao'];

require_once("../verificar-tesoureiro.php");
$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");
$query = $pdo->query("DELETE FROM movimentacoes WHERE id_mov = '$id' and movimento = 'Venda'");

//EXECUTAR NO LOG
$tabela = $pagina;
$acao = 'Exclusão';
$id_reg = $id;
$descricao = $membro;
$painel = 'Painel Igreja';
$igreja = $res[0]['igreja'];
require_once("../../logs.php");

echo "Excluído com Sucesso";

?>