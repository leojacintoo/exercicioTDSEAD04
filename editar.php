<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #08546c;
        }
        .header {
            float: right;
        }
    </style>
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="scripts/bootstrap5/js/bootstrap.min.js"></script>
    <div class="container-fluid">
      <img src="imagens/senainegativo.png" width="20%" height="20%">
      <hr>
    </div>
    <center>
    <h2><p class="text-white">ATUALIZANDO DADOS DO FUNCIONÁRIO</p></h2>
    </center>
    <br>
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">
                <div class="col-md-12">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#08546c" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>&nbsp;&nbsp;<b>Funcionário</b></h4>
                        </div>
                        <div class="card-body text-start">
                            <?php
                                include 'conecta.php';
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM imc WHERE id=$id";
                                $query = $conn->query($sql);
                                while ($dados = $query->fetch_array()) {
                                    $nome = $dados['nome'];
                                    $idade = $dados['idade'];
                                    $altura = $dados['altura'];
                                    $peso = $dados['peso'];
                                    $imc = $dados['imc'];
                                    $classificacao = $dados['classificacao'];
                                }
                            ?>
                            <form action="atualiza.php?id=<?php echo $id; ?>" method="post">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" required/>
                                <label>Idade</label>
                                <input type="number" class="form-control" name="idade" value="<?php echo $idade; ?>" required/>
                                <label>Altura</label>
                                <input type="text" class="form-control" name="altura" value="<?php echo $altura; ?>" required/>
                                <label>Peso</label>
                                <input type="text" class="form-control" name="peso" value="<?php echo $peso; ?>" required/>
                                <label>IMC</label>
                                <input type="text" class="form-control" name="imc" value="<?php echo $imc; ?>" disabled/>
                                <label>Classificação</label>
                                <input type="text" class="form-control" name="classificacao" value="<?php echo $classificacao; ?>" disabled/>
                                <br/>
                                <button type="submit" class="btn btn-outline-success"><b>ATUALIZAR</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>