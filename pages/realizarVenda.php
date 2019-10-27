<?php
    require_once '../class/conexao.php';

    $conexao = Conexao::getInstance();

    $nomeProduto = $_POST['nomeProduto'];
    $nomeCliente = $_POST['nomeCliente'];
    $quantidade = $_POST['quantidade'];
    $valorPagar = $_POST['valorPagar'];
    echo $data = date('Y/m/d');


    $insert = $conexao->Conectar()->prepare("INSERT INTO venda(quantidade_venda,valor_pago,data_venda,cliente_id,produto_id) VALUES(?,?,?,?,?)");
    $insert->execute(array($quantidade,$valorPagar,$data,$nomeCliente,$nomeProduto));

    $update = $conexao->Conectar()->prepare("UPDATE produto SET quantidade_produto=quantidade_produto-? WHERE id_produto=?");
    $update->execute(array($quantidade,$nomeProduto));

?>