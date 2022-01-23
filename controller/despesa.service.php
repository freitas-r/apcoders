<?php
    //cria a classe de serviço para a depesa
    class DespesaService {
        private $conexao;
        private $despesa;

        //construct para a classe com os parâmetros "tipados" que devem ser recebidos
        public function __construct(Conexao $conexao, Despesa $despesa){
            $this->conexao = $conexao->conectar();
            $this->despesa = $despesa;
        }

        //funções de crud
        public function inserir(){
            $query = "insert into tb_despesas(id_unidade, descricao, tipo_despesa, valor, vencimento_fatura)values(:id_unidade, :descricao, :tipo_despesa, :valor, :vencimento_fatura)";
            $stmt = $this->conexao->prepare($query);
            $stmt->BindValue(':id_unidade', $this->despesa->__get('id_unidade'));
            $stmt->BindValue(':descricao', $this->despesa->__get('descricao'));
            $stmt->BindValue(':tipo_despesa', $this->despesa->__get('tipo_despesa'));
            $stmt->BindValue(':valor', $this->despesa->__get('valor'));
            $stmt->BindValue(':vencimento_fatura', $this->despesa->__get('vencimento_fatura'));
            $stmt->execute();
        }

        public function recuperar(){
            $query = "select * from tb_despesas left join tb_unidades on tb_despesas.id_unidade = tb_unidades.id_unidade";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function atualizar(){
            $query ="update tb_despesas set descricao = :descricao, tipo_despesa = :tipo_despesa, valor = :valor, vencimento_fatura = :vencimento_fatura, status_pagamento = :status_pagamento where id_despesa = :id_despesa";
            $stmt = $this->conexao->prepare($query);
            $stmt->BindValue(':descricao', $this->despesa->__get('descricao'));
            $stmt->BindValue(':tipo_despesa', $this->despesa->__get('tipo_despesa'));
            $stmt->BindValue(':valor', $this->despesa->__get('valor'));
            $stmt->BindValue(':vencimento_fatura', $this->despesa->__get('vencimento_fatura'));
            $stmt->BindValue(':status_pagamento', $this->despesa->__get('status_pagamento'));
            $stmt->BindValue(':id_despesa', $this->despesa->__get('id_despesa'));
            $stmt->execute();
        }

        public function recuperarId(){
            $query = "select * from tb_despesas where id_unidade = :id_unidade";
            $stmt = $this->conexao->prepare($query);
            $stmt->BindValue(':id_unidade', $this->despesa->__get('id_unidade'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarVencidas(){
            $query = "select * from tb_despesas where :data_atual > :vencimento_fatura";
            $stmt = $this->conexao->prepare($query);
            $stmt->BindValue(':data_atual', $this->despesa->__get('data_atual'));
            $stmt->BindValue(':vencimento_fatura', $this->despesa->__get('vencimento_fatura'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }

?>