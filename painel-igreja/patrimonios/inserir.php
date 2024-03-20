<?php
require_once('../../conexao.php');
$pagina = 'patrimonios';
@session_start();
$id_usuario = $_SESSION['id_usuario'];

$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$valor = str_replace(',', '.', $valor);
$entrada = $_POST['entrada'];
$doador = $_POST['doador'];
$igreja = $_POST['igreja'];
$data_cad = $_POST['data_cad'];

$id = @$_POST['id'];

if($entrada == 'Compra') {
    if($valor == '') {
        echo 'Preencha o Valor!';
        exit();
    }
} else {
    if($doador == '') {
        echo 'Preencha o nome do doador!';
        exit();
    }
}


$query = $pdo->query("SELECT * FROM $pagina WHERE codigo = '$codigo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
$nome_item = @$res[0]['nome'];
if (@count($res) > 0 and $id_reg != $id) {
    echo 'Código do Item já cadastrado no Item '.$nome_item.'!';
    exit();
}


//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = date('d-m-Y H:i:s') . '-' . @$_FILES['imagem']['name'];
$nome_img = preg_replace('/[ :]+/', '-', $nome_img);

$caminho = '../../img/patrimonios/' . $nome_img;
if (@$_FILES['imagem']['name'] == "") {
    $imagem = "sem-foto.jpg";
} else {
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name'];
$ext = pathinfo($imagem, PATHINFO_EXTENSION);
if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de Imagem não permitida!';
    exit();
}




if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET codigo = :codigo, nome = :nome, descricao = :descricao, 
        valor = :valor, usuario_cad = '$id_usuario', data_cad = '$data_cad', igreja_cad = '$igreja', 
        igreja_item = '$igreja', ativo = 'Sim', entrada = '$entrada', doador = :doador,  foto = '$imagem'");

} else {
    if ($imagem == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE $pagina SET codigo = :codigo, nome = :nome, descricao = :descricao, 
        valor = :valor, usuario_cad = '$id_usuario', data_cad = '$data_cad', igreja_cad = '$igreja', 
        igreja_item = '$igreja', ativo = 'Sim', entrada = '$entrada', doador = :doador WHERE id = '$id'");
    } else {
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['foto'];
        if($foto != "sem-foto.jpg"){
			@unlink('../../img/patrimonios/'.$foto);	
		}

        $query = $pdo->prepare("UPDATE $pagina SET codigo = :codigo, nome = :nome, descricao = :descricao, 
            valor = :valor, usuario_cad = '$id_usuario', data_cad = '$data_cad', igreja_cad = '$igreja', 
            igreja_item = '$igreja', ativo = 'Sim', entrada = '$entrada', doador = :doador,  foto = '$imagem'
            WHERE id = '$id'");
    }

}


$query->bindValue(":nome", "$nome");
$query->bindValue(":codigo", "$codigo");
$query->bindValue(":descricao", "$descricao");
$query->bindValue(":valor", "$valor");
$query->bindValue(":doador", "$doador");
$query->execute();

echo 'Salvo com Sucesso';



?>