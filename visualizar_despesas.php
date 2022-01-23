<?php

    $acao  = 'listarUnidades';
    require 'controller.php';
    
?>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Despesas #ap.coders</title>

  </head>
  <body>
    
    <?php
        require 'menu.php';
    ?>

    <div class="container">
            <div class="row">
              <div class="col-md-3 menu mb-3">
                <ul class="list-group">
                  <li class="list-group-item bg-light"><a class="text-decoration-none text-dark" href="cadastrar_despesa.php">Cadastrar Despesa</a></li>
                </ul>
                <ul class="list-group">
                  <li class="list-group-item bg-light"><a class="text-decoration-none text-dark" href="editar_despesa.php">Editar Despesas</a></li>
                </ul>
              </div>
              <div class="col-md-9">
            <div class="container pagina">
              <div class="row">
                <div class="col">
                    <h4>Despesas Cadastradas</h4>
                    <hr />
                    <div class="container">
                      <div class="row mb-3">
                        <div class="dropdown col-sm-3">
        
                          <button class="btn btn-success dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Filtrar Unidade
                          </button>
                          <ul class="dropdown-menu row" aria-labelledby="dropdownMenuButton1">
                              <?php foreach($unidades as $indice => $unidade){ ?>
                                  <li><a class="dropdown-item" onclick="selecionarId(<?= $unidade->id_unidade ?>)"><?= $unidade->identificacao ?></a></li>
                              <?php } ?>
                          </ul>
                        </div>

                        <button class="btn btn-success col-sm-3" type="button" onclick="faturasVencidas()">Faturas Vencidas</button>
                      </div>
                    </div>

                    <?php if(isset($_GET['acao'])){ 
                            foreach($despesas as $indice => $despesa){ ?>
                                <div class="card mb-3 bg-light">
                                  <div class="container">
                                    <div class="row">  
                                      <div class="card-body col-sm-9" id="despesa_<?= $despesa->id_despesa?>">
                                          <div class="card-title" >Descrição da Despesa: <span id="descricao_<?= $despesa->id_despesa ?>"> <?= $despesa->descricao ?></span></div>
                                          <div class="card-subtitle mb-2 text-muted">Tipo: <span id="tipo_<?= $despesa->id_despesa ?>"><?= $despesa->tipo_despesa ?></span></div>
                                          <div class="card-subtitle mb-2 text-muted">Valor: R$ <span id="valor_<?= $despesa->id_despesa ?>"><?= $despesa->valor ?></span></div>
                                          <div class="card-text mb-2 text-muted" id="data_<?= $despesa->id_despesa ?>">
                                          <?php  $date = new DateTime($despesa->vencimento_fatura);
                                          echo ' Data de vencimento: '. $date->format('d/m/Y') . '</div>' ;
                                          ?>
                                          <div class="card-subtitle mb-2 text-muted" id="status_<?= $despesa->id_despesa ?>"><?php if($despesa->status_pagamento == 0){
                                            echo "Status do pagamento: em aberto";
                                          }else{
                                            echo "Status do pagamento: pago";
                                          }
                                           ?></div>
                                      </div>
                                      <div class="col-sm-3 align-self-center">
                                        <button type="button" class="btn btn-success m-3" id="botao_editar_<?= $despesa->id_despesa?>" onclick="editar(<?= $despesa->id_despesa?>)"><img src="img/wrench.svg" class="text-white"> Editar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php } } ?>
                        
                        </div>
                    </div>
                </div>
              </div>
            </div>



      </div>
    </div>
    <script>

    function selecionarId(id){
        location.href = 'visualizar_despesas.php?acao=recuperarDespesas&id='+id
    }

    function faturasVencidas(){
      location.href = 'visualizar_despesas.php?acao=faturasVencidas'
    }

    function editar(id){
      //criar um form de edição
      let form = document.createElement('form')
      form.action = 'controller.php?acao=atualizarDespesa'
      form.method = 'post'

      //criar inputs para entrada dos textos
      let inputDescricao = document.createElement('input')
      inputDescricao.type = 'text'
      inputDescricao.name = 'descricao'
      inputDescricao.className = 'col-9 form-control mb-3'
      inputDescricao.value = document.getElementById('descricao_'+id).innerHTML

      let inputTipo = document.createElement('input')
      inputTipo.type = 'text'
      inputTipo.name = 'tipo_despesa'
      inputTipo.className = 'col-9 form-control mb-3'
      inputTipo.value = document.getElementById('tipo_'+id).innerHTML

      let inputValor = document.createElement('input')
      inputValor.type = 'text'
      inputValor.name = 'valor'
      inputValor.className = 'col-9 form-control mb-3'
      inputValor.value = document.getElementById('valor_'+id).innerHTML

      let inputVencimento = document.createElement('input')
      inputVencimento.type = 'date'
      inputVencimento.name = 'vencimento_fatura'
      inputVencimento.className = 'col-9 form-control mb-3'
      inputVencimento.value = document.getElementById('data_'+id).innerHTML

      let labelStatus = document.createElement('label')
      labelStatus.className ='form-check-label'
      labelStatus.innerHTML = 'Pagamento realizado'


      let inputStatus = document.createElement('input')
      inputStatus.type = 'checkbox'
      inputStatus.name = 'status_pagamento'
      inputStatus.className = 'col-9 form-check-input mb-3'
      inputStatus.value = 1

      //criar um input hidden para guardar o id da despesa
      let inputId = document.createElement('input')
      inputId.type = 'hidden'
      inputId.name = 'id_despesa'
      inputId.value = id

      //criar button para envio do form
      let button = document.createElement('button')
      button.type = 'submit'
      button.className = 'col-3 btn btn-success'
      button.innerHTML = 'Atualizar'

      //incluir inputs de texto no form
      form.appendChild(inputDescricao)
      form.appendChild(inputTipo)
      form.appendChild(inputValor)
      form.appendChild(inputVencimento)
      form.appendChild(labelStatus)
      form.appendChild(inputStatus)

      //incluir inputId no form
      form.appendChild(inputId)

      //incluir button no form
      form.appendChild(button)

      //console.log(form)

      //selecionar as divs
      let despesa = document.getElementById('despesa_'+id)


      //limpar o texto da dos spans para inclusao do form
      despesa.innerHTML = ''


      //incluir form na página
      despesa.insertBefore(form, despesa[0])

      //esconde botão de ediçai
      document.getElementById('botao_editar_'+id).className = 'd-none'

    }


    </script>

  </body>
</html>
