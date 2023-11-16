<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/cad.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cadastro de contribuinte</title>
</head>
<body>

    <div class="container">
        <h1 align="center" class="mt-4">Cadastrar contribuidor do mês</h1> <br>

        <form class="row g-3 mb-3" action="../../../routes/web.php?q=cadastrarContribuinte" method="POST">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Qual nome do contribuidor?</label>
                <input type="text" name="nome" class="form-control" id="inputEmail4">
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Status</label>
                <select id="inputPassword4" class="form-select" name="nivel" aria-label="Default select example" required>
                    <option ></option>
                    <option value="Mensalista">Mensalista</option>
                    <option value="Esporadico">Esporádico</option>
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Valor Pago</label>
                <input type="number" name="valor_pago" class="form-control" id="inputEmail4">
            </div>
            
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Data do pagamento</label>
                <input type="datetime-local" class="form-control" name="data_pagamento" id="inputPassword4">
            </div>

            <button type="submit" class="btn btn-success botao">Enviar</button>
        </form>

        <button type="button" class="btn btn-primary botao"><a class="nav-link text-light" href="../../../index.php">Voltar</a></button>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>