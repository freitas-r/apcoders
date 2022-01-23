<?php
    //cria a classe do objeto unidade
    class Unidade{
        //atributos da classe unidade
        private $id_unidade;
        private $id_inquilino;
        private $identificacao;
        private $proprietario;
        private $condominio;
        private $endereco;


        //métodos "mágicos" para a classe unidade
        public function __get($atributo){
            return $this->$atributo;
        }
    
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
            return $this;
        }
    }
    

?>