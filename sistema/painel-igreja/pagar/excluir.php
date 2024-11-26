<?php
require_once("../../conexao.php");
$pagina = 'pagar';
$id = @$_POST['id-excluir'];

//excluir a imagem
$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['arquivo'];
$descricao_conta = $res[0]['descricao'];
if($foto != "sem-foto.jpg"){
	@unlink('../../img/contas/'.$foto);	
}

$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

//EXECUTAR NO LOG
$tabela = $pagina;
$acao = 'Exclusão';
$id_reg = $id;
$descricao = $descricao_conta;
$painel = 'Painel Igreja';
$igreja = $res[0]['igreja'];
require_once("../../logs.php");

echo "Excluído com Sucesso";

?>