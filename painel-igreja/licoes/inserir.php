<?php
require_once('../../conexao.php');
$pagina = 'licoes';
@session_start();
$id_usuario = $_SESSION['id_usuario'];
$descricao = $_POST['descricao'];
$nome = $_POST['nome'];
$igreja = @$_POST['igreja'];
$data = $_POST['data'];
$id = @$_POST['id'];


//SCRIPT PARA SUBIR O ARQUIVO NO BANCO
$nome_img = date('d-m-Y H:i:s') . '-' . @$_FILES['imagem']['name'];
$nome_img = preg_replace('/[ :]+/', '-', $nome_img);

$caminho = '../../img/licoes/' . $nome_img;
if (@$_FILES['imagem']['name'] == "") {
    $imagem = "sem-foto.jpg";
} else {
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name'];
$ext = pathinfo($imagem, PATHINFO_EXTENSION);
if ($ext == 'png' or $ext == 'jpg' or $ext == 'JPG' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'pdf'
    or $ext == 'rar' or $ext == 'zip' or $ext == 'docx' or $ext == 'doc') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de Imagem não permitida!';
    exit();
}





//SCRIPT PARA SUBIR O ARQUIVO NO BANCO
$nome_img = date('d-m-Y H:i:s') . '-' . @$_FILES['imglicao']['name'];
$nome_img = preg_replace('/[ :]+/', '-', $nome_img);

$caminho = '../../img/licoes/' . $nome_img;
if (@$_FILES['imglicao']['name'] == "") {
    $imagem_licao = "sem-foto.jpg";
} else {
    $imagem_licao = $nome_img;
}

$imagem_temp = @$_FILES['imglicao']['tmp_name'];
$ext = pathinfo($imagem_licao, PATHINFO_EXTENSION);
if ($ext == 'png' or $ext == 'jpg' or $ext == 'JPG' or $ext == 'jpeg') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de Imagem não permitida!';
    exit();
}



if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, descricao = :descricao, data = '$data',
        usuario = '$id_usuario', arquivo = '$imagem', imagem = '$imagem_licao', igreja = '$igreja'");

} else {
    if ($imagem == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, descricao = :descricao, data = '$data',
        usuario = '$id_usuario' WHERE id = '$id'");
    } else {
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['arquivo'];
        if($foto != "sem-foto.jpg"){
			@unlink('../../img/licoes/'.$foto);	
		}

        $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, descricao = :descricao, data = '$data',
        usuario = '$id_usuario', arquivo = '$imagem' WHERE id = '$id'");
    }

    if($imagem_licao == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, descricao = :descricao, data = '$data',
        usuario = '$id_usuario', arquivo = '$imagem' WHERE id = '$id'");
    } else {
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['imagem'];
        if($foto != "sem-foto.jpg"){
			@unlink('../../img/licoes/'.$foto);	
		}

        $query = $pdo->prepare("UPDATE $pagina SET nome = :nome, descricao = :descricao, data = '$data',
        usuario = '$id_usuario', imagem = '$imagem_licao' WHERE id = '$id'");
    }

}


$query->bindValue(":descricao", "$descricao");
$query->bindValue(":nome", "$nome");
$query->execute();



echo 'Salvo com Sucesso';



?>