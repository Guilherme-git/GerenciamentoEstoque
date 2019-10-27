<?php
    require_once '../class/Clientes.php';

    $cliente = Clientes::getInstance();

    $cliente->setNome($_POST['nome']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setCidade($_POST['cidade']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setNacimento($_POST['nacimento']);

    $cliente->Cadastrar();
    ?>