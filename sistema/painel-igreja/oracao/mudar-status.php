<?php
require_once("../../conexao.php");
$pagina = 'oracao';
@session_start();
$id_usuario = $_SESSION['id_usuario'];

$id = @$_POST['id'];
$ativar = @$_POST['ativar'];


$query = $pdo->query("UPDATE $pagina SET status = '$ativar', usuario = '$id_usuario' WHERE id = '$id'");

echo "Alterado com Sucesso";

?>