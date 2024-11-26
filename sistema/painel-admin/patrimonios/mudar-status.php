<?php
require_once("../../conexao.php");
$pagina = 'patrimonios';
$id = @$_POST['id'];
$ativar = @$_POST['ativar'];


$query = $pdo->query("UPDATE $pagina SET ativo = '$ativar' WHERE id = '$id'");

//EXECUTAR NO LOG
$tabela = $pagina;
$acao = 'Edição';
$id_reg = $id;
$descricao = 'Ativo = ' . $ativar;
$painel = 'Painel Administrativo';
$igreja = 0;
require_once("../../logs.php");

echo "Alterado com Sucesso";

?>