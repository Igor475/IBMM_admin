<?php
require_once('../../conexao.php');
$pagina = 'oracao';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$descricao = $_POST['descricao'];
$motivo_oracao = $_POST['motivo_oracao'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$igreja = $_POST['igreja'];
$id = @$_POST['id'];


$query = $pdo->query("SELECT * FROM $pagina WHERE nome = '$nome' and igreja = '$igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'Este nome Já está cadastrado no sistema!';
    exit();
}


$query = $pdo->query("SELECT * FROM $pagina WHERE email = '$email' and igreja = '$igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'Este email Já está cadastrado no sistema!';
    exit();
}



if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, email = :email,  telefone = :telefone,
    descricao = :descricao, motivo_oracao = '$motivo_oracao', data = '$data', hora = '$hora', 
    igreja = '$igreja'");

} else {
    $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, email = :email,  telefone = :telefone,
    descricao = :descricao, motivo_oracao = '$motivo_oracao', data = '$data', hora = '$hora' WHERE id = '$id'");

}

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":descricao", "$descricao");
$query->execute();

echo 'Salvo com Sucesso';



?>