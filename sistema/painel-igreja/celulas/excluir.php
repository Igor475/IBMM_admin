<?php
require_once("../../conexao.php");
$pagina = 'celulas';
$id = @$_POST['id-excluir'];

$query = $pdo->query("DELETE FROM celulas_membros WHERE celula = '$id'");
$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

echo "Excluído com Sucesso";

?>