<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/login.css"><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/login-time.js" defer></script>
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

    //EXECUTAR NO LOG
    $tabela = 'usuarios';
    $acao = 'Login';
    $id_reg = 0;
    $descricao = 'Login';
    if ($res[0]['nivel'] == 'Pastor Presidente') {
        $painel = 'Painel Administrativo';
        $igreja = 0;
    } else {
        $painel = 'Painel Igreja';
        $igreja = $res[0]['igreja'];
    }
    require_once("logs.php");

    if ($res[0]['nivel'] == 'Pastor Presidente') {
        echo "<script>document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            window.location = 'painel-admin';
        }, 2000); // 3000ms = 3 segundos
    });</script>";
    }

    if ($res[0]['nivel'] == 'pastor') {
        echo "<script>window.location='painel-igreja'</script>";
    }

    if ($res[0]['nivel'] == 'tesoureiro') {
        echo "<script>window.location='painel-igreja'</script>";
    }

    if ($res[0]['nivel'] == 'secretario') {
        echo "<script>window.location='painel-igreja'</script>";
    }

    if ($res[0]['nivel'] == 'membro') {
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

<div id="preloader">
    <div class="loader">
        <img src="img/Logo-IBMM-border.png" alt="">
    </div>
</div>

