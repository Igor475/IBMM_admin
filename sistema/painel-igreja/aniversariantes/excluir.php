<?php
require_once("../../conexao.php");
$pagina = 'membros';
$id = @$_POST['id-excluir'];

//excluir a imagem
$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['foto'];
if($foto != "sem-foto.jpg"){
	@unlink('../../img/membros/'.$foto);	
}

$query = $pdo->query("SELECT * FROM usuarios where id_pessoa = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['foto'];
if($foto != "sem-foto.jpg"){
	@unlink('../../img/membros/'.$foto);	
}


$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");
$query = $pdo->query("DELETE FROM usuarios WHERE id_pessoa = '$id'");

echo "Excluído com Sucesso";

?>