<?php
    require_once '../class/Fornecedor.php';

    $fornecedor = Fornecedor::getInstance();

    $fornecedor->setNome($_POST['nome']);
    $fornecedor->setTelefone($_POST['telefone']);
    $fornecedor->setEndereco($_POST['endereco']);
    $fornecedor->setCidade($_POST['cidade']);
    $fornecedor->setCnpj($_POST['cnpj']);

    $fornecedor->Cadastrar();

?>