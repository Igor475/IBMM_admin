<?php
require_once("../../conexao.php");
$pagina = 'grupo_acessos';
$id = @$_POST['id-excluir'];

$query2 = $pdo->query("SELECT * FROM acessos where grupo = '$id'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_reg2 = @count($res2);
if($total_reg2 > 0){
	echo 'Não é possível excluir o registro, pois existem acessos relacionados a ele primeiro exclua os acessos e depois exclua esse grupo!';
	exit();
}

$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

echo "Excluído com Sucesso";

?>