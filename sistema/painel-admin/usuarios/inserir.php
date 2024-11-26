<?php
require_once('../../conexao.php');
$pagina = 'usuarios';

$senha = $_POST['senha'];
$id = @$_POST['id'];

$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome = $res[0]['nome'];

$query = $pdo->prepare("UPDATE $pagina SET senha = :senha WHERE id = '$id'");
$query->bindValue(":senha", "$senha");
$query->execute();
$ult_id = $pdo->lastInsertId();

//EXECUTAR NO LOG
$tabela = $pagina;
$acao = 'Edição';
$id_reg = $id;
$descricao = $nome;
$painel = 'Painel Administrativo';
$igreja = 0;
require_once("../../logs.php");

echo 'Salvo com Sucesso';




?>