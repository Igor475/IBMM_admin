<?php
require_once("../../conexao.php");
$pagina = 'eventos';

$id = @$_POST['id-img'];


//SCRIPT PARA SUBIR FOTO NO BANCO LOGO JPG
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['img1']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/galeria/' .$nome_img;
if (@$_FILES['img1']['name'] == ""){
	$img1 = "sem-foto.jpg";
}else{
	$img1 = $nome_img;
}

$imagem_temp = @$_FILES['img1']['tmp_name']; 
$ext = pathinfo($img1, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png' or $ext == 'webp'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Logo!. Somente JPG para os Relatórios';
	exit();
}




//SCRIPT PARA SUBIR FOTO NO BANCO CAB RELATORIO
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['img2']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/galeria/' .$nome_img;
if (@$_FILES['img2']['name'] == ""){
	$img2 = "sem-foto.jpg";
}else{
	$img2 = $nome_img;
}

$imagem_temp = @$_FILES['img2']['tmp_name']; 
$ext = pathinfo($img2, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png' or $ext == 'webp'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem do Cabeçalho. Somente JPG para os Relatórios';
	exit();
}





//SCRIPT PARA SUBIR FOTO NO BANCO CAB RELATORIO
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['img3']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/galeria/' .$nome_img;
if (@$_FILES['img3']['name'] == ""){
	$img3 = "sem-foto.jpg";
}else{
	$img3 = $nome_img;
}

$imagem_temp = @$_FILES['img3']['tmp_name']; 
$ext = pathinfo($img3, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png' or $ext == 'webp'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Carteirinha. Somente JPG para os Relatórios';
	exit();
}





//SCRIPT PARA SUBIR FOTO NO BANCO CAB RELATORIO
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['img4']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/galeria/' .$nome_img;
if (@$_FILES['img4']['name'] == ""){
	$img4 = "sem-foto.jpg";
}else{
	$img4 = $nome_img;
}

$imagem_temp = @$_FILES['img4']['tmp_name']; 
$ext = pathinfo($img4, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png' or $ext == 'webp'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Carteirinha. Somente JPG para os Relatórios';
	exit();
}





//SCRIPT PARA SUBIR FOTO NO BANCO CAB RELATORIO
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['img5']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/galeria/' .$nome_img;
if (@$_FILES['img5']['name'] == ""){
	$img5 = "sem-foto.jpg";
}else{
	$img5 = $nome_img;
}

$imagem_temp = @$_FILES['img5']['tmp_name']; 
$ext = pathinfo($img5, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png' or $ext == 'webp'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Carteirinha. Somente JPG para os Relatórios';
	exit();
}






//SCRIPT PARA SUBIR FOTO NO BANCO CAB RELATORIO
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['img6']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/eventos/galeria/' .$nome_img;
if (@$_FILES['img6']['name'] == ""){
	$img6 = "sem-foto.jpg";
}else{
	$img6 = $nome_img;
}

$imagem_temp = @$_FILES['img6']['tmp_name']; 
$ext = pathinfo($img6, PATHINFO_EXTENSION);   
if($ext == 'jpg' or $ext == 'jpeg' or $ext == 'png' or $ext == 'webp'){ 
	move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida para a imagem da Carteirinha. Somente JPG para os Relatórios';
	exit();
}





if($img1 != "sem-foto.jpg"){
    $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $foto = $res[0]['img_1'];
    if($foto != "sem-foto.jpg"){
        @unlink('../../img/eventos/galeria/'.$foto);	
    }
	$pdo->query("UPDATE $pagina SET img_1 = '$img1' where id = '$id'");
}

if($img2 != "sem-foto.jpg"){
    $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $foto = $res[0]['img_2'];
    if($foto != "sem-foto.jpg"){
        @unlink('../../img/eventos/galeria/'.$foto);	
    }
	$pdo->query("UPDATE $pagina SET img_2 = '$img2' where id = '$id'");
}

if($img3 != "sem-foto.jpg"){
    $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $foto = $res[0]['img_3'];
    if($foto != "sem-foto.jpg"){
        @unlink('../../img/eventos/galeria/'.$foto);	
    }
	$pdo->query("UPDATE $pagina SET img_3 = '$img3' where id = '$id'");
}

if($img4 != "sem-foto.jpg"){
    $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $foto = $res[0]['img_4'];
    if($foto != "sem-foto.jpg"){
        @unlink('../../img/eventos/galeria/'.$foto);	
    }
	$pdo->query("UPDATE $pagina SET img_4 = '$img4' where id = '$id'");
}

if($img5 != "sem-foto.jpg"){
    $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $foto = $res[0]['img_5'];
    if($foto != "sem-foto.jpg"){
        @unlink('../../img/eventos/galeria/'.$foto);	
    }
	$pdo->query("UPDATE $pagina SET img_5 = '$img5' where id = '$id'");
}
	
if($img6 != "sem-foto.jpg"){
    $query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $foto = $res[0]['img_6'];
    if($foto != "sem-foto.jpg"){
        @unlink('../../img/eventos/galeria/'.$foto);	
    }
	$pdo->query("UPDATE $pagina SET img_6 = '$img6' where id = '$id'");
}

echo 'Salvo com Sucesso';


?>