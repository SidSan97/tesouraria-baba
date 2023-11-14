<?php

use Sidne\TesourariaBaba\App\Controller\CadastrarContribuintesController;

require '../vendor/autoload.php';

$q = $_GET['q'];

if($q == "cadastrarContribuinte") {

    $cad = new CadastrarContribuintesController;
    $cad->cadastroContribuinte($_REQUEST);
}