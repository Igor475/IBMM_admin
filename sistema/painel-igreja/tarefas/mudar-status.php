<?php
require_once("../../conexao.php");
$pagina = 'tarefas';
$id = @$_POST['id'];
$ativar = @$_POST['ativar'];


$query = $pdo->query("UPDATE $pagina SET status = '$ativar' WHERE id = '$id'");

echo "Alterado com Sucesso";

?>