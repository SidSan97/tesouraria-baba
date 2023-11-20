<?php
    namespace Sidne\TesourariaBaba\App\View;

    use DateTime;
    use Sidne\TesourariaBaba\App\Controller\ListarContribuintesController;
    use Sidne\TesourariaBaba\App\Controller\ListarDespesasController;

    require 'vendor/autoload.php';

    if(isset($_GET['q']) and $_GET['q'] == "listarPorMes") {
        $lista = new ListarContribuintesController;
        $dados = $lista->listagemContribuintes($_REQUEST);
    }
    else if(!isset($_GET['q'])) {
        $lista = new ListarContribuintesController;
        $dados = $lista->listagemContribuintes(null);

        $listaDespesa = new ListarDespesasController;
        $desp = $listaDespesa->listagemDespesas(null);
    }

    $meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
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
        <h1 align="center" class="mb-4 mt-3">Administração de finanças do baba</h1>

        <h5 class="mb-3">Lista referente ao mês de <?= isset($_GET['q']) ? $dados['dados'][0]['mes'] : $meses[date('m')-1]?></h5>

        <div class="row mb-4">
            <form action="index.php?q=listarPorMes" method="post">
                <div class="row">
                    <div class="col-6">
                        <label for="selectMes" class="mb-2 legenda"> Selecione o mês </label>
                        <select id="selectMes" class="form-select mb-3" name="mes" aria-label="Default select example" required>
                            <option value="<?=$meses[date('m')-1]?>"><?=$meses[date('m')-1]?></option>
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
                    </div>

                    <div class="col-6">
                        <label for="selectAno" class="mb-2 legenda"> Informe o ano </label>
                        <input type="number" name="ano" class="mb-3 form-control" id="selectAno" value="<?= date('Y') ?>" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary botao">Buscar</button>
            </form>
        </div>
        
        <hr>

        <div class="row botoes mb-3">
            <div class="col-md-4 mb-2">
                <button class="btn btn-secondary"><a class="text-light" href="src/App/View/cadastrar-contribuinte.php">Cadastrar Contribuição</a></button>
            </div>

            <?php if(!isset($_GET['q'])): ?>
                <div class="col-md-4 mb-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCadDespesas" data-bs-whatever="@getbootstrap">Informar Despesa</button>
                </div>

                <div class="col-md-4 mb-2">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalVerDespesas" data-bs-whatever="@getbootstrap">Ver gastos no mês</button>
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['q']) and $_GET['q'] == "listarPorMes"): ?>
                <div class="col-md-4 mb-2">
                    <button type="button" class="btn btn-warning"><a href="index.php">Limpar Buscas</a></button>
                </div>
            <?php endif; ?>
        </div>       

        <?php if($dados['dados'] !== null): ?>    
        <div class="row informacoes mb-2">
            <div class="col-4">
                <span>Arrecadação do mês:</span>
                <br> <h5 class="text-success">R$ <?=$dados['total_pago'][0]['total_pago']?></h5>
            </div>

            <div class="col-4">
                <span>Despesas do mês: </span>
                <br> <h5 class="text-danger">R$ <?=$dados['total_despesas'][0]['valor_despesa'] == '' ? 0 : $dados['total_despesas'][0]['valor_despesa'] ?></h5>
            </div>

            <div class="col-4">
                <span>Valor total em caixa: </span>
                <br> <h5 class="text-success">R$ <?=($dados['total_pago'][0]['total_pago']) - ($dados['total_despesas'][0]['valor_despesa'])?></h5>
            </div>
        </div>

        <div class="table-responsive-md">
            <table class="table table-striped table-hover table-contribuintes">
                <thead>
                    <tr>
                        <th scope="col" class="nome">#</th>
                        <th scope="col" class="nome">Nome</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Valor pago</th>
                        <th scope="col">Data do pagamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php               
                        for($i=0; $i<sizeof($dados['dados']); $i++):
                            $dataDoBanco = $dados['dados'][$i]['data_pagamento'];
                            $dataFormatada = new DateTime($dataDoBanco);
                            $dataFormatada = $dataFormatada->format('d/m/y');
                    ?>
                    <tr>
                        <th scope="row"><?= $i+1 ?></th>
                        <td class="nome"><?= $dados['dados'][$i]['nome'] ?></td>
                        <td>
                            <?php
                                if($dados['dados'][$i]['nivel'] == "Mensalista")
                                    echo '<span class="text-success">Mensalista</span>';
                                else 
                                    echo '<span class="text-danger">Esporádico</span>';
                             ?>
                        </td>
                        <td>R$ <?= $dados['dados'][$i]['valor_pago'] ?></td>
                        <td><?= $dataFormatada ?></td>
                    </tr>
                    <?php 
                        endfor;      
                    ?>
                </tbody>
            </table>
        </div>
        
        <?php 
            endif; 

            if($dados['dados'] == null)
                echo 'Nada encontrado';
        ?>

         <!-- Inicio modal de cadastrar despesas -->
         <div class="modal fade" id="ModalCadDespesas" tabindex="-1" aria-labelledby="ModalCadDespesasLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Novo gasto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="routes/web.php?q=cadastrarDespesa" method="POST">
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Descricao:</label>
                                <textarea class="form-control" id="message-text" name="descricao"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Data:</label>
                                <input type="date" class="form-control" name="data" id="recipient-name">
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Valor:</label>
                                <input type="number" class="form-control" name="valor" id="recipient-name">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim modal de cadastrar despesas -->

        <!-- Inicio modal ver despesas -->
        <div class="modal fade" id="ModalVerDespesas" tabindex="-1" aria-labelledby="ModalVerDespesasLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ver tabela de gastos de <?=$meses[date('m')-1]?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Valor pago</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php                   
                                    for($i=0; $i<sizeof($desp); $i++):
                                        $dataDoBanco = $desp[$i]['data'];
                                        $dataFormatada = new DateTime($dataDoBanco);
                                        $dataFormatada = $dataFormatada->format('d/m/Y');
                                ?>
                                <tr>
                                    <td><?= $desp[$i]['descricao'] ?></td>                               
                                    <td><?= $dataFormatada ?></td>
                                    <td>R$ <?= $desp[$i]['valor_despesa'] ?></td>
                                </tr>
                                <?php 
                                    endfor;
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim modal de ver despesas -->

    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>