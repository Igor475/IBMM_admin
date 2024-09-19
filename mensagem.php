<?php

require_once("cabecalho.php");

$url = @$_GET['mensagem'];

if (@$_GET['pagina'] != null) {
    $pag = $_GET['pagina'];
} else {
    $pag = 0;
}

$limite = $pag * $itens_por_pagina;
$pagina = $pag;
$nome_pag = 'mensagens.php';

$query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);
if ($total_reg > 0) {

    $titulo = $res[0]['titulo'];
    $subtitulo = $res[0]['subtitulo'];
    $data_evento = $res[0]['data_evento'];
    $id = $res[0]['id'];
    $banner = $res[0]['banner'];
    $url = $res[0]['url'];
    $video = $res[0]['video'];
    $pregador = $res[0]['pregador'];
    $insc_evento = $res[0]['insc_evento'];
    $descricao1 = $res[0]['descricao1'];
    $descricao2 = $res[0]['descricao2'];
    $descricao3 = $res[0]['descricao3'];
    $tipo = $res[0]['tipo'];
    $imagem = $res[0]['imagem'];
    $hora = $res[0]['hora_evento'];


    $data_eventoF = implode('/', array_reverse(explode('-', $data_evento)));
    $hora  = (new DateTime($hora))->format('H:i');


    $query = $pdo->query("SELECT * FROM usuarios where id = '$pregador'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = count($res);
    if($total_reg > 0) {
        $nome_pregador = $res[0]['nome'];
    } else {
        $nome_pregador = 'Nenhum!';
    }
}

?>


<section class="video_container_pag_sermon">
    <div class="container">
        <?php if ($video != '') { ?>
            <div class="video-container">
                <iframe src="<?php echo $video ?>" width="100%" height="450px"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <?php } else {
            if ($imagem != "") { ?>
                <img src="sistema/img/eventos/<?php echo $imagem ?>" class="img__replace" alt="">
        <?php }
        } ?>

        <div class="area_sermon_inf_pag">
            <h3><?php echo $titulo ?></h3>
            <span><?php echo $nome_pregador ?>&nbsp; • &nbsp;<?php echo $data_eventoF ?></span>
            <?php if ($descricao1 != "") { ?>
                <p><?php echo $descricao1 ?></p>
            <?php } ?>
            <?php if ($descricao2 != "") { ?>
                <p><?php echo $descricao2 ?></p>
            <?php } ?>
            <?php if ($descricao3 != "") { ?>
                <p><?php echo $descricao3 ?></p>
            <?php } ?>
        </div>

        <div class="more_sermon_pag">
            <a href="#" class="card_more_rgh">
                <img src="assets/img/doacao.svg" alt="" class="img__svg__more">
                <h4>Doar Agora</h4>
            </a>
            <a href="#" class="card_more_rgh">
                <img src="assets/img/youtube.svg" alt="" class="img__svg__more">
                <h4>YouTube</h4>
            </a>
            <a href="#" class="card_more_rgh">
                <img src="assets/img/compartilhar.svg" alt="" class="img__svg__more">
                <h4>Compartilhar</h4>
            </a>
        </div>

        <div class="area_cont_faith_f">
            <div class="flex_ti_after">
                <h1 class="title ti_faith">Dê o próximo passo</h1>
            </div>

            <div class="boxes_cards_words">
                <div class="box_card_svcbn">
                    <a href="#" class="link__steps">
                        <img src="assets/img/seja membro.jpg" alt="" class="img_ca_skjh">
                    </a>
                    <div class="content_faith_info">
                        <a href="#">Junte-se a uma célula</a>
                        <span>Encontrar célula</span>
                    </div>
                </div>
                <div class="box_card_svcbn">
                    <a href="#" class="link__steps">
                        <img src="assets/img/seja membro.jpg" alt="" class="img_ca_skjh">
                    </a>
                    <div class="content_faith_info">
                        <a href="#">Peça oração</a>
                        <span>Estamos aqui para você</span>
                    </div>
                </div>
                <div class="box_card_svcbn">
                    <a href="#" class="link__steps">
                        <img src="assets/img/seja membro.jpg" alt="" class="img_ca_skjh">
                    </a>
                    <div class="content_faith_info">
                        <a href="#">Seja Batizado</a>
                        <span>Dê o próximo passo para Cristo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>