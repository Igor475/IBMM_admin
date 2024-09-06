<?php
require_once("../../conexao.php");
$pagina = 'receber';
$id = @$_POST['id-excluir'];

$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

echo "Excluído com Sucesso";

?>