<?php
require_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo-IBMM-preta.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <title><?php echo $nome_igreja_sistema ?></title>
</head>
<body>
    <section class="container-login">
        <div class="wrapper">
            <div class="wrapper-login">
                <img class="img_wrapper" src="img/logo-IBMM-preta.png" alt="">
            </div>
            <form method="post" class="login-form" action="autenticar.php">
               <div class="row">
                  <i class="bx bxs-user icon-log"></i>
                  <input class="inputs-login" type="text" name="usuario" placeholder="Email ou CPF" required autofocus>
               </div>
               <div class="row">
                  <i class="bx bxs-lock icon-log"></i>
                  <input class="inputs-login" type="password" name="senha" placeholder="Insira a sua Senha" required>
               </div>
               <div class="recovery">
                  <a href="#" class="btn-recovery-senha" data-bs-toggle="modal" data-bs-target="#modal-recuperar-senha">Recuperar Senha</a>
               </div>
               <div class="row button">
                 <button type="submit" class="btn-login" value="Entrar">Entrar</button>
               </div>
            </form>
         </div>
    </section>
</body>
</html>



<div class="modal fade" id="modal-recuperar-senha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperação de senha</h5>
        <span class="bx bx-x btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
