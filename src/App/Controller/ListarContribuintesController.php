<?php

namespace Sidne\TesourariaBaba\App\Controller;

use Sidne\TesourariaBaba\App\Model\ListarContribuintesModel;

class ListarContribuintesController {

    public function listagemContribuintes() {

        $result = new ListarContribuintesModel;
        $var    = $result->pegarDados();
        //echo $var[1]['nome'];

        return $var;
    }
}