<?php

$banco = "igreja";
$servidor = "localhost";
$usuario = "root";
$senha = "";

$email_super_adm = "contato@ibmissaomultiplicar.com.br";
$nome_igreja = "Igreja Batista Missão Multiplicar";

date_default_timezone_set('America/Sao_Paulo');

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
    echo "Erro ao conectar com o banco de dados!<br>".$e;
}

// INSERINDO OS REGISTROS INICIAIS 

//Criando um usuário e um Pastor Presidente padrão
$query = $pdo->query("SELECT * FROM pastores_presidentes");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0)
$pdo->query("INSERT INTO pastores_presidentes SET nome = 'Super Administrador', email = '$email_super_adm',
    cpf = '000.000.000-00', telefone = '(21)998867793', foto = 'sem-foto.jpg' ");


// Criando um Usuário Super com nivel de Pastor Presidente padrão
$query = $pdo->query("SELECT * FROM usuarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0)
$pdo->query("INSERT INTO usuarios SET nome = 'Super Administrador', email = '$email_super_adm',
    cpf = '000.000.000-00', senha = '123', nivel = 'Pastor Presidente', id_pessoa = '1', foto = 'sem-foto.jpg' ");


//Criando variáveis padrões do sistema
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0) {
    $pdo->query("INSERT INTO config SET nome = 'email_super_adm', valor = '$email_super_adm' ");
    $pdo->query("INSERT INTO config SET nome = 'nome_igreja', valor = '$nome_igreja' ");
}


// BUSCANDO INFORMAÇÕES DE CONFIGURAÇÕES NO BANCO DE DADOS
$query = $pdo->query("SELECT * FROM config where nome = 'email_super_adm'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$email_super_adm = $res[0]['valor'];

$query = $pdo->query("SELECT * FROM config where nome = 'nome_igreja'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_igreja = $res[0]['valor'];

?>