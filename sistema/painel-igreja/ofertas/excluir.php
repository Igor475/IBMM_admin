<?php
require_once("../../conexao.php");
$pagina = 'ofertas';
$id = @$_POST['id-excluir'];

require_once("../verificar-tesoureiro.php");
$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");
$query = $pdo->query("DELETE FROM movimentacoes WHERE id_mov = '$id' and movimento = 'Oferta'");

echo "Excluído com Sucesso";

?>