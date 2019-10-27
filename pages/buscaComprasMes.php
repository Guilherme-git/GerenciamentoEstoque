<?php
    require_once '../class/conexao.php';
    require_once '../class/Produtos.php';

    $produtos = Produtos::getInstance();
    $conexao = Conexao::getInstance();
    $valorTotal = 0;
    //$mesAtual = date("m");
   // $anoAtual = date("Y");
    //$select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE `produto`.`fornecedor_id` = `fornecedor`.`id_fornecedor` AND MONTH (dataEntrada_produto) =? AND YEAR (dataEntrada_produto) = ?");
    //$select->execute(array($mesAtual,$anoAtual));
    $res = $produtos->ComprasMes();


    foreach ($res as $value) {
    $valorTotal +=  $value['valorCompra_produto'];
?>
        <tr>
            <td><?php echo $value['nome_produto']?></td>
            <td><?php echo $value['nome_fornecedor']; ?></td>
            <td><?php echo $value['quantidade_produto'];?></td>
            <td><?php echo $value['valorCompra_produto'];?></td>
        </tr>
<?php } ?>
        <tr  style="background-color: #a21318; color: white;">
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo "TOTAL = ". $valorTotal." R$"; ?></td>
        </tr>