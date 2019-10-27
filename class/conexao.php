<?php
    class Conexao{

        public static function getInstance(){
            static $instancia = null;

            if($instancia === null){
                $instancia = new Conexao();
            }
            return $instancia;
        }

        private function __construct(){

        }

        public function Conectar(){
            $pdo = new PDO("mysql:host=localhost;dbname=controleestoque","root","");
            return $pdo;
        }
    }

