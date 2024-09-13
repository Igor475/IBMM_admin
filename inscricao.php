<?php

require_once("cabecalho.php");

$url = @$_GET['evento'];

$query = $pdo->query("SELECT * FROM eventos where igreja = '$id_igreja' and url = '$url' and ativo = 'Sim' and 
            tipo = 'Evento com Inscrição' order by id desc LIMIT 1");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if ($total_reg > 0) {
    for ($i = 0; $i < $total_reg; $i++) {
        foreach ($res[$i] as $key => $value) {
        }
        $titulo = $res[$i]['titulo'];
        $subtitulo = $res[$i]['subtitulo'];
        $descricao1 = $res[$i]['descricao1'];
        $data_evento = $res[$i]['data_evento'];
        $id = $res[$i]['id'];
        $banner = $res[$i]['banner'];
        $imagem = $res[$i]['imagem'];
        $tipo = $res[$i]['tipo'];
        $url = $res[$i]['url'];
        $video = $res[$i]['video'];
        $pregador = $res[$i]['pregador'];

?>
            <div class="section_insc_page">
                <h1><?php echo $titulo ?></h1>
            </div>

<?php }
} else {
    // Caso o evento não seja encontrado
    echo "<script language='javascript'>$(function (){ RedirectionEvent('Este evento não possui inscrição!', '$url') });</script>";
    exit;
} ?>


<script type="text/javascript">

</script>

<!-- alert('Evento não encontrado!');*/ 
    echo "<script>window.location.href='eventos.php';</script>";
-->