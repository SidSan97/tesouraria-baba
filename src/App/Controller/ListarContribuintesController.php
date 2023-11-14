<?php

namespace Sidne\TesourariaBaba\App\Controller;

use Sidne\TesourariaBaba\App\Model\ListarContribuintesModel;

class ListarContribuintesController {

    public function listagemContribuintes($request) {

        $result = new ListarContribuintesModel;
        $var    = $result->pegarDados($request);

        return $var;
    }
}