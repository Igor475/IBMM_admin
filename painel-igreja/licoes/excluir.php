<?php
require_once("../../conexao.php");
$pagina = 'licoes';
$id = @$_POST['id-excluir'];

//excluir a imagem
$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['arquivo'];
if($foto != "sem-foto.jpg"){
	@unlink('../../img/licoes/'.$foto);	
} 

$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['imagem'];
if($foto != "sem-foto.jpg"){
	@unlink('../../img/licoes/'.$foto);	
} 


$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

echo "Excluído com Sucesso";

?>