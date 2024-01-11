<?php
require_once("../conexao.php");
$nome = $_POST['nome_usu'];
$cpf = $_POST['cpf_usu'];
$senha = $_POST['senha_usu'];
$email = $_POST['email_usu'];
$id = $_POST['id_usu'];

$query = $pdo->query("SELECT * FROM usuarios WHERE id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$cpf_antigo = $res[0]['cpf'];
$email_antigo = $res[0]['email'];
$nivel_usu = $res[0]['nivel'];
$id_pessoa = $res[0]['id_pessoa'];

if($cpf_antigo != $cpf) {
	$query = $pdo->query("SELECT * FROM usuarios WHERE cpf = '$cpf'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if(@count($res) > 0) {
		echo 'Este CPF já está cadastrado no sistema!';
		exit();
	}
}

if($email_antigo != $email) {
	$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if(@count($res) > 0) {
		echo 'Este Email já está cadastrado no sistema!';
		exit();
	}
}

$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, 
    cpf = :cpf, senha = :senha WHERE id = '$id'");

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":cpf", "$cpf");
$query->bindValue(":senha", "$senha");


if($nivel_usu == 'Pastor Presidente') {
    $query2 = $pdo->prepare("UPDATE pastores_presidentes SET nome = :nome, email = :email, 
    cpf = :cpf WHERE id = '$id_pessoa'");
}

$query2->bindValue(":nome", "$nome");
$query2->bindValue(":email", "$email");
$query2->bindValue(":cpf", "$cpf");
$query2->execute();

if($query2->rowCount() > 0) {
	$query->execute();
	echo 'Salvo com Sucesso';	
} else {
	echo "Deu erro, não foi possível atualizar o resgistro, tente novamente!";
}

?>