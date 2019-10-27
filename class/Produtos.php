<?php
    require_once 'conexao.php';
    require_once 'DadosComuns.php';
    require_once 'cadastro.interface.php';

    class Produtos extends Comuns  implements Cadastro {
        private $valorCompra;
        private $valorVenda;
        private $quantidade;
        private $dataEntrada;
        private $idProduto;

        public static function getInstance(){
            static $instancia;

            if($instancia === null){
                $instancia = new Produtos();
            }
            return $instancia;
        }

        private function __construct(){

        }

        public function Cadastrar(){
            $conexao = Conexao::getInstance();
            $salvar = $conexao->Conectar()->prepare("INSERT INTO produto(nome_produto,valorCompra_produto,valorVenda_produto,quantidade_produto,dataEntrada_produto,fornecedor_id) VALUES(?,?,?,?,?,?)");
            $salvar->execute(array($this->getNome(),$this->getValorCompra(),$this->getValorVenda(),$this->getQuantidade(),$this->getDataEntrada(),$this->getIdProduto()));
        }

        function Listar(){
            $array = array();
            $conexao = Conexao::getInstance();
            $select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE `produto`.`fornecedor_id` = `fornecedor`.`id_fornecedor`");
            $select->execute();
            $array = $select->fetchAll();
            return $array;
        }

        function ListarPesquisa($nomeProduto){
            $array = array();
            $conexao = Conexao::getInstance();
            $select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE `produto`.`fornecedor_id` = `fornecedor`.`id_fornecedor` AND nome_produto LIKE '%".$nomeProduto."%'");
            $select->execute();
            $array = $select->fetchAll();
            return $array;
        }

        function EstoqueBaixo(){
            $array = array();
            $conexao = Conexao::getInstance();
            $select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE quantidade_produto<=? AND `produto`.`fornecedor_id`=`fornecedor`.`id_fornecedor`");
            $select->execute(array(15));
            $array = $select->fetchAll();
            return $array;
        }

        function EstoqueAlto(){
            $array = array();
            $conexao = Conexao::getInstance();
            $select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE quantidade_produto > ? AND `produto`.`fornecedor_id`=`fornecedor`.`id_fornecedor`");
            $select->execute(array(15));
            $array = $select->fetchAll();
            return $array;
        }

        function ComprasMes(){
            $array = array();
            $conexao = Conexao::getInstance();
            $mesAtual = date("m");
            $anoAtual = date("Y");
            $select = $conexao->Conectar()->prepare("SELECT * FROM produto INNER JOIN fornecedor WHERE `produto`.`fornecedor_id` = `fornecedor`.`id_fornecedor` AND MONTH (dataEntrada_produto) =? AND YEAR (dataEntrada_produto) = ?");
            $select->execute(array($mesAtual,$anoAtual));
            $array = $select->fetchAll();
            return $array;
        }

        function ExcluirProduto($idProduto){
            $conexao = Conexao::getInstance();
            $deleteVenda = $conexao->Conectar()->prepare("DELETE FROM venda WHERE produto_id=?");
            $deleteVenda->execute(array($idProduto));

            $deleteProduto = $conexao->Conectar()->prepare("DELETE FROM produto WHERE id_produto=?");
            $deleteProduto->execute(array($idProduto));

            if($deleteVenda == true && $deleteVenda == true){
                return true;
            }else{
                return false;
            }
        }

        public function getValorCompra(){
            return $this->valorCompra;
        }

        public function setValorCompra($valorCompra){
            $this->valorCompra = $valorCompra;
        }


        public function getValorVenda(){
            return $this->valorVenda;
        }


        public function setValorVenda($valorVenda){
            $this->valorVenda = $valorVenda;
        }


        public function getQuantidade(){
            return $this->quantidade;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }


        public function getDataEntrada(){
            return $this->dataEntrada;
        }


        public function setDataEntrada($dataEntrada){
            $this->dataEntrada = $dataEntrada;
        }


        public function getIdProduto(){
            return $this->idProduto;
        }


        public function setIdProduto($idProduto){
            $this->idProduto = $idProduto;
        }


    }
?>