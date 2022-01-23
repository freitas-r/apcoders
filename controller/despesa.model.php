<?php
    //cria a classe do objeto despesa
    class Despesa{
        //atributos da classe despesa
        private $id_despesa;
        private $id_unidade;
        private $identificacao;
        private $descricao;
        private $tipo_despesa;
        private $valor;
        private $vencimento_fatura;
        private $data_atual;
        private $status_pagamento;


        //métodos "mágicos" para a classe despesa
        public function __get($atributo){
            return $this->$atributo;
        }
    
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
            return $this;
        }
    }
    

?>