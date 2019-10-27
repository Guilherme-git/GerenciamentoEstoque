$(document).ready(function(){
    EsconderDIVS();
    AplicarMascaras();



    function EsconderDIVS() {
        $('#DIVcadastrarCliente').hide();
        $('#DIVcadastrarFornecedor').hide();
        $('#DIVcadastrarProduto').hide('');
        $('#CadastroClienteSucesso').hide();
        $('#CadastroClienteErro').hide();
        $('#CadastroFornecedorSucesso').hide();
        $('#CadastroFornecedorErro').hide();
        $('#CadastroProdutoSucesso').hide();
        $('#CadastroProdutoErro').hide();
        $('#estatisticas').hide();
        $('#UltimasVendas').hide();
        $('#EstoqueBaixo').hide();
        $('#EstoqueAlto').hide();
        $('#ComprasMes').hide();
        $('#MostrarEstoque').hide();
        $('#VendaSucesso').hide();
        $('#VendaErro').hide();
        $('#DIVrealizarVenda').hide();
    }


    function AplicarMascaras() {
        $('#Lcpf').mask("000.000.000-00");
        $('#Lcnpj').mask("00.000.000/0000-00");
        $('.telefone').mask("(00)00000-0000");
    }

    function LimparCampos(formulario){
        if(formulario === 'fornecedor') {
            $('#formFornecedor').each(function () {
                this.reset();
            });
        }else if(formulario === 'cliente'){
            $('#formCliente').each(function () {
                this.reset();
            });
        }else if(formulario === 'produto'){
            $('#formProduto').each(function () {
                this.reset();
            });
        }else if(formulario === 'venda'){
            $('#formVenda').each(function () {
                this.reset();
            });
        }
    }

    $('#nomeProduto').on('change',function (e) {
        var dados = $(this).serialize();

        $.ajax({
            url: '../pages/venda.php',
            type: 'POST',
            data: dados,
            dataType: 'html',
            success:function (resposta) {
                $('#PVenda').html(resposta);
            }
        });
    });

    $('#formFornecedor').on('submit', function (e) {
        e.preventDefault();
        var dadosFomulario = $(this).serialize();

        $.ajax({
            url: '../pages/cadastrarFornecedor.php',
            type: 'POST',
            data: dadosFomulario,
            success: function () {
                $('#CadastroFornecedorSucesso').show();
                LimparCampos('fornecedor');
            },
            error: function () {
                $('#CadastroFornecedorErro').show();
            }
        });
    });

    $('#formCliente').on('submit', function (e) {
        e.preventDefault();
        var dadosFormulario = $(this).serialize();

        $.ajax({
            url: '../pages/cadastrarCliente.php',
            type: 'POST',
            data: dadosFormulario,
            success:function(){
                $('#CadastroClienteSucesso').show();
                LimparCampos('cliente');
            },
            error:function(){
                $('#CadastroClienteErro').show();
            }
        })
    });

    $('#formVenda').on('submit',function (e) {
        e.preventDefault();
        var dadosFormulario = $(this).serialize();

        $.ajax({
            url: '../pages/realizarVenda.php',
            type: 'POST',
            data: dadosFormulario,
            success:function (e) {
                LimparCampos('venda');
                $('#VendaSucesso').show();

            },
            error:function () {
                $('#vendaErro').show();
            }
        });
    });

    $('#formProduto').on('submit',function (e) {
        e.preventDefault();
        var dadosFormulario = $(this).serialize();

        $.ajax({
            url: '../pages/cadastrarProduto.php',
            type: 'POST',
            data: dadosFormulario,
            success:function(){
                $('#CadastroProdutoSucesso').show();
                LimparCampos('produto');
            },
            error:function(){
                $('#CadastroProdutoErro').show();
            }
        });
    });


    $('#formEstoque').on('submit',function (e) {
        e.preventDefault();
        var dadosFormulario = $(this).serialize();

        $.ajax({
            url: '../pages/mostrarPesquisaEstoque.php',
            type: 'POST',
            data: dadosFormulario,
            dataType: 'html',
            beforeSend:function(){
                $('#MostrarEstoque tbody').html('Carregando...');
            },
            success:function (resposta) {
                $('#MostrarEstoque tbody').html(resposta);
            }
        });
    });


    $('#btnEstoqueAlto').on('click',function () {
        $('#btnEstoqueAlto').addClass('active');
        $('#btnEstoqueBaixo').removeClass('active');
        $('#btnUltimasVendas').removeClass('active');
        $('#btnComprasMes').removeClass('active');
        $('#EstoqueBaixo').hide('slow');
        $('#UltimasVendas').hide('slow');
        $('#ComprasMes').hide('slow');

        $.ajax({
            url: '../pages/buscaEstoqueAlto.php',
            dataType: 'html',
            beforeSend:function () {
                $('#EstoqueAlto tbody').html("Carregando...");
            },
            success:function (resposta) {
                $('#EstoqueAlto').show('slow');
                $('#EstoqueAlto tbody').html(resposta);
            }
        });
    });

    $('#btnEstoqueBaixo').on('click',function(){
        $('#btnEstoqueBaixo').addClass('active');
        $('#btnEstoqueAlto').removeClass('active');
        $('#btnUltimasVendas').removeClass('active');
        $('#btnComprasMes').removeClass('active');
        $('#EstoqueAlto').hide('slow');
        $('#UltimasVendas').hide('slow');
        $('#ComprasMes').hide('slow');

        $.ajax({
            url:'../pages/buscaEstoqueBaixo.php',
            dataType: 'html',
            beforeSend:function(){
                $('#EstoqueBaixo tbody').html('Carregando...');
            },
            success:function (resposta) {
                $('#EstoqueBaixo').show('slow');
                $('#EstoqueBaixo tbody').html(resposta);
            },
        });
    });

    $('#btnUltimasVendas').on('click',function(){
        $('#btnUltimasVendas').addClass('active');
        $('#btnEstoqueAlto').removeClass('active');
        $('#btnEstoqueBaixo').removeClass('active');
        $('#btnComprasMes').removeClass('active');
        $('#EstoqueBaixo').hide('slow');
        $('#EstoqueAlto').hide('slow');
        $('#ComprasMes').hide('slow');
        $('#UltimasVendas').show('slow');

        $.ajax({
            url:'../pages/ultimasVendas.php',
            dataType: 'html',
            beforeSend:function () {
                $('#UltimasVendas tbody').html("Carregando...");
            },
            success:function (resposta) {
                $('#UltimasVendas').show(5000);
                $('#UltimasVendas tbody').html(resposta);
            }
        });
    });

    $('#btnComprasMes').on('click',function(){
        $('#btnComprasMes').addClass('active');
        $('#btnUltimasVendas').removeClass('active');
        $('#btnEstoqueAlto').removeClass('active');
        $('#btnEstoqueBaixo').removeClass('active');
        $('#UltimasVendas').hide('slow');
        $('#EstoqueBaixo').hide('slow');
        $('#EstoqueAlto').hide('slow');

        $.ajax({
            url: '../pages/buscaComprasMes.php',
            dataType: 'html',
            beforeSend:function(){
                $('#ComprasMes tbody').html('Carregando...');
            },
            success:function (resposta) {
                $('#ComprasMes').show('slow');
                $('#ComprasMes tbody').html(resposta);
            }
        });
    });

    $('#home').on('click', function (e) {
        e.preventDefault();
        EsconderDIVS();
    });

    $("#cadFornecedor").on('click', function (e) {
        e.preventDefault();
        LimparCampos('fornecedor');
        $('#DIVcadastrarCliente').hide('slow');
        $('#DIVcadastrarProduto').hide('slow');
        $('#DIVrealizarVenda').hide('slow');
        $('#estatisticas').hide('slow');
        $('#MostrarEstoque').hide('slow');
        $('#EstoqueBaixo').hide('slow');
        $('#EstoqueAlto').hide('slow');
        $('#ComprasMes').hide('slow');
        $('#UltimasVendas').hide('slow');
        $('#DIVcadastrarFornecedor').show('slow');
    });

    $("#cadCliente").on('click', function (e) {
        e.preventDefault();
        LimparCampos('cliente');
        $('#DIVcadastrarFornecedor').hide('slow');
        $('#DIVcadastrarProduto').hide('slow');
        $('#DIVrealizarVenda').hide('slow');
        $('#estatisticas').hide('slow');
        $('#MostrarEstoque').hide('slow');
        $('#EstoqueBaixo').hide('slow');
        $('#EstoqueAlto').hide('slow');
        $('#ComprasMes').hide('slow');
        $('#UltimasVendas').hide('slow');
        $('#DIVcadastrarCliente').show('slow');
    });

    $('#CadProduto').on('click', function (e) {
        e.preventDefault();
        LimparCampos('produto');
        $('#DIVcadastrarCliente').hide('slow');
        $('#DIVcadastrarFornecedor').hide('slow');
        $('#DIVrealizarVenda').hide('slow');
        $('#estatisticas').hide('slow');
        $('#MostrarEstoque').hide('slow');
        $('#EstoqueBaixo').hide('slow');
        $('#EstoqueAlto').hide('slow');
        $('#ComprasMes').hide('slow');
        $('#UltimasVendas').hide('slow');
        $('#DIVcadastrarProduto').show('slow');
    });

    $('#VerEstatisticas').on('click',function (e) {
        e.preventDefault();
        $('#btnUltimasVendas').removeClass('active');
        $('#btnEstoqueAlto').removeClass('active');
        $('#btnEstoqueBaixo').removeClass('active');
        $('#btnComprasMes').removeClass('active');
        $('#DIVcadastrarCliente').hide('slow');
        $('#DIVcadastrarFornecedor').hide('slow');
        $('#DIVcadastrarProduto').hide('slow');
        $('#DIVrealizarVenda').hide('slow');
        $('#MostrarEstoque').hide('slow');
        $('#estatisticas').show('slow');
    });

    $('#MenuEstoque').on('click',function (e) {
        e.preventDefault();
        $('#DIVcadastrarCliente').hide('slow');
        $('#DIVcadastrarFornecedor').hide('slow');
        $('#DIVcadastrarProduto').hide('slow');
        $('#DIVrealizarVenda').hide('slow');
        $('#estatisticas').hide('slow');
        $('#MostrarEstoque').show('slow');
        $('#EstoqueBaixo').hide('slow');
        $('#EstoqueAlto').hide('slow');
        $('#ComprasMes').hide('slow');
        $('#UltimasVendas').hide('slow');
        $('#produto').val("");

        $.ajax({
            url:'../pages/mostrarTotalEstoque.php',
            dataType: 'html',
            beforeSend:function(){
                $('#MostrarEstoque tbody').html('Carregando...');
            },
            success:function(resposta){
                $('#MostrarEstoque tbody').html(resposta);
            }
        });
    });

    $('#cadVenda').on('click',function (e) {
        e.preventDefault();
        LimparCampos('venda');
        $('#DIVrealizarVenda').show('slow');
        $('#DIVcadastrarCliente').hide('slow');
        $('#DIVcadastrarFornecedor').hide('slow');
        $('#DIVcadastrarProduto').hide('slow');
        $('#estatisticas').hide('slow');
        $('#EstoqueBaixo').hide('slow');
        $('#EstoqueAlto').hide('slow');
        $('#ComprasMes').hide('slow');
        $('#UltimasVendas').hide('slow');
        $('#MostrarEstoque').hide('slow');
    })
});
