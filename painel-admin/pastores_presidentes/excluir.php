<?php
require_once("../../conexao.php");
$id = @$_POST['id-excluir'];

$query = $pdo->query("DELETE FROM pastores_presidentes WHERE id = '$id'");

echo "Excluído com Sucesso";

?>