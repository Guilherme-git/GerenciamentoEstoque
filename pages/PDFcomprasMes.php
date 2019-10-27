<?php
    require_once '../vendor/autoload.php';
    require_once '../class/conexao.php';

    $conexao = Conexao::getInstance();

    use Dompdf\Dompdf;
    $valorTotal = 0;
    $mesAtual = date("m");
    $anoAtual = date("Y");
    $select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE `produto`.`fornecedor_id` = `fornecedor`.`id_fornecedor` AND MONTH (dataEntrada_produto) =$mesAtual AND YEAR (dataEntrada_produto) = $anoAtual");
    $select->execute();
    $res = $select->fetchAll();

    $html= '<table border=1 width=100% cellspacing=0 cellpadding=0>';
    $html.= '<thead>';
    $html.= '<tr>';
    $html.= '<th align = center>Nome do Produto</th>';
    $html.= '<th align = center>Fornecedor</th>';
    $html.= '<th align = center>Quantidade</th>';
    $html.= '<th align = center>Valor</th>';
    $html.= '</tr>';
    $html.= '</thead>';


foreach ($res as $key => $value) {
    $valorTotal +=  $value['valorCompra_produto'];
    $html.='<tbody>';
    $html.='<tr>';
    $html.= '<td align = center>'.$value['nome_produto'].'</td>';
    $html.= '<td align = center>'.$value['nome_fornecedor'].'</td>';
    $html.= '<td align = center>'.$value['quantidade_produto'].'</td>';
    $html.= '<td align = center>'.$value['valorCompra_produto'].'</td>';
    $html.='</tr>';

}
    $html.='<tr style="background-color: #a21318; color: white;">';
    $html.= '<td align = center>'.'</td>';
    $html.= '<td align = center>'.'</td>';
    $html.= '<td align = center>'.'</td>';
    $html.= '<td align = center>'.'TOTAL = '.$valorTotal.' R$'.'</td>';
    $html.='</tr>';
    $html.='</tbody>';
    $html.='</table>';

    $dompdf = new Dompdf();

    $dompdf->loadHtml("<h1 style= text-align:center>Relatório de compras do mês</h1>" .$html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream('Relatio.pdf', array('Attachment' => false ));
?>