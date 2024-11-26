<?php
require_once('../../conexao.php');
$pagina = 'acessos';

$id = $_POST['id'];
$nome = $_POST['nome'];
$chave = $_POST['chave'];
$grupo = $_POST['grupo'];


//validar nome
$query = $pdo->query("SELECT * from $pagina where nome = '$nome' and grupo = '$grupo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Nome já Cadastrado, escolha outro!!';
	exit();
}


//validar nome
$query = $pdo->query("SELECT * from $pagina where chave = '$chave' and grupo = '$grupo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Chave já Cadastrada, escolha outra!!';
	exit();
}



if($id == ""){
	$query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, grupo = '$grupo', chave = :chave");
}else{
	$query = $pdo->prepare("UPDATE $pagina SET nome = :nome, grupo = '$grupo', chave = :chave WHERE id = '$id'");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":chave", "$chave");
$query->execute();
$ult_id = $pdo->lastInsertId();

//EXECUTAR NO LOG
$tabela = $pagina;

if ($id == "" || $id == 0) {
	$acao = 'Inserção';
	$id_reg = $ult_id;
} else {
	$acao = 'Edição';
	$id_reg = $id;
}
$descricao = $nome;
$painel = 'Painel Administrativo';
$igreja = 0;
require_once("../../logs.php");

echo 'Salvo com Sucesso';



?>