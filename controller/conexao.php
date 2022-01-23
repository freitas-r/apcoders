<?php

    //cria a classe conexão
    class Conexao{

        private $host = 'localhost';
        private $dbname = 'apcoders';
        private $user = 'root';
        private $pass = '';

        //estabelece a conexao com o banco de dados e retorna o erro caso ocorra 
        public function conectar(){

            try{

                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                return $conexao;

            }catch(PDOExection $e){
                echo '<p>'. $e->getMessage() .'</p>';
            }
        }
    }

?>