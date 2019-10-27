<?php

   require_once '../class/Produtos.php';

    $produto = Produtos::getInstance();

    $produto->setNome($_POST['nome']);
    $produto->setDataEntrada($_POST['entrada']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setValorCompra($_POST['valorCompra']);
    $produto->setValorVenda($_POST['valorVenda']);
    $produto->setIdProduto($_POST['fornecedor']);

    $produto->Cadastrar();
?>