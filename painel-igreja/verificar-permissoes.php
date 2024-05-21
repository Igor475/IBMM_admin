<?php 
require_once("../conexao.php");
@session_start();
$id_usuario = $_SESSION['id_usuario'];



$home = 'ocultar';
$inicial = 'ocultar';
$notificacoes = 'ocultar';
$backup = 'ocultar';
$anexos = 'ocultar';

//grupo pessoas
$usuarios = 'ocultar';
$pastores = 'ocultar';
$membros = 'ocultar';
$tesoureiros = 'ocultar';
$secretarios = 'ocultar';
$fornecedores = 'ocultar';


//grupo cadastros
$tarefas = 'ocultar';


//grupo financeiros
$pagar = 'ocultar';
$receber = 'ocultar';
$dizimos = 'ocultar';
$ofertas = 'ocultar';
$doacoes = 'ocultar';
$vendas = 'ocultar';
$movimentacoes = 'ocultar';


//grupo Secretaria
$documentos = 'ocultar';
$patrimonio = 'ocultar';
$celulas = 'ocultar';
$grupos = 'ocultar';



//relatorios
$RelMembros = 'ocultar';
$RelPatrimonio = 'ocultar';
$rel_financeiro = 'ocultar';
$rel_auditoria = 'ocultar';
$rel_trans_membros = 'ocultar';
$rel_fechamento = 'ocultar';




$query = $pdo->query("SELECT * FROM usuarios_permissoes where usuario = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	for($i=0; $i < $total_reg; $i++){
		foreach ($res[$i] as $key => $value){}
		$permissao = $res[$i]['permissao'];
		
		$query2 = $pdo->query("SELECT * FROM acessos where id = '$permissao'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$nome = $res2[0]['nome'];
		$chave = $res2[0]['chave'];
		$id = $res2[0]['id'];

		if($chave == 'home'){
			$home = '';
		}


		if($chave == 'inicial'){
			$inicial = '';
		}


		if($chave == 'notificacoes'){
			$notificacoes = '';
		}


        if($chave == 'backup'){
			$backup = '';
		}


        if($chave == 'anexos'){
			$anexos = '';
		}




		if($chave == 'usuarios'){
			$usuarios = '';
		}

		if($chave == 'pastores'){
			$pastores = '';
		}

		if($chave == 'membros'){
			$membros = '';
		}

		
		if($chave == 'tesoureiros'){
			$tesoureiros = '';
		}


        if($chave == 'secretarios'){
			$secretarios = '';
		}


        if($chave == 'fornecedores'){
			$fornecedores = '';
		}




        
        if($chave == 'tarefas'){
			$tarefas = '';
		}





		if($chave == 'pagar'){
			$pagar = '';
		}

		if($chave == 'receber'){
			$receber = '';
		}

		if($chave == 'dizimos'){
			$dizimos = '';
		}

		if($chave == 'ofertas'){
			$ofertas = '';
		}

		if($chave == 'doacoes'){
			$doacoes = '';
		}


        if($chave == 'vendas'){
			$vendas = '';
		}


        if($chave == 'movimentacoes'){
			$movimentacoes = '';
		}






		if($chave == 'documentos'){
			$documentos = '';
		}

		if($chave == 'patrimonio'){
			$patrimonio = '';
		}

		if($chave == 'celulas'){
			$celulas = '';
		}

		if($chave == 'grupos'){
			$grupos = '';
		}






		if($chave == 'RelMembros'){
			$RelMembros = '';
		}

		
		if($chave == 'RelPatrimonio'){
			$RelPatrimonio = '';
		}

	
		if($chave == 'rel_financeiro'){
			$rel_financeiro = '';
		}

		
		if($chave == 'rel_auditoria'){
			$rel_auditoria = '';
		}


        if($chave == 'rel_trans_membros'){
			$rel_trans_membros = '';
		}


        if($chave == 'rel_fechamento'){
			$rel_fechamento = '';
		}






	}

}


$pag_inicial = '';
if($home != 'ocultar'){
	$pag_inicial = 'home';
}else {
	$query = $pdo->query("SELECT * FROM usuarios_permissoes where usuario = '$id_usuario' order by id asc limit 1");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){	
			$permissao = $res[0]['permissao'];		
			$query2 = $pdo->query("SELECT * FROM acessos where id = '$permissao'");
			$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);		
			$pag_inicial = $res2[0]['chave'];		

	}
}



if($usuarios == 'ocultar' and $membros == 'ocultar' and $pastores == 'ocultar'  and $fornecedores == 'ocultar'
    and $tesoureiros == 'ocultar' and $secretarios == 'ocultar'){
	$menu_pessoas = 'ocultar';
}else{
	$menu_pessoas = '';
}



if($tarefas == 'ocultar'){
	$menu_cadastros = 'ocultar';
}else{
	$menu_cadastros = '';
}




if($pagar == 'ocultar' and $receber == 'ocultar' and $dizimos == 'ocultar' and $ofertas == 'ocultar' and 
    $doacoes == 'ocultar' and $vendas == 'ocultar' and $movimentacoes == 'ocultar'){
	$menu_financeiro = 'ocultar';
}else{
	$menu_financeiro = '';
}



if($documentos == 'ocultar' and $patrimonio == 'ocultar' and $celulas == 'ocultar' and $grupos == 'ocultar'){
	$menu_secretaria = 'ocultar';
}else{
	$menu_secretaria = '';
}



if($RelMembros == 'ocultar' and $RelPatrimonio == 'ocultar' and $rel_financeiro == 'ocultar' 
    and $rel_auditoria == 'ocultar' and $rel_trans_membros == 'ocultar' and $rel_fechamento == 'ocultar'){
	$menu_relatorio = 'ocultar';
}else{
	$menu_relatorio = '';
}




 ?>