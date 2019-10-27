<?php
    require_once '../class/Produtos.php';

    $produto = Produtos::getInstance();
    $id = $_GET['id'];

    if($produto->ExcluirProduto($id) == true ) {
        echo "<script>window.alert('Excluido com sucesso');
				window.location.href = 'home.php'</script>";
    }
?>