<?php
require_once('../../conexao.php');
$pagina = 'visitantes';

$nome = $_POST['nome'];
$desejo = $_POST['desejo'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$igreja = $_POST['igreja'];
$id = @$_POST['id'];


$query = $pdo->query("SELECT * FROM $pagina where email = '$email' and igreja = '$igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'O Email já está Cadastrado!';
    exit();
}



if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, telefone = :telefone, endereco = :endereco, 
        email = :email, desejo = :desejo, data = curDate(), igreja = '$igreja'");

} else {
    $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, telefone = :telefone, endereco = :endereco, 
        email = :email, desejo = :desejo where id = '$id'");
}

$query->bindValue(":desejo", "$desejo");
$query->bindValue(":nome", "$nome");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":email", "$email");
$query->execute();


echo 'Salvo com Sucesso';



?>