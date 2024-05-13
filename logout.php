<?php
@session_start();
unset($_SESSION['id'], $_SESSION['cpf'], $_SESSION['email']);
$_SESSION['msg'] = "<div id='alert_mess_box'>
                        <span>
                            Sessão encerrada com sucesso!
                            <i id='icon_close_box' class='bi bi-x' onclick='closeLogin()'></i>
                        </span>
                    </div>";
header("Location: index.php");
/* @session_start();
@session_destroy();
echo "<script>window.location='index.php'</script>"; */
?>
