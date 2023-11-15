<?php
    namespace Sidne\TesourariaBaba\App\View;

    use DateTime;
    use Sidne\TesourariaBaba\App\Controller\ListarContribuintesController;
    require 'vendor/autoload.php';

    $lista = new ListarContribuintesController;
    $dados = $lista->listagemContribuintes();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>

    <div class="container">
        <div class="row mb-4">
            <form action="routes/web.php?q=listarPorMes" method="post">
                <label for="selectMes" class="mb-2"> Selecione o mês </label>
                <select id="selectMes" class="form-select" aria-label="Default select example">
                    <option selected>Selecione um mês</option>
                    <option value="Janeiro">Janeiro</option>
                    <option value="Fevereiro">Fevereiro</option>
                    <option value="Marco">Março</option>
                    <option value="Abril">Abril</option>
                    <option value="Maio">Maio</option>
                    <option value="Junho">Junho</option>
                    <option value="Julho">Julho</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Setembro">Setembro</option>
                    <option value="Outubro">Outubro</option>
                    <option value="Novembro">Novembro</option>
                    <option value="Dezembro">Dezembro</option>
                </select>
            </form>

            <button type="submit" class="btn btn-primary botao mt-4">Buscar</button>
        </div>

        <div class="table-responsive-md">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Valor pago</th>
                        <th scope="col">Data do pagamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                   
                        for($i=0; $i<sizeof($dados); $i++):
                            $dataDoBanco = $dados[$i]['data_pagamento'];
                            $dataFormatada = new DateTime($dataDoBanco);
                            $dataFormatada = $dataFormatada->format('d/m/Y H:i:s');
                    ?>
                     <tr>
                        <th scope="row"><?= $i+1 ?></th>
                        <td><?= $dados[$i]['nome'] ?></td>
                        <td><?= $dados[$i]['nivel'] ?></td>
                        <td>R$ <?= $dados[$i]['valor_pago'] ?></td>
                        <td><?= $dataFormatada ?></td>
                    </tr>
                    <?php 
                        endfor;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>