<?php

    //faz os requires das classes necessárias
    require 'controller/inquilino.model.php';
    require 'controller/unidade.model.php';
    require 'controller/despesa.model.php';
    require 'controller/conexao.php';
    require 'controller/inquilino.service.php';
    require 'controller/unidade.service.php';
    require 'controller/despesa.service.php';

    //cria e atribui o valor à variável ação
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    //condicional inserir inquilino cria o objeto, a conexao e passa para a classe inquilinoService
    if($acao == 'inserirInquilino'){

        $inquilino = new Inquilino();
        $inquilino->__set('nome', $_POST['nome-inquilino']);
        $inquilino->__set('idade', $_POST['idade']);
        $inquilino->__set('sexo', $_POST['sexo']);
        $inquilino->__set('telefone', $_POST['telefone']);
        $inquilino->__set('email', $_POST['email']);

        $conexao = new Conexao();

        $inquilinoService = new InquilinoService($conexao, $inquilino);
        $inquilinoService->inserir();

        header('Location: cadastrar_inquilino.php?inclusao=1');

    //condicional listar inquilino cria o objeto que por hora está vazio, a conexao e passa para a classe inquilinoService que fará a busca no banco de dados
    }else if($acao == 'listarInquilinos'){
        
        $inquilino = new Inquilino();

        $conexao = new Conexao();

        $inquilinoService = new InquilinoService($conexao, $inquilino);
        $inquilinos = $inquilinoService->recuperar();

    //condicional inserir unidade cria o objeto, a conexao e passa para a classe unidadeService
    }else if($acao =='inserirUnidade'){
        
        $unidade = new Unidade();
        $unidade->__set('identificacao', $_POST['identificacao']);
        $explo = explode(",", $_POST['proprietario']);
        $unidade->__set('id_inquilino', $explo[0]);
        $unidade->__set('proprietario', $explo[1]);
        $unidade->__set('condominio', $_POST['condominio']);
        $unidade->__set('endereco', $_POST['endereco']);

        $conexao = new Conexao();

        $unidadeService = new UnidadeService($conexao, $unidade);
        $unidadeService->inserir();

        header('Location: cadastrar_unidade.php?inclusao=1');

    //condicional listar unidades cria o objeto que por hora está vazio, a conexao e passa para a classe unidadeService que fará a busca no banco de dados
    }else if($acao == 'listarUnidades'){
        
        $unidade = new Unidade();

        $conexao = new Conexao();

        $unidadeService = new UnidadeService($conexao, $unidade);
        $unidades = $unidadeService->recuperar();

    //condicional inserir despesa cria o objeto, a conexao e passa para a classe despesaService
    }else if($acao == 'inserirDespesa'){

        $despesa = new Despesa();
        $despesa->__set('id_unidade', $_POST['unidade']);
        $despesa->__set('descricao', $_POST['descricao']);
        $despesa->__set('tipo_despesa', $_POST['tipo_despesa']);
        $despesa->__set('valor', str_replace(',', '.', $_POST['valor']));
        $despesa->__set('vencimento_fatura', $_POST['vencimento_fatura']);

        $conexao = new Conexao();

        $despesaService = new DespesaService($conexao, $despesa);
        $despesaService->inserir();
        header('Location: cadastrar_despesa.php?inclusao=1');

    //condicional listar despesas cria o objeto que por hora está vazio, a conexao e passa para a classe despesaService que fará a busca no banco de dados
    }else if($acao == 'listarDespesas'){

        $despesa = new Despesa();

        $conexao = new Conexao();

        $despesaService = new DespesaService($conexao, $despesa);
        $despesas = $despesaService->recuperar();

    //condicional atualizar despesa cria o objeto com as informações alteradas, a conexao e passa para a classe despesaService que fará as alterações no banco de dados
    }else if($acao == 'atualizarDespesa'){
        print_r($_POST);

        $despesa = new Despesa();
        $despesa->__set('id_despesa', $_POST['id_despesa']);
        $despesa->__set('descricao', $_POST['descricao']);
        $despesa->__set('tipo_despesa', $_POST['tipo_despesa']);
        $despesa->__set('valor', $_POST['valor']);
        $despesa->__set('vencimento_fatura', $_POST['vencimento_fatura']);
        if(isset($_POST['status_pagamento']) && $_POST['status_pagamento'] == 1){
            $despesa->__set('status_pagamento', $_POST['status_pagamento']);
        }else{
            $despesa->__set('status_pagamento', 0);
        }

        $conexao = new Conexao();

        $despesaService = new DespesaService($conexao, $despesa);
        $despesaService->atualizar();

        header('Location: editar_despesa.php');

    //condicional recuperar despesas cria o objeto que por hora está vazio, a conexao e passa para a classe despesaService que fará a busca no banco de dados com base no id da unidade desejada
    }else if($acao == "recuperarDespesas"){

        $despesa = new Despesa();
        $despesa->__set('id_unidade', $_GET['id']);

        $conexao = new Conexao();

        $despesaService = new DespesaService($conexao, $despesa);
        $despesas = $despesaService->recuperarId();

        //recupera novamente as unidades para gerar a lista do dropdown
        $unidade = new Unidade();

        $conexao = new Conexao();

        $unidadeService = new UnidadeService($conexao, $unidade);
        $unidades = $unidadeService->recuperar();

    //condicional faturas vencidas cria o objeto passando a data atual, cria a conexao e passa para a classe despesaService que fará a busca no banco de dados comparando a data de vencimento da fatura
    }else if($acao == 'faturasVencidas'){
        $despesa = new Despesa();
        $despesa->__set('data_atual', date('Y-m-d'));
        $conexao = new Conexao();

        $despesaService = new DespesaService($conexao, $despesa);
        $despesas = $despesaService->recuperarVencidas();

         //recupera novamente as unidades para gerar a lista do dropdown
         $unidade = new Unidade();

         $conexao = new Conexao();
 
         $unidadeService = new UnidadeService($conexao, $unidade);
         $unidades = $unidadeService->recuperar();


    }


?>