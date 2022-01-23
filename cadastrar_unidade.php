<?php

    $acao  = 'listarInquilinos';
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
    <title>Unidades #ap.coders</title>
  </head>
  <body>
    
    <?php
        require 'menu.php';
    ?>

<div class="container">
        <div class="row">
				<div class="col-md-3 menu mb-3">
					<ul class="list-group">
						<li class="list-group-item bg-light"><a class="text-decoration-none text-dark" href="listar_unidades.php">Listar Unidades</a></li>
					</ul>
				</div>

            <div class="col-md-9 pe-3">
                <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] ==1){ ?>
                    <div class="bg-success pt-2 text-white d-flex justify-content-center">
                        <h5>Unidade cadastrada com sucesso!</h5>
                    </div>
                <?php } ?>

                <form method="post" action="controller.php?acao=inserirUnidade">
                    <div class="mb-3">
                        <label for="identificacao" class="form-label">Identificação</label>
                        <input class="form-control" type="text" id="identificacao" aria-label="identificacao" name="identificacao">
                    </div>
                    <div class="mb-3">
                        <label for="proprietario" class="form-label">Proprietário</label>
                        <select class="form-select" aria-label="proprietario" name="proprietario">
                            <option selected>Selecione</option>
                            <?php foreach($inquilinos as $indice => $inquilino){ ?>
                                <option value="<?= $inquilino->id_inquilino . ',' . $inquilino->nome ?>"><?= $inquilino->nome ?></option>
                            <?php } ?>    
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="condominio" class="form-label">Condomínio</label>
                        <input class="form-control" type="text" id="condominio" aria-label="condominio" name="condominio">
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input class="form-control" type="text" id="endereco" aria-label="endereco" name="endereco">
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    
                </form>
            </div>

        </div>      
        </div>
  </body>
</html>