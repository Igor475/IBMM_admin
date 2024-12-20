<?php
require_once('../../conexao.php');
$pagina = 'membros';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$data_nasc = $_POST['data_nasc'];
$igreja = $_POST['igreja'];
$data_bat = $_POST['data_bat'];
@$cargo = $_POST['cargo'];
$id = @$_POST['id'];

if (empty($nome)) {
    echo 'Por favor insira o seu nome!';
    exit();
} 

if (empty($cpf)) {
    echo 'Por favor insira o seu CPF!';
    exit();
}

if (empty($email)) {
    echo 'Por favor insira o seu Email!';
    exit();
}

if (empty($telefone)) {
    echo 'Por favor insira o seu Telefone!';
    exit();
}

if (empty($data_nasc)) {
    echo 'Por favor insira a sua Data de Nascimento!';
    exit();
}

if (empty($igreja)) {
    echo 'Por favor escolha a igreja!';
    exit();
}

if (isset($_POST['cargo']) && $_POST['cargo'] != "") {
    $cargo = $_POST['cargo'];
} else {
    $cargo = 1;
}


$query = $pdo->query("SELECT * FROM $pagina WHERE cpf = '$cpf'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'O CPF já cadastrado no sistema, nessa ou em outra filial!';
    exit();
}


$query = $pdo->query("SELECT * FROM $pagina WHERE email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'O email já está cadastrado no sistema, nessa ou em outra filial!';
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
if ($ext == 'jpg' or $ext == 'jpeg') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de Imagem não permitida, somente JPG ou JPEG!';
    exit();
}




if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, email = :email, 
        cpf = :cpf, telefone = :telefone, endereco = :endereco, foto = '$imagem', 
        data_nasc = '$data_nasc', data_cad = curDate(), igreja = '$igreja', 
        data_batismo = '$data_bat', cargo = '$cargo', ativo = 'Sim'");

    $query->bindValue(":nome", "$nome");
    $query->bindValue(":email", "$email");
    $query->bindValue(":cpf", "$cpf");
    $query->bindValue(":telefone", "$telefone");
    $query->bindValue(":endereco", "$endereco");
    $query->execute();
    $ult_id = $pdo->lastInsertId();


    $query = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, 
        cpf = :cpf, senha = '123', nivel = 'membro', id_pessoa = '$ult_id', foto = '$imagem', 
        igreja = '$igreja'");

    $query->bindValue(":nome", "$nome");
    $query->bindValue(":email", "$email");
    $query->bindValue(":cpf", "$cpf");
    $query->execute();

} else {
    if ($imagem == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, email = :email, 
        cpf = :cpf, telefone = :telefone, endereco = :endereco, data_nasc = '$data_nasc',
        igreja = '$igreja', data_batismo = '$data_bat', cargo = '$cargo' WHERE id = '$id'");
    } else {
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['foto'];
        if ($foto != "sem-foto.jpg") {
            @unlink('../../img/membros/' . $foto);
        }

        $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, email = :email, 
        cpf = :cpf, telefone = :telefone, endereco = :endereco, foto = '$imagem', 
        data_nasc = '$data_nasc', igreja = '$igreja', data_batismo = '$data_bat',
        cargo = '$cargo' WHERE id = '$id'");
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
            and nivel = 'membro'");
    } else {
        $query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, 
            cpf = :cpf, foto = '$imagem' WHERE id_pessoa = '$id' 
            and nivel = 'membro'");
    }

    $query->bindValue(":nome", "$nome");
    $query->bindValue(":email", "$email");
    $query->bindValue(":cpf", "$cpf");
    $query->execute();

}

echo 'Salvo com Sucesso';
