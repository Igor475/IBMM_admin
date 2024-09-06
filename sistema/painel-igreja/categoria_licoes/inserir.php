<?php
require_once('../../conexao.php');
$pagina = 'categoria_licoes';

$nome = $_POST['nome'];
$id = @$_POST['id'];
$igreja = $_POST['igreja'];


$query = $pdo->query("SELECT * FROM $pagina WHERE nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'Esta categoria já está cadastrada!';
    exit();
}



if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, igreja = '$igreja' ");
    $query->bindValue(":nome", "$nome");
    $query->execute();

} else {
    $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, igreja = '$igreja' WHERE id = '$id'");
    $query->bindValue(":nome", "$nome");
    $query->execute();

}

echo 'Salvo com Sucesso';



?>