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
              <li class="list-group-item bg-light"><a class="text-decoration-none text-dark" href="cadastrar_Unidade.php">Cadastrar Unidade</a></li>
            </ul>
          </div>
          <div class="col-md-9">
            <div class="container pagina">
              <div class="row">
                <div class="col">
                    <h4>Unidades Cadastradas</h4>
                    <hr />

                            <?php foreach($unidades as $indice => $unidade){ ?>
                                <div class="card mb-3 bg-light">
                                    <div class="card-body">
                                        <div class="card-title"><?= $unidade->identificacao ?></div>
                                        <div class="card-subtitle mb-2 text-muted"><?= 'Email: '. $unidade->proprietario ?></div>
                                        <div class="card-subtitle mb-2 text-muted"><?= 'Condomínio: '.$unidade->condominio ?></div>
                                        <div class="card-subtitle mb-2 text-muted"><?= 'Endereço: '.$unidade->endereco ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
              </div>
            </div>
      

        </div>      
      </div>
  </body>
</html>