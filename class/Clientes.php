<?php
require_once 'DadosComuns.php';
require_once 'cadastro.interface.php';
require_once 'conexao.php';

class Clientes extends Comuns implements Cadastro {
    private $cpf;
    private $nacimento;

    public static function getInstance(){
        static $instancia = null;

        if($instancia === null){
            $instancia = new Clientes();
        }
        return $instancia;
    }

    private function __construct(){

    }

    public function Cadastrar(){
        $conexao = Conexao::getInstance();
        $salvar = $conexao->Conectar()->prepare("INSERT INTO cliente(nome_cliente,telefone_cliente,endereco_cliente,cidade_cliente,cpf_cliente,nacimento_cliente) VALUES(?,?,?,?,?,?)");
        $salvar->execute(array($this->getNome(),$this->getTelefone(),$this->getEndereco(),$this->getCidade(),$this->getCpf(),$this->getNacimento()));
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getNacimento(){
        return $this->nacimento;
    }

    public function setNacimento($nacimento){
        $this->nacimento = $nacimento;
    }


}

?>