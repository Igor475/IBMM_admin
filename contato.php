<?php
require_once("cabecalho.php");


?>

    <section class="container_widget_cont">
        <div class="content_widget container">
            <div class="area_title_c">
                <div class="area_content_widget">
                    <h3 class="title_cx">Contato</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="box_contact">
            <div class="flex_con">
                <div class="box_con_1">
                    <span class="txt_con">Vamos conversar</span>
                    <h2 class="title_box_con_1">Fale Conosco</h2>

                    <div class="items_box_con">
                        <div class="content_items_con">
                            <div class="items_icons_con">
                                <i class="ri-mail-fill icons_con_r"></i>
                            </div>
                            
                            <div class="items_txt_con">
                                <span class="par_name">Email:</span>
                                <span class="txt_name_co"><?php echo $email_igreja ?></span>
                            </div>
                        </div>
                        <div class="content_items_con">
                            <div class="items_icons_con">
                                <i class="ri-phone-fill icons_con_r"></i>
                            </div>
                            
                            <div class="items_txt_con">
                                <span class="par_name">Telefone:</span>
                                <span class="txt_name_co"><?php echo $telefone_igreja ?></span>
                            </div>
                        </div>
                        <div class="content_items_con">
                            <div class="items_icons_con">
                                <i class="ri-map-pin-2-fill icons_con_r"></i>
                            </div>
                            
                            <div class="items_txt_con">
                                <span class="par_name">Endereço:</span>
                                <span class="txt_name_co"><?php echo $endereco_igreja ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_con_2">
                    <span class="txt_form_con">Entre em Contato</span>
                    <h2 class="title_box_2">Preencha o formulário abaixo</h2>

                    <form method="POST" action="enviar.php">
                        <div class="box_form">
                            <div class="area_input_con">
                                <input type="text" class="input_cont_form" placeholder="Nome" name="nome" required>
                            </div>
                            <div class="area_input_con">
                                <input type="email" class="input_cont_form" placeholder="Email" name="email" required>
                            </div>
                            <div class="area_input_con">
                                <input type="text" class="input_cont_form" placeholder="Telefone" name="telefone" required>
                            </div>
                            <div class="area_input_con">
                                <input type="text" class="input_cont_form" placeholder="Assunto" name="assunto" required>
                            </div>
                            <div class="area_input_con">
                                <textarea class="textarea_con_for" maxlength="1000" class="input_cont_form" name="mensagem" placeholder="Mensagem"></textarea>
                            </div>
                        </div>

                        <input type="submit" value="Enviar Mensagem" class="button_form_co">

                        <input type="hidden" class="input_cont_form" name="nome_igreja" value="<?php echo $nome_igreja ?>">
                        <input type="hidden" class="input_cont_form" name="email_igreja" value="<?php echo $email_igreja ?>">
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>