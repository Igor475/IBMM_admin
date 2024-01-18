<?php
require_once("../conexao.php");
$nome = $_POST['nome_igr'];
$telefone = $_POST['tel_igr'];
$endereco = $_POST['end_igr'];
$email = $_POST['email_igr'];


$query = $pdo->prepare("UPDATE config SET nome = :nome, endereco = :endereco, 
    telefone = :telefone, email = :email");
$query->bindValue(":nome", "$nome");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":email", "$email");
$query->execute();

echo 'Salvo com Sucesso';

?>