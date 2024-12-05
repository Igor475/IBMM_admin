<?php
require_once("../../conexao.php");
$pagina = 'fechamentos';
$id = @$_POST['id-excluir'];

require_once("../verificar-tesoureiro.php");
$query = $pdo->query("DELETE FROM $pagina where id = '$id'");
$query = $pdo->query("DELETE FROM movimentacoes where id_mov = '$id' and movimento = 'Saldo'");

echo 'Excluído com Sucesso';
?>