<?php
require_once('../../conexao.php');
$pagina = 'grupo_acessos';

$id = @$_POST['id'];
$nome = $_POST['nome'];

$query = $pdo->query("SELECT * from $pagina where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Nome já Cadastrado, escolha outro!!';
	exit();
}




if($id == ""){
	$query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome");
}else{
	$query = $pdo->prepare("UPDATE $pagina SET nome = :nome WHERE id = '$id'");
}

$query->bindValue(":nome", "$nome");
$query->execute();

echo 'Salvo com Sucesso';



?>