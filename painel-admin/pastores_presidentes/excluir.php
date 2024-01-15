<?php
require_once("../../conexao.php");
$id = @$_POST['id-excluir'];

//excluir a imagem
$query = $pdo->query("SELECT * FROM pastores_presidentes where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['foto'];
if($foto != "sem-foto.jpg"){
	@unlink('../../img/membros/'.$foto);	
}

$query = $pdo->query("DELETE FROM pastores_presidentes WHERE id = '$id'");
$query = $pdo->query("DELETE FROM usuarios WHERE id_pessoa = '$id' 
    and nivel = 'Pastor Presidente'");

echo "Excluído com Sucesso";

?>