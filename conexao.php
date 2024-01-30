<?php
date_default_timezone_set('America/Sao_Paulo');

$banco = "igreja";
$servidor = "localhost";
$usuario = "root";
$senha = "";

$email_super_adm = "contato@ibmissaomultiplicar.com.br";
$nome_igreja_sistema = "Igreja Batista Missão Multiplicar";
$telefone_igreja_sistema = "(00) 00000-0000";
$endereco_igreja_sistema = "Avenida Brasil, 33.815 Bangu , Rio de Janeiro, RJ, Brazil";



// VARIÁVEIS GLOBAIS
$quantidade_tarefas = 20; //exibindo as próximas 20tarefas no painel da igreja
$limitar_tesoureiro = 'Sim'; //Se tiver sim, o tesoureiro não poderá excluir e nem editar as Ofertas e Dízimos



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



//Criando o cadastro do Pastor Presidente na tabela de pastores
$query = $pdo->query("SELECT * FROM pastores");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0)
$pdo->query("INSERT INTO pastores SET nome = 'Super Administrador', email = '$email_super_adm',
    cpf = '000.000.000-00', telefone = '(21)998867793', foto = 'sem-foto.jpg', data_cad = 'curDate()',
    data_nasc = curDate(), igreja = 1 ");




// Criando um Usuário Super com nivel de Pastor Presidente padrão
$query = $pdo->query("SELECT * FROM usuarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0)
$pdo->query("INSERT INTO usuarios SET nome = 'Super Administrador', email = '$email_super_adm',
    cpf = '000.000.000-00', senha = '123', nivel = 'Pastor Presidente', id_pessoa = '1', foto = 'sem-foto.jpg' ");




// Criando a igreja matriz
$query = $pdo->query("SELECT * FROM igrejas");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0)
$pdo->query("INSERT INTO igrejas SET nome = '$nome_igreja', telefone = '$telefone_igreja',
    endereco = '$endereco_igreja', matriz = 'Sim', imagem = 'sem-foto.jpg',
    data_cad = curDate(), pastor = '1' ");



// Criando o cargo do membro
$query = $pdo->query("SELECT * FROM cargos");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0)
$pdo->query("INSERT INTO cargos SET nome = 'Membro' ");



// Criando a Frequência de uma vez (Única)
$query = $pdo->query("SELECT * FROM frequencias");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0)
$pdo->query("INSERT INTO frequencias SET frequencia = 'Uma vez', dias = 0");



//Criando variáveis padrões do sistema
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg == 0) {
    $pdo->query("INSERT INTO config SET nome = '$nome_igreja_sistema', email = '$email_super_adm',
        endereco = '$endereco_igreja_sistema', telefone = '$telefone_igreja_sistema', 
        qtd_tarefas = '$quantidade_tarefas', limitar_tesoureiro = '$limitar_tesoureiro' ");
}


// BUSCANDO INFORMAÇÕES DE CONFIGURAÇÕES NO BANCO DE DADOS
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$email_super_adm = $res[0]['email'];
$nome_igreja_sistema = $res[0]['nome'];
$telefone_igreja_sistema = $res[0]['telefone'];
$endereco_igreja_sistema = $res[0]['endereco'];
$quantidade_tarefas = $res[0]['qtd_tarefas'];
$limitar_tesoureiro = $res[0]['limitar_tesoureiro'];

?>