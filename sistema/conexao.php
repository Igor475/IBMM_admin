<?php
date_default_timezone_set('America/Sao_Paulo');

$banco = "igreja";
$servidor = "localhost";
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
    echo "Erro ao conectar com o banco de dados!<br>".$e;
}


$url_sistema = "http://$_SERVER[HTTP_HOST]/sistema/";
$url = explode("//", $url_sistema);
if($url[1] == 'localhost/sistema/'){
	$url_sistema = "http://$_SERVER[HTTP_HOST]/ibmissaomultiplicar/sistema/";
}

$email_super_adm = "contato@ibmissaomultiplicar.com.br"; // E-mail Principal
$nome_igreja_sistema = "Igreja Batista Missão Multiplicar";
$telefone_igreja_sistema = "(00) 00000-0000";
$endereco_igreja_sistema = "Avenida Brasil, 33.815 Bangu , Rio de Janeiro, RJ, Brazil";



// VARIÁVEIS GLOBAIS
$quantidade_tarefas = 20; //exibindo as próximas 20tarefas no painel da igreja
$limitar_tesoureiro = 'Sim'; //Se tiver sim, o tesoureiro não poderá excluir e nem editar as Ofertas e Dízimos


$relatorio_pdf = 'Sim'; //SE ESSA OPÇÃO ESTIVER NÃO, O RELATÓRIO SERÁ GERADO EM HTML
$cabecalho_rel_img = 'Sim'; /* SE ESSA OPÇÃO ESTIVER SIM, O RELATORIO TERA UMA IMAGEM NO CABECALHO, 
CADA IGREJA DEVERA SUBIR A SUA IMAGEM JPG NO CADASTRO DE IGREJAS */
$itens_por_pagina = 6;
$itens_por_pagina_message = 6;


$escolher_usuario = 'Sim';
$usuario_celula = 'Sim';


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
    data_cad = curDate(), pastor = '1', logo_rel = 'sem-foto.jpg', cab_rel = 'sem-foto.jpg',
    carteirinha_rel = 'sem-foto.jpg', email = '$email_super_adm' ");



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
        qtd_tarefas = '$quantidade_tarefas', limitar_tesoureiro = '$limitar_tesoureiro',
        relatorio_pdf = '$relatorio_pdf', cabecalho_rel_img = '$cabecalho_rel_img', 
        escolher_usuario = '$escolher_usuario', usuario_celula = '$usuario_celula', 
        itens_por_pagina = '$itens_por_pagina', itens_por_pagina_message = '$itens_por_pagina_message' ");
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
$relatorio_pdf = $res[0]['relatorio_pdf'];
$cabecalho_rel_img = $res[0]['cabecalho_rel_img'];
$choose_user = $res[0]['escolher_usuario'];
$user_cel = $res[0]['usuario_celula'];
$itens_por_pagina = $res[0]['itens_por_pagina'];
$itens_por_pagina_message = $res[0]['itens_por_pagina_message'];
?>