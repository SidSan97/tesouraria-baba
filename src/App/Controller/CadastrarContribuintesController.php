<?php

namespace Sidne\TesourariaBaba\App\Controller;

use Sidne\TesourariaBaba\App\Model\CadastrarContribuintesModel;

class CadastrarContribuintesController {

    public function cadastroContribuinte($request) {

        $cad = new CadastrarContribuintesModel;
        $cad->cadastrarContribuinte($request);
    }
}