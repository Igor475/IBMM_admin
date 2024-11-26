<?php
require_once('../../conexao.php');
$pagina = 'patrimonios';
$obs = $_POST['obs'];
$id = @$_POST['id-obs'];

$query = $pdo->prepare("UPDATE $pagina SET obs = :obs WHERE id = '$id'");
$query->bindValue(":obs", "$obs");
$query->execute();

//EXECUTAR NO LOG
$tabela = $pagina;
$acao = 'Edição';
$id_reg = $id;
$descricao = 'Lançou Observações';
$painel = 'Painel Administrativo';
$igreja = 0;
require_once("../../logs.php");

echo 'Salvo com Sucesso';

?>