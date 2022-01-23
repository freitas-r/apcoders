<?php
    //cria a classe de serviço para o inquilino
    class InquilinoService {
        private $conexao;
        private $inquilino;

        //construct para a classe com os parâmetros "tipados" que devem ser recebidos
        public function __construct(Conexao $conexao, Inquilino $inquilino){
            $this->conexao = $conexao->conectar();
            $this->inquilino = $inquilino;
        }

        //funções de crud
        public function inserir(){
            $query = "insert into tb_inquilinos(nome, idade, sexo, telefone, email)values(:nome, :idade, :sexo, :telefone, :email)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->inquilino->__get('nome'));
            $stmt->bindValue(':idade', $this->inquilino->__get('idade'));
            $stmt->bindValue(':sexo', $this->inquilino->__get('sexo'));
            $stmt->bindValue(':telefone', $this->inquilino->__get('telefone'));
            $stmt->bindValue(':email', $this->inquilino->__get('email'));
            $stmt->execute();
        }

        public function recuperar(){
            $query = "select * from tb_inquilinos";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }



?>