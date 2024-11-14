<?php

require_once("sistema/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Site da Igreja Batista Missão Multiplicar" />
   <meta name="keywords" content="" />
   <meta name="author" content="IB Missão Multiplicar">
   <link rel="shortcut icon" href="sistema/img/logo-IBMM-preta.ico" type="image/x-icon">
   <link rel="stylesheet" type="text/css" href="sistema/css/bootstrap_style.css">
   <!--=============== REMIXICONS ===============-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="assets/css/styles.css">
   <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
   <title>Cadastro de Membro</title>

   <!--=============== MAIN JS ===============-->
   <script src="assets/js/main.js" defer></script>
   <script src="assets/js/redirect.js"></script>
   <script src="sistema/js/ajax.js" defer></script>  
   <script type="text/javascript" src="sistema/js/oracao.js" defer></script>
   <script type="text/javascript" src="sistema/js/membro.js" defer></script>
   <script type="text/javascript" src="sistema/js/mascaras.js" defer></script>
   <script src="assets/js/swiper-bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>

<div class="content_page_signup" style="height: 100vh">
    <section class="siginup_member">
        <div class="container">
            <h3 class="title title_member">Cadastro de Membros</h3>
        </div>

        <div class="form_signinup_m">
            <div class="container content_fields_signiup">
                <form method="POST" class="form-container-member" id="form_signup">
                    <div class="upload">
                        <img src="sistema/img/membros/sem-foto.jpg" alt="" id="target" class="img_upload">
                        <div class="round">
                            <input type="file" name="imagem" id="imagem" onChange="carregarImg();">
                            <i class="bi bi-cloud-arrow-up icon_upload"></i>
                        </div>
                    </div>
                    <div class="form-fields-member">
                        <div class="flex_fields_me">
                            <div class="form-group-member col_w">
                                <input type="text" id="name" name="nome" class="input_member_signup" required>
                                <label class="label_member_signup">Nome</label>
                            </div>
                            <div class="form-group-member col_h">
                                <input type="text" id="cpf" name="cpf" class="input_member_signup" required>
                                <label class="label_member_signup">CPF</label>
                            </div>
                            <div class="form-group-member col_w">
                                <input type="email" id="email" name="email" class="input_member_signup" required>
                                <label class="label_member_signup">Email</label>
                            </div>
                            <div class="form-group-member col_h">
                                <input type="date" id="data" name="data_nasc" class="input_member_signup" required>
                                <label class="label_member_signup">Data de Nascimento</label>
                            </div>
                            <div class="form-group-member col_w">
                                <input type="text" id="endereco" name="endereco" class="input_member_signup" required>
                                <label class="label_member_signup">Endereço</label>
                            </div>
                            <div class="form-group-member col_h">
                                <input type="text" id="telefone" name="telefone" class="input_member_signup" required>
                                <label class="label_member_signup">Telefone</label>
                            </div>
                            <div class="form-group-member">
                                <input type="date" id="data" name="data_bat" class="input_member_signup" required>
                                <label class="label_member_signup">Data de Batismo</label>
                            </div>
                            <div class="form-group-member">
                                <select class="sel2" id="igreja_ch" name="igreja" requerid>
                                    <?php
                                    $query = $pdo->query("SELECT * FROM igrejas order by matriz desc, 
                                            nome asc");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    $total_reg = count($res);
                                    if ($total_reg > 0) {
                                        for ($i = 0; $i < $total_reg; $i++) {
                                            foreach ($res[$i] as $key => $value) {
                                            }

                                            $nome_reg = $res[$i]['nome'];
                                            $id_reg = $res[$i]['id'];
                                    ?>
                                            <option value="<?php echo $id_reg ?>">
                                                <?php echo $nome_reg ?>
                                            </option>
                                    <?php }
                                    } ?>
                                </select>
                                <label class="label_member_signup">Igreja</label>
                            </div>
                        </div>

                        <div class="area_field_message_er">
                            <div id="mensagem"></div>
                        </div>

                        <input type="hidden" value="<?php echo $id_igreja ?>" name="igreja">

                        <div class="area_button_signup">
                            <input type="submit" value="Cadastrar" class="btn_signup">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<footer class="footer__church">
      <div class="box__footer">
         <div class="footer__member">
            <div class="footer__flex">
               <div class="container__logo__footer">
                  <div class="logo__footer">
                     <img src="assets/img/Logo-IBMM.png" alt="" class="img__footer">
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright__footer">
            <span class="txt__copyright">Copyright © 2024 IBMM. All rights reserved. CNPJ: 18.829.333.0001/93</span>
         </div>
      </div>
   </footer>

</body>
</html>
