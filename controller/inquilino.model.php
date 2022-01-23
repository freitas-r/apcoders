<?php
    //cria a classe do objeto inquilino
    class Inquilino{
        //atributos da classe inquilino
        private $id_inquilino;
        private $nome;
        private $idade;
        private $sexo;
        private $telefone;
        private $email;

        //métodos "mágicos" para a classe inquilino
        public function __get($atributo){
            return $this->$atributo;
        }
    
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
            return $this;
        }
    }
    

?>