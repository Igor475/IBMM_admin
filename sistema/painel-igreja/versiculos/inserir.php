<?php
require_once('../../conexao.php');
$pagina = 'versiculos';

$versiculo = $_POST['versiculo'];
$capitulo = $_POST['capitulo'];
$igreja = $_POST['igreja'];
$id = @$_POST['id'];


$query = $pdo->query("SELECT * FROM $pagina WHERE capitulo = '$capitulo' and igreja = '$igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'Este versículo já está cadastrado!';
    exit();
}



if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET versiculo = :versiculo, capitulo = :capitulo,
        igreja = '$igreja'");

} else {
    $query = $pdo->prepare("UPDATE $pagina SET versiculo = :versiculo, capitulo = :capitulo
         WHERE id = '$id'");

}

$query->bindValue(":versiculo", "$versiculo");
$query->bindValue(":capitulo", "$capitulo");
$query->execute();
echo 'Salvo com Sucesso';



?>