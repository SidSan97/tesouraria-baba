<?php

use Sidne\TesourariaBaba\App\Contoller\CadastrarContribuintesController;

require '../vendor/autoload.php';


$q = $_GET['q'];

if($q == "listarPorMes") {
    echo 'asdfas';
}
else if ($q == "cadastrarContribuinte") {
    $cad = new CadastrarContribuintesController;
    $result = $cad->cadastroContribuinte($_REQUEST);
}