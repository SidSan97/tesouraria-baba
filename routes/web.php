<?php

use Sidne\TesourariaBaba\App\Controller\CadastrarContribuintesController;
use Sidne\TesourariaBaba\App\Controller\CadastrarDespesaController;
use Sidne\TesourariaBaba\App\Controller\ListarContribuintesController;

require '../vendor/autoload.php';

$q = $_GET['q'];

if($q == "cadastrarContribuinte") {
    $cad = new CadastrarContribuintesController;
    $cad->cadastroContribuinte($_REQUEST);

    header('Location: ../index.php');
}
else if($q == "listarPorMes") {

    $cad = new ListarContribuintesController;
    $var = $cad->listagemContribuintes($_REQUEST);

    return $var;
}
else if($q == "cadastrarDespesa") {

    $cad = new CadastrarDespesaController;
    $var = $cad->cadastroDespesa($_REQUEST);

    header('Location: ../index.php');
}


