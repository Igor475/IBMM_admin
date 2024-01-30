<?php
require_once("../conexao.php");
$nome = $_POST['nome_igr'];
$telefone = $_POST['tel_igr'];
$endereco = $_POST['end_igr'];
$email = $_POST['email_igr'];
$qtd_tar = $_POST['qtd_tar_igr'];
$limitar_tesoureiro = $_POST['limitar_tesoureiro'];


$query = $pdo->prepare("UPDATE config SET nome = :nome, endereco = :endereco, 
    telefone = :telefone, email = :email, qtd_tarefas = '$qtd_tar', 
    limitar_tesoureiro = '$limitar_tesoureiro'");
$query->bindValue(":nome", "$nome");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":email", "$email");
$query->execute();

echo 'Salvo com Sucesso';

?>