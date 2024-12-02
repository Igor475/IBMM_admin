<?php
require_once("../../conexao.php");
$pagina = 'ministerios';
$id = @$_POST['id-excluir'];

$query = $pdo->query("DELETE FROM ministerios_membros WHERE ministerio = '$id'");
$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

echo "Excluído com Sucesso";

?>