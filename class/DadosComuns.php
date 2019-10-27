<?php
    abstract class Comuns{
        private $nome;
        private $telefone;
        private $endereco;
        private $cidade;

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }


        public function getCidade(){
            return $this->cidade;
        }


        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
    }

?>