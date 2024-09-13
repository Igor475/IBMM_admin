<?php
require_once("../../conexao.php");
$pagina = 'eventos';

$id = @$_POST['id-convidado'];
$convidado1 = @$_POST['convidado1'];
$convidado2 = @$_POST['convidado2'];
$convidado3 = @$_POST['convidado3'];
$convidado4 = @$_POST['convidado4'];
$descr_conv1 = $_POST['descr_conv1'];
$descr_conv2 = $_POST['descr_conv2'];
$descr_conv3 = $_POST['descr_conv3'];
$descr_conv4 = $_POST['descr_conv4'];



//SCRIPT PARA SUBIR FOTO NO BANCO LOGO JPG
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['imagem1']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/' .$nome_img;
if (@$_FILES['imagem1']['name'] == ""){
	$imagem1 = "sem-foto.jpg";
}else{
	$imagem1 = $nome_img;
}

$imagem_temp = @$_FILES['imagem1']['tmp_name']; 
$ext = pathinfo($imagem1, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Logo!. Somente JPG para os Relatórios';
	exit();
}





//SCRIPT PARA SUBIR FOTO NO BANCO LOGO JPG
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['imagem2']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/' .$nome_img;
if (@$_FILES['imagem2']['name'] == ""){
	$imagem2 = "sem-foto.jpg";
}else{
	$imagem2 = $nome_img;
}

$imagem_temp = @$_FILES['imagem2']['tmp_name']; 
$ext = pathinfo($imagem2, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Logo!. Somente JPG para os Relatórios';
	exit();
}





//SCRIPT PARA SUBIR FOTO NO BANCO LOGO JPG
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['imagem3']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/' .$nome_img;
if (@$_FILES['imagem3']['name'] == ""){
	$imagem3 = "sem-foto.jpg";
}else{
	$imagem3 = $nome_img;
}

$imagem_temp = @$_FILES['imagem3']['tmp_name']; 
$ext = pathinfo($imagem3, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Logo!. Somente JPG para os Relatórios';
	exit();
}





//SCRIPT PARA SUBIR FOTO NO BANCO LOGO JPG
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['imagem4']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/' .$nome_img;
if (@$_FILES['imagem4']['name'] == ""){
	$imagem4 = "sem-foto.jpg";
}else{
	$imagem4 = $nome_img;
}

$imagem_temp = @$_FILES['imagem4']['tmp_name']; 
$ext = pathinfo($imagem4, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png' or $ext == 'webp'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Logo!. Somente JPG para os Relatórios';
	exit();
}







if ($id == "" || $id == 0) {
    $query = $pdo->prepare("INSERT INTO $pagina SET convidado1 = :convidado1, convidado2 = :convidado2, 
        convidado3 = :convidado3, convidado4 = :convidado4, descr_conv1 = :descr_conv1, descr_conv2 = :descr_conv2, 
        descr_conv3 = :descr_conv3, descr_conv4 = :descr_conv4, imagem1 = '$imagem1', imagem2 = '$imagem2',
        imagem3 = '$imagem3', imagem4 = '$imagem4'");

    $query->bindValue(":convidado1", $convidado1);
    $query->bindValue(":convidado2", $convidado2);
    $query->bindValue(":convidado3", $convidado3);
    $query->bindValue(":convidado4", $convidado4);
    $query->bindValue(":descr_conv1", $descr_conv1);
    $query->bindValue(":descr_conv2", $descr_conv2);
    $query->bindValue(":descr_conv3", $descr_conv3);
    $query->bindValue(":descr_conv4", $descr_conv4);
    $query->execute();

} else {
    if($imagem1 != "sem-foto.jpg"){
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['imagem1'];
        if($foto != "sem-foto.jpg"){
            @unlink('../../img/eventos/'.$foto);	
        }
    
        $query = $pdo->prepare("UPDATE $pagina SET convidado1 = :convidado1, convidado2 = :convidado2, 
            convidado3 = :convidado3, convidado4 = :convidado4, descr_conv1 = :descr_conv1, descr_conv2 = :descr_conv2, 
        descr_conv3 = :descr_conv3, descr_conv4 = :descr_conv4, imagem1 = :imagem1 where id = :id");
        $query->bindValue(":convidado1", $convidado1);
        $query->bindValue(":convidado2", $convidado2);
        $query->bindValue(":convidado3", $convidado3);
        $query->bindValue(":convidado4", $convidado4);
        $query->bindValue(":imagem1", $imagem1);
        $query->bindValue(":descr_conv1", $descr_conv1);
        $query->bindValue(":descr_conv2", $descr_conv2);
        $query->bindValue(":descr_conv3", $descr_conv3);
        $query->bindValue(":descr_conv4", $descr_conv4);
        $query->bindValue(":id", $id);
        $query->execute();
    
    } elseif($imagem2 != "sem-foto.jpg"){
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['imagem2'];
        if($foto != "sem-foto.jpg"){
            @unlink('../../img/eventos/'.$foto);	
        }
    
        $query = $pdo->prepare("UPDATE $pagina SET convidado1 = :convidado1, convidado2 = :convidado2, 
            convidado3 = :convidado3, convidado4 = :convidado4, descr_conv1 = :descr_conv1, descr_conv2 = :descr_conv2, 
        descr_conv3 = :descr_conv3, descr_conv4 = :descr_conv4, imagem2 = :imagem2 where id = :id");
        $query->bindValue(":convidado1", $convidado1);
        $query->bindValue(":convidado2", $convidado2);
        $query->bindValue(":convidado3", $convidado3);
        $query->bindValue(":convidado4", $convidado4);
        $query->bindValue(":imagem2", $imagem2);
        $query->bindValue(":descr_conv1", $descr_conv1);
        $query->bindValue(":descr_conv2", $descr_conv2);
        $query->bindValue(":descr_conv3", $descr_conv3);
        $query->bindValue(":descr_conv4", $descr_conv4);
        $query->bindValue(":id", $id);
        $query->execute();

    } elseif($imagem3 != "sem-foto.jpg"){
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['imagem3'];
        if($foto != "sem-foto.jpg"){
            @unlink('../../img/eventos/'.$foto);	
        }
    
        $query = $pdo->prepare("UPDATE $pagina SET convidado1 = :convidado1, convidado2 = :convidado2, 
            convidado3 = :convidado3, convidado4 = :convidado4, descr_conv1 = :descr_conv1, descr_conv2 = :descr_conv2, 
        descr_conv3 = :descr_conv3, descr_conv4 = :descr_conv4, imagem3 = :imagem3 where id = :id");
        $query->bindValue(":convidado1", $convidado1);
        $query->bindValue(":convidado2", $convidado2);
        $query->bindValue(":convidado3", $convidado3);
        $query->bindValue(":convidado4", $convidado4);
        $query->bindValue(":imagem3", $imagem3);
        $query->bindValue(":descr_conv1", $descr_conv1);
        $query->bindValue(":descr_conv2", $descr_conv2);
        $query->bindValue(":descr_conv3", $descr_conv3);
        $query->bindValue(":descr_conv4", $descr_conv4);
        $query->bindValue(":id", $id);
        $query->execute();

    } elseif($imagem4 != "sem-foto.jpg"){
        $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $foto = $res[0]['imagem4'];
        if($foto != "sem-foto.jpg"){
            @unlink('../../img/eventos/'.$foto);	
        }

        $query = $pdo->prepare("UPDATE $pagina SET convidado1 = :convidado1, convidado2 = :convidado2, 
            convidado3 = :convidado3, convidado4 = :convidado4, descr_conv1 = :descr_conv1, descr_conv2 = :descr_conv2, 
        descr_conv3 = :descr_conv3, descr_conv4 = :descr_conv4, imagem4 = :imagem4 where id = :id");
        $query->bindValue(":convidado1", $convidado1);
        $query->bindValue(":convidado2", $convidado2);
        $query->bindValue(":convidado3", $convidado3);
        $query->bindValue(":convidado4", $convidado4);
        $query->bindValue(":imagem4", $imagem4);
        $query->bindValue(":descr_conv1", $descr_conv1);
        $query->bindValue(":descr_conv2", $descr_conv2);
        $query->bindValue(":descr_conv3", $descr_conv3);
        $query->bindValue(":descr_conv4", $descr_conv4);
        $query->bindValue(":id", $id);
        $query->execute();

    } else {
        $query = $pdo->prepare("UPDATE $pagina SET convidado1 = :convidado1, convidado2 = :convidado2, 
            convidado3 = :convidado3, convidado4 = :convidado4, descr_conv1 = :descr_conv1, descr_conv2 = :descr_conv2, 
        descr_conv3 = :descr_conv3, descr_conv4 = :descr_conv4 WHERE id = :id");
        $query->bindValue(":convidado1", $convidado1);
        $query->bindValue(":convidado2", $convidado2);
        $query->bindValue(":convidado3", $convidado3);
        $query->bindValue(":convidado4", $convidado4);
        $query->bindValue(":descr_conv1", $descr_conv1);
        $query->bindValue(":descr_conv2", $descr_conv2);
        $query->bindValue(":descr_conv3", $descr_conv3);
        $query->bindValue(":descr_conv4", $descr_conv4);
        $query->bindValue(":id", $id);
        $query->execute();
    }
}

echo 'Salvo com Sucesso';


?>