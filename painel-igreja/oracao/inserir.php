<?php
require_once('../../conexao.php');
$pagina = 'oracao';
@session_start();
$id_usuario = $_SESSION['id_usuario'];

$data_atual = date('Y-m-d');
$hora_atual = date('H:i:s');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$descricao = $_POST['descricao'];
$motivo_oracao = $_POST['motivo_oracao'];
$data = $data_atual;
$hora = $hora_atual;
$igreja = $_POST['igreja'];
$id = @$_POST['id'];

if(isset($nome) && empty($nome)) {
    echo 'Por favor, preencha o nome!';
    exit();
} elseif(isset($email) && empty($email)) {
    echo 'Por favor, preencha o email!';
    exit();
} elseif(isset($telefone) && empty($telefone)) {
    echo 'Por favor, preencha o telefone!';
    exit();
}


if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, email = :email,  telefone = :telefone,
    descricao = :descricao, motivo_oracao = '$motivo_oracao', data = '$data', hora = '$hora', status = 'Aguardando', 
    igreja = '$igreja'");

} else {
    $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, email = :email,  telefone = :telefone,
    descricao = :descricao, motivo_oracao = '$motivo_oracao',
    usuario = '$id_usuario' WHERE id = '$id'");

}

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":descricao", "$descricao");
$query->execute();

echo 'Salvo com Sucesso';



?>