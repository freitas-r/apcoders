<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Inquilinos #ap.coders</title>
  </head>
  <body>
    
    <?php
        require 'menu.php';
    ?>

<div class="container">
        <div class="row">
				<div class="col-md-3 menu mb-3">
					<ul class="list-group">
						<li class="list-group-item bg-light"><a class="text-decoration-none text-dark" href="listar_inquilinos.php">Listar Inquilinos</a></li>
					</ul>
				</div>

            <div class="col-md-9 pe-3">
                <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] ==1){ ?>
                    <div class="bg-success pt-2 text-white d-flex justify-content-center">
                        <h5>Inquilino cadastrado com sucesso!</h5>
                    </div>
                <?php } ?>

                <form method="post" action="controller.php?acao=inserirInquilino">
                    <div class="mb-3">
                        <label for="nome-inquilino" class="form-label">Nome</label>
                        <input class="form-control" type="text" placeholder="Nome" id="nome-inquilino" aria-label="nome-inquilino" name="nome-inquilino">
                    </div>
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade</label>
                        <input class="form-control" type="number" id="idade" aria-label="idade" name="idade">
                    </div>
                    <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                      <select class="form-select" aria-label="sexo" name="sexo">
                        <option selected>Selecione</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outro">Outro</option>
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input class="form-control" type="text" placeholder="(99) 99999-9999" minlength="10" maxlength="11" id="telefone" aria-label="telefone" name="telefone">
                    </div>

                    <div class="mb-3">    
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="nome@exemplo.com" name="email">
                    </div>
                    

                    <button type="submit" class="btn btn-success">Cadastrar</button>


                </form>
            </div>

        </div>      
        </div>
  </body>
</html>