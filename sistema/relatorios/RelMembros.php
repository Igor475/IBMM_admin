<?php 
require_once("../conexao.php");



$igreja = $_POST['igreja'];
$status = $_POST['status'];
$cargo = $_POST['cargo'];


//ALIMENTANDO OS DADOS DO RELATÓRIO
$html = file_get_contents($url_sistema."relatorios/RelMembrosHtml.php?igreja=$igreja&status=$status&cargo=$cargo");

if($relatorio_pdf != 'Sim') {
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
$pdf->stream('membros.pdf', 
array("Attachment" => false)
);

?>