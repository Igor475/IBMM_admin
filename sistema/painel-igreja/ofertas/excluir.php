<?php
require_once("../../conexao.php");
$pagina = 'ofertas';
$id = @$_POST['id-excluir'];

$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$membro = $res[0]['membro'];

require_once("../verificar-tesoureiro.php");
$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");
$query = $pdo->query("DELETE FROM movimentacoes WHERE id_mov = '$id' and movimento = 'Oferta'");

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