<?php
require_once '../vendor/autoload.php';
require_once '../class/conexao.php';

$conexao = Conexao::getInstance();

use Dompdf\Dompdf;

$select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE quantidade_produto<=? AND `produto`.`fornecedor_id`=`fornecedor`.`id_fornecedor`");
$select->execute(array(15));
$res = $select->fetchAll();


$html= '<table border=1 width=100% cellspacing=0 cellpadding=0>';
$html.= '<thead>';
$html.= '<tr>';
$html.= '<th align = center>Nome do Produto</th>';
$html.= '<th align = center>Fornecedor</th>';
$html.= '<th align = center>Quantidade</th>';
$html.= '</tr>';
$html.= '</thead>';


foreach ($res as $key => $value) {
    $html.='<tbody>';
    $html.='<tr>';
    $html.= '<td align = center>'.$value['nome_produto'].'</td>';
    $html.= '<td align = center>'.$value['nome_fornecedor'].'</td>';
    $html.= '<td align = center>'.$value['quantidade_produto'].'</td>';
    $html.='</tr>';
    $html.='</tbody>';
}
$html.='</table>';

$dompdf = new Dompdf();

$dompdf->loadHtml("<h1 style= text-align:center>Produtos com Quantidade Baixa no Estoque</h1>" .$html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('Relatio.pdf', array('Attachment' => false ));

?>