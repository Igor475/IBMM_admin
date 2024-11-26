<?php
require_once("../../conexao.php");
$pagina = 'categoria_oracao';
$id = @$_POST['id-excluir'];

$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome = $res[0]['nome'];

$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

//EXECUTAR NO LOG
$tabela = $pagina;
$acao = 'Exclusão';
$id_reg = $id;
$descricao = $nome;
$painel = 'Painel Administrativo';
$igreja = 0;
require_once("../../logs.php");

echo "Excluído com Sucesso";

?>