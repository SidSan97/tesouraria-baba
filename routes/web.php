<?php

use Sidne\TesourariaBaba\App\Controller\CadastrarContribuintesController;
use Sidne\TesourariaBaba\App\Controller\ListarContribuintesController;

require '../vendor/autoload.php';

$q = $_GET['q'];

if($q == "cadastrarContribuinte") {

    $cad = new CadastrarContribuintesController;
    $cad->cadastroContribuinte($_REQUEST);
}
else if($q == "listarContribuintes") {

    $cad = new ListarContribuintesController;
    $cad->listagemContribuintes($_REQUEST);
}