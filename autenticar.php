<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/alerta-tempo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php
require_once("conexao.php");
@session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$query = $pdo->query("SELECT * FROM usuarios WHERE (email = '$usuario' 
    or cpf = '$usuario') and senha = '$senha'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg > 0) {
    $_SESSION['nome_usuario'] = $res[0]['nome'];
    echo "<script>window.location='painel-admin'</script>";
} else {
    echo "<script>$(function() { alertaTempo('Usuário ou senha incorretos!!', 1000) });</script>";
}

?>