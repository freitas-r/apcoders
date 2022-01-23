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
						<li class="list-group-item bg-light"><a class="text-decoration-none text-dark" href="editar_despesa.php">Editar Despesa</a></li>
					</ul>
					<ul class="list-group">
						<li class="list-group-item bg-light"><a class="text-decoration-none text-dark" href="visualizar_despesas.php">Visualizar Despesas</a></li>
					</ul>
				</div>

            <div class="col-md-9 pe-3">
                <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] ==1){ ?>
                    <div class="bg-success pt-2 text-white d-flex justify-content-center">
                        <h5>Despesa cadastrada com sucesso!</h5>
                    </div>
                <?php } ?>

                <form method="post" action="controller.php?acao=inserirDespesa">
                    <div class="mb-3">
                        <label for="unidade" class="form-label">Unidade</label>
                        <select class="form-select" aria-label="unidade" name="unidade">
                            <option selected>Selecione</option>
                            <?php foreach($unidades as $indice => $unidade){ ?>
                                <option value="<?= $unidade->id_unidade ?>"><?= $unidade->identificacao ?></option>
                            <?php } ?>    
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input class="form-control" type="text" id="descricao" aria-label="descricao" name="descricao">
                    </div>
                    <div class="mb-3">
                        <label for="tipo_despesa" class="form-label">Tipo de Despesa</label>
                        <input class="form-control" type="text" id="tipo_despesa" aria-label="tipo_despesa" name="tipo_despesa">
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input class="form-control" type="text" id="valor" aria-label="valor" name="valor">
                    </div>
                    <div class="mb-3">
                        <label for="vencimento_fatura" class="form-label">Vencimento da Fatura</label>
                        <input class="form-control" type="date" id="vencimento_fatura" aria-label="vencimento_fatura" name="vencimento_fatura">
                    </div>
                    

                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    
                </form>
            </div>

        </div>      
        </div>
  </body>
</html>