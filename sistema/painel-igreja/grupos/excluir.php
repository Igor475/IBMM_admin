<?php
require_once("../../conexao.php");
$pagina = 'grupos';
$id = @$_POST['id-excluir'];

$query = $pdo->query("DELETE FROM grupos_membros WHERE grupo = '$id'");
$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

echo "Excluído com Sucesso";

?>