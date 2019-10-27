<?php
    require_once '../class/Produtos.php';

    $estoque = Produtos::getInstance();
    $res = $estoque->Listar();


    if(count($res) > 0) {
        foreach ($res as $value) {
            $data = date('d/m/Y',strtotime($value['dataEntrada_produto']));
?>

         <tr>
            <td><?php echo $value['nome_produto']; ?></td>
            <td><?php echo $value['nome_fornecedor']; ?></td>
            <td><?php echo $value['quantidade_produto']; ?></td>
            <td><?php echo $value['valorCompra_produto']; ?></td>
            <td><?php echo $value['valorVenda_produto']; ?></td>
            <td><?php echo $data; ?></td>
            <td><a class="btn btn-danger" id="excluir" href="excluir.php?id=<?php echo $value['id_produto'];?>">Excluir</a></td>
             <td><a class="btn btn-warning" href="editar.php?id=<?php echo $value['id_produto'];?>">Editar</a></td>
        </tr>


<?php } }else{ ?>
        <td><?php echo "Não contem produtos" ?></td>
<?php } ?>



