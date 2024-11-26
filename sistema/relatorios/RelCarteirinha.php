<?php
require_once("../conexao.php");



$id = $_GET['id'];

//ALIMENTANDO OS DADOS DO RELATÓRIO
$html = file_get_contents($url_sistema . "relatorios/relCarteirinhaHtml.php?id=$id");

if ($relatorio_pdf != 'Sim') {
    echo $html;
    exit();
}

//CARREGANDO DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

//INICIALIZANDO A CLASSE DO DOMPDF
$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new DOMPDF($options);

//DEFININDO O TAMANHO DO PAPEL E ORIENTAÇÃO DA PÁGINA
//$pdf->set_paper(array(0, 0, 841.89, 595.28)); //Tamanho folha A4 (Paisagem)
$pdf->set_paper(array(0, 0, 255.11, 141.73)); //Tamanho folha 9x5cm (Paisagem)

//CARREGANDO O CONTEÚDO HTML
$pdf->load_html($html);

//RENDERIZANDO O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
    'carteirinha.pdf',
    array("Attachment" => false)
);

?>