<?php
    require_once 'DadosComuns.php';
    require_once 'cadastro.interface.php';
    require_once 'conexao.php';

    class Fornecedor extends Comuns implements Cadastro{
        private $cnpj;

        public static function getInstance(){
            static $instancia = null;

            if($instancia === null){
                $instancia = new Fornecedor();
            }

            return $instancia;
        }

        private function __construct(){

        }

        public function Cadastrar(){
            $conexao = Conexao::getInstance();
            $salvar = $conexao->Conectar()->prepare("INSERT INTO fornecedor(nome_fornecedor,telefone_fornecedor,endereco_fornecedor,cidade_fornecedor,cnpj_fornecedor) VALUES(?,?,?,?,?)");
            $salvar->execute(array($this->getNome(),$this->getTelefone(),$this->getEndereco(),$this->getCidade(),$this->getCnpj()));
        }


        public function getCnpj(){
            return $this->cnpj;
        }

        public function setCnpj($cnpj){
            $this->cnpj = $cnpj;
        }


    }

?>