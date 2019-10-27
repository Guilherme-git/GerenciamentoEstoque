<?php
    require_once '../class/conexao.php';
    $conexao = Conexao::getInstance();

    $buscarFornecedores = $conexao->Conectar()->prepare("SELECT * FROM fornecedor");
    $buscarFornecedores->execute();
    $res = $buscarFornecedores->fetchAll();

    $busarProdutos = $conexao->Conectar()->prepare("SELECT id_produto,nome_produto FROM produto");
    $busarProdutos->execute();
    $res1 = $busarProdutos->fetchAll();

    $buscarCLientes = $conexao->Conectar()->prepare("SELECT id_cliente,nome_cliente FROM cliente");
    $buscarCLientes->execute();
    $res2 = $buscarCLientes->fetchAll();

?>
<!doctype html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Pagina Inicial</title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #363636; border-radius: 5px">
        <a class="navbar-brand" href="" id="home"><img src="../img/Inicial.png" alt="" srcset=""></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="Cadastros" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="Cadastros">
                        <li><a  class="dropdown-item" href="" id="cadFornecedor">Fornecedor</a></li>
                        <li> <a class="dropdown-item" href="" id="cadCliente">Clientes</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="Estoque" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Estoque
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="Estoque">
                        <li><a  class="dropdown-item" href="" id="CadProduto">Cadastrar Produtos</a></li>
                        <li> <a class="dropdown-item" href="" id="VerEstatisticas">Estatísticas</a></li>
                        <li> <a class="dropdown-item" href="" id="MenuEstoque">Estoque</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" tabindex="-1" id="cadVenda" aria-disabled="true">Vendas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <!--CADASTRAR CLIENTE------------------------------------------------------------------------------------------------------->
            <div id="DIVcadastrarCliente">
                <div class="card text-center" style="background-color: gray; color: #FFFFFF">
                    <div class="card-header">
                        Cadastrar Cliente
                    </div>
                </div><br>
                <div class="card text-white bg-success mb-3"  id="CadastroClienteSucesso" style="width: 100%;">
                    <div class="card-header" style="text-align: center">Cadastrado com sucesso</div>
                </div>
                <div class="card text-white bg-danger mb-3" id="CadastroClienteErro" style="width: 100%;">
                    <div class="card-header" style="text-align: center">Erro ao cadastrar</div>
                </div>
                <form id="formCliente">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nome</label>
                            <input type="text" class="form-control" id="inputEmail4" required name="nome" placeholder="Informe o nome completo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Telefone</label>
                            <input type="text" class="form-control telefone" id="inputPassword4" required name="telefone" placeholder="Informe o telefone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" id="inputAddress" required name="endereco" placeholder="Informe o endereço">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Cidade</label>
                            <input type="text" class="form-control" required id="inputCity" name="cidade" placeholder="Informe a cidade">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Lcpf">CPF</label>
                            <input type="text" class="form-control" required id="Lcpf" name="cpf" placeholder="Informe o CPF">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputDATE">Nacimento</label>
                            <input type="date" class="form-control" required name="nacimento" id="inputDATE">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="cadastrarCliente">Cadastrar</button>
                </form>
            </div>
        <!--CADASTRAR CLIENTE------------------------------------------------------------------------------------------------------->





        <!--CADASTRAR FORNECEDOR------------------------------------------------------------------------------------------------------>
        <div id="DIVcadastrarFornecedor">
            <div class="card text-center" style="background-color: gray; color: #FFFFFF">
                <div class="card-header">
                    Cadastrar Fornecedor
                </div>
            </div><br>
            <div class="card text-white bg-success mb-3" id="CadastroFornecedorSucesso" style="width: 100%;">
                <div class="card-header"  style="text-align: center">Cadastrado com sucesso</div>
            </div>
            <div class="card text-white bg-danger mb-3" id="CadastroFornecedorErro" style="width: 100%;">
                <div class="card-header"  style="text-align: center">Erro ao cadastrar</div>
            </div>
            <form id="formFornecedor">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome</label>
                        <input type="text" class="form-control nome" id="inputEmail4" required name="nome" placeholder="Informe o nome completo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Telefone</label>
                        <input type="text" class="form-control telefone" id="inputPassword4" required name="telefone" placeholder="Informe o telefone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Endereço</label>
                    <input type="text" class="form-control endereco" id="inputAddress" required name="endereco" placeholder="Informe o endereço">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control cidade" id="inputCity" required name="cidade" placeholder="Informe a cidade">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Lcnpj">CNPJ</label>
                        <input type="text" class="form-control cnpj" id="Lcnpj" required name="cnpj" placeholder="Informe o CNPJ">
                    </div>

                </div>
                <button type="submit" class="btn btn-success" name="cadastrarFornecedor">Cadastrar</button>
            </form>
        </div>
        <!--CADASTRAR FORNECEDOR------------------------------------------------------------------------------------------------------>






        <!--CADASTRAR PRODUTO------------------------------------------------------------------------------------------------------->
        <div id="DIVcadastrarProduto">
            <div class="card text-center" style="background-color: gray; color: #FFFFFF">
                <div class="card-header">
                    Cadastrar Produto
                </div>
            </div><br>
            <div class="card text-white bg-success mb-3" id="CadastroProdutoSucesso" style="width: 100%;">
                <div class="card-header"  style="text-align: center">Cadastrado com sucesso</div>
            </div>
            <div class="card text-white bg-danger mb-3" id="CadastroProdutoErro" style="width: 100%;">
                <div class="card-header"  style="text-align: center">Erro ao cadastrar</div>
            </div>
            <form id="formProduto">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">Nome</label>
                        <input type="text" class="form-control" id="inputEmail4" required name="nome" placeholder="Informe o nome completo">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Quantidade</label>
                        <input type="number" class="form-control" id="inputPassword4" required name="quantidade" placeholder="Informe a quantidade">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Fornecedor</label>
                        <select id="inputState" class="form-control" required name="fornecedor">
                            <?php
                                foreach ($res as $value){
                            ?>
                                <option value="<?php echo $value['id_fornecedor']; ?>"><?php echo $value['nome_fornecedor']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Valor de compra</label>
                        <input type="text" class="form-control" id="inputCity" required name="valorCompra" placeholder="Informe o valor">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputZip">Valor de venda</label>
                        <input type="text" class="form-control" id="inputZip" required name="valorVenda" placeholder="Informe o valor">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputDATE">Data de entrada</label>
                        <input type="date" class="form-control" name="entrada" required id="inputDATE">
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="cadastrarProduto">Cadastrar</button>
            </form>
        </div>
        <!--CADASTRAR PRODUTO------------------------------------------------------------------------------------------------------->



        <!--ESTATISTICAS------------------------------------------------------------------------------------------------------>
        <div id="estatisticas">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <div class="btn-group-vertical">
                        <button type="button" class="btn btn-outline-dark" id="btnUltimasVendas">Últimas Vendas</button>
                        <button type="button" class="btn btn-outline-dark" id="btnEstoqueBaixo">Estoque Baixo</button>
                        <button type="button" class="btn btn-outline-dark" id="btnEstoqueAlto">Estoque Alto</button>
                        <button type="button" class="btn btn-outline-dark" id="btnComprasMes">Compras do mês</button>
                    </div>
                </div>
                <div class="form-group col-md-9">
                    <div id="UltimasVendas">
                        <div class="form-row">
                            <div class="form-group col-md-3">

                            </div>
                            <div class="form-group col-md-2">

                            </div>
                            <div class="form-group col-md-5">

                            </div>
                            <div class="form-group col-md-2">
                                <a class="btn btn-outline-success" href="PDFultimasVendas.php">Relatório</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nome do produto</th>
                                <th>Nome do cliente</th>
                                <th>Quantidade comprada</th>
                                <th>Data da venda</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div id="EstoqueBaixo">
                        <div class="form-row">
                            <div class="form-group col-md-3">

                            </div>
                            <div class="form-group col-md-2">

                            </div>
                            <div class="form-group col-md-5">

                            </div>
                            <div class="form-group col-md-2">
                                <a class="btn btn-outline-success" href="PDFestoqueBaixo.php">Relatório</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome do Produto</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                                <tbody>

                                </tbody>
                        </table>
                    </div>

                    <div id="EstoqueAlto">
                        <div class="form-row">
                            <div class="form-group col-md-3">

                            </div>
                            <div class="form-group col-md-2">

                            </div>
                            <div class="form-group col-md-5">

                            </div>
                            <div class="form-group col-md-2">
                                <a class="btn btn-outline-success" href="PDFestoqueAlto.php">Relatório</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome do Produto</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div id="ComprasMes">
                        <div class="form-row">
                            <div class="form-group col-md-3">

                            </div>
                            <div class="form-group col-md-2">

                            </div>
                            <div class="form-group col-md-5">

                            </div>
                            <div class="form-group col-md-2">
                                <a class="btn btn-outline-success" href="PDFcomprasMes.php">Relatório</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nome do Produto</th>
                                <th>Fornecedor</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--ESTATISTICAS------------------------------------------------------------------------------------------------------>






        <!--ESTOQUE------------------------------------------------------------------------------------------------------>
            <div id="MostrarEstoque">
                <form id="formEstoque">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="produto" name="produto" placeholder="Digite o nome do produto">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-outline-info" id="btnPesquisar">Pesquisar</button>
                        </div>
                        <div class="form-group col-md-5">

                        </div>
                        <div class="form-group col-md-2">
                            <a class="btn btn-outline-success" href="PDFestoque.php">Relatório</a>
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome do Produto</th>
                            <th>Fornecedor</th>
                            <th>Quantidade no Estoque</th>
                            <th>Valor de Compra</th>
                            <th>Valor de Venda</th>
                            <th>Data de Entrada</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        <!--ESTOQUE------------------------------------------------------------------------------------------------------>




        <!--REALIZAR VENDA------------------------------------------------------------------------------------------------------->
        <div id="DIVrealizarVenda">
            <div class="card text-center" style="background-color: gray; color: #FFFFFF">
                <div class="card-header">
                    Realizar Venda
                </div>
            </div><br>
            <div class="card text-white bg-success mb-3"  id="VendaSucesso" style="width: 100%;">
                <div class="card-header" style="text-align: center">Venda realizada com sucesso</div>
            </div>
            <div class="card text-white bg-danger mb-3" id="VendaErro" style="width: 100%;">
                <div class="card-header" style="text-align: center">Erro na venda</div>
            </div>
            <form id="formVenda">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome do produto</label>
                        <select id="nomeProduto" class="form-control" required name="nomeProduto">
                            <option value="" >Selecione um produto</option>
                            <?php foreach ($res1 as $value){ ?>
                            <option value="<?php echo $value['id_produto']; ?>" ><?php echo $value['nome_produto']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Cliente</label>
                        <select id="inputState" class="form-control" required name="nomeCliente">
                            <option value="" >Selecione um cliente</option>
                            <?php foreach ($res2 as $value) {?>
                            <option value="<?php echo $value['id_cliente']; ?>" ><?php echo $value['nome_cliente']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputPassword4" >Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" required name="quantidade" placeholder="Quantidade">
                        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword5" >Valor a pagar</label>
                        <input type="text" class="form-control" id="valorPagar" required name="valorPagar" placeholder="Valor a pagar">
                    </div>
                    <div class="form-group col-md-3" id="PVenda">
                       

                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="RealizarVenda">Realizar Venda</button>
            </form>
        </div>
        <!--REALIZAR VENDA------------------------------------------------------------------------------------------------------->
    </div>








        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.mask.min.js"></script>
        <script src="../js/home.js"></script>

</body>
</html>



