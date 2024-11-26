<?php
require_once("../conexao.php");

$igreja = $_POST['igreja'];
if (isset($_POST['tipo'])) {
    $tipo = @$_POST['tipo'];
} else {
    $tipo = "";
}
$dataInicial = $_POST['dataInicial'];
$dataFinal = $_POST['dataFinal'];
$movimento = $_POST['movimento'];


//ALIMENTANDO OS DADOS DO RELATÓRIO
$html = file_get_contents($url_sistema . "relatorios/relFinanceiroHtml.php?igreja=$igreja&tipo=$tipo&movimento=$movimento&dataInicial=$dataInicial&dataFinal=$dataFinal");

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
$pdf->set_paper('A4', 'portrait');

//CARREGANDO O CONTEÚDO HTML
$pdf->load_html($html);

//RENDERIZANDO O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
    'financeiro.pdf',
    array("Attachment" => false)
);

?>