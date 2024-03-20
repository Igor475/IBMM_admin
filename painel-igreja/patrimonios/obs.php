<?php
require_once('../../conexao.php');
$pagina = 'patrimonios';
$obs = $_POST['obs'];
$id = @$_POST['id-obs'];

$query = $pdo->prepare("UPDATE $pagina SET obs = :obs WHERE id = '$id'");
$query->bindValue(":obs", "$obs");
$query->execute();

echo 'Salvo com Sucesso';

?>