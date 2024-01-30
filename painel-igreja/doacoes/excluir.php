<?php
require_once("../../conexao.php");
$pagina = 'doacoes';
$id = @$_POST['id-excluir'];

require_once("../verificar-tesoureiro.php");
$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");
$query = $pdo->query("DELETE FROM movimentacoes WHERE id_mov = '$id' and movimento = 'Doação'");

echo "Excluído com Sucesso";

?>