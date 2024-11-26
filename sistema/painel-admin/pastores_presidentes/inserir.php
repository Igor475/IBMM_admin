<?php
require_once('../../conexao.php');
$pagina = 'pastores_presidentes';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$id = @$_POST['id'];


$query = $pdo->query("SELECT * FROM $pagina WHERE cpf = '$cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'O CPF já cadastrado no sistema!';
    exit();
}


$query = $pdo->query("SELECT * FROM $pagina WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'O email já está cadastrado no sistema!';
    exit();
}




//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = date('d-m-Y H:i:s') . '-' . @$_FILES['imagem']['name'];
$nome_img = preg_replace('/[ :]+/', '-', $nome_img);

$caminho = '../../img/membros/' . $nome_img;
if (@$_FILES['imagem']['name'] == "") {
    $imagem = "sem-foto.jpg";
} else {
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name'];
$ext = pathinfo($imagem, PATHINFO_EXTENSION);
if ($ext == 'png' or $ext == 'jpg' or $ext == 'JPG' or $ext == 'jpeg' or $ext == 'gif') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de Imagem não permitida!';
    exit();
}




if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, email = :email, 
        cpf = :cpf, telefone = :telefone, endereco = :endereco, foto = '$imagem'");

    $query->bindValue(":nome", "$nome");
    $query->bindValue(":email", "$email");
    $query->bindValue(":cpf", "$cpf");
    $query->bindValue(":telefone", "$telefone");
    $query->bindValue(":endereco", "$endereco");
    $query->execute();
    $ult_id = $pdo->lastInsertId();


    $query = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, 
        cpf = :cpf, senha = '123', nivel = 'Pastor Presidente', id_pessoa = '$ult_id', 
        foto = '$imagem'");

    $query->bindValue(":nome", "$nome");
    $query->bindValue(":email", "$email");
    $query->bindValue(":cpf", "$cpf");
    $query->execute();

} else {
    if ($imagem == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, email = :email, 
        cpf = :cpf, telefone = :telefone, endereco = :endereco WHERE id = '$id'");
    } else {
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['foto'];
        if($foto != "sem-foto.jpg"){
			@unlink('../../img/membros/'.$foto);	
		}

        $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, email = :email, 
        cpf = :cpf, telefone = :telefone, endereco = :endereco, foto = '$imagem' WHERE id = '$id'");
    }


    $query->bindValue(":nome", "$nome");
    $query->bindValue(":email", "$email");
    $query->bindValue(":cpf", "$cpf");
    $query->bindValue(":telefone", "$telefone");
    $query->bindValue(":endereco", "$endereco");
    $query->execute();


    if ($imagem == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, 
            cpf = :cpf WHERE id_pessoa = '$id' 
            and nivel = 'Pastor Presidente'");
    } else {
        $query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, 
            cpf = :cpf, foto = '$imagem' WHERE id_pessoa = '$id' 
            and nivel = 'Pastor Presidente'");
    }

    $query->bindValue(":nome", "$nome");
    $query->bindValue(":email", "$email");
    $query->bindValue(":cpf", "$cpf");
    $query->execute();
}

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