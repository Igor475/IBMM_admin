<?php

require_once("cabecalho.php");

$url = @$_GET['evento'];

if (@$_GET['pagina'] != null) {
    $pag = $_GET['pagina'];
} else {
    $pag = 0;
}

$limite = $pag * $itens_por_pagina;
$pagina = $pag;
$nome_pag = 'eventos';

$query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and url = '$url' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
$titulo = $res[0]['titulo'];
$tipo_event = $res[0]['tipo'];


// Fazendo um tratamento de permissão para acessar a página de eventos
if ($tipo_event != 'Evento' && $tipo_event != 'Evento com Inscrição') {
    echo 'url incorreta!';
    exit();
} else {
    $url = @$_GET['evento'];
}

?>



<section class="section_eve_inf">
    <?php
    $query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and url = '$url' ");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);
    if ($total_reg > 0) {
    ?>
        <div class="box_eve_inf container">
            <div class="area_see_oth">
                <a href="eventos" class="see_others">
                    <i class="ri-arrow-left-line"></i>
                    Ver todos
                </a>
            </div>
            <?php

            $titulo = $res[0]['titulo'];
            $subtitulo = $res[0]['subtitulo'];
            $data_evento = $res[0]['data_evento'];
            $id = $res[0]['id'];
            $banner = $res[0]['banner'];
            $url = $res[0]['url'];
            $video = $res[0]['video'];
            $pregador = $res[0]['pregador'];
            $descricao1 = $res[0]['descricao1'];
            $descricao2 = $res[0]['descricao2'];
            $descricao3 = $res[0]['descricao3'];
            $tipo = $res[0]['tipo'];
            $imagem = $res[0]['imagem'];
            $hora = $res[0]['hora_evento'];

            $img_1 = $res[0]['img_1'];
            $img_2 = $res[0]['img_2'];
            $img_3 = $res[0]['img_3'];
            $img_4 = $res[0]['img_4'];
            $img_5 = $res[0]['img_5'];
            $img_6 = $res[0]['img_6'];

            $convidado1 = $res[0]['convidado1'];
            $convidado2 = $res[0]['convidado2'];
            $convidado3 = $res[0]['convidado3'];
            $convidado4 = $res[0]['convidado4'];

            $descr_conv1 = $res[0]['descr_conv1'];
            $descr_conv2 = $res[0]['descr_conv2'];
            $descr_conv3 = $res[0]['descr_conv3'];
            $descr_conv4 = $res[0]['descr_conv4'];

            $imagem1 = $res[0]['imagem1'];
            $imagem2 = $res[0]['imagem2'];
            $imagem3 = $res[0]['imagem3'];
            $imagem4 = $res[0]['imagem4'];


            $data_eventoF = implode('/', array_reverse(explode('-', $data_evento)));
            $hora  = (new DateTime($hora))->format('H:i');


            if ($video != '') {
                $classe_video = '';
            } else {
                $classe_video = 'd-none';
            }

            ?>
            <div class="highlight_image">
                <img src="sistema/img/eventos/<?php echo $banner ?>" alt="" class="img_highlight">
            </div>

            <div class="flex_eve_de">
                <div class="area_tabs_eve">
                    <div class="tabs_eve">
                        <div class="items_tab_eve">
                            <button class="tab_btn active">Detalhes</button>
                            <button class="tab_btn">Galeria</button>
                            <button class="tab_btn">Convidados</button>
                            <div class="line"></div>
                        </div>
                    </div>

                    <div class="highlight_tabs_eve active">
                        <div class="content_bx_eve_inf">
                            <div class="head_eve_ti_time">
                                <div class="flex_eve_heti">
                                    <h2 class="title_tab"><?php echo $titulo ?></h2>
                                    <p class="txt_eve_inf"><?php echo $subtitulo ?></p>
                                </div>

                                <div class="area_time_ev_t">
                                    <h2 class="title_tim_e">Horário</h2>
                                    <div class="flex_tim_ev_det">
                                        <img src="assets/img/time.svg" alt="" class="img_time_ev_ti">
                                        <span class="time_txt_eve"><?php echo $hora ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="area_inf_date_time">
                                <div class="days_eve">
                                    <h3 class="title__eve">Data do Evento</h3>
                                    <div class="fl_date_inf">
                                        <i class="ri ri-calendar-line icons_time_eve"></i>
                                        <span class="txt_inf_eve"><?php echo $data_eventoF ?></span>
                                    </div>
                                </div>
                                <div class="location_eve">
                                    <h3 class="title__eve">Localização</h3>
                                    <div class="location_inf">
                                        <i class="ri-map-pin-line icons_time_eve"></i>
                                        <a href="#" class="txt_inf_eve">Avenida Brasil, 33.815 Bangu , Rio de Janeiro, RJ, Brazil</a>
                                    </div>
                                </div>
                            </div>

                            <div class="descrition_eve">
                                <h2 class="title_desc_txt">Descrição</h2>
                                <p class="txt_desc_eve"><?php echo $descricao1 ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="highlight_tabs_eve">
                        <div class="box_gallery_cars">
                            <?php
                            $imagens_galeria = [$img_1, $img_2, $img_3, $img_4, $img_5, $img_6];
                            $imagens_filtradas = array_filter($imagens_galeria);

                            if (!empty($imagens_filtradas)) {
                                $tem_imagem_valida = false; // Variável para controlar se existe imagem válida

                                foreach ($imagens_filtradas as $imagem_gallery) {
                                    if ($imagem_gallery != 'sem-foto.jpg') {
                                        $tem_imagem_valida = true; // Encontrou uma imagem válida
                            ?>
                                        <a href="sistema/img/eventos/galeria/<?php echo $imagem_gallery ?>" class="link_cards_gall" data-fancybox="gallery">
                                            <img src="sistema/img/eventos/galeria/<?php echo $imagem_gallery ?>" alt="" class="image_gallery_eve">
                                        </a>
                                    <?php
                                    }
                                }

                                // Se não encontrou imagens válidas, mostra a mensagem
                                if (!$tem_imagem_valida) {
                                    ?>
                                    <span>Nenhuma imagem disponível para este evento!</span>
                                <?php
                                }
                            } else { // Caso não haja imagens disponíveis 
                                ?>
                                <span>Nenhuma imagem disponível para este evento!</span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="highlight_tabs_eve">
                        <div class="box_guest_eve_r">
                            <?php
                            $convidados = [
                                ['imagem' => $imagem1, 'nome' => $convidado1, 'descricao' => $descr_conv1],
                                ['imagem' => $imagem2, 'nome' => $convidado2, 'descricao' => $descr_conv2],
                                ['imagem' => $imagem3, 'nome' => $convidado3, 'descricao' => $descr_conv3],
                                ['imagem' => $imagem4, 'nome' => $convidado4, 'descricao' => $descr_conv4],
                            ];

                            $convidados_filter = array_filter($convidados, function ($convidado) {
                                return !empty($convidado['nome'] && !empty($convidado['descricao']) && !empty($convidado['imagem']));
                            });

                            if (!empty($convidados_filter)) {
                                foreach ($convidados_filter as $convidado) {
                            ?>
                                    <div class="card_gue_eve">
                                        <img src="sistema/img/eventos/<?php echo htmlspecialchars($convidado['imagem']) ?>" alt="" class="img_gu_e">

                                        <div class="flex_info_gu">
                                            <h4 class="name_gus"><?php echo htmlspecialchars($convidado['nome']) ?></h4>
                                            <p class="txt_p_gu"><?php echo htmlspecialchars($convidado['descricao']) ?></p>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <span>Nenhum convidado especial para este evento!</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="area_details_eve_inf">
                    <?php if ($tipo != 'Evento com Inscrição') { ?>

                    <?php } else { ?>
                        <div class="sub_box">
                            <div class="subscribe">
                                <div class="head_subscribe">
                                    <img src="assets/img/ticket.svg" class="icon_sub">
                                    <h3 class="title_sub">Inscrição</h3>
                                </div>
                                <div class="area_subscribe">
                                    <a href="inscricao-<?php echo $url ?>" class="subscribe_button">Inscrever-se</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="area_countdown">
                        <?php
                        // Defina a data do evento
                        $dataEvento = $data_evento . '' . $hora; // Exemplo: 25 de dezembro de 2024

                        // Converta a data do evento para timestamp Unix (segundos desde 1970)
                        $timestampEvento = strtotime($dataEvento);

                        // Obtenha o timestamp atual
                        $timestampAtual = time();

                        // Calcule a diferença em segundos entre a data atual e a data do evento
                        $diferencaSegundos = $timestampEvento - $timestampAtual;

                        // Envie a diferença em segundos para o JavaScript
                        ?>
                        <div class="countdown_eve">
                            <div class="head_countdwon">
                                <img src="assets/img/time.svg" class="icon_time">
                                <h2 class="title_countdown">O Evento começa em</h2>
                            </div>

                            <div class="countdown_box">
                                <div id="countdown_txt"></div>
                                <?php if ($diferencaSegundos < 0) { ?>

                                <?php } else { ?>
                                    <div class="countdown">
                                        <div class="count">
                                            <span class="number_count" id="countdown_day"></span>
                                            <span class="det_inf">Dias</span>
                                        </div>
                                        <div class="count">
                                            <span class="number_count" id="countdown_hour"></span>
                                            <span class="det_inf">Horas</span>
                                        </div>
                                        <div class="count">
                                            <span class="number_count" id="countdown_minutes"></span>
                                            <span class="det_inf">Min</span>
                                        </div>
                                        <div class="count">
                                            <span class="number_count" id="countdown_seconds"></span>
                                            <span class="det_inf">Sec</span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="eve_organization">
                        <div class="head_organization">
                            <img class="img_organization" src="sistema/img/igrejas/<?php echo $foto_igreja ?>"></img>
                            <h2 class="title_org">Organização do Evento</h2>
                        </div>
                        <div class="area_org">
                            <div class="image_org">
                                <img src="assets/img/Logo-IBMM.png" class="img_ib" alt="">
                            </div>
                            <a href="#" class="title_org_eve"><?php echo $nome_igreja ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
</section>



<script type="text/javascript">
    const tabs = document.querySelectorAll('.tab_btn');
    const all_content = document.querySelectorAll('.highlight_tabs_eve');

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', (e) => {
            tabs.forEach(tab => {
                tab.classList.remove('active')
            });
            tab.classList.add('active');

            all_content.forEach(content => {
                content.classList.remove('active')
            });
            all_content[index].classList.add('active');

            const line = document.querySelector('.line');
            line.style.width = e.target.offsetWidth + "px";
            line.style.left = e.target.offsetLeft + "px";
        })
    });
    




    // Recebe a diferença em segundos do PHP
    var diferencaSegundos = <?php echo $diferencaSegundos; ?>;

    // Função para atualizar a contagem regressiva
    function atualizarContagemRegressiva() {
        var dias, horas, minutos, segundos;

        // Se a diferença de segundos for maior que 0
        if (diferencaSegundos > 0) {
            // Cálculos para dias, horas, minutos e segundos
            dias = Math.floor(diferencaSegundos / (60 * 60 * 24));
            horas = Math.floor((diferencaSegundos % (60 * 60 * 24)) / (60 * 60));
            minutos = Math.floor((diferencaSegundos % (60 * 60)) / 60);
            segundos = Math.floor(diferencaSegundos % 60);

            // Exibe a contagem regressiva no HTML
            document.getElementById("countdown_day").innerHTML = dias
            document.getElementById("countdown_hour").innerHTML = horas
            document.getElementById("countdown_minutes").innerHTML = minutos
            document.getElementById("countdown_seconds").innerHTML = segundos

            // Decrementa a diferença de segundos
            diferencaSegundos--;

            // Atualiza a cada 1 segundo
            setTimeout(atualizarContagemRegressiva, 1000);
        } else {
            // Quando a contagem chegar a zero
            document.getElementById("countdown_txt").innerHTML = "O evento começou!";
        }
    }

    // Inicializa a contagem regressiva ao carregar a página
    window.onload = function() {
        atualizarContagemRegressiva();
    };
</script>

</body>

</html>