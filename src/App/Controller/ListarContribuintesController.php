<?php

namespace Sidne\TesourariaBaba\App\Controller;

use Sidne\TesourariaBaba\App\Model\ListarContribuintesModel;

class ListarContribuintesController {

    public function listagemContribuintes() {

        $result = new ListarContribuintesModel;
        $var    = $result->pegarDados();

        return $var;
    }
}