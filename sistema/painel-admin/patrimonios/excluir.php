<?php
require_once("../../conexao.php");
$pagina = 'patrimonios';
$id = @$_POST['id-excluir'];

//excluir a imagem
$query = $pdo->query("SELECT * FROM $pagina where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['foto'];
$nome = $res[0]['nome'];
if($foto != "sem-foto.jpg"){
	@unlink('../../img/patrimonios/'.$foto);	
}

$query = $pdo->query("DELETE FROM $pagina WHERE id = '$id'");

//EXECUTAR NO LOG
$tabela = $pagina;
$acao = 'Exclusão';
$id_reg = $id;
$descricao = $nome;
$painel = 'Painel Administrativo';
$igreja = 0;
require_once("../../logs.php");

echo "Excluído com Sucesso";

?>