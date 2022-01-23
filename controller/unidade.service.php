<?php
    //cria a classe de serviço para a unidade
    class UnidadeService {
        private $conexao;
        private $unidade;

        //construct para a classe com os parâmetros "tipados" que devem ser recebidos
        public function __construct(Conexao $conexao, Unidade $unidade){
            $this->conexao = $conexao->conectar();
            $this->unidade = $unidade;
        }

        //funções de crud
        public function inserir(){
            $query = "insert into tb_unidades(id_inquilino, identificacao, proprietario, condominio, endereco)values(:id_inquilino, :identificacao, :proprietario, :condominio, :endereco)";
            $stmt = $this->conexao->prepare($query);
            $stmt->BindValue(':id_inquilino', $this->unidade->__get('id_inquilino'));
            $stmt->BindValue(':identificacao', $this->unidade->__get('identificacao'));
            $stmt->BindValue(':proprietario', $this->unidade->__get('proprietario'));
            $stmt->BindValue(':condominio', $this->unidade->__get('condominio'));
            $stmt->BindValue(':endereco', $this->unidade->__get('endereco'));
            $stmt->execute();
        }

        public function recuperar(){
            $query = "select * from tb_unidades";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }


?>