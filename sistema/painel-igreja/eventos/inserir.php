<?php
require_once('../../conexao.php');
$pagina = 'eventos';
@session_start();
$id_usuario = $_SESSION['id_usuario'];

$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$descricao1 = $_POST['descricao1'];
$descricao2 = $_POST['descricao2'];
$descricao3 = $_POST['descricao3'];
$data_evento = $_POST['data_evento'];
$video = $_POST['video'];
@$tipo = $_POST['tipo'];
$pregador = $_POST['pregador'];
$hora = $_POST['hora_evento'];
$categoria = $_POST['categoria'];

$id = @$_POST['id'];
$igreja = $_POST['igreja'];

if($tipo == 'Mensagem') {
    if(@$pregador == '') {
        echo 'Por favor, insira o nome do Pregador!';
        exit();
    }
}

$nome_novo = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
        strtr(utf8_decode(trim($titulo)), utf8_decode("/|áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
        "--aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
$url = preg_replace('/[ -]+/' , '-' , $nome_novo);



//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = date('d-m-Y H:i:s') . '-' . @$_FILES['imagem']['name'];
$nome_img = preg_replace('/[ :]+/', '-', $nome_img);

$caminho = '../../img/eventos/' . $nome_img;
if (@$_FILES['imagem']['name'] == "") {
    $imagem = "sem-foto.jpg";
} else {
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name'];
$ext = pathinfo($imagem, PATHINFO_EXTENSION);
if ($ext == 'png' or $ext == 'jpg' or $ext == 'JPG' or $ext == 'jpeg' or $ext == 'gif' or $ext = 'webp') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de Imagem não permitida!';
    exit();
}




//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = date('d-m-Y H:i:s') . '-' . @$_FILES['banner']['name'];
$nome_img = preg_replace('/[ :]+/', '-', $nome_img);

$caminho = '../../img/eventos/' . $nome_img;
if (@$_FILES['banner']['name'] == "") {
    $banner = "sem-foto.jpg";
} else {
    $banner = $nome_img;
}

$imagem_temp = @$_FILES['banner']['tmp_name'];
$ext = pathinfo($banner, PATHINFO_EXTENSION);
if ($ext == 'png' or $ext == 'jpg' or $ext == 'JPG' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'webp') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de imagem para o banner não permitida!';
    exit();
}





//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = date('d-m-Y H:i:s') . '-' . @$_FILES['banner_mobile']['name'];
$nome_img = preg_replace('/[ :]+/', '-', $nome_img);

$caminho = '../../img/eventos/' . $nome_img;
if (@$_FILES['banner_mobile']['name'] == "") {
    $banner_mobile = "sem-foto.jpg";
} else {
    $banner_mobile = $nome_img;
}

$imagem_temp = @$_FILES['banner_mobile']['tmp_name'];
$ext = pathinfo($banner_mobile, PATHINFO_EXTENSION);
if ($ext == 'png' or $ext == 'jpg' or $ext == 'JPG' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'webp') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de imagem para o banner Mobile não permitida!';
    exit();
}




if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET titulo = :titulo, subtitulo = :subtitulo, descricao1 = :descricao1, 
        descricao2 = :descricao2, descricao3 = :descricao3, data_cad = curDate(), data_evento = :data_evento, 
        usuario = '$id_usuario', video = :video, ativo = 'Sim', igreja = '$igreja', imagem = '$imagem', 
        tipo = '$tipo', banner = '$banner', url = '$url', pregador = '$pregador', hora_evento = '$hora', imagem1 = 'sem-foto.jpg',
        imagem2 = 'sem-foto.jpg', imagem3 = 'sem-foto.jpg', imagem4 = 'sem-foto.jpg', img_1 = 'sem-foto.jpg', 
        img_2 = 'sem-foto.jpg', img_3 = 'sem-foto.jpg', img_4 = 'sem-foto.jpg', img_5 = 'sem-foto.jpg', img_6 = 'sem-foto.jpg', 
        categoria = '$categoria'");

    $query->bindValue(":titulo", "$titulo");
    $query->bindValue(":subtitulo", "$subtitulo");
    $query->bindValue(":descricao1", "$descricao1");
    $query->bindValue(":descricao2", "$descricao2");
    $query->bindValue(":descricao3", "$descricao3");
    $query->bindValue(":video", "$video");
    $query->bindValue(":data_evento", "$data_evento");
    $query->execute();

} else {
    if ($imagem == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE $pagina SET titulo = :titulo, subtitulo = :subtitulo, descricao1 = :descricao1, 
        descricao2 = :descricao2, descricao3 = :descricao3, data_cad = curDate(), data_evento = :data_evento, 
        usuario = '$id_usuario', video = :video, ativo = 'Sim', igreja = '$igreja',
        tipo = '$tipo', url = '$url', pregador = '$pregador', hora_evento = '$hora', categoria = '$categoria' WHERE id = '$id'");

        $query->bindValue(":titulo", "$titulo");
        $query->bindValue(":subtitulo", "$subtitulo");
        $query->bindValue(":descricao1", "$descricao1");
        $query->bindValue(":descricao2", "$descricao2");
        $query->bindValue(":descricao3", "$descricao3");
        $query->bindValue(":video", "$video");
        $query->bindValue(":data_evento", "$data_evento");
        $query->execute();

    } else {
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['imagem'];
        if ($foto != "sem-foto.jpg") {
            @unlink('../../img/eventos/' . $foto);
        }

        $query = $pdo->prepare("UPDATE $pagina SET titulo = :titulo, subtitulo = :subtitulo, descricao1 = :descricao1, 
        descricao2 = :descricao2, descricao3 = :descricao3, data_cad = curDate(), data_evento = :data_evento, 
        usuario = '$id_usuario', video = :video, ativo = 'Sim', igreja = '$igreja', imagem = '$imagem', 
        tipo = '$tipo', url = '$url', pregador = '$pregador', hora_evento = '$hora', categoria = '$categoria' WHERE id = '$id'");

        $query->bindValue(":titulo", "$titulo");
        $query->bindValue(":subtitulo", "$subtitulo");
        $query->bindValue(":descricao1", "$descricao1");
        $query->bindValue(":descricao2", "$descricao2");
        $query->bindValue(":descricao3", "$descricao3");
        $query->bindValue(":video", "$video");
        $query->bindValue(":data_evento", "$data_evento");
        $query->execute();
    }


    if ($banner == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE $pagina SET titulo = :titulo, subtitulo = :subtitulo, descricao1 = :descricao1, 
        descricao2 = :descricao2, descricao3 = :descricao3, data_cad = curDate(), data_evento = :data_evento, 
        usuario = '$id_usuario', video = :video, ativo = 'Sim', igreja = '$igreja',
        tipo = '$tipo', url = '$url', pregador = '$pregador', hora_evento = '$hora', categoria = '$categoria'
        WHERE id = '$id'");

        $query->bindValue(":titulo", "$titulo");
        $query->bindValue(":subtitulo", "$subtitulo");
        $query->bindValue(":descricao1", "$descricao1");
        $query->bindValue(":descricao2", "$descricao2");
        $query->bindValue(":descricao3", "$descricao3");
        $query->bindValue(":video", "$video");
        $query->bindValue(":data_evento", "$data_evento");
        $query->execute();

    } else {
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['banner'];
        if ($foto != "sem-foto.jpg") {
            @unlink('../../img/eventos/' . $foto);
        }

        $query = $pdo->prepare("UPDATE $pagina SET titulo = :titulo, subtitulo = :subtitulo, descricao1 = :descricao1, 
        descricao2 = :descricao2, descricao3 = :descricao3, data_cad = curDate(), data_evento = :data_evento, 
        usuario = '$id_usuario', video = :video, ativo = 'Sim', igreja = '$igreja', banner = '$banner', 
        tipo = '$tipo', url = '$url', pregador = '$pregador', hora_evento = '$hora', categoria = '$categoria'
        WHERE id = '$id'");

        $query->bindValue(":titulo", "$titulo");
        $query->bindValue(":subtitulo", "$subtitulo");
        $query->bindValue(":descricao1", "$descricao1");
        $query->bindValue(":descricao2", "$descricao2");
        $query->bindValue(":descricao3", "$descricao3");
        $query->bindValue(":video", "$video");
        $query->bindValue(":data_evento", "$data_evento");
        $query->execute();
    }



    if ($banner_mobile == "sem-foto.jpg") {
        $query = $pdo->prepare("UPDATE $pagina SET titulo = :titulo, subtitulo = :subtitulo, descricao1 = :descricao1, 
        descricao2 = :descricao2, descricao3 = :descricao3, data_cad = curDate(), data_evento = :data_evento, 
        usuario = '$id_usuario', video = :video, ativo = 'Sim', igreja = '$igreja',
        tipo = '$tipo', url = '$url', pregador = '$pregador', hora_evento = '$hora', categoria = '$categoria'
        WHERE id = '$id'");

        $query->bindValue(":titulo", "$titulo");
        $query->bindValue(":subtitulo", "$subtitulo");
        $query->bindValue(":descricao1", "$descricao1");
        $query->bindValue(":descricao2", "$descricao2");
        $query->bindValue(":descricao3", "$descricao3");
        $query->bindValue(":video", "$video");
        $query->bindValue(":data_evento", "$data_evento");
        $query->execute();

    } else {
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['banner'];
        if ($foto != "sem-foto.jpg") {
            @unlink('../../img/eventos/' . $foto);
        }

        $query = $pdo->prepare("UPDATE $pagina SET titulo = :titulo, subtitulo = :subtitulo, descricao1 = :descricao1, 
        descricao2 = :descricao2, descricao3 = :descricao3, data_cad = curDate(), data_evento = :data_evento, 
        usuario = '$id_usuario', video = :video, ativo = 'Sim', igreja = '$igreja', banner_mobile = '$banner_mobile', 
        tipo = '$tipo', url = '$url', pregador = '$pregador', hora_evento = '$hora', categoria = '$categoria'
        WHERE id = '$id'");

        $query->bindValue(":titulo", "$titulo");
        $query->bindValue(":subtitulo", "$subtitulo");
        $query->bindValue(":descricao1", "$descricao1");
        $query->bindValue(":descricao2", "$descricao2");
        $query->bindValue(":descricao3", "$descricao3");
        $query->bindValue(":video", "$video");
        $query->bindValue(":data_evento", "$data_evento");
        $query->execute();
    }

}




echo 'Salvo com Sucesso';



?>