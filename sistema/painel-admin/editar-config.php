<?php
require_once("../conexao.php");
$nome = $_POST['nome_igr'];
$telefone = $_POST['tel_igr'];
$endereco = $_POST['end_igr'];
$email = $_POST['email_igr'];
$qtd_tar = $_POST['qtd_tar_igr'];
$limitar_tesoureiro = $_POST['limitar_tesoureiro'];
$relatorio_pdf = $_POST['relatorio_pdf'];
$cabecalho_rel_img = $_POST['cabecalho_rel_img'];
$choose_user = $_POST['choose_user'];
@$user_cel = $_POST['user_cel'];
$itens_por_pagina = $_POST['itens_por_pagina'];
$itens_por_pagina_message = $_POST['itens_por_pagina_message'];
$itens_pag = $_POST['itens_pag'];
$logs = $_POST['logs'];


$query = $pdo->prepare("UPDATE config SET nome = :nome, endereco = :endereco, 
    telefone = :telefone, email = :email, qtd_tarefas = '$qtd_tar', 
    limitar_tesoureiro = '$limitar_tesoureiro', relatorio_pdf = '$relatorio_pdf',
    cabecalho_rel_img = '$cabecalho_rel_img', escolher_usuario = '$choose_user',
    usuario_celula = '$user_cel', itens_por_pagina = '$itens_por_pagina', itens_por_pagina_message = '$itens_por_pagina_message', 
    itens_pag = '$itens_pag', logs = '$logs'");
$query->bindValue(":nome", "$nome");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":email", "$email");
$query->execute();

echo 'Salvo com Sucesso';

?>