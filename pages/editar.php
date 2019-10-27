<?php
    require_once '../class/conexao.php';

    $conexao = Conexao::getInstance();
    $idProduto = $_GET['id'];

    $select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE id_produto=? AND `produto`.`fornecedor_id`=`fornecedor`.`id_fornecedor`");
    $select->execute(array($idProduto));
    $res = $select->fetchAll();

    $buscarFornecedores = $conexao->Conectar()->prepare("SELECT * FROM fornecedor");
    $buscarFornecedores->execute();
    $resFornecedores = $buscarFornecedores->fetchAll();

    foreach ($res as $value){
        $nome = $value['nome_produto'];
        $quantidade = $value['quantidade_produto'];
        $valorCompra = $value['valorCompra_produto'];
        $valorVenda = $value['valorVenda_produto'];
    }

    if(isset($_POST['editarProduto'])) {
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $fornecedor = $_POST['fornecedor'];
        $valorCompra = $_POST['valorCompra'];
        $valorVenda = $_POST['valorVenda'];

        $update = $conexao->Conectar()->prepare("UPDATE produto SET nome_produto=?,valorCompra_produto=?,valorVenda_produto=?,quantidade_produto=?,fornecedor_id=? WHERE id_produto=?");
        $update->execute(array($nome,$valorCompra,$valorVenda,$quantidade,$fornecedor,$idProduto));


        if($update == true){
            echo "<script>window.alert('Produto editado');
					window.location.href = 'home.php'</script>";
        }

    }
    ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <!--EDITAR PRODUTO------------------------------------------------------------------------------------------------------->
    <div id="DIVcadastrarProduto">
        <div class="card text-center" style="background-color: gray; color: #FFFFFF">
            <div class="card-header">
                Editar Produto
            </div>
        </div><br>
        <form id="formProduto" method="POST">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" class="form-control" id="inputEmail4" required name="nome" placeholder="Informe o nome completo" value="<?php echo $nome; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Quantidade</label>
                    <input type="number" class="form-control" id="inputPassword4" required name="quantidade" placeholder="Informe a quantidade" value="<?php echo $quantidade; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Fornecedor</label>
                    <select id="inputState" class="form-control" required name="fornecedor">
                        <?php
                        foreach ($res as $value){?>
                            <option value="<?php echo $value['id_fornecedor']; ?>"> Atual = <?php echo $value['nome_fornecedor']; ?></option>
                        <?php } ?>

                        <option value="">--------------------------------------</option>

                        <?php foreach ($resFornecedores as $value){ ?>
                            <option value="<?php echo $value['id_fornecedor']; ?>"><?php echo $value['nome_fornecedor']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Valor de compra</label>
                    <input type="text" class="form-control" id="inputCity" required name="valorCompra" placeholder="Informe o valor" value="<?php echo $valorCompra; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">Valor de venda</label>
                    <input type="text" class="form-control" id="inputZip" required name="valorVenda" placeholder="Informe o valor" value="<?php echo $valorVenda; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="editarProduto">Editar</button>
        </form>
    </div>
    <!--EDITAR PRODUTO------------------------------------------------------------------------------------------------------->

</body>
</html>