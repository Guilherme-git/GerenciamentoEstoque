<?php
    require_once '../vendor/autoload.php';
    require_once '../class/conexao.php';

    $conexao = Conexao::getInstance();

    use Dompdf\Dompdf;

    $select = $conexao->Conectar()->prepare("SELECT * FROM venda INNER JOIN cliente ON `venda`.`cliente_id` = `cliente`.`id_cliente` INNER JOIN produto ON `venda`.`produto_id` = `produto`.`id_produto` ORDER BY `venda`.`id_venda` DESC LIMIT 15");
    $select->execute();
    $res = $select->fetchAll();

    $html= '<table border=1 width=100% cellspacing=0 cellpadding=0>';
    $html.= '<thead>';
    $html.= '<tr>';
    $html.= '<th align = center>Nome do Produto</th>';
    $html.= '<th align = center>Nome do Cliente</th>';
    $html.= '<th align = center>Quantidade Comprada</th>';
    $html.= '<th align = center>Data da Venda</th>';
    $html.= '</tr>';
    $html.= '</thead>';


    foreach ($res as $key => $value) {
        $data = date('d/m/Y',strtotime($value['data_venda']));
        $html.='<tbody>';
        $html.='<tr>';
        $html.= '<td align = center>'.$value['nome_produto'].'</td>';
        $html.= '<td align = center>'.$value['nome_cliente'].'</td>';
        $html.= '<td align = center>'.$value['quantidade_venda'].'</td>';
        $html.= '<td align = center>'.$data.'</td>';
        $html.='</tr>';
        $html.='</tbody>';
    }
    $html.='</table>';

    $dompdf = new Dompdf();

    $dompdf->loadHtml("<h1 style= text-align:center>Relatório das últimas vendas</h1>" .$html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream('Relatio.pdf', array('Attachment' => false ));
?>