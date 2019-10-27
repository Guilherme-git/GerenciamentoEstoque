<?php
    require_once '../class/Produtos.php';

    $produtos = Produtos::getInstance();
    $res = $produtos->EstoqueAlto();

    foreach ($res as $value){
?>
        <tr>
            <td><?php echo $value['nome_produto']?></td>
            <td><?php echo $value['nome_fornecedor']; ?></td>
            <td><?php echo $value['quantidade_produto'];?></td>
        </tr>
<?php  } ?>