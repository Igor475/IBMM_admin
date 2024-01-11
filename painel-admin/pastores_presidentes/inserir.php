<?php
require_once('../../conexao.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$id = @$_POST['id'];


$query = $pdo->query("SELECT * FROM pastores_presidentes WHERE cpf = '$cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id_reg != $id) {
    echo 'O CPF já cadastrado no sistema!';
    exit();
}    


$query = $pdo->query("SELECT * FROM pastores_presidentes WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id_reg != $id) {
    echo 'O email já está cadastrado no sistema!';
    exit();
}   


if($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO pastores_presidentes SET nome = :nome, email = :email, 
        cpf = :cpf, telefone = :telefone, endereco = :endereco");
} else {
    $query = $pdo->prepare("UPDATE pastores_presidentes SET nome = :nome, email = :email, 
    cpf = :cpf, telefone = :telefone, endereco = :endereco WHERE id = '$id'");
}


$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":cpf", "$cpf");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":endereco", "$endereco");
$query->execute();

echo 'Salvo com Sucesso';



?>