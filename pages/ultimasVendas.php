<?php
    require_once '../class/conexao.php';

    $conexao = Conexao::getInstance();

    $select = $conexao->Conectar()->prepare("SELECT * FROM venda INNER JOIN cliente ON `venda`.`cliente_id` = `cliente`.`id_cliente` INNER JOIN produto ON `venda`.`produto_id` = `produto`.`id_produto` ORDER BY `venda`.`id_venda` DESC LIMIT 15");
    $select->execute();
    $res = $select->fetchAll();

    foreach ($res as $value){
        $data = date('d/m/Y',strtotime($value['data_venda']));
?>
        <tr>
            <td><?php echo $value['nome_produto']; ?></td>
            <td><?php echo $value['nome_cliente']; ?></td>
            <td><?php echo $value['quantidade_venda']; ?></td>
            <td><?php echo $data; ?></td>
        </tr>
<?php } ?>
