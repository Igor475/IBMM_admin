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


if ($total_reg > 0) {
    $_SESSION['nome_usuario'] = $res[0]['nome'];
    $_SESSION['id_usuario'] = $res[0]['id'];
    $_SESSION['nivel_usuario'] = $res[0]['nivel'];
    $_SESSION['cpf_usuario'] = $res[0]['cpf'];
    $_SESSION['id_igreja'] = $res[0]['igreja'];

    if ($res[0]['nivel'] == 'Pastor Presidente') {
        echo "<script>window.location='painel-admin'</script>";
    }

    if ($res[0]['nivel'] == 'pastor') {
        echo "<script>window.location='painel-igreja'</script>";
    }

    if ($res[0]['nivel'] == 'tesoureiro') {
        echo "<script>window.location='painel-igreja'</script>";
    }

} else {
    $_SESSION['msg'] = "<div id='alert_mess_box'>
                            <span>
                                Usuário ou Senha não batem!
                                <i id='icon_close_box' class='bi bi-x' onclick='closeLogin()'></i>
                            </span>
                        </div>";
    header("Location: index.php");
    /* echo "<script>$(function() { alertaTempo('Usuário ou senha incorretos!!', 1000) });</script>"; */
}

?>