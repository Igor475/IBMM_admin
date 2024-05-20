<?php
require_once("../../conexao.php");
$pagina = 'acessos';
$id = @$_POST['id-excluir'];

$pdo->query("DELETE from $pagina where id = '$id'");
echo 'Excluído com Sucesso';

?>